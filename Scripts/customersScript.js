/**
 * Script to manage a  Customer model entity.
 * @author
 *     Guy Bami W.
 * Created changes: 08.04.2017 06:18:40
 */

// global varaibles
var customersStore = null;
var customersGrid = null;
var currentItemIndex = -1;
var itemsArrayIds = new Array();
var currentCustomerId = -1;

// some customer actions commands
var viewAllItemsCmd = "viewAllCustomers";
var editItemDetailsCmd = "editDetails";
var viewItemDetailsCmd = "viewDetails";
var addNewItemCmd = "addNewItem";
var insertNewItemCmd = "insertNewItem";
var cancelChangesCmd = "cancelChanges";
var saveChangesCmd = "saveChanges";

// controls and page divs Ids
var toolbarButtonsDivId = "toolbarButtonsDiv";
var dataItemsGridId = "customersGrid";
var itemDetailsDivId = "customerDetailsDiv";
var itemsGridDivId = "customersGridDiv";
var itemDetailsFormId = "customerDetailsForm";
var customerDetailsFormId = "customerDetailsForm";
var dataViewDivId = "dataViewDiv";
var dataEditDivId = "dataEditDiv";
var confirmDialogDivId = "confirmDialogDiv";
var sectionTitleAndToolbarBtnDivId = "sectionTitleAndToolbarBtnDiv";
var toolbarButtonsTableId = "toolbarButtonsTable";
var dataViewHeaderId = "dataViewHeader";
var errorContentDivId = "errorContentDiv";
var sitePathDivId = "sitePathDiv";
var resultsDivId = "resultsDiv";
var errorContentDivId = "errorContentDiv";
var successOverlayDivId = "successOverlayDiv";

// toolbar button spans holders
var spanAddNewItemBtnId = "spanAddNewItemBtn";
var spanDeleteItemsBtnId = "spanDeleteItemsBtn";

// toolbar buttons id
var addNewItemBtnId = "addNewItemBtn";
var deleteItemsBtnId = "deleteItemsBtn";

// dialog buttons id
var addNewItemBtnDialogId = "addNewItemBtnDialog";
var editItemBtnDialogId = "editItemBtnDialog";
var saveChangesBtnDialogId = "saveChangesBtnDialog";
var cancelChangesBtnDialogId = "cancelChangesBtnDialog";
var cancelAddItemBtnDialogId = "cancelAddItemBtnDialog";
var closeEditBtnDialogId = "closeEditBtnDialog";
var confirmItemsDeletionBtnDialogId = "confirmItemsDeletionBtnDialog";
var moveUpBtnDialogId = "moveUpBtnDialog";
var moveDownBtnDialogId = "moveDownBtnDialog";

// dialog divs Id
var addNewItemDialogContentId = "addNewItemDialogContent";
var customerDetailsDialogId = "customerDetailsDialog";
var viewItemDetailsDialogContentId = "viewItemDetailsDialogContent";
var confirmDeletionDialogId = "confirmDeletionDialog";

// dialog buttons spans holders
var spanEditItemBtnDialogDialogId = "spanEditItemBtnDialogDialog";
var spanCloseEditBtnDialogId = "spanCloseEditBtnDialog";
var spanSaveChangesBtnDialogId = "spanSaveChangesBtnDialog";
var spanCancelChangesBtnDialogId = "spanCancelChangesBtnDialog";

var spanMoveUpBtnDialogId = "spanMoveUpDialogBtn";
var spanMoveDownBtnDialogId = "spanMoveDownDialogBtn";

// var used to hold page content elements
var editItemDetailsFormContent = "";
var viewItemDetailsFormContent = "";
var viewItemDetailsFormContentDivId = "viewItemDetailsFormContentDiv";
var viewItemDetailsDialogId = "viewItemDetailsDialog";

var hideContentClass = "hideContent";

// datagrid settings
var gridDefaultPageSize = 30;
var gridDefaultStyle = "width:100%;height:60em;";
var jsonErrorMsg = "An error occured with json returned data";
var successImg = "../../Resources/Images/Buttons/success_icon.png";
var controllerUrl = "../../Controllers/CustomerController.php";
var postDataFormat = "text";
var postMethod = "POST";

// flags used to check user role
var readItemRight = true;
var addNewItemRight = true;
var deleteItemRight = true;
var editItemRight = true;

 

