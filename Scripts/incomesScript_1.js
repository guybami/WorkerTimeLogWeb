/**
* Script to manage a  Income model entity.
* @author
*     Guy Bami W.
* Created changes: 31.03.2017 20:24:54
*/

// global varaibles
var incomesStore = null;
var incomesGrid = null;
var currentItemIndex = -1;
var itemsArrayIds = new Array();
var currentIncomeId = -1;

// some income actions commands
var viewAllItemsCmd = "viewAllIncomes";
var editItemDetailsCmd = "editDetails";
var viewItemDetailsCmd = "viewDetails";
var addNewItemCmd = "addNewItem";
var insertNewItemCmd = "insertNewItem";
var cancelChangesCmd = "cancelChanges";
var saveChangesCmd = "saveChanges";

// controls and page divs Ids
var toolbarButtonsDivId = "toolbarButtonsDiv";
var dataItemsGridId = "incomesGrid";
var itemDetailsDivId = "incomeDetailsDiv";
var itemsGridDivId = "incomesGridDiv";
var itemDetailsFormId = "incomeDetailsForm";
var incomeDetailsFormId = "incomeDetailsForm";
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
var incomeDetailsDialogId = "incomeDetailsDialog";
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
var controllerUrl = "../../Controllers/IncomeController.php";
var postDataFormat = "text";
var postMethod = "POST";

// flags used to check user role
var readItemRight = true;
var addNewItemRight = true;
var deleteItemRight = true;
var editItemRight = true;

var menuItemSectionTitleLabel = "Administration";
var subMenuItemSectionTitleLabel = "Incomes";

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
                        curmo.entityType = curmo.entityTypesObject.Income;
                        readItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Income, curmo.accessRightsObject.readRight);
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
                        generateIncomesDataGrid(itemsGridDivId);
                        // load events list
                        loadEventsList();
                    } else {
                        // redirect to access denied page
                        $(window).attr("location", webSiteRootURL + "/Views/AccessDenied.php");
                    }

                    // init form validators
                    initFormValidators();
                    // register event clicks
                    registerButtonClickEvents();
                    // bind event
                    bindChangeEvent();
                };

                // parse main menu and display page
                parseMainMenu(parsePageWidgets);
            } catch (err) {
                logError(err);
            }
        });
    });

function setLabelFields(jsonData) {

    $("#eventIdLabel").html(jsonData[0].eventId);
    $("#titleLabel").html(jsonData[0].title);
    $("#amountLabel").html(jsonData[0].amount);
    $("#categoryLabel").html(jsonData[0].category);
    $("#billFileNameLabel").html(jsonData[0].billFileName);
    $("#transactionDateLabel").html(jsonData[0].transactionDate);

}

function setTextFields(jsonData) {

    setFormFieldValue("eventId", jsonData[0].eventId);
    setFormFieldValue("title", jsonData[0].title);
    setFormFieldValue("amount", jsonData[0].amount);
    setFormFieldValue("category", jsonData[0].category);
    setFormFieldValue("billFileName", jsonData[0].billFileName);
    initDateTimeFields("transactionDate");
    setFormDateFieldValue("transactionDate", jsonData[0].transactionDate);

}

function settersMethodWithDefaultValues() {

    //setFormFieldValue("eventId", "97235");
    setFormFieldValue("title", "title-f559078");
    setFormFieldValue("amount", "15248");
    setFormFieldValue("category", "CultureWeek");
    setFormFieldValue("billFileName", "");
    initDateTimeFields("transactionDate");
    setFormDateFieldValue("transactionDate", "2017-03-31");

}

/**
 * generate dynamic Incomes datagrid
 * @param {string} targetDiv
 * @returns {none}
 */
