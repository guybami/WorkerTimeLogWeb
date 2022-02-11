


/**
 *This script was auto generated.
 * Script to manage a  Auftrag model entity.
 * @author
 *     Guy Bami W.
 * Created changes: 03.04.2020 13:33:11
 */





    // global varaibles
var auftragsStore = null;
var auftragsGrid = null;
var currentItemIndex = -1;
var itemsArrayIds = new Array();
var currentAuftragId = -1;


// some auftrag actions commands
var viewAllItemsCmd = "viewAllAuftrags";
var editItemDetailsCmd = "editDetails";
var viewItemDetailsCmd = "viewDetails";
var addNewItemCmd = "addNewItem";
var insertNewItemCmd = "insertNewItem";
var cancelChangesCmd = "cancelChanges";
var saveChangesCmd = "saveChanges";

// controls and page divs Ids
var toolbarButtonsDivId = "toolbarButtonsDiv";
var dataItemsGridId = "auftragsGrid";
var itemDetailsDivId = "auftragDetailsDiv";
var itemsGridDivId = "auftragsGridDiv";
var itemDetailsFormId = "auftragDetailsForm";
var auftragDetailsFormId = "auftragDetailsForm";
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
var auftragDetailsDialogId = "auftragDetailsDialog";
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
var controllerUrl = "../../Controllers/AuftragController.php";
var postDataFormat = "text";
var postMethod = "POST";


// flags used to check user role
var readItemRight = true;
var addNewItemRight = true;
var deleteItemRight = true;
var editItemRight = true;

var menuItemSectionTitleLabel = "Administration";
var subMenuItemSectionTitleLabel = "Aufträge";


var auftragZeichnungList = Array();
/*
// for progessbar upload status
var fileUploadProgressId = "fileUploadProgress";
var progressBarDivId = "progressBarDiv";
var holderContentDivId = "addNewItemDialogContent";
var taskCompleted = false;*/

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
                        curmo.entityType = curmo.entityTypesObject.Auftrag;
                        readItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Auftrag, curmo.accessRightsObject.readRight);
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

                        // bind events
                        bindChangeEventForFileSelectDialog("filesToUpload", "fileFullName", true);
                        // fetch data
                        fetchAllZeichnungData();
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
    $("#auftragsNummerLabel").html(jsonData[0].auftragsNummer);
    $("#kundenNummerLabel").html(jsonData[0].kundenNummer);
    $("#bezeichnungLabel").html(jsonData[0].bezeichnung);
    $("#auftragAbgeschlossenLabel").html(jsonData[0].auftragAbgeschlossen);
    $("#datumLabel").html(jsonData[0].datum);
}


function setTextFields(jsonData){
    setFormFieldValue("auftragsNummer", jsonData[0].auftragsNummer);
    setFormFieldValue("kundenNummer", jsonData[0].kundenNummer);
    setFormFieldValue("bezeichnung", jsonData[0].bezeichnung);
    setFormFieldValue("auftragAbgeschlossen", jsonData[0].auftragAbgeschlossen);
}


function settersMethodWithDefaultValues(){
    setFormFieldValue("auftragsNummer", "");
    setFormFieldValue("kundenNummer", "");
    setFormFieldValue("bezeichnung", "");
    setFormFieldValue("auftragAbgeschlossen", "nein");
}




function fetchAllZeichnungData() {

    var postDataFormat = "json";
    var postMethod = "POST";
    var postParameters = { "userAction": "getAllAuftragZeichnung" };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({
                message: "Reponse failed to get data with error: " + errorMsg
            });
        }
    };

    sendAjaxRequest(xhrArgs, fetchDataCompleted);

    //get postback result
    function fetchDataCompleted(data) {
        var jsonData = data;
        debugMessageToConsole("items json data: " + data, lowLevel);
        for (var i = 0; i < jsonData.length; i++) {
            var item = {
                auftragId: jsonData[i].auftragId,
                zeichnungFilesList: jsonData[i].zeichnungFilesList
            };
            auftragZeichnungList.push(item);
        }
        // now load datagrid
        // display dojo data grid
        generateAuftragsDataGrid(itemsGridDivId);
    }

}