var menuItemSectionTitleLabel = pageLangTexts.menuItemSectionTitleLabel == null ? "Administration" : pageLangTexts.menuItemSectionTitleLabel;
var subMenuItemSectionTitleLabel = pageLangTexts.subMenuItemSectionTitleLabel == null ? "Kundenliste" : pageLangTexts.subMenuItemSectionTitleLabel;


// load all dojo dependencies modules
require(["dojo/parser",
    "dojo/dom",
    "dojo/Deferred",
    "dojo/dom-class",
    "dojo/dom-form",
    "dojo/dom-construct",
    "dojo/domReady!",
    "dojo/_base/array",
    "dojo/_base/lang",
    "dojo/date/locale",
    "dojo/store/Memory",
    // dojox 
    "dojox/grid/DataGrid",
    "dojox/form/PasswordValidator",
    "dojo/data/ItemFileWriteStore",
    "dojox/grid/EnhancedGrid",
    "dojox/grid/enhanced/plugins/IndirectSelection",
    "dojox/grid/enhanced/plugins/Pagination",
    "dojox/grid/enhanced/plugins/Filter",
    "dojox/grid/enhanced/plugins/Menu",
    "dojox/grid/_CheckBoxSelector",
    "dojox/grid/_RadioSelector",
    // dojit
    "dijit/form/Button",
    "dijit/form/Form",
    "dijit/form/Select",
    "dijit/form/ValidationTextBox",
    "dijit/form/NumberTextBox",
    "dijit/form/CheckBox",
    "dijit/form/DropDownButton"
]);

/**
 * load method
 * @param {type} parser
 * @param {type} ready
 * @param {type} dom
 * @returns {none}
 */

require(["dojo/parser", "dojo/ready"],
    function (parser, ready) {
        ready(function () {
            try {
                // save page contents div before parsing!!!
                editItemDetailsFormContent = $("#editItemDetailsFormContentDiv").html();
                viewItemDetailsFormContent = $("#viewItemDetailsFormContentDiv").html();
                // now we can parse the postback content

                var parsePageWidgets = function () {
                    //alert("size: " + customUserRolesManagerObject.userRolesData.length);
                    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
                        var curmo = customUserRolesManagerObject; // short name
                        // load roles only once
                        curmo.entityType = curmo.entityTypesObject.Customer;
                        readItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Customer, curmo.accessRightsObject.readRight);
                    }
                    $("#mainDivContent").removeClass(hideContentClass);
                    if (readItemRight == true) {
                        // show and create toolbar buttons
                        $("#" + sectionTitleAndToolbarBtnDivId).removeClass(hideContentClass);
                        $("#" + toolbarButtonsDivId).removeClass(hideContentClass);
                        // display page section title
                        $("#" + dataViewHeaderId).removeClass(hideContentClass);
                        // display sitemap path
                        displayCurrentPath(sitePathDivId, 2, [menuItemSectionTitleLabel, subMenuItemSectionTitleLabel], $(location).attr("href"));
                        if (customUserRolesManagerObject != null) {
                            //setActiveMenuItem(customUserRolesManagerObject.mainMenuItemsObject.ADMINISTRATION.id);
                        }

                        // display dojo data grid
                        generateCustomersDataGrid(itemsGridDivId);
                    } else {
                        // redirect to access denied page
                        $(window).attr("location", webSiteRootURL + "/Views/AccessDenied.php");
                    }

                    // init form validators
                    initFormValidators();
                    // register customer clicks
                    registerButtonClickCustomers();
                };

                // parse main menu and display page
                parseMainMenu(parsePageWidgets);
            } catch (err) {
                logError(err);
            }
        });
    });




function setLabelFields(jsonData){

    $("#nameLabel").html(jsonData[0].name);
    $("#lastNameLabel").html(jsonData[0].lastName);
    $("#emailLabel").html(jsonData[0].email);
    $("#phoneNumberLabel").html(jsonData[0].phoneNumber);
    $("#zipCodeLabel").html(jsonData[0].zipCode);
    $("#cityLabel").html(jsonData[0].city);
    $("#streetLabel").html(jsonData[0].street);

}


function setTextFields(jsonData){
    setFormFieldValue("name", jsonData[0].name);
    setFormFieldValue("lastName", jsonData[0].lastName);
    setFormFieldValue("email", jsonData[0].email);
    setFormFieldValue("phoneNumber", jsonData[0].phoneNumber);
    setFormFieldValue("zipCode", jsonData[0].zipCode);
    setFormFieldValue("city", jsonData[0].city);
    setFormFieldValue("street", jsonData[0].street);
}


