


/**
 *This script was auto generated.
 * Script to manage a  Zeichnung model entity.
 * @author
 *     Guy Bami W.
 * Created changes: 03.04.2020 13:33:11
 */

    // global varaibles
var zeichnungsStore = null;
var zeichnungsGrid = null;
var currentItemIndex = -1;
var itemsArrayIds = new Array();
var currentZeichnungId = -1;


// some zeichnung actions commands
var viewAllItemsCmd = "viewAllZeichnungs";
var editItemDetailsCmd = "editDetails";
var viewItemDetailsCmd = "viewDetails";
var addNewItemCmd = "addNewItem";
var insertNewItemCmd = "insertNewItem";
var cancelChangesCmd = "cancelChanges";
var saveChangesCmd = "saveChanges";

// controls and page divs Ids
var toolbarButtonsDivId = "toolbarButtonsDiv";
var dataItemsGridId = "zeichnungsGrid";
var itemDetailsDivId = "zeichnungDetailsDiv";
var itemsGridDivId = "zeichnungsGridDiv";
var itemDetailsFormId = "zeichnungDetailsForm";
var zeichnungDetailsFormId = "zeichnungDetailsForm";
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
var zeichnungDetailsDialogId = "zeichnungDetailsDialog";
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
var controllerUrl = "../../Controllers/ZeichnungController.php";
var postDataFormat = "text";
var postMethod = "POST";


// flags used to check user role
var readItemRight = true;
var addNewItemRight = true;
var deleteItemRight = true;
var editItemRight = true;

var menuItemSectionTitleLabel = "Administration";
var subMenuItemSectionTitleLabel = "Zeichnungs";

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
                        curmo.entityType = curmo.entityTypesObject.Zeichnung;
                        readItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Zeichnung, curmo.accessRightsObject.readRight);
                    }
                    if (readItemRight == true) {
                        // show and create toolbar buttons
                        $("#" + sectionTitleAndToolbarBtnDivId).removeClass(hideContentClass);
                        $("#" + toolbarButtonsDivId).removeClass(hideContentClass);
                        // display page section title
                        $("#" + dataViewHeaderId).removeClass(hideContentClass);
                        // display sitemap path
                        displayCurrentPath(sitePathDivId, 2, [menuItemSectionTitleLabel, subMenuItemSectionTitleLabel], $(location).attr("href"));
                        if (customUserRolesManagerObject != null) {
                            setActiveMenuItem(customUserRolesManagerObject.mainMenuItemsObject.ADMINISTRATION.id);
                        }

                        // display dojo data grid
                        generateZeichnungsDataGrid(itemsGridDivId);
                    }
                    else {
                        // redirect to access denied page
                        $(window).attr("location", webSiteRootURL + "/Views/AccessDenied.php");
                    }

                    // init form validators
                    initFormValidators();
                    // register event clicks
                    registerButtonClickEvents();
                }

                // parse main menu and display page
                parseMainMenu(parsePageWidgets);
            }
            catch (err) {
                logError(err);
            }
        });
    });




function setLabelFields(jsonData){


    $("#auftragIdLabel").html(jsonData[0].auftragId);
    $("#dateiNameLabel").html(jsonData[0].dateiName);

}


function setTextFields(jsonData){


    setFormFieldValue("auftragId", jsonData[0].auftragId);
    setFormFieldValue("dateiName", jsonData[0].dateiName);

}


function settersMethodWithDefaultValues(){


    setFormFieldValue("auftragId", "58247");
    setFormFieldValue("dateiName", "dateiName-5ba473e");

}

/**
 * generate dynamic Zeichnungs datagrid
 * @param {string} targetDiv
 * @returns {none}
 */
