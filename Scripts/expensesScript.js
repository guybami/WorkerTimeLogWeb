/**
 * Script to manage a  Expense model entity.
 * @author
 *     Guy Bami W.
 * Created changes: 31.03.2017 20:24:54
 */

// global varaibles
var expensesStore = null;
var expensesGrid = null;
var currentItemIndex = -1;
var itemsArrayIds = new Array();
var currentExpenseId = -1;

// some expense actions commands
var viewAllItemsCmd = "viewAllExpenses";
var editItemDetailsCmd = "editDetails";
var viewItemDetailsCmd = "viewDetails";
var addNewItemCmd = "addNewItem";
var insertNewItemCmd = "insertNewItem";
var cancelChangesCmd = "cancelChanges";
var saveChangesCmd = "saveChanges";

// controls and page divs Ids
var toolbarButtonsDivId = "toolbarButtonsDiv";
var dataItemsGridId = "expensesGrid";
var itemDetailsDivId = "expenseDetailsDiv";
var itemsGridDivId = "expensesGridDiv";
var itemDetailsFormId = "expenseDetailsForm";
var expenseDetailsFormId = "expenseDetailsForm";
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
var expenseDetailsDialogId = "expenseDetailsDialog";
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
var controllerUrl = "../../Controllers/ExpenseController.php";
var postDataFormat = "text";
var postMethod = "POST";

// flags used to check user role
var readItemRight = true;
var addNewItemRight = true;
var deleteItemRight = true;
var editItemRight = true;

var menuItemSectionTitleLabel = pageLangTexts.menuItemSectionTitleLabel == null ? "Administration" : pageLangTexts.menuItemSectionTitleLabel;
var subMenuItemSectionTitleLabel = pageLangTexts.subMenuItemSectionTitleLabel == null ? "Expenses" : pageLangTexts.subMenuItemSectionTitleLabel;

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
                        $(".row").removeClass(hideContentClass);
                        if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
                            var curmo = customUserRolesManagerObject; // short name
                            // load roles only once
                            curmo.entityType = curmo.entityTypesObject.Expense;
                            readItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Expense, curmo.accessRightsObject.readRight);
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
                            generateExpensesDataGrid(itemsGridDivId);
                            // load events list
                            loadEventsList();
                        }
                        else {
                            // redirect to access denied page
                            $(window).attr("location", webSiteRootURL + "/Views/AccessDenied.php");
                        }

                        // init form validators
                        initFormValidators();
                        // register event clicks
                        registerButtonClickEvents();
                        // bind event
                        bindChangeEventForFileSelectDialog("billFileNameToUpload", "billFileName", false);
                        //bindChangeEvent();
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
    setFormFieldValue("title", "-");
    setFormFieldValue("amount", "0");
    setFormFieldValue("category", "CultureWeek");
    setFormFieldValue("billFileName", "");
    initDateTimeFields("transactionDate");
    setFormDateFieldValue("transactionDate", "");

}

/**
 * generate dynamic Expenses datagrid
 * @param {string} targetDiv
 * @returns {none}
 */