function settersMethodWithDefaultValues(){
    setFormFieldValue("name", "");
    setFormFieldValue("lastName", "");
    setFormFieldValue("email", "");
    setFormFieldValue("phoneNumber", "");
    setFormFieldValue("zipCode", "");
    setFormFieldValue("city", "");
    setFormFieldValue("street", "");
}

/**
 * generate dynamic Customers datagrid
 * @param {string} targetDiv
 * @returns {none}
 */
function generateCustomersDataGrid(targetDiv) {

    var windowWidth = $(window).width() - 20;
    var nameColWidth = windowWidth * 0.14 + "px";
    var lastNameColWidth = windowWidth * 0.14 + "px";
    var emailColWidth = windowWidth * 0.14 + "px";
    var phoneNumberColWidth = windowWidth * 0.14 + "px";
    var zipCodeColWidth = windowWidth * 0.14 + "px";
    var streetColWidth = windowWidth * 0.14 + "px";
    var cityColWidth = "auto";



    function shortDateFieldFormatter(data, rowIndex) {
        var strDate = strToShortDate(new String(data));
        debugMessageToConsole("shortDateFieldFormatter strDate: " + strDate, lowLevel);
        return dojo.date.locale.format(strDate, this.constraint);
    }

    function titleFormatter(data, rowIndex) {
        var item = customersGrid.getItem(rowIndex);
        var formattedTtitle = $.trim(item.title);
        if (formattedTtitle == null || formattedTtitle.length == 0)
            formattedTtitle = "unknown";
        if (item) {
            var contains = false;
            for (i = 0; i < itemsArrayIds.length; i++) {
                if (itemsArrayIds[i].toString() == item.customerId.toString()) {
                    contains = true;
                    break;
                }
            }
            if (!contains)
                itemsArrayIds.push(item.customerId);
            var html = '<label class="itemNameLabelDiv"><a href="javascript:viewCustomerDetails(\'' + item.customerId + '\');" class="linkItemNameRow">'
                     + formattedTtitle + '</a></label>';
            return html;
        }
        return data;
    }


    function summaryFormatter(data, rowIndex) {
        var item = customersGrid.getItem(rowIndex);
        var formattedSummary = item.summary;
        var maxLength = 50;
        if (formattedSummary.toString().length >= maxLength) {
            formattedSummary = item.summary.toString().substr(0, maxLength) + "...";
        }
        return formattedSummary;
    }
    



    // manage user role
    var dataEditable = true;
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        curmo.entityType = curmo.entityTypesObject.Customer;
        dataEditable = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Customer, curmo.accessRightsObject.editRight);
    }

    var columsLayout = [
        {
            name: pageLangTexts.lastNameColLabel == null ? "LastName" : pageLangTexts.lastNameColLabel,
            field: "lastName",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: lastNameColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }
        ,{
            name: pageLangTexts.nameColLabel == null ? "Name" : pageLangTexts.nameColLabel,
            field: "name",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: nameColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }

        ,{
            name: pageLangTexts.emailColLabel == null ? "Email" : pageLangTexts.emailColLabel,
            field: "email",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: emailColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }
        ,{
            name: pageLangTexts.phoneNumberColLabel == null ? "PhoneNumber" : pageLangTexts.phoneNumberColLabel,
            field: "phoneNumber",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: phoneNumberColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }
        ,{
            name: pageLangTexts.streetColLabel == null ? "Street" : pageLangTexts.streetColLabel,
            field: "street",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: streetColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }
        ,{
            name: pageLangTexts.zipCodeColLabel == null ? "ZipCode" : pageLangTexts.zipCodeColLabel,
            field: "zipCode",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: zipCodeColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }
        ,{
            name: pageLangTexts.cityColLabel == null ? "City" : pageLangTexts.cityColLabel,
            field: "city",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: cityColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }
    ];

    var postParameters = {
        userAction: "getAllItems"
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: "text",
        method: postMethod,
        error: function (errorMsg) {
            // hide loading img
            hideLoadingTask(targetDiv);
            displayErrorContent("errorContentDiv", "Failed to get all customers from server: " + errorMsg);
            logError({
                message: "Failed to get all customers from server: \n" + errorMsg
            });
        }
    };
    var oldCellValue = "";

    $("#" + itemDetailsDivId).html("");
    // display title
    $("#" + dataViewHeaderId).removeClass(hideContentClass);

    // display toolbar buttons and load data
    createToolbarBtns(viewAllItemsCmd);

    // show loading overlay
    showLoadingTask(targetDiv);

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, fetchDataCompleted);

    //get postback result
    function fetchDataCompleted(data) {
        var jsonData = null;

        debugMessageToConsole("items json data: " + data, lowLevel);
        // hide loading img
        hideLoadingTask(targetDiv);
        jsonData = data;

        // clear messages
        $("#" + resultsDivId).html("");
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent("errorContentDiv", "fetchDataCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent("" + errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }

        // set dimensions and div size
        var setAutoHeight = getDataGridAutoHeight(jsonData.length, gridDefaultPageSize);
        if (!setAutoHeight) {
            $("#" + targetDiv).attr("style", gridDefaultStyle);
        }

        customersStore = new dojo.data.ItemFileWriteStore({
            data: {
                identifier: "customerId",
                items: jsonData
            }
        });

        if (customersStore != null) {
            // save data store
            customersStore.save({
                onComplete: function () {
                    debugMessageToConsole("Done saving items store.", lowLevel);
                },
                onError: function () {
                    logError({
                        message: "Save failed items store."
                    });
                }
            });
            // custom sorting fields
            customersStore.comparatorMap = {};
            //customersStore.comparatorMap["date"] = compareStringIgnoreCase;
            customersStore.comparatorMap["name"] = compareStringIgnoreCase;
            customersStore.comparatorMap["lastName"] = compareStringIgnoreCase;
            customersStore.comparatorMap["email"] = compareStringIgnoreCase;
            customersStore.comparatorMap["zipCode"] = compareStringIgnoreCase;
            customersStore.comparatorMap["city"] = compareStringIgnoreCase;
            customersStore.comparatorMap["street"] = compareStringIgnoreCase;

            //destroy old controls
            destroyWidget(dataItemsGridId);
            // create datagrid
            customersGrid = new dojox.grid.EnhancedGrid({
                id: dataItemsGridId,
                store: customersStore,
                structure: columsLayout,
                rowSelector: false,
                autoWidth: false, //getGridAutoWidth(jsonData.length),
                autoHeight: getDataGridAutoHeight(jsonData.length, gridDefaultPageSize),
                loadingMessage: pageLangTexts.loadingMessageLabel == null ? "Loading data..." : pageLangTexts.loadingMessageLabel,
                noDataMessage: pageLangTexts.noDataMessageLabel == null ? "No data found" : pageLangTexts.noDataMessageLabel,
                errorMessage: pageLangTexts.errorMessageLabel == null ? "Error occured while loading..." : pageLangTexts.errorMessageLabel,
                plugins: {
                    indirectSelection: {
                        headerSelector: true,
                        width: "30px",
                        styles: "text-align: center;"
                    },
                    pagination: {
                        pageSizes: ["50", "100", "200", "All"],
                        description: true,
                        sizeSwitch: true,
                        pageStepper: true,
                        gotoButton: true,
                        defaultPageSize: gridDefaultPageSize,
                        //page step to be displayed
                        maxPageStep: 4,
                        //position of the pagination bar
                        position: "bottom"
                    },
                    filter: {
                        // Show the closeFilterbarButton at the filter bar
                        closeFilterbarButton: true,
                        // Set the maximum rule count to 10
                        ruleCount: 10,
                        // Set the name of the items
                        itemsName: "Kunden"
                    }
                }
            });

            // set sort index col
            setSortColumnsIndexes(customersGrid, 2, true);
            // add customers trigger
            customersGrid.on("SelectionChanged", reportSelection);
            customersGrid.on("StartEdit", gridStartEdit);
            customersGrid.on("ApplyCellEdit", gridApplyCellEdit);
            customersGrid.placeAt(targetDiv);
            // parse datagrid
            customersGrid.startup();
        }

        // function to trigger grif row selection evt
        function reportSelection() {
            var items = this.selection.getSelected();
            if (items.length == 0)
                $("#" + resultsDivId).html("");
            else if (items.length == 1)
                $("#" + resultsDivId).html(items.length + (pageLangTexts.oneSelectedItemLabel == null ? " Item selected" : pageLangTexts.oneSelectedItemLabel));
            else if (items.length > 1)
                $("#" + resultsDivId).html(items.length + (pageLangTexts.manySelectedItemsLabel == null ? "Items selected" : pageLangTexts.manySelectedItemsLabel));
        }

        function gridStartEdit(inCell, inRowIndex) {
            var rowItem = this.getItem(inRowIndex);
            oldCellValue = rowItem[inCell.field].toString();
            debugMessageToConsole("oldCellValue : " + oldCellValue, highLevel);
        }

        function gridApplyCellEdit(inValue, inRowIndex, inFieldIndex) {
            if (oldCellValue != null && inValue != oldCellValue) {
                debugMessageToConsole("cell value changed on index col: " + inFieldIndex, lowLevel);
                //debugMessageToConsole("cell new value: " + inValue, highLevel);
                // get all row item
                var rowItem = this.getItem(inRowIndex);
                var obj = {};
                var storeItem = rowItem;
                obj["newFieldValue"] = inValue;
                obj["fieldName"] = inFieldIndex;
                obj["entityKeyId"] = storeItem["customerId"].toString();
                var itemId = storeItem["customerId"].toString();
                // check and format date field
                if (obj["fieldName"].toString() == "date") {
                    obj["newFieldValue"] = dateToYMD(obj["newFieldValue"]);
                }
                var jsonValues =  dojo.toJson(obj);
                debugMessageToConsole("jsonValues: " + jsonValues, highLevel);
                submitInlineGridChanges(itemId, jsonValues);
            }
        }
    }

}