function getZeichnungLinksList(auftragId) {
    var formattedString = "--";
    for (var i = 0; i < auftragZeichnungList.length; i++) {

        if(auftragId == auftragZeichnungList[i].auftragId){
            formattedString = "";
            var filesList = auftragZeichnungList[i].zeichnungFilesList;
            if(filesList != null && filesList.length > 0){
                for (var j = 0; j < filesList.length; j++){
                    var item = filesList[j];
                    formattedString += '&nbsp;' + '<label><a href="javascript:showZeichnungModal(\'' + item.dateiName + '\');" class="linkItemNameRow">Zeichnung anzeigen</a></label>';
                }
            }
            break;
        }

    }
    return formattedString;
}

/**
 * generate dynamic Auftrags datagrid
 * @param {string} targetDiv
 * @returns {none}
 */
function generateAuftragsDataGrid(targetDiv) {

    var windowWidth = $(window).width() - 200;
    var auftragsNummerColWidth = windowWidth * 0.15 + "px";
    var kundenNummerColWidth = windowWidth * 0.20 + "px";
    var bezeichnungColWidth = windowWidth * 0.30 + "px";
    var zeichnungListColWidth = windowWidth * 0.20 + "px";
    var auftragAbgeschlossenColWidth = "auto";

    // manage user role
    var dataEditable = true;
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        curmo.entityType = curmo.entityTypesObject.Auftrag;
        dataEditable = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Auftrag, curmo.accessRightsObject.editRight);
    }

    function filesNameFormatter(data, rowIndex) {
        var item = auftragsGrid.getItem(rowIndex);
        var formattedListHtml = "ss";
        if (item) {
            var contains = false;
            for (var i = 0; i < itemsArrayIds.length; i++) {
                if (itemsArrayIds[i].toString() == item.auftragId.toString()) {
                    contains = true;
                    break;
                }
            }
            if (!contains){
                itemsArrayIds.push(item.auftragId);
            }
            formattedListHtml = getZeichnungLinksList(item.auftragId);
            return formattedListHtml;
        }
        return data;
    }

    var columsLayout = [
        {
            name: pageLangTexts.auftragsNummerColLabel == null ? "Auftragsnummer" : pageLangTexts.auftragsNummerColLabel,
            field: "auftragsNummer",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: auftragsNummerColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }
        ,{
            name: pageLangTexts.bezeichnungColLabel == null ? "Bezeichnung" : pageLangTexts.bezeichnungColLabel,
            field: "bezeichnung",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: bezeichnungColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }
        ,{
            name: pageLangTexts.kundenNummerColLabel == null ? "Kundennummer" : pageLangTexts.kundenNummerColLabel,
            field: "kundenNummer",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: kundenNummerColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }
        // special col
        ,{
            name:  "Zeichnungen",
            field: "kundenNummer",
            dataType: "string",
            editable: false,
            type: dojox.grid.cells._Widget,
            width: zeichnungListColWidth,
            formatter: filesNameFormatter,
            widgetProps: {}
        }
        ,{
            name: pageLangTexts.auftragAbgeschlossenColLabel == null ? "Abgeschlossen" : pageLangTexts.auftragAbgeschlossenColLabel,
            field: "auftragAbgeschlossen",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: auftragAbgeschlossenColWidth,
            widgetClass: dijit.form.Select,
            widgetProps: { options:[{ label:"ja", value:"ja"},{ label:"nein", value:"nein"}]}
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
            displayErrorContent("errorContentDiv", "Failed to get all auftrags from server: " + errorMsg);
            logError({ message: "Failed to get all auftrags from server: \n" + errorMsg });
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
        // get data
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

        auftragsStore = new dojo.data.ItemFileWriteStore({
            data: {
                identifier: "auftragId",
                items: jsonData
            }
        });

        if (auftragsStore != null) {
            // save data store
            auftragsStore.save({
                onComplete: function () { debugMessageToConsole("Done saving items store.", lowLevel); },
                onError: function () { logError({ message: "Save failed items store." }); }
            });
            // custom sorting fields
            auftragsStore.comparatorMap = {};
            auftragsStore.comparatorMap["auftragsNummer"] = compareStringIgnoreCase;
            auftragsStore.comparatorMap["kundenNummer"] = compareStringIgnoreCase;
            auftragsStore.comparatorMap["bezeichnung"] = compareStringIgnoreCase;
            auftragsStore.comparatorMap["auftragAbgeschlossen"] = compareStringIgnoreCase;

            //destroy old controls
            destroyWidget(dataItemsGridId);
            // create datagrid
            auftragsGrid = new dojox.grid.EnhancedGrid({
                id: dataItemsGridId,
                store: auftragsStore,
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
                        itemsName: "Aufträge"
                    }
                }
            });

            // set sort index col
            setSortColumnsIndexes(auftragsGrid, 1, true);
            // add events trigger
            auftragsGrid.on("SelectionChanged", reportSelection);
            auftragsGrid.on("StartEdit", gridStartEdit);
            auftragsGrid.on("ApplyCellEdit", gridApplyCellEdit);
            auftragsGrid.placeAt(targetDiv);
            // parse datagrid
            auftragsGrid.startup();
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
                obj["entityKeyId"] = storeItem["auftragId"].toString();
                var itemId = storeItem["auftragId"].toString();
                var jsonValues = dojo.toJson(obj);
                debugMessageToConsole("jsonValues: " + jsonValues, highLevel);
                submitInlineGridChanges(itemId, jsonValues);
            }
        }
    }

}