function generateExpensesDataGrid(targetDiv) {

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
        curmo.entityType = curmo.entityTypesObject.Expense;
        dataEditable = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Expense, curmo.accessRightsObject.editRight);
    }


    function shortDateFieldFormatter(data, rowIndex) {
        var strDate = strToShortDate(new String(data));
        debugMessageToConsole("shortDateFieldFormatter strDate: " + strDate, lowLevel);
        return dojo.date.locale.format(strDate, this.constraint);
    }

     

    function billFileNameFormatter(data, rowIndex) {
        var item = expensesGrid.getItem(rowIndex);
        var formattedTtitle = item.billFileName;
        if (formattedTtitle == null || formattedTtitle.length == 0)
            formattedTtitle = "---";
        if (item) {
            var contains = false;
            for (i = 0; i < itemsArrayIds.length; i++) {
                if (itemsArrayIds[i].toString() == item.expenseId.toString()) {
                    contains = true;
                    break;
                }
            }
            if (!contains){
                itemsArrayIds.push(item.expenseId);
                var formattedAmount = item.amount.toString().replace(",", ".");
                //alert(parseFloat(formattedAmount));
                totalExpenses += parseFloat(formattedAmount);
            }
            formattedTtitle = "Facutre"; // must be changed
            var html = '<label class="itemNameLabelDiv"><a href="javascript:viewBillDetails(\'' + item.billFileName + '\');" class="linkItemNameRow">'
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
                        label: pageLangTexts.cultureWeekLabel == null ? "Semaine Culturelle" : pageLangTexts.cultureWeekLabel,
                        value: "CultureWeek"
                    }, {
                        label: pageLangTexts.firstSemesterPartyLabel == null ? "1. Semester Party" : pageLangTexts.firstSemesterPartyLabel,
                        value: "FirstSemesterParty"
                    }, {
                        label: pageLangTexts.galaNightLabel == null ? "Soiree De Gala" : pageLangTexts.galaNightLabel,
                        value: "GalaNight"
                    }, {
                        label: pageLangTexts.gaduationLabel == null ? "Remise De Diplome" : pageLangTexts.gaduationLabel,
                        value: "Gaduation"
                    }, {
                        label: pageLangTexts.grillPartyLabel == null ? "Grill Party" : pageLangTexts.grillPartyLabel,
                        value: "GrillParty"
                    }, {
                        label: pageLangTexts.challengeLabel == null ? "Challenge" : pageLangTexts.challengeLabel,
                        value: "Challenge"
                    }, {
                        label: pageLangTexts.mourningLabel == null ? "Deuil" : pageLangTexts.mourningLabel,
                        value: "Mourning"
                    }, {
                        label: pageLangTexts.donationLabel == null ? "Don" : pageLangTexts.donationLabel,
                        value: "Donation"
                    }, {
                        label: pageLangTexts.sportLabel == null ? "Sport" : pageLangTexts.sportLabel,
                        value: "Sport"
                    }, {
                        label: pageLangTexts.diversLabel == null ? "Projets & Divers" : pageLangTexts.diversLabel,
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
            constraint: {formatLength: "short", selector: "date", locale:"de"}
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
            displayErrorContent("errorContentDiv", "Failed to get all expenses from server: " + errorMsg);
            logError({
                message: "Failed to get all expenses from server: \n" + errorMsg
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

        expensesStore = new dojo.data.ItemFileWriteStore({
            data: {
                identifier: "expenseId",
                items: jsonData
            }
        });

        if (expensesStore != null) {
            // save data store
            expensesStore.save({
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
            expensesStore.comparatorMap = {};
            expensesStore.comparatorMap["eventTitle"] = compareStringIgnoreCase;
            expensesStore.comparatorMap["title"] = compareStringIgnoreCase;
            expensesStore.comparatorMap["amount"] = compareStringIgnoreCase;
            expensesStore.comparatorMap["category"] = compareStringIgnoreCase;
            expensesStore.comparatorMap["billFileName"] = compareStringIgnoreCase;
            expensesStore.comparatorMap["transactionDate"] = compareDateTime;

            //destroy old controls
            destroyWidget(dataItemsGridId);
            // create datagrid
            expensesGrid = new dojox.grid.EnhancedGrid({
                id: dataItemsGridId,
                store: expensesStore,
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
                        itemsName: "Expenses"
                    }
                }
            });

            // set sort index col
            setSortColumnsIndexes(expensesGrid, 2, true);
            // add events trigger
            expensesGrid.on("SelectionChanged", reportSelection);
            expensesGrid.on("StartEdit", gridStartEdit);
            expensesGrid.on("ApplyCellEdit", gridApplyCellEdit);
            expensesGrid.placeAt(targetDiv);
            // parse datagrid
            expensesGrid.startup();

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
                obj["entityKeyId"] = storeItem["expenseId"].toString();
                var itemId = storeItem["expenseId"].toString();
                // check and format date field
                if (obj["fieldName"].toString() == "transactionDate") {
                    obj["newFieldValue"] = dateToYMD(obj["newFieldValue"]);
                }
                else if (obj["fieldName"].toString() == "amount") {
                    //obj["newFieldValue"] = (obj["newFieldValue"]);
                    //alert("update total inline...");
                    updateTotalInline();
                }
                var jsonValues = dojo.toJson(obj);
                debugMessageToConsole("jsonValues: " + jsonValues, highLevel);
                submitInlineGridChanges(itemId, jsonValues);
            }
        }
    }

}

function displayExpenseView(userAction) {

    var expenseId = currentExpenseId;
    debugMessageToConsole("expenseId:" + expenseId, highLevel);
    debugMessageToConsole("userAction: " + userAction, highLevel);

    var windowHeight = $(window).height();
    var windowWidth = $(window).width();

    var postParameters = {
        "expenseId": expenseId,
        "userAction": userAction
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({
                message: "Reponse failed to get expense details with error: " + errorMsg
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
            displayErrorContent(errorContentDivId, "displayExpenseView: " + jsonErrorMsg);
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

function viewExpenseDetails(expenseId) {
    currentExpenseId = expenseId;
    currentItemIndex = getCurrentItemIndex(expenseId);
    displayExpenseView(viewItemDetailsCmd);
}

function createToolbarBtns(userAction) {

    // check user role
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        if (!customUserRolesManagerObject.rolesLoaded) {
            // load roles only once
            curmo.entityType = curmo.entityTypesObject.Expense;
            addNewItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Expense, curmo.accessRightsObject.createRight);
            editItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Expense, curmo.accessRightsObject.editRight);
            deleteItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Expense, curmo.accessRightsObject.deleteRight);
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

    if (expensesGrid != null) {
        var items = expensesGrid.selection.getSelected();
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

    if (expensesGrid != null) {
        var items = expensesGrid.selection.getSelected();
        if (items.length > 0) {
            selectedIdsArray = new Array();
            for (var i = 0; i < items.length; i++) {
                itemId = expensesGrid.store.getValue(items[i], "expenseId");
                itemId = $.trim(itemId);
                selectedIdsArray.push(itemId);
            }
            // close dialog
            closeConfirmDeletionModalDialog();
            // now delete items
            deleteSeletedExpenses(selectedIdsArray);
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
        validateBeforeAddNewExpense();
    });
    $("#" + editItemBtnDialogId).click(function () {
        displayExpenseView(editItemDetailsCmd);
    });

    $("#" + closeEditBtnDialogId).click(function () {
        closeViewItemDetailsDialog();
    });
    $("#" + saveChangesBtnDialogId).click(function () {
        saveExpenseChanges();
    });
    $("#" + cancelChangesBtnDialogId).click(function () {
        displayExpenseView(cancelChangesCmd);
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

    $("#" + expenseDetailsFormId).validate({
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

function validateBeforeAddNewExpense() {

    var isFormInputsValid = $("#" + expenseDetailsFormId).valid();
    if (isFormInputsValid) {
        // close dialog
        closeAddEditItemDialog();
        // add callback
        addNewExpense();
    }
}

function showAddItemDialog() {

    if ($("#" + expenseDetailsDialogId) != null) {
        // set content dialog
        $("#" + addNewItemDialogContentId).html(editItemDetailsFormContent);
        // set textfields values when Dojo parsing completed
        initDateTimeFields("transactionDate");
        settersMethodWithDefaultValues();
        $("#" + expenseDetailsDialogId).modal("show");
    }
}

function closeAddEditItemDialog() {
    if ($("#" + expenseDetailsDialogId) != null) {
        $("#" + expenseDetailsDialogId).modal("hide");
    }
}

function closeConfirmDeletionModalDialog() {
    if ($("#" + confirmDeletionDialogId) != null) {
        $("#" + confirmDeletionDialogId).modal("hide");
    }
}

function addNewExpense() {

    var expenseDetailsFormObject = $("#" + expenseDetailsFormId).serializeObject();
    // convert form to json object
    var itemToAdd = expenseDetailsFormObject;
    // read datetime field value
    expenseDetailsFormObject.transactionDate = $("#transactionDate").data("DateTimePicker").date();
    // add 1 day to ajust
    var datePickerValue = strToShortDate(new String($("#transactionDate").data("DateTimePicker").date()));
    datePickerValue.setDate(datePickerValue.getDate() + 1);
    expenseDetailsFormObject.transactionDate = datePickerValue;
    itemToAdd = expenseDetailsFormObject;
    var postParameters = {
        "formValues[]": dojo.toJson(expenseDetailsFormObject, true),
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
    function addNewExpenseCompleted(data) {

        debugMessageToConsole("addNewExpenseCompleted data : " + data, highLevel);
        // get json result
        var jsonData = data;
        // clear error message
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "addNewExpenseCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        
        function uploadExpenseBillFileCompleted(data){
            uploadJsonData = $.parseJSON(data);
            if(uploadJsonData && uploadJsonData.status > 0){
                 if(uploadJsonData.status.toString() == "true"){
                     if (expensesStore != null && jsonData[0].insertedItemKey != null) {
                        itemToAdd.expenseId = jsonData[0].insertedItemKey;
                        itemToAdd.eventTitle = $("#eventId").find("option:selected").text();
                        // remove 1 day to ajust display on grid
                        datePickerValue.setDate(datePickerValue.getDate() - 1);
                        itemToAdd.transactionDate = datePickerValue;
                        itemToAdd.category = $("#category").find("option:selected").text();
                        if(uploadJsonData.entryKey != null)
                            itemToAdd.billFileName = uploadJsonData.entryKey;
                        // redisplay data grid    
                        expensesStore.newItem(itemToAdd);
                    }
                    // display overlay message
                    showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationCreationLabel, successImg);
                    //update total expenses
                    updateTotalInline();
                 }
                 else{
                     displayErrorContent(errorContentDivId, uploadJsonData.message);
                 }
            }
            
        }
        // upload bill file
        uploadExpenseBillFile(expenseDetailsFormId, uploadExpenseBillFileCompleted);
        
    }

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
            xhrArgs.error, addNewExpenseCompleted);

}

function submitInlineGridChanges(expenseId, jsonValues) {

    var postParameters = {
        "expenseId": expenseId,
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

function deleteSeletedExpenses(expenseIdsList) {
    var postParameters = {
        "selectedIds[]": expenseIdsList,
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
            xhrArgs.error, deleteSeletedExpensesCompleted);
    //get postback result
    function deleteSeletedExpensesCompleted(data) {

        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent("errorContentDiv", "deleteSeletedExpensesCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // delete items in store
        var itemsToDelete = expensesGrid.selection.getSelected();
        $.each(itemsToDelete, function (index, item) {
            if (item) {
                expensesStore.deleteItem(item);
            }
        });
        // save datastore
      
        expensesStore.save({
            onComplete: function () {
                //update total expenses
                updateTotalInline();
            },
            onError: function () {
                logError({
                    message: "Save failed items store in deleteSeletedExpensesCompleted"
                });
            }
        });
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationDeletionLabel, successImg);

        $("#" + resultsDivId).html("");
        
        
    }

}

function submitExpenseDetailsForm(expenseId) {

    //if (!expenseDetailsForm.validate()) {
    //    return;
    //}
    // convert form to json object
    var expenseDetailsFormObject = $("#" + expenseDetailsFormId).serializeObject();
    // format date type field
    expenseDetailsFormObject.transactionDate = $("#transactionDate").data("DateTimePicker").date();
    // add 1 day to ajust
    var datePickerValue = strToShortDate(new String($("#transactionDate").data("DateTimePicker").date()));
    datePickerValue.setDate(datePickerValue.getDate() + 1);
    expenseDetailsFormObject.transactionDate = datePickerValue;
    // convert to json arry
    var jsonValues = dojo.toJson(expenseDetailsFormObject);

    var postParameters = {
        "expenseId": expenseId,
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
            xhrArgs.error, submitExpenseDetailsCompleted);
    //get postback result
    function submitExpenseDetailsCompleted(data) {
        //debugMessageToConsole(" ExpenseDetailsForm-postback: " + $.trim(data), highLevel);
        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "submitExpenseDetailsCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }

        // get item to update
        var itemToUpdate = expensesGrid.getItem(currentItemIndex);
        // remove 1 day to ajust display on grid
        datePickerValue.setDate(datePickerValue.getDate() - 1);
        conferenceDetailsFormObject.transactionDate = datePickerValue;

        expensesStore.setValue(itemToUpdate, "eventId", expenseDetailsFormObject.eventId);
        expensesStore.setValue(itemToUpdate, "title", expenseDetailsFormObject.title);
        expensesStore.setValue(itemToUpdate, "amount", expenseDetailsFormObject.amount);
        expensesStore.setValue(itemToUpdate, "category", expenseDetailsFormObject.category);
        expensesStore.setValue(itemToUpdate, "billFileName", expenseDetailsFormObject.billFileName);
        expensesStore.setValue(itemToUpdate, "transactionDate", expenseDetailsFormObject.transactionDate);

        //expensesStore.save();
        expensesStore.save({
            onComplete: function () {
                //update total expenses
                updateTotalInline();
            },
            onError: function () {
                logError({
                    message: "Save failed items store in submitExpenseDetailsCompleted"
                });
            }
        });

        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationUpdateLabel, successImg);
        //update total expenses
        //updateTotalInline();
    }
}

function confirmDeletionMessageBox() {
    if ($("#" + confirmDeletionDialogId) != null) {
        $("#" + confirmDeletionDialogId).modal("show");
    }
}

function viewNextItemDetails() {
    currentItemIndex = getNextItemIndex();
    var expenseId = itemsArrayIds[currentItemIndex];
    viewExpenseDetails(expenseId);
}

function viewPrevousItemDetails() {
    currentItemIndex = getPreviousItemIndex();
    var expenseId = itemsArrayIds[currentItemIndex];
    viewExpenseDetails(expenseId);
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

function saveExpenseChanges() {
    submitExpenseDetailsForm(currentExpenseId);
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
        $("#eventId").append($("<option>", {value: "0", text: "--", selected: "selected"}));
        $.each(jsonData, function (index, item) {
            if (item) {
                $("#eventId").append($("<option>", {value: item.eventId, text: item.title}));
            }
        });
        editItemDetailsFormContent = $("#editItemDetailsFormContentDiv").html();
    }

}


function viewBillDetails(billFileName) {
    var expenseBillDialogId = "expenseBillDialog";
    var content = "";
    if ($("#" + expenseBillDialogId) != null) {
        // set content dialog
        
        if(billFileName && billFileName.length > 0){
            //alert("name:" + billFileName);
            if(billFileName.toString().endsWith("pdf")){
                // for .pdf or .doc files
                content = '<object data="../../UploadedFiles/Images/Bills/Expenses/'+ billFileName +'" type="application/pdf" width="800" height="700"> '
                + ' <a href="../../UploadedFiles/Images/Bills/Expenses/'+ billFileName +'">Voir nos Status</a> </object>  ';
            }
            else{
                content = '<img src="../../UploadedFiles/Images/Bills/Expenses/'+ billFileName +'"   alt="facture..." /> ';
            }
            //alert("aa:" + content);
        }
        
        $("#billDialogContent").html(content);
        //$("#billDialogTitle").html("Facture - ");
        // show dialog
        $("#" + expenseBillDialogId).modal("show");
    }

}


function updateTotalInline(){
    var totalExpenses = 0;
    if(expensesStore._arrayOfAllItems != null){
        //alert('_arrayOfAllItems len: ' + expensesStore._arrayOfAllItems.length);
        $.each(expensesStore._arrayOfAllItems, function(i, c){
            //alert(item.amount);
            if(expensesStore._arrayOfAllItems[i] != null && expensesStore._arrayOfAllItems[i].amount){
                var item = expensesStore._arrayOfAllItems[i];
                var formattedAmount = item.amount.toString().replace(",", ".");
                //alert(parseFloat(formattedAmount));
                totalExpenses += parseFloat(formattedAmount);
            }
        });
    }
    else if(expensesStore._itemsByIdentity){
        //alert('_itemsByIdentity..' +  expensesStore._itemsByIdentity.length);
        $.each(expensesStore._itemsByIdentity, function(i, c){
            //alert(item.amount);
            if(expensesStore._itemsByIdentity[i] != null && expensesStore._itemsByIdentity[i].amount){
                var item = expensesStore._itemsByIdentity[i];
                var formattedAmount = item.amount.toString().replace(",", ".");
                //alert(parseFloat(formattedAmount));
                totalExpenses += parseFloat(formattedAmount);
            }
        });
    }
    // display amount and replace '.' german locale
    totalExpenses = totalExpenses.toString().replace(".", ",");
    $("#totalExpenses").html(totalExpenses);
    //alert('end..');
}



function uploadExpenseBillFile(formId, _callbackMethod) {
    var formData = null;  
    var uploaderControllerUrl = "../../Controllers/UploadFileController.php";
    if (window.FormData) {
        formData = new FormData($("#" + formId)[0]);
    }
    else {
        formData = $("#" + formId).serialize();
    }

    $.ajax({
        url: uploaderControllerUrl, //Server script to process data
        type: "POST",
        xhr: function () {  // Custom XMLHttpRequest
            var uploaderXhr = $.ajaxSettings.xhr();
            if (uploaderXhr.upload) { // Check if upload property exists
                // For handling the progress of the upload
                uploaderXhr.upload.addEventListener("progress", progressHandlingCallback, false); 
            }
            return uploaderXhr;
        },
        //Ajax events
        beforeSend: null,
        success: function (data) {
            if (_callbackMethod != null && typeof _callbackMethod === 'function') {
                _callbackMethod(data);
            }
        },
        error: function (err) {
            alert('Error occured while uploading file: ' + err);
        },
        // Form data to be sent
        data: formData,
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false
    });
    
    function progressHandlingCallback(e) {
        if (e != null && e.lengthComputable && $('progress') != null) {
            $('progress').attr({value: e.loaded, max: e.total});
        }
    }
}


$(document).ready(function () {
    $(window).bind("resize", rescaleWindow);
});


function rescaleWindow() {
    var size = { width: $(window).width(), height: $(window).height() };
    // calculate size
    var offset = 20;
    var offsetBody = 80;
    $("#expenseBillDialog").css("height", size.height - offset);
    $("#expenseBillDialog .modal-body").css("height", size.height - (offset + offsetBody));
    $("#expenseBillDialog").css("top", 0);
}