function displayCustomerView(userAction) {

    var customerId = currentCustomerId;
    debugMessageToConsole("customerId:" + customerId, highLevel);
    debugMessageToConsole("userAction: " + userAction, highLevel);

    var windowHeight = $(window).height();
    var windowWidth = $(window).width();

    var postParameters = {
        "customerId": customerId,
        "userAction": userAction
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({
                message: "Reponse failed to get customer details with error: " + errorMsg
            });
        }
    };

    //clear old style
    $("#" + itemsGridDivId).attr("style", "");

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, fetchDataCompleted);

    //get postback result
    function fetchDataCompleted(data) {

        debugMessageToConsole("data : " + data, highLevel);
        // get json result
        var jsonData = data;
        // clear error message
        $("#" + errorContentDivId).html("");

        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "displayCustomerView: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }

        if (userAction == viewItemDetailsCmd) {
            // callback method
            var setFieldValuesCallback = function () {
                viewItemDetailsFormContent = $("#" + viewItemDetailsFormContentDivId).html();
                $("#" + viewItemDetailsDialogContentId).html(viewItemDetailsFormContent);
                setLabelFields(jsonData);
            };

            // show buttons
            $("#" + spanEditItemBtnDialogDialogId).removeClass(hideContentClass);
            $("#" + spanCloseEditBtnDialogId).removeClass(hideContentClass);
            //hide buttons
            $("#" + spanSaveChangesBtnDialogId).addClass(hideContentClass);
            $("#" + spanCancelChangesBtnDialogId).addClass(hideContentClass);

            setFieldValuesCallback();
            // display view/edit dialog
            showViewItemDetailsDialog();
        } else if (userAction == cancelChangesCmd) {
            showLoadingTask(viewItemDetailsDialogContentId);
            var setFieldValuesCallback = function () {
                hideLoadingTask(viewItemDetailsDialogContentId);
                viewItemDetailsFormContent = $("#" + viewItemDetailsFormContentDivId).html();
                $("#" + viewItemDetailsDialogContentId).html(viewItemDetailsFormContent);
                setLabelFields(jsonData);
            };
            // show buttons
            $("#" + spanEditItemBtnDialogDialogId).removeClass(hideContentClass);
            $("#" + spanCloseEditBtnDialogId).removeClass(hideContentClass);
            //hide buttons
            $("#" + spanSaveChangesBtnDialogId).addClass(hideContentClass);
            $("#" + spanCancelChangesBtnDialogId).addClass(hideContentClass);
            setFieldValuesCallback();
        } else if (userAction == editItemDetailsCmd) {

            var setFieldValuesCallback = function () {
                //erase old edit form for adding item!! important
                $("#" + addNewItemDialogContentId).html("");
                // display edit form
                $("#" + viewItemDetailsDialogContentId).html(editItemDetailsFormContent);
                setTextFields(jsonData);
            };

            // show buttons
            $("#" + spanEditItemBtnDialogDialogId).addClass(hideContentClass);
            $("#" + spanCloseEditBtnDialogId).addClass(hideContentClass);
            //hide buttons
            $("#" + spanSaveChangesBtnDialogId).removeClass(hideContentClass);
            $("#" + spanCancelChangesBtnDialogId).removeClass(hideContentClass);
            // parse content and then set field values
            setFieldValuesCallback();
        }
    }
}