function generateZeichnungsDataGrid(targetDiv) {

    var windowWidth = $(window).width() - 200;
    var auftragIdColWidth = windowWidth * 0.50 + "px";
    var dateiNameColWidth = "auto";



    // manage user role
    var dataEditable = true;
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        curmo.entityType = curmo.entityTypesObject.Zeichnung;
        dataEditable = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Zeichnung, curmo.accessRightsObject.editRight);
    }

    var columsLayout = [

        {
            name: pageLangTexts.auftragIdColLabel == null ? "AuftragId" : pageLangTexts.auftragIdColLabel,
            field: "auftragId",
            dataType: "number",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: auftragIdColWidth,
            widgetClass: dijit.form.NumberTextBox,
            widgetProps: {}
        }

        ,{
            name: pageLangTexts.dateiNameColLabel == null ? "DateiName" : pageLangTexts.dateiNameColLabel,
            field: "dateiName",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: dateiNameColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }
    ];



    var postParameters = { userAction: "getAllItems" };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: "text",
        method: postMethod,
        error: function (errorMsg) {
            // hide loading img
            hideLoadingTask(targetDiv);
            displayErrorContent("errorContentDiv", "Failed to get all zeichnungs from server: " + errorMsg);
            logError({ message: "Failed to get all zeichnungs from server: \n" + errorMsg });
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
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent("" + errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }

        // set dimensions and div size
        var setAutoHeight = getDataGridAutoHeight(jsonData.length, gridDefaultPageSize);
        if (!setAutoHeight) {
            $("#" + targetDiv).attr("style", gridDefaultStyle);
        }

        zeichnungsStore = new dojo.data.ItemFileWriteStore({
            data: {
                identifier: "zeichnungId",
                items: jsonData
            }
        });

        if (zeichnungsStore != null) {
            // save data store
            zeichnungsStore.save({
                onComplete: function () { debugMessageToConsole("Done saving items store.", lowLevel); },
                onError: function () { logError({ message: "Save failed items store." }); }
            });
            // custom sorting fields
            zeichnungsStore.comparatorMap = {};zeichnungsStore.comparatorMap["auftragId"] = compareStringIgnoreCase; zeichnungsStore.comparatorMap["dateiName"] = compareStringIgnoreCase;



            //destroy old controls
            destroyWidget(dataItemsGridId);
            // create datagrid
            zeichnungsGrid = new dojox.grid.EnhancedGrid({
                id: dataItemsGridId,
                store: zeichnungsStore,
                structure: columsLayout,
                rowSelector: false,
                autoWidth: false, //getGridAutoWidth(jsonData.length),
                autoHeight: getDataGridAutoHeight(jsonData.length, gridDefaultPageSize),
                loadingMessage: pageLangTexts.loadingMessageLabel == null ? "Loading data..." : pageLangTexts.loadingMessageLabel,
                noDataMessage: pageLangTexts.noDataMessageLabel == null ? "No data found" : pageLangTexts.noDataMessageLabel,
                errorMessage: pageLangTexts.errorMessageLabel == null ? "Error occured while loading..." : pageLangTexts.errorMessageLabel,
                plugins: {
                    indirectSelection: {
                        headerSelector: true, width: "30px",
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
                        itemsName: "Zeichnungs"
                    }
                }
            });

            // set sort index col
            setSortColumnsIndexes(zeichnungsGrid, 2, true);
            // add events trigger
            zeichnungsGrid.on("SelectionChanged", reportSelection);
            zeichnungsGrid.on("StartEdit", gridStartEdit);
            zeichnungsGrid.on("ApplyCellEdit", gridApplyCellEdit);
            zeichnungsGrid.placeAt(targetDiv);
            // parse datagrid
            zeichnungsGrid.startup();
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
                obj["entityKeyId"] = storeItem["zeichnungId"].toString();
                var itemId = storeItem["zeichnungId"].toString();
                var jsonValues = dojo.toJson(obj);
                debugMessageToConsole("jsonValues: " + jsonValues, highLevel);
                submitInlineGridChanges(itemId, jsonValues);
            }
        }
    }

}