function displayAuftragView(userAction) {

    var auftragId = currentAuftragId;
    debugMessageToConsole("auftragId:" + auftragId, highLevel);
    debugMessageToConsole("userAction: " + userAction, highLevel);

    var windowHeight = $(window).height();
    var windowWidth = $(window).width();

    var postParameters = { "auftragId": auftragId, "userAction": userAction };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({ message: "Reponse failed to get auftrag details with error: " + errorMsg });
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
            displayErrorContent(errorContentDivId, "displayAuftragView: " + jsonErrorMsg);
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




function viewAuftragDetails(auftragId) {
    currentAuftragId = auftragId;
    currentItemIndex = getCurrentItemIndex(auftragId);
    displayAuftragView(viewItemDetailsCmd);
}




function createToolbarBtns(userAction) {

    // check user role
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        if (!customUserRolesManagerObject.rolesLoaded) {
            // load roles only once
            curmo.entityType = curmo.entityTypesObject.Auftrag;
            addNewItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Auftrag, curmo.accessRightsObject.createRight);
            editItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Auftrag, curmo.accessRightsObject.editRight);
            deleteItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Auftrag, curmo.accessRightsObject.deleteRight);
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

    if (auftragsGrid != null) {
        var items = auftragsGrid.selection.getSelected();
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

    if (auftragsGrid != null) {
        var items = auftragsGrid.selection.getSelected();
        if (items.length > 0) {
            selectedIdsArray = new Array();
            for (var i = 0; i < items.length; i++) {
                itemId = auftragsGrid.store.getValue(items[i], "auftragId");
                itemId = $.trim(itemId);
                selectedIdsArray.push(itemId);
            }
            // close dialog
            closeConfirmDeletionModalDialog();
            // now delete items
            deleteSeletedAuftrags(selectedIdsArray);
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
        validateBeforeAddNewAuftrag();
    });
    $("#" + editItemBtnDialogId).click(function () {
        displayAuftragView(editItemDetailsCmd);
    });

    $("#" + closeEditBtnDialogId).click(function () {
        closeViewItemDetailsDialog();
    });
    $("#" + saveChangesBtnDialogId).click(function () {
        saveAuftragChanges();
    });
    $("#" + cancelChangesBtnDialogId).click(function () {
        displayAuftragView(cancelChangesCmd);
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

    $("#" + auftragDetailsFormId).validate({
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

function validateBeforeAddNewAuftrag() {

    var isFormInputsValid = $("#" + auftragDetailsFormId).valid();
    if (isFormInputsValid) {
        // close dialog
        //closeAddEditItemDialog();
        // add callback
        addNewAuftrag();
    }
}


function showAddItemDialog() {

    if ($("#" + auftragDetailsDialogId) != null) {
        // set content dialog
        $("#" + addNewItemDialogContentId).html(editItemDetailsFormContent);
        // set textfields values when Dojo parsing completed
        settersMethodWithDefaultValues();
        $("#" + auftragDetailsDialogId).modal("show");
    }
}


function closeAddEditItemDialog() {
    if ($("#" + auftragDetailsDialogId) != null) {
        $("#" + auftragDetailsDialogId).modal("hide");
    }
}

function closeConfirmDeletionModalDialog() {
    if ($("#" + confirmDeletionDialogId) != null) {
        $("#" + confirmDeletionDialogId).modal("hide");
    }
}


function uploadSelectedFiles(formId, _callbackMethod) {
    var formData = null;

    if (window.FormData) {
        formData = new FormData($("#" + formId)[0]);
    }
    else {
        formData = $("#" + formId).serialize();
    }

    displayProgressBar();

    // send ajax request
    $.ajax({
        url: "../../Controllers/UploadFileController.php", //Server script to process data
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
                taskCompleted = true;
                refreshProgressBar();
                _callbackMethod(data);
            }
        },
        error: function (err) {
            logError({message : 'Error occured while uploading file: ' + err});
        },
        // Form data to be sent
        data: formData,
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false
    });


    function progressHandlingCallback(e) {
    }

    function progressHandlingCallback__(e) {
        if (e != null && e.lengthComputable && $('progress') != null) {
            $('progress').attr({value: e.loaded, max: e.total});
        }
    }
}



function addNewAuftrag() {


    // step 1. upload selected photos
    uploadSelectedFiles(auftragDetailsFormId, uploadSchemasCompleted);

    function uploadSchemasCompleted(data) {
        jsonData = $.parseJSON(data);
        var fileNamesArray = new Array();
        debugMessageToConsole("uploadSchemasCompleted data : " + jsonData, highLevel);
        // loop through files
        $.each(jsonData, function(index, item){
            if(item.entryKey){
                // add fileNames uploaded
                //alert('item-data: ' + item.entryKey);
                fileNamesArray.push(item.entryKey.toString());
            }

        });

        // setp 2: assign Zeichnung to Auftrag
        var auftragDetailsFormObject = $("#" + auftragDetailsFormId).serializeObject();
        var postParameters = {
            "fileNamesList[]": fileNamesArray
            , "formValues[]": dojo.toJson(auftragDetailsFormObject, true)
            , "userAction": "addAndAssignZeichnungToAuftrag"
        };
        var xhrArgs = {
            url: controllerUrl,
            postData: postParameters,
            handleAs: postDataFormat,
            method: postMethod,
            error: function (errorMsg) {
                logError({message: "Failed to assign schemas .Error: " + errorMsg});
            }
        };
        // close dialog
        closeAddEditItemDialog();
        // send async xhr request to server
        sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
            xhrArgs.error, assignZeichnungToAuftragCompleted);
        //get postback result
        function assignZeichnungToAuftragCompleted(data) {

            debugMessageToConsole("assignZeichnungToAuftragCompleted data : " + data, highLevel);
            // get json result
            var jsonData = data;
            // clear error message
            $("#" + errorContentDivId).html("");
            if (jsonData == null) {
                displayErrorContent(errorContentDivId, "assignZeichnungToAuftragCompleted: " + jsonErrorMsg);
                return;
            }
            else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
                displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
                return;
            }

            if ( jsonData != null) {
                // display overlay message
                showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationCreationLabel, successImg);
                // reload
                // display dojo data grid
                window.location.reload();
                //generateAuftragsDataGrid(itemsGridDivId);
            }
        }
    }

}