function viewCustomerDetails(customerId) {
    currentCustomerId = customerId;
    currentItemIndex = getCurrentItemIndex(customerId);
    displayCustomerView(viewItemDetailsCmd);
}


/**
* Create toobar buttons
*/
function createToolbarBtns(userAction) {

    // check user role
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        if (!customUserRolesManagerObject.rolesLoaded) {
            // load roles only once
            curmo.entityType = curmo.entityTypesObject.Customer;
            addNewItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Customer, curmo.accessRightsObject.createRight);
            editItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Customer, curmo.accessRightsObject.editRight);
            deleteItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Customer, curmo.accessRightsObject.deleteRight);
            customUserRolesManagerObject.rolesLoaded = true;
        }
    }
    // clear error message
    $("#" + errorContentDivId).html("");

    // first hide all buttons
    $("#" + spanAddNewItemBtnId).addClass(hideContentClass);
    $("#" + spanDeleteItemsBtnId).addClass(hideContentClass);

    if (userAction == viewAllItemsCmd) {
        // show addBtn and delete button
        if (addNewItemRight == true) {
            $("#" + toolbarButtonsTableId).removeClass(hideContentClass);
            $("#" + spanAddNewItemBtnId).removeClass(hideContentClass);
        }
        if (deleteItemRight == true) {
            $("#" + toolbarButtonsTableId).removeClass(hideContentClass);
            $("#" + spanDeleteItemsBtnId).removeClass(hideContentClass);
        }
    }

    if (addNewItemRight == true) {
        $("#" + spanAddNewItemBtnId).removeClass(hideContentClass);
    }
    if (deleteItemRight == true) {
        $("#" + spanDeleteItemsBtnId).removeClass(hideContentClass);
    }
}