function displayZeichnungView(userAction) {

    var zeichnungId = currentZeichnungId;
    debugMessageToConsole("zeichnungId:" + zeichnungId, highLevel);
    debugMessageToConsole("userAction: " + userAction, highLevel);

    var windowHeight = $(window).height();
    var windowWidth = $(window).width();

    var postParameters = { "zeichnungId": zeichnungId, "userAction": userAction };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({ message: "Reponse failed to get zeichnung details with error: " + errorMsg });
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
            displayErrorContent(errorContentDivId, "displayZeichnungView: " + jsonErrorMsg);
            return;
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
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
            $("#" +  spanCancelChangesBtnDialogId).addClass(hideContentClass);

            setFieldValuesCallback();
            // display view/edit dialog
            showViewItemDetailsDialog();
        }
        else if (userAction == cancelChangesCmd) {
            showLoadingTask(viewItemDetailsDialogContentId);
            var setFieldValuesCallback = function () {
                hideLoadingTask(viewItemDetailsDialogContentId);
                viewItemDetailsFormContent = $("#" + viewItemDetailsFormContentDivId).html();
                $("#" + viewItemDetailsDialogContentId).html(viewItemDetailsFormContent);
                setLabelFields(jsonData);
            };
            // show buttons
            $("#" +  spanEditItemBtnDialogDialogId).removeClass(hideContentClass);
            $("#" +  spanCloseEditBtnDialogId).removeClass(hideContentClass);
            //hide buttons
            $("#" + spanSaveChangesBtnDialogId).addClass(hideContentClass);
            $("#" +  spanCancelChangesBtnDialogId).addClass(hideContentClass);
            setFieldValuesCallback();
        }
        else if (userAction == editItemDetailsCmd) {

            var setFieldValuesCallback = function () {
                //erase old edit form for adding item!! important
                $("#" + addNewItemDialogContentId).html("");
                // display edit form
                $("#" + viewItemDetailsDialogContentId).html(editItemDetailsFormContent);
                setTextFields(jsonData);
            };

            // show buttons
            $("#" +  spanEditItemBtnDialogDialogId).addClass(hideContentClass);
            $("#" +  spanCloseEditBtnDialogId).addClass(hideContentClass);
            //hide buttons
            $("#" + spanSaveChangesBtnDialogId).removeClass(hideContentClass);
            $("#" +  spanCancelChangesBtnDialogId).removeClass(hideContentClass);
            // parse content and then set field values
            setFieldValuesCallback();
        }
    }
}




function viewZeichnungDetails(zeichnungId) {
    currentZeichnungId = zeichnungId;
    currentItemIndex = getCurrentItemIndex(zeichnungId);
    displayZeichnungView(viewItemDetailsCmd);
}




function createToolbarBtns(userAction) {

    // check user role
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        if (!customUserRolesManagerObject.rolesLoaded) {
            // load roles only once
            curmo.entityType = curmo.entityTypesObject.Zeichnung;
            addNewItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Zeichnung, curmo.accessRightsObject.createRight);
            editItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Zeichnung, curmo.accessRightsObject.editRight);
            deleteItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Zeichnung, curmo.accessRightsObject.deleteRight);
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
 * delete button event handler
 * @returns void
 */
function deleteItemsBtnClick() {

    if (zeichnungsGrid != null) {
        var items = zeichnungsGrid.selection.getSelected();
        if (items.length > 0) {
            confirmDeletionMessageBox();
        }
        else {
            if (pageLangTexts.noItemSelectedLabel != null)
                alert(pageLangTexts.noItemSelectedLabel);
        }
    }
}


/**
 * event fire on confirmation delete
 * @return
 */