function submitInlineGridChanges(auftragId, jsonValues) {

    var postParameters = {
        "auftragId": auftragId,
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


function deleteSeletedAuftrags(auftragIdsList) {
    var postParameters = {
        "selectedIds[]": auftragIdsList,
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
        xhrArgs.error, deleteSeletedAuftragsCompleted);
    //get postback result
    function deleteSeletedAuftragsCompleted(data) {

        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent("errorContentDiv", "deleteSeletedAuftragsCompleted: " + jsonErrorMsg);
            return;
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // delete items in store
        var itemsToDelete = auftragsGrid.selection.getSelected();
        $.each(itemsToDelete, function (index, item) {
            if (item) {
                auftragsStore.deleteItem(item);
            }
        });
        // save datastore
        auftragsStore.save();
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationDeletionLabel, successImg);

        $("#" + resultsDivId).html("");
    }

}


function submitAuftragDetailsForm(auftragId) {
    //check form validation
    //if (!auftragDetailsForm.validate()) {
    //    return;
    //}
    // convert form to json object
    var auftragDetailsFormObject = $("#" + auftragDetailsFormId).serializeObject();

    // convert to json arry
    var jsonValues = dojo.toJson(auftragDetailsFormObject);

    var postParameters = {
        "auftragId": auftragId,
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
        xhrArgs.error, submitAuftragDetailsCompleted);
    //get postback result
    function submitAuftragDetailsCompleted(data) {
        //debugMessageToConsole(" AuftragDetailsForm-postback: " + $.trim(data), highLevel);
        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "submitAuftragDetailsCompleted: " + jsonErrorMsg);
            return;
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }

        // get item to update
        var itemToUpdate = auftragsGrid.getItem(currentItemIndex);



        auftragsStore.setValue(itemToUpdate, "auftragsNummer", auftragDetailsFormObject.auftragsNummer);
        auftragsStore.setValue(itemToUpdate, "kundenNummer", auftragDetailsFormObject.kundenNummer);
        auftragsStore.setValue(itemToUpdate, "bezeichnung", auftragDetailsFormObject.bezeichnung);
        auftragsStore.setValue(itemToUpdate, "auftragAbgeschlossen", auftragDetailsFormObject.auftragAbgeschlossen);
        auftragsStore.setValue(itemToUpdate, "datum", auftragDetailsFormObject.datum);

        auftragsStore.save();

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
    var auftragId = itemsArrayIds[currentItemIndex];
    viewAuftragDetails(auftragId);
}