/**
 * delete button customer handler. Delete selected items
 * @returns void
 */
function deleteItemsBtnClick() {

    if (customersGrid != null) {
        var items = customersGrid.selection.getSelected();
        if (items.length > 0) {
            confirmDeletionMessageBox();
        } else {
            if (pageLangTexts.noItemSelectedLabel != null)
                alert(pageLangTexts.noItemSelectedLabel);
        }
    }
}

/**
 * customer fire on confirmation delete
 * @return
 */
function onConfirmItemsDeletion() {

    if (customersGrid != null) {
        var items = customersGrid.selection.getSelected();
        if (items.length > 0) {
            selectedIdsArray = new Array();
            for (var i = 0; i < items.length; i++) {
                itemId = customersGrid.store.getValue(items[i], "customerId");
                itemId = $.trim(itemId);
                selectedIdsArray.push(itemId);
            }
            // close dialog
            closeConfirmDeletionModalDialog();
            // now delete items
            deleteSeletedCustomers(selectedIdsArray);
        }
    }

}

function registerButtonClickCustomers() {
    // toolbar buttons
    $("#" + addNewItemBtnId).click(function () {
        showAddItemDialog();
    });
    $("#" + deleteItemsBtnId).click(function () {
        deleteItemsBtnClick();
    });

    // dialog buttons
    $("#" + addNewItemBtnDialogId).click(function () {
        validateBeforeAddNewCustomer();
    });
    $("#" + editItemBtnDialogId).click(function () {
        displayCustomerView(editItemDetailsCmd);
    });

    $("#" + closeEditBtnDialogId).click(function () {
        closeViewItemDetailsDialog();
    });
    $("#" + saveChangesBtnDialogId).click(function () {
        saveCustomerChanges();
    });
    $("#" + cancelChangesBtnDialogId).click(function () {
        displayCustomerView(cancelChangesCmd);
    });
    $("#" + cancelAddItemBtnDialogId).click(function () { });
    $("#" + confirmItemsDeletionBtnDialogId).click(function () {
        onConfirmItemsDeletion();
    });
    $("#" + moveUpBtnDialogId).click(function () { });
    $("#" + moveDownBtnDialogId).click(function () { });
    // some menu items

    $("#printDataListMenuItem").click(function () {
        printDataList();
    });
    $("#exportDataListToCsvMenuItem").click(function () {
        exportDataListToCsv();
    });
}