function onConfirmItemsDeletion() {

    if (zeichnungsGrid != null) {
        var items = zeichnungsGrid.selection.getSelected();
        if (items.length > 0) {
            selectedIdsArray = new Array();
            for (var i = 0; i < items.length; i++) {
                itemId = zeichnungsGrid.store.getValue(items[i], "zeichnungId");
                itemId = $.trim(itemId);
                selectedIdsArray.push(itemId);
            }
            // close dialog
            closeConfirmDeletionModalDialog();
            // now delete items
            deleteSeletedZeichnungs(selectedIdsArray);
        }
    }

}

function registerButtonClickEvents() {
    // toolbar buttons
    $("#" + addNewItemBtnId).click(function () {
        showAddItemDialog();
    });
    $("#" + deleteItemsBtnId).click(function () {
        deleteItemsBtnClick();
    });

    // dialog buttons
    $("#" + addNewItemBtnDialogId).click(function () {
        validateBeforeAddNewZeichnung();
    });
    $("#" + editItemBtnDialogId).click(function () {
        displayZeichnungView(editItemDetailsCmd);
    });

    $("#" + closeEditBtnDialogId).click(function () {
        closeViewItemDetailsDialog();
    });
    $("#" + saveChangesBtnDialogId).click(function () {
        saveZeichnungChanges();
    });
    $("#" + cancelChangesBtnDialogId).click(function () {
        displayZeichnungView(cancelChangesCmd);
    });
    $("#" + cancelAddItemBtnDialogId).click(function () {
    });
    $("#" + confirmItemsDeletionBtnDialogId).click(function () {
        onConfirmItemsDeletion();
    });
    $("#" + moveUpBtnDialogId).click(function () {
    });
    $("#" + moveDownBtnDialogId).click(function () {
    });
    // some menu items

    $("#printDataListMenuItem").click(function () {
        printDataList();
    });
    $("#exportDataListToCsvMenuItem").click(function () {
        exportDataListToCsv();
    });
}

function initFormValidators() {

    $("#" + zeichnungDetailsFormId).validate({
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

function validateBeforeAddNewZeichnung() {

    var isFormInputsValid = $("#" + zeichnungDetailsFormId).valid();
    if (isFormInputsValid) {
        // close dialog
        closeAddEditItemDialog();
        // add callback
        addNewZeichnung();
    }
}


function showAddItemDialog() {

    if ($("#" + zeichnungDetailsDialogId) != null) {
        // set content dialog
        $("#" + addNewItemDialogContentId).html(editItemDetailsFormContent);
        // set textfields values when Dojo parsing completed
        settersMethodWithDefaultValues();
        $("#" + zeichnungDetailsDialogId).modal("show");
    }
}


function closeAddEditItemDialog() {
    if ($("#" + zeichnungDetailsDialogId) != null) {
        $("#" + zeichnungDetailsDialogId).modal("hide");
    }
}

function closeConfirmDeletionModalDialog() {
    if ($("#" + confirmDeletionDialogId) != null) {
        $("#" + confirmDeletionDialogId).modal("hide");
    }
}




function addNewZeichnung() {

    var zeichnungDetailsFormObject = $("#" + zeichnungDetailsFormId).serializeObject();
    // convert form to json object
    var itemToAdd = zeichnungDetailsFormObject;
    itemToAdd = zeichnungDetailsFormObject;
    var postParameters = {
        "formValues[]": dojo.toJson(zeichnungDetailsFormObject, true)
        , "userAction": insertNewItemCmd
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({ message: "Failed to add new item. Error: " + errorMsg });
        }
    };


    //get postback result
    function addNewZeichnungCompleted(data) {

        debugMessageToConsole("addNewZeichnungCompleted data : " + data, highLevel);
        // get json result
        var jsonData = data;
        // clear error message
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "addNewZeichnungCompleted: " + jsonErrorMsg);
            return;
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationCreationLabel, successImg);

        if (zeichnungsStore != null && jsonData[0].insertedItemKey != null) {
            itemToAdd.zeichnungId = jsonData[0].insertedItemKey;
            // redisplay data grid
            zeichnungsStore.newItem(itemToAdd);
        }
    }

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, addNewZeichnungCompleted);

}