function viewPrevousItemDetails() {
    currentItemIndex = getPreviousItemIndex();
    var auftragId = itemsArrayIds[currentItemIndex];
    viewAuftragDetails(auftragId);
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

function saveAuftragChanges() {
    submitAuftragDetailsForm(currentAuftragId);
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


function showZeichnungModal(fileName){

    var pos = fileName.toLowerCase().indexOf(".pdf");
    var fileTypeToDisplay = "";
    if(pos > 0){
        // for pdf file
        var fpath = '../../UploadedFiles/Zeichnungen/' + fileName;
        fileTypeToDisplay = '<object data="' + fpath + '" type="application/pdf" width="800" height="800">\n' +
            '         <a href="' + fpath + '">Datei nicht gefunden!</a>\n' +
            '   </object> ';
    }
    else {
        // for images
        var fpath = '../../UploadedFiles/Zeichnungen/' + fileName;
        fileTypeToDisplay = '<img src="' + fpath + '"/>';
    }

    //alert(img);
    var modalContent = '<div id="photoModalDialog" class="modal fade" role="dialog">'
                            + '<div class="modal-dialog modal-lg">'
                                + '<div class="modal-content">'
                                    + '<div class="modal-header">'
                                        + '<button type="button" class="close" data-dismiss="modal">&times;</button>'
                                        + '<h4 class="modal-title" id="photoDialogTitle">Zeichnung</h4>'
                                    + '</div>'
                                    + '<div class="modal-body">'
                                        + '<div class="modal-body-thumbnail">'
                                            + '<div class="dialogViewBillDiv">'
                                                + '<table class="fullWidth">'
                                                    + '<tr>'
                                                        + '<td class="toCenter" >'
                                                            + '<div id="photoDialogContent"> </div>'
                                                        + '</td>'
                                                    + '</tr>'
                                                + '</table>'
                                            + '</div>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                            + '</div>'
                        + '</div>';
    $("body").append(modalContent);
    $("#photoDialogContent").html(fileTypeToDisplay);
    $("#photoModalDialog").modal("show");

}

// progressbar functions
function setValueProgress(val){
    if(val && val > 0){
        $("#" + fileUploadProgressId).css("width", val + "%").attr("aria-valuenow", val);
    }
}


function displayProgressBar() {
    var ratePerMegabytes = 1;
    var fileSizeInMegabytes = 5; //GetFileSize(fileUplaoderId);
    refershRateMs = fileSizeInMegabytes * ratePerMegabytes * 0.9;
    $("#" + progressBarDivId).removeClass("hideContent");

    showSearchingOverlay(holderContentDivId);
    refreshProgressBar();
    function fetchDataCompleted(data) {
        var jsonData =  data;
        debugMessageToConsole("items json data: " + data, highLevel);
    }
}

function hideProgressBar() {
    $("#" + progressBarDivId).addClass("hideContent");
}


function refreshProgressBar() {
    //alert(11);
    if (taskCompleted == true) {
        //alert('done!');
        setValueProgress(100);
        hideSearchingOverlay(holderContentDivId);
        clearTimeout(setTimeoutFuncId);
        return;
    }
    if (uploadedPercent > 98 && taskCompleted == true) {

        setValueProgress(100);
        hideSearchingOverlay("holderContentDiv");
        clearTimeout(setTimeoutFuncId);
    }
    else if (uploadedPercent <= 98){
        ++uploadedPercent;
        setValueProgress(uploadedPercent);
        setTimeoutFuncId = setTimeout(refreshProgressBar, refershRateMs);
    }
}


function resetProgressBar() {
    setValueProgress(0);
    clearTimeout(setTimeoutFuncId);
}
/* end functions*/