function initFormValidators() {

    $("#" + customerDetailsFormId).validate({
        rules: {

        },
        messages: {

        },
        submitHandler: function (form) {

        },
        invalidHandler: function (form, validator) {
            alert(validator.numberOfInvalids());
        },
        highlight: function (element, errorClass, validClass) {

            $(element).closest(".form-group").addClass("has-error");
        },
        unhighlight: function (element, errorClass, validClass) {

            $(element).closest(".form-group").removeClass("has-error");
        }
    });

}

function validateBeforeAddNewCustomer() {

    var isFormInputsValid = $("#" + customerDetailsFormId).valid();
    if (isFormInputsValid) {
        // close dialog
        closeAddEditItemDialog();
        // add callback
        addNewCustomer();
    }
}

function showAddItemDialog() {

    if ($("#" + customerDetailsDialogId) != null) {
        // set content dialog
        $("#" + addNewItemDialogContentId).html(editItemDetailsFormContent);
        // set textfields values when Dojo parsing completed
        initDateTimeFields("date");
        settersMethodWithDefaultValues();
        $("#" + customerDetailsDialogId).modal("show");
    }
}

function closeAddEditItemDialog() {
    if ($("#" + customerDetailsDialogId) != null) {
        $("#" + customerDetailsDialogId).modal("hide");
    }
}

function closeConfirmDeletionModalDialog() {
    if ($("#" + confirmDeletionDialogId) != null) {
        $("#" + confirmDeletionDialogId).modal("hide");
    }
}

function addNewCustomer() {

    var customerDetailsFormObject = $("#" + customerDetailsFormId).serializeObject();
    //alert(dojo.toJson(customerDetailsFormObject, true));
    // convert form to json object
    var itemToAdd = customerDetailsFormObject;
    // read datetime field value
    //customerDetailsFormObject.date = $("#date").data("DateTimePicker").date();
    // add 1 day to ajust
    //var datePickerValue = strToShortDate(new String($("#date").data("DateTimePicker").date()));
    //datePickerValue.setDate(datePickerValue.getDate() + 1);
    //customerDetailsFormObject.date = datePickerValue;
    var postParameters = {
        "formValues[]": dojo.toJson(customerDetailsFormObject, true),
        "userAction": insertNewItemCmd
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({
                message: "Failed to add new item. Error: " + errorMsg
            });
        }
    };

    //get postback result
    function addNewCustomerCompleted(data) {
        debugMessageToConsole("addNewCustomerCompleted data : " + data, highLevel);
        // get json result
        var jsonData = data;
        // clear error message
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "addNewCustomerCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationCreationLabel, successImg);

        if (customersStore != null && jsonData[0].insertedItemKey != null) {
            itemToAdd.customerId = jsonData[0].insertedItemKey;
            // remove 1 day to ajust display on grid
            //datePickerValue.setDate(datePickerValue.getDate() - 1);
            //itemToAdd.date = datePickerValue;
            // redisplay data grid    
            customersStore.newItem(itemToAdd);
        }
    }

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, addNewCustomerCompleted);

}

function submitInlineGridChanges(customerId, jsonValues) {
    var postParameters = {
        "customerId": customerId,
        "formValues[]":   jsonValues,
        "updateMode": "inlineUpdate",
        "userAction": "updateItem"
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError("Failed to update item from server: \n\n" + errorMsg);
        }
    };

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, submitInlineDataCompleted);
    //get postback result
    function submitInlineDataCompleted(data) {

        var jsonData = data;
        $("#errorContentDiv").html("");
        if (jsonData == null) {
            displayErrorContent("errorContentDiv", "submitInlineDataCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent("errorContentDiv", jsonData[0].jsonErrorMessage);
            return;
        }
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationUpdateLabel, successImg);
    }
}


function deleteSeletedCustomers(customerIdsList) {
    var postParameters = {
        "selectedIds[]": customerIdsList,
        "userAction": "deleteItem"
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({
                message: "Failed to delete items from server: \n\n" + errorMsg
            });
        }
    };

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, deleteSeletedCustomersCompleted);
    //get postback result
    function deleteSeletedCustomersCompleted(data) {

        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent("errorContentDiv", "deleteSeletedCustomersCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // delete items in store
        var itemsToDelete = customersGrid.selection.getSelected();
        $.each(itemsToDelete, function (index, item) {
            if (item) {
                customersStore.deleteItem(item);
            }
        });
        // save datastore
        customersStore.save();
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationDeletionLabel, successImg);

        $("#" + resultsDivId).html("");
    }

}