function submitInlineGridChanges(zeichnungId, jsonValues) {

    var postParameters = {
        "zeichnungId": zeichnungId,
        "formValues[]": jsonValues,
        "updateMode": "inlineUpdate",
        "userAction": "updateItem",
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError("Failed to update item from server: \n\n" + errorMsg);
        }
    }

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
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent("errorContentDiv", jsonData[0].jsonErrorMessage);
            return;
        }
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationUpdateLabel, successImg);
    }
}


function deleteSeletedZeichnungs(zeichnungIdsList) {
    var postParameters = {
        "selectedIds[]": zeichnungIdsList,
        "userAction": "deleteItem"
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({ message: "Failed to delete items from server: \n\n" + errorMsg });
        }
    };

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, deleteSeletedZeichnungsCompleted);
    //get postback result
    function deleteSeletedZeichnungsCompleted(data) {

        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent("errorContentDiv", "deleteSeletedZeichnungsCompleted: " + jsonErrorMsg);
            return;
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // delete items in store
        var itemsToDelete = zeichnungsGrid.selection.getSelected();
        $.each(itemsToDelete, function (index, item) {
            if (item) {
                zeichnungsStore.deleteItem(item);
            }
        });
        // save datastore
        zeichnungsStore.save();
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationDeletionLabel, successImg);

        $("#" + resultsDivId).html("");
    }

}


function submitZeichnungDetailsForm(zeichnungId) {
    //check form validation
    //if (!zeichnungDetailsForm.validate()) {
    //    return;
    //}
    // convert form to json object
    var zeichnungDetailsFormObject = $("#" + zeichnungDetailsFormId).serializeObject();

    // convert to json arry
    var jsonValues = dojo.toJson(zeichnungDetailsFormObject);

    var postParameters = {
        "zeichnungId": zeichnungId,
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
            logError({ message: "Failed to update item from server: \n\n" + errorMsg });
        }
    }

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, submitZeichnungDetailsCompleted);
    //get postback result
    function submitZeichnungDetailsCompleted(data) {
        //debugMessageToConsole(" ZeichnungDetailsForm-postback: " + $.trim(data), highLevel);
        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "submitZeichnungDetailsCompleted: " + jsonErrorMsg);
            return;
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }

        // get item to update
        var itemToUpdate = zeichnungsGrid.getItem(currentItemIndex);



        zeichnungsStore.setValue(itemToUpdate, "auftragId", zeichnungDetailsFormObject.auftragId);
        zeichnungsStore.setValue(itemToUpdate, "dateiName", zeichnungDetailsFormObject.dateiName);

        zeichnungsStore.save();

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
    var zeichnungId = itemsArrayIds[currentItemIndex];
    viewZeichnungDetails(zeichnungId);
}

function viewPrevousItemDetails() {
    currentItemIndex = getPreviousItemIndex();
    var zeichnungId = itemsArrayIds[currentItemIndex];
    viewZeichnungDetails(zeichnungId);
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
                    return i - 1;   //gets the previous item
                else
                    return itemsArrayIds.length - 1; // get the last item
            }
        }
    }
    return 0;
}


function showAddNewItemDialog() {
    alert("not implemented");
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

function saveZeichnungChanges() {
    submitZeichnungDetailsForm(currentZeichnungId);
    if ($("#" + viewItemDetailsDialogId) != null) {
        $("#" + viewItemDetailsDialogId).modal("hide");
    }
}

function shortDateField(data) {
    var strDate = strToShortDate(new String(data));
    debugMessageToConsole("shortDateFieldFormatter strDate: " + strDate, lowLevel);
    return dojo.date.locale.format(strDate, { formatLength: "short", selector: "date", timePattern: "HH:mm:ss" });
}


function printDataList() {
    alert("print data not yet implemented..");
}


function exportDataListToCsv() {
    alert("exportDataListToCsv not yet implemented..");
}