function generateIncomesDataGrid(targetDiv) {

    var windowWidth = $(window).width() - 200;
    var eventIdColWidth = windowWidth * 0.17 + "px";
    var titleColWidth = windowWidth * 0.17 + "px";
    var amountColWidth = windowWidth * 0.10 + "px";
    var categoryColWidth = windowWidth * 0.12 + "px";
    var billFileNameColWidth = windowWidth * 0.17 + "px";
    var transactionDateColWidth = "auto";

    var totalExpenses = 0;

    // manage user role
    var dataEditable = true;
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        curmo.entityType = curmo.entityTypesObject.Income;
        dataEditable = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Income, curmo.accessRightsObject.editRight);
    }


    function shortDateFieldFormatter(data, rowIndex) {
        var strDate = strToShortDate(new String(data));
        debugMessageToConsole("shortDateFieldFormatter strDate: " + strDate, lowLevel);
        return dojo.date.locale.format(strDate, this.constraint);
    }


    function billFileNameFormatter(data, rowIndex) {
        var item = incomesGrid.getItem(rowIndex);
        var formattedTtitle = $.trim(item.billFileName);
        if (formattedTtitle == null || formattedTtitle.length == 0)
            formattedTtitle = "----";
        if (item) {
            var contains = false;
            for (i = 0; i < itemsArrayIds.length; i++) {
                if (itemsArrayIds[i].toString() == item.incomeId.toString()) {
                    contains = true;
                    break;
                }
            }
            if (!contains){
                itemsArrayIds.push(item.incomeId);
                var formattedAmount = item.amount.toString().replace(",", ".");
                //alert(parseFloat(formattedAmount));
                totalExpenses += parseFloat(formattedAmount);
            }
            var html = '<label class="itemNameLabelDiv"><a href="javascript:viewBillDetails(\'' + item.incomeId + '\');" class="linkItemNameRow">'
                     + formattedTtitle + '</a></label>';
            return html;
        }
        return data;
    }

    var columsLayout = [  
        {
            name: pageLangTexts.eventIdColLabel == null ? "Evenement" : pageLangTexts.eventIdColLabel,
            field: "eventTitle",
            dataType: "string",
            editable: false,
            type: dojox.grid.cells._Widget,
            width: eventIdColWidth,
            widgetClass: dijit.form.TextBox
        }
        , {
            name: pageLangTexts.titleColLabel == null ? "Title" : pageLangTexts.titleColLabel,
            field: "title",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: titleColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }

        , {
            name: pageLangTexts.amountColLabel == null ? "Amount" : pageLangTexts.amountColLabel,
            field: "amount",
            dataType: "number",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: amountColWidth,
            widgetClass: dijit.form.NumberTextBox,
            widgetProps: {}
        }

        , {
            name: pageLangTexts.categoryColLabel == null ? "Category" : pageLangTexts.categoryColLabel,
            field: "category",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: categoryColWidth,
            widgetClass: dijit.form.Select,
            widgetProps: {
                options: [{
                        label: "Semaine Culturelle",
                        value: "CultureWeek"
                    }, {
                        label: "First Semester Party",
                        value: "FirstSemesterParty"
                    }, {
                        label: "Soiree De Gala",
                        value: "GalaNight"
                    }, {
                        label: "Remise De Diplome",
                        value: "Gaduation"
                    }, {
                        label: "Grill Party",
                        value: "GrillParty"
                    }, {
                        label: "Challenge",
                        value: "Challenge"
                    }, {
                        label: "Deuil",
                        value: "Mourning"
                    }, {
                        label: "Don",
                        value: "Donation"
                    }, {
                        label: "Tournois Sport",
                        value: "Sport"
                    }, {
                        label: "Divers",
                        value: "Divers"
                    }]
            }
        }

        , {
            name: pageLangTexts.billFileNameColLabel == null ? "BillFileName" : pageLangTexts.billFileNameColLabel,
            field: "billFileName",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: billFileNameColWidth,
            widgetClass: dijit.form.TextBox,
            formatter: billFileNameFormatter
        }

        , {
            name: pageLangTexts.transactionDateColLabel == null ? "TransactionDate" : pageLangTexts.transactionDateColLabel,
            field: "transactionDate",
            dataType: "date",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: transactionDateColWidth,
            widgetClass: dijit.form.DateTextBox,
            formatter: shortDateFieldFormatter,
            constraint: { formatLength: "short", selector: "date", locale:"de" }
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
            displayErrorContent("errorContentDiv", "Failed to get all incomes from server: " + errorMsg);
            logError({
                message: "Failed to get all incomes from server: \n" + errorMsg
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

        incomesStore = new dojo.data.ItemFileWriteStore({
            data: {
                identifier: "incomeId",
                items: jsonData
            }
        });

        if (incomesStore != null) {
            // save data store
            incomesStore.save({
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
            incomesStore.comparatorMap = {};
            incomesStore.comparatorMap["eventTitle"] = compareStringIgnoreCase;
            incomesStore.comparatorMap["title"] = compareStringIgnoreCase;
            incomesStore.comparatorMap["amount"] = compareStringIgnoreCase;
            incomesStore.comparatorMap["category"] = compareStringIgnoreCase;
            incomesStore.comparatorMap["billFileName"] = compareStringIgnoreCase;
            incomesStore.comparatorMap["transactionDate"] = compareDateTime;

            //destroy old controls
            destroyWidget(dataItemsGridId);
            // create datagrid
            incomesGrid = new dojox.grid.EnhancedGrid({
                id: dataItemsGridId,
                store: incomesStore,
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
                        itemsName: "Incomes"
                    }
                }
            });

            // set sort index col
            setSortColumnsIndexes(incomesGrid, 2, true);
            // add events trigger
            incomesGrid.on("SelectionChanged", reportSelection);
            incomesGrid.on("StartEdit", gridStartEdit);
            incomesGrid.on("ApplyCellEdit", gridApplyCellEdit);
            incomesGrid.placeAt(targetDiv);
            // parse datagrid
            incomesGrid.startup();
            
            // display amount and replace '.' german locale
            totalExpenses = totalExpenses.toString().replace(".", ",");
            $("#totalExpenses").html(totalExpenses);
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
                obj["entityKeyId"] = storeItem["incomeId"].toString();
                var itemId = storeItem["incomeId"].toString();
                // check and format date field
                if (obj["fieldName"].toString() == "transactionDate") {
                    obj["newFieldValue"] = dateToYMD(obj["newFieldValue"]);
                }
                var jsonValues = dojo.toJson(obj);
                debugMessageToConsole("jsonValues: " + jsonValues, highLevel);
                submitInlineGridChanges(itemId, jsonValues);
            }
        }
    }

}

function displayIncomeView(userAction) {

    var windowHeight = $(window).height();
    var windowWidth = $(window).width();
    var incomeId = currentIncomeId;
    
    var postParameters = {
        "incomeId": incomeId,
        "userAction": userAction
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({
                message: "Reponse failed to get income details with error: " + errorMsg
            });
        }
    };

    debugMessageToConsole("incomeId:" + incomeId, highLevel);
    debugMessageToConsole("userAction: " + userAction, highLevel);

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
            displayErrorContent(errorContentDivId, "displayIncomeView: " + jsonErrorMsg);
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

function viewIncomeDetails(incomeId) {
    currentIncomeId = incomeId;
    currentItemIndex = getCurrentItemIndex(incomeId);
    displayIncomeView(viewItemDetailsCmd);
}

function createToolbarBtns(userAction) {

    // check user role
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        if (!customUserRolesManagerObject.rolesLoaded) {
            // load roles only once
            curmo.entityType = curmo.entityTypesObject.Income;
            addNewItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Income, curmo.accessRightsObject.createRight);
            editItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Income, curmo.accessRightsObject.editRight);
            deleteItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Income, curmo.accessRightsObject.deleteRight);
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

    if (incomesGrid != null) {
        var items = incomesGrid.selection.getSelected();
        if (items.length > 0) {
            confirmDeletionMessageBox();
        } else {
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

    if (incomesGrid != null) {
        var items = incomesGrid.selection.getSelected();
        if (items.length > 0) {
            selectedIdsArray = new Array();
            for (var i = 0; i < items.length; i++) {
                itemId = incomesGrid.store.getValue(items[i], "incomeId");
                itemId = $.trim(itemId);
                selectedIdsArray.push(itemId);
            }
            // close dialog
            closeConfirmDeletionModalDialog();
            // now delete items
            deleteSeletedIncomes(selectedIdsArray);
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
        validateBeforeAddNewIncome();
    });
    $("#" + editItemBtnDialogId).click(function () {
        displayIncomeView(editItemDetailsCmd);
    });

    $("#" + closeEditBtnDialogId).click(function () {
        closeViewItemDetailsDialog();
    });
    $("#" + saveChangesBtnDialogId).click(function () {
        saveIncomeChanges();
    });
    $("#" + cancelChangesBtnDialogId).click(function () {
        displayIncomeView(cancelChangesCmd);
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

    $("#" + incomeDetailsFormId).validate({
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

function validateBeforeAddNewIncome() {

    var isFormInputsValid = $("#" + incomeDetailsFormId).valid();
    if (isFormInputsValid) {
        // close dialog
        closeAddEditItemDialog();
        // add item
        addNewIncome();
    }
}

function showAddItemDialog() {

    if ($("#" + incomeDetailsDialogId) != null) {
        // set content dialog
        $("#" + addNewItemDialogContentId).html(editItemDetailsFormContent);
        // set textfields values when Dojo parsing completed
        initDateTimeFields("transactionDate");
        settersMethodWithDefaultValues();
        $("#" + incomeDetailsDialogId).modal("show");
    }
}

function closeAddEditItemDialog() {
    if ($("#" + incomeDetailsDialogId) != null) {
        $("#" + incomeDetailsDialogId).modal("hide");
    }
}

function closeConfirmDeletionModalDialog() {
    if ($("#" + confirmDeletionDialogId) != null) {
        $("#" + confirmDeletionDialogId).modal("hide");
    }
}



function addNewIncome() {

    var incomeDetailsFormObject = $("#" + incomeDetailsFormId).serializeObject();
    // convert form to json object
    var itemToAdd = incomeDetailsFormObject;
    // read datetime field value
    incomeDetailsFormObject.transactionDate = $("#transactionDate").data("DateTimePicker").date();
    // add 1 day to ajust
    var datePickerValue = strToShortDate(new String($("#transactionDate").data("DateTimePicker").date()));
    datePickerValue.setDate(datePickerValue.getDate() + 1);
    incomeDetailsFormObject.transactionDate = datePickerValue;
    itemToAdd = incomeDetailsFormObject;
    var postParameters = {
        "formValues[]": dojo.toJson(incomeDetailsFormObject, true),
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
    function addNewIncomeCompleted(data) {

        debugMessageToConsole("addNewIncomeCompleted data : " + data, highLevel);
        // get json result
        var jsonData = data;
        // clear error message
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "addNewIncomeCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationCreationLabel, successImg);

        if (incomesStore != null && jsonData[0].insertedItemKey != null) {
            itemToAdd.incomeId = jsonData[0].insertedItemKey;
            itemToAdd.eventTitle = $("#eventId").find("option:selected").text();
            // remove 1 day to ajust display on grid
            datePickerValue.setDate(datePickerValue.getDate() - 1);
            itemToAdd.transactionDate = datePickerValue;
            // redisplay data grid    
            incomesStore.newItem(itemToAdd);
        }
    }

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, addNewIncomeCompleted);

}

function submitInlineGridChanges(incomeId, jsonValues) {

    var postParameters = {
        "incomeId": incomeId,
        "formValues[]": jsonValues,
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


function deleteSeletedIncomes(incomeIdsList) {
    var postParameters = {
        "selectedIds[]": incomeIdsList,
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
        xhrArgs.error, deleteSeletedIncomesCompleted);
    //get postback result
    function deleteSeletedIncomesCompleted(data) {

        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent("errorContentDiv", "deleteSeletedIncomesCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // delete items in store
        var itemsToDelete = incomesGrid.selection.getSelected();
        $.each(itemsToDelete, function (index, item) {
            if (item) {
                incomesStore.deleteItem(item);
            }
        });
        // save datastore
        incomesStore.save();
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationDeletionLabel, successImg);

        $("#" + resultsDivId).html("");
    }

}

function submitIncomeDetailsForm(incomeId) {

    //if (!incomeDetailsForm.validate()) {
    //    return;
    //}
    // convert form to json object
    var incomeDetailsFormObject = $("#" + incomeDetailsFormId).serializeObject();
    // format date type field
    incomeDetailsFormObject.transactionDate = $("#transactionDate").data("DateTimePicker").date();
    // add 1 day to ajust
    var datePickerValue = strToShortDate(new String($("#transactionDate").data("DateTimePicker").date()));
    datePickerValue.setDate(datePickerValue.getDate() + 1);
    incomeDetailsFormObject.transactionDate = datePickerValue;
    // convert to json arry
    var jsonValues = dojo.toJson(incomeDetailsFormObject);

    var postParameters = {
        "incomeId": incomeId,
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
        xhrArgs.error, submitIncomeDetailsCompleted);
    //get postback result
    function submitIncomeDetailsCompleted(data) {
        //debugMessageToConsole(" IncomeDetailsForm-postback: " + $.trim(data), highLevel);
        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "submitIncomeDetailsCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }

        // get item to update
        var itemToUpdate = incomesGrid.getItem(currentItemIndex);
        // remove 1 day to ajust display on grid
        datePickerValue.setDate(datePickerValue.getDate() - 1);
        conferenceDetailsFormObject.transactionDate = datePickerValue;

        incomesStore.setValue(itemToUpdate, "eventId", incomeDetailsFormObject.eventId);
        incomesStore.setValue(itemToUpdate, "title", incomeDetailsFormObject.title);
        incomesStore.setValue(itemToUpdate, "amount", incomeDetailsFormObject.amount);
        incomesStore.setValue(itemToUpdate, "category", incomeDetailsFormObject.category);
        incomesStore.setValue(itemToUpdate, "billFileName", incomeDetailsFormObject.billFileName);
        incomesStore.setValue(itemToUpdate, "transactionDate", incomeDetailsFormObject.transactionDate);

        incomesStore.save();

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
    var incomeId = itemsArrayIds[currentItemIndex];
    viewIncomeDetails(incomeId);
}

function viewPrevousItemDetails() {
    currentItemIndex = getPreviousItemIndex();
    var incomeId = itemsArrayIds[currentItemIndex];
    viewIncomeDetails(incomeId);
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

function saveIncomeChanges() {
    submitIncomeDetailsForm(currentIncomeId);
    if ($("#" + viewItemDetailsDialogId) != null) {
        $("#" + viewItemDetailsDialogId).modal("hide");
    }
}

function shortDateField__(data) {
    var strDate = strToShortDate(new String(data));
    debugMessageToConsole("shortDateFieldFormatter strDate: " + strDate, lowLevel);
    return dojo.date.locale.format(strDate, {
        formatLength: "short",
        selector: "date",
        timePattern: "HH:mm:ss"
    });
}

function printDataList() {
    alert("print data not yet implemented..");
}

function exportDataListToCsv() {
    alert("exportDataListToCsv not yet implemented..");
}



function bindChangeEvent() {
    $("#billFileNameUpload").change(function () {
        var selectedFileName = $(this).val(); // full file name
        // remove directory name
        var selectedFileNameWithoutDir = selectedFileName;
        if (selectedFileName.lastIndexOf('\\') != -1)
            selectedFileNameWithoutDir = selectedFileName.substr(selectedFileName.lastIndexOf('\\') + 1);
        selectedFileNameWithoutDir = selectedFileNameWithoutDir.toString().toLowerCase();
        //alert(selectedFileNameWithoutDir);
        // set fileName field
        $("#billFileName").val(selectedFileNameWithoutDir);
    });
}


function loadEventsList() {

    var postParameters = {
        "userAction": "getAllItems"
    };
    var xhrArgs = {
        url: "../../Controllers/EventController.php",
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({
                message: "Failed to get all events: \n\n" + errorMsg
            });
        }
    };

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, fetchDataCompleted);

    //get postback result
    function fetchDataCompleted(data) {
        var jsonData = null;
        debugMessageToConsole("items json data: " + data, lowLevel);
        jsonData = data;
        $("#eventId").append($("<option>", { value: "0", text: "--", selected : "selected" }));
        $.each(jsonData, function (index, item) {
            if (item) {
                $("#eventId").append($("<option>", { value: item.eventId, text: item.title }));
            }
        });
        editItemDetailsFormContent = $("#editItemDetailsFormContentDiv").html();
    }

}


function viewBillDetails() {
    var incomeBillDialogId = "incomeBillDialog";
    if ($("#incomeBillDialog") != null) {
        // set content dialog
        $("#" + incomeBillDialogId).modal("show");
    }

}