function submitCustomerDetailsForm(customerId) {

    //if (!customerDetailsForm.validate()) {
    //    return;
    //}
    // convert form to json object
    var customerDetailsFormObject = $("#" + customerDetailsFormId).serializeObject();
    // format date type field
    customerDetailsFormObject.date = $("#date").data("DateTimePicker").date();
    // add 1 day to ajust
    var datePickerValue = strToShortDate(new String($("#date").data("DateTimePicker").date()));
    datePickerValue.setDate(datePickerValue.getDate() + 1);
    customerDetailsFormObject.date = datePickerValue;
    // convert to json arry
    var jsonValues = dojo.toJson(customerDetailsFormObject);

    var postParameters = {
        "customerId": customerId,
        "formValues[]": jsonValues,
        "updateMode": "allFields",
        "userAction": "updateItem"
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({
                message: "Failed to update item from server: \n\n" + errorMsg
            });
        }
    };

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, submitCustomerDetailsCompleted);
    //get postback result
    function submitCustomerDetailsCompleted(data) {
        //debugMessageToConsole(" CustomerDetailsForm-postback: " + $.trim(data), highLevel);
        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "submitCustomerDetailsCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }

        // get item to update
        var itemToUpdate = customersGrid.getItem(currentItemIndex);
        // remove 1 day to ajust display on grid
        datePickerValue.setDate(datePickerValue.getDate() - 1);
        customerDetailsFormObject.date = datePickerValue;

        customersStore.setValue(itemToUpdate, "name", customerDetailsFormObject.name);
        customersStore.setValue(itemToUpdate, "lastName", customerDetailsFormObject.lastName);
        customersStore.setValue(itemToUpdate, "email", customerDetailsFormObject.email);
        customersStore.setValue(itemToUpdate, "phoneNumber", customerDetailsFormObject.phoneNumber);
        customersStore.setValue(itemToUpdate, "zipCode", customerDetailsFormObject.zipCode);
        customersStore.setValue(itemToUpdate, "city", customerDetailsFormObject.city);
        customersStore.setValue(itemToUpdate, "street", customerDetailsFormObject.street);

        customersStore.save();

        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationUpdateLabel, successImg);
    }
}

function confirmDeletionMessageBox() {
    if ($("#" + confirmDeletionDialogId) != null) {
        $("#" + confirmDeletionDialogId).modal("show");
    }
}

function viewNextItemDetails() {
    currentItemIndex = getNextItemIndex();
    var customerId = itemsArrayIds[currentItemIndex];
    viewCustomerDetails(customerId);
}

function viewPrevousItemDetails() {
    currentItemIndex = getPreviousItemIndex();
    var customerId = itemsArrayIds[currentItemIndex];
    viewCustomerDetails(customerId);
}

function getCurrentItemIndex(value) {
    for (i = 0; i < itemsArrayIds.length; i++) {
        if (itemsArrayIds[i] == value)
            return i;
    }
    return 0;
}

function getNextItemIndex() {
    if (currentItemIndex >= 0 && currentItemIndex < itemsArrayIds.length) {
        for (i = 0; i < itemsArrayIds.length; i++) {
            if (itemsArrayIds[i] == itemsArrayIds[currentItemIndex]) {
                if (i < itemsArrayIds.length - 1)
                    return i + 1;
                else
                    return 0;
            }
        }
    }
    return 0;
}

function getPreviousItemIndex() {
    if (currentItemIndex >= 0 && currentItemIndex < itemsArrayIds.length) {
        for (i = 0; i < itemsArrayIds.length; i++) {
            if (itemsArrayIds[i] == itemsArrayIds[currentItemIndex]) {
                if (i > 0)
                    return i - 1; //gets the previous item
                else
                    return itemsArrayIds.length - 1; // get the last item
            }
        }
    }
    return 0;
}

function showAddNewItemDialog() {
}

function showViewItemDetailsDialog() {
    if ($("#" + viewItemDetailsDialogId) != null) {
        $("#" + viewItemDetailsDialogId).modal("show");
    }
}

function closeViewItemDetailsDialog() {
    if ($("#" + viewItemDetailsDialogId) != null) {
        $("#" + viewItemDetailsDialogId).modal("hide");
    }
}

function saveCustomerChanges() {
    submitCustomerDetailsForm(currentCustomerId);
    if ($("#" + viewItemDetailsDialogId) != null) {
        $("#" + viewItemDetailsDialogId).modal("hide");
    }
}


function printDataList() {
    alert("print data not yet implemented..");
}

function exportDataListToCsv() {
    alert("exportDataListToCsv not yet implemented..");
}