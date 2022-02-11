
/**
 * Script to manage a  Event model entity.
 * @author
 *     Guy Bami W.
 * Created changes: 08.04.2017 06:18:40
 */

// global varaibles
var eventsStore = null;
var eventsGrid = null;
var currentItemIndex = -1;
var itemsArrayIds = new Array();
var currentEventId = -1;

// some event actions commands
var viewAllItemsCmd = "viewAllEvents";
var editItemDetailsCmd = "editDetails";
var viewItemDetailsCmd = "viewDetails";
var addNewItemCmd = "addNewItem";
var insertNewItemCmd = "insertNewItem";
var cancelChangesCmd = "cancelChanges";
var saveChangesCmd = "saveChanges";

// controls and page divs Ids
var toolbarButtonsDivId = "toolbarButtonsDiv";
var dataItemsGridId = "eventsGrid";
var itemDetailsDivId = "eventDetailsDiv";
var itemsGridDivId = "eventsGridDiv";
var itemDetailsFormId = "eventDetailsForm";
var eventDetailsFormId = "eventDetailsForm";
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
var eventDetailsDialogId = "eventDetailsDialog";
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
var controllerUrl = "../../Controllers/EventController.php";
var postDataFormat = "text";
var postMethod = "POST";

// flags used to check user role
var readItemRight = true;
var addNewItemRight = true;
var deleteItemRight = true;
var editItemRight = true;

 

var menuItemSectionTitleLabel = pageLangTexts.menuItemSectionTitleLabel == null ? "Administration" : pageLangTexts.menuItemSectionTitleLabel;
var subMenuItemSectionTitleLabel = pageLangTexts.subMenuItemSectionTitleLabel == null ? "Events" : pageLangTexts.subMenuItemSectionTitleLabel;


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
                        curmo.entityType = curmo.entityTypesObject.Event;
                        readItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Event, curmo.accessRightsObject.readRight);
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
                            setActiveMenuItem(customUserRolesManagerObject.mainMenuItemsObject.ADMINISTRATION.id);
                        }

                        // display dojo data grid
                        generateEventsDataGrid(itemsGridDivId);
                    } else {
                        // redirect to access denied page
                        $(window).attr("location", webSiteRootURL + "/Views/AccessDenied.php");
                    }

                    // init form validators
                    initFormValidators();
                    // register event clicks
                    registerButtonClickEvents();
                };

                // parse main menu and display page
                parseMainMenu(parsePageWidgets);
            } catch (err) {
                logError(err);
            }
        });
    });

function setLabelFields(jsonData) {

    $("#dateLabel").html(dateToLocale(jsonData[0].date));
    $("#titleLabel").html(jsonData[0].title);
    $("#categoryLabel").html(jsonData[0].category);
    $("#locationLabel").html(jsonData[0].location);
    $("#summaryLabel").html(jsonData[0].summary);

}

function setTextFields(jsonData) {

    initDateTimeFields("date");
    setFormDateFieldValue("date", jsonData[0].date);
    setFormFieldValue("title", jsonData[0].title);
    setFormFieldValue("category", jsonData[0].category);
    setFormFieldValue("location", jsonData[0].location);
    setFormFieldValue("summary", jsonData[0].summary);

}

function settersMethodWithDefaultValues() {

    initDateTimeFields("date");
    setFormDateFieldValue("date", "2017-04-08");
    setFormFieldValue("title", "-");
    setFormFieldValue("location", "-");
    setFormFieldValue("summary", "");
    setFormFieldValue("category", "CultureWeek");
}

/**
 * generate dynamic Events datagrid
 * @param {string} targetDiv
 * @returns {none}
 */
function generateEventsDataGrid(targetDiv) {

    var windowWidth = $(window).width() - 0;
    var dateColWidth = windowWidth * 0.10 + "px";
    var titleColWidth = windowWidth * 0.20 + "px";
    var locationColWidth = windowWidth * 0.10 + "px";
    var categoryColWidth =  windowWidth * 0.20 + "px";
    var summaryColWidth = "auto";


    function shortDateFieldFormatter(data, rowIndex) {
        var strDate = strToShortDate(new String(data));
        debugMessageToConsole("shortDateFieldFormatter strDate: " + strDate, lowLevel);
        return dojo.date.locale.format(strDate, this.constraint);
    }


    function fullDateAndTimeFieldFormatter(data, rowIndex) {
        debugMessageToConsole("data: " + data, hi);
        var strDate = strToFullDate(data);
        return dojo.date.locale.format(strDate, this.constraint);
    }


    function titleFormatter(data, rowIndex) {
        var item = eventsGrid.getItem(rowIndex);
        var formattedTtitle = $.trim(item.title);
        if (formattedTtitle == null || formattedTtitle.length == 0)
            formattedTtitle = "unknown";
        if (item) {
            var contains = false;
            for (i = 0; i < itemsArrayIds.length; i++) {
                if (itemsArrayIds[i].toString() == item.eventId.toString()) {
                    contains = true;
                    break;
                }
            }
            if (!contains)
                itemsArrayIds.push(item.eventId);
            var html = '<label class="itemNameLabelDiv"><a href="javascript:viewEventDetails(\'' + item.eventId + '\');" class="linkItemNameRow">'
                     + formattedTtitle + '</a></label>';
            return html;
        }
        return data;
    }


    function summaryFormatter(data, rowIndex) {
        var item = eventsGrid.getItem(rowIndex);
        var formattedSummary = item.summary;
        var maxLength = 50;
        if (formattedSummary.toString().length >= maxLength) {
            formattedSummary = item.summary.toString().substr(0, maxLength) + "...";
        }
        return formattedSummary;
    }
    
    
    function categoryFormatter(data, rowIndex) {
        var item = eventsGrid.getItem(rowIndex);
        var categoryValue = item.category.toString();
        if(categoryValue.indexOf("CultureWeek") != -1){
            return pageLangTexts.cultureWeekLabel == null ? "Semaine Culturelle" : pageLangTexts.cultureWeekLabel;
        }
        else if(categoryValue.indexOf("FirstSemesterParty") != -1){
            return pageLangTexts.firstSemesterPartyLabel == null ? "1. Semester Party" : pageLangTexts.firstSemesterPartyLabel;
        }
        else if(categoryValue.indexOf("GalaNight") != -1){
            return pageLangTexts.galaNightLabel == null ? "Soiree De Gala" : pageLangTexts.galaNightLabel;
        }
        else if(categoryValue.indexOf("Football") != -1){
            return pageLangTexts.footballLabel == null ? "Football" : pageLangTexts.footballLabel;
        }
        else if(categoryValue.indexOf("Challenge") != -1){
            return pageLangTexts.challengeLabel == null ? "Challenge" : pageLangTexts.challengeLabel;
        }
        else if(categoryValue.indexOf("Tournament") != -1){
            return pageLangTexts.tournamentLabel == null ? "Tournament" : pageLangTexts.tournamentLabel;
        }
        else if(categoryValue.indexOf("Mourning") != -1){
            return pageLangTexts.mourningLabel == null ? "Mourning" : pageLangTexts.mourningLabel;
        }
        return categoryValue;
    }


    // manage user role
    var dataEditable = true;
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        curmo.entityType = curmo.entityTypesObject.Event;
        dataEditable = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Event, curmo.accessRightsObject.editRight);
    }

    var columsLayout = [
        {
            name: pageLangTexts.dateColLabel == null ? "Date" : pageLangTexts.dateColLabel,
            field: "date",
            width: dateColWidth,
            editable: dataEditable,
            type: dojox.grid.cells.DateTextBox,
            dataType: "date",
            formatter: shortDateFieldFormatter,
            constraint: { formatLength: "short", selector: "date", locale:"de" }
        }
        , {
            name: pageLangTexts.titleColLabel == null ? "Title" : pageLangTexts.titleColLabel,
            field: "title",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: titleColWidth,
            widgetClass: dijit.form.TextBox,
            formatter: titleFormatter
        }
        , {
            name: pageLangTexts.locationColLabel == null ? "Location" : pageLangTexts.locationColLabel,
            field: "location",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: locationColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: { required: "true" }
        }
        , {
            name: pageLangTexts.categoryColLabel == null ? "Category" : pageLangTexts.categoryColLabel,
            field: "category",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: categoryColWidth,
            widgetClass: dijit.form.Select,
            formatter: categoryFormatter,
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
                        label: pageLangTexts.footballLabel == null ? "Football" : pageLangTexts.footballLabel,
                        value: "Football"
                    }, {
                        label: pageLangTexts.tournamentLabel == null ? "Tournament" : pageLangTexts.tournamentLabel,
                        value: "Tournament"
                    }, {
                        label: pageLangTexts.diversLabel == null ? "Projets & Divers" : pageLangTexts.diversLabel,
                        value: "Divers"
                    }]
            }
        }
        , {
            name: pageLangTexts.summaryColLabel == null ? "Summary" : pageLangTexts.summaryColLabel,
            field: "summary",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: summaryColWidth,
            widgetClass: dijit.form.TextBox,
            formatter: summaryFormatter
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
            displayErrorContent("errorContentDiv", "Failed to get all events from server: " + errorMsg);
            logError({
                message: "Failed to get all events from server: \n" + errorMsg
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

        eventsStore = new dojo.data.ItemFileWriteStore({
            data: {
                identifier: "eventId",
                items: jsonData
            }
        });

        if (eventsStore != null) {
            // save data store
            eventsStore.save({
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
            eventsStore.comparatorMap = {};
            //eventsStore.comparatorMap["date"] = compareStringIgnoreCase;
            eventsStore.comparatorMap["title"] = compareStringIgnoreCase;
            eventsStore.comparatorMap["location"] = compareStringIgnoreCase;
            eventsStore.comparatorMap["summary"] = compareStringIgnoreCase;

            //destroy old controls
            destroyWidget(dataItemsGridId);
            // create datagrid
            eventsGrid = new dojox.grid.EnhancedGrid({
                id: dataItemsGridId,
                store: eventsStore,
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
                        itemsName: "Events"
                    }
                }
            });

            // set sort index col
            setSortColumnsIndexes(eventsGrid, 1, false);
            // add events trigger
            eventsGrid.on("SelectionChanged", reportSelection);
            eventsGrid.on("StartEdit", gridStartEdit);
            eventsGrid.on("ApplyCellEdit", gridApplyCellEdit);
            eventsGrid.placeAt(targetDiv);
            // parse datagrid
            eventsGrid.startup();
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
                obj["entityKeyId"] = storeItem["eventId"].toString();
                var itemId = storeItem["eventId"].toString();
                // check and format date field
                if (obj["fieldName"].toString() == "date") {
                    obj["newFieldValue"] = dateToYMD(obj["newFieldValue"]);
                }
                var jsonValues = dojo.toJson(obj);
                debugMessageToConsole("jsonValues: " + jsonValues, highLevel);
                submitInlineGridChanges(itemId, jsonValues);
            }
        }
    }

}

function displayEventView(userAction) {

    var eventId = currentEventId;
    debugMessageToConsole("eventId:" + eventId, highLevel);
    debugMessageToConsole("userAction: " + userAction, highLevel);

    var windowHeight = $(window).height();
    var windowWidth = $(window).width();

    var postParameters = {
        "eventId": eventId,
        "userAction": userAction
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({
                message: "Reponse failed to get event details with error: " + errorMsg
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
            displayErrorContent(errorContentDivId, "displayEventView: " + jsonErrorMsg);
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



function viewEventDetails(eventId) {
    currentEventId = eventId;
    currentItemIndex = getCurrentItemIndex(eventId);
    displayEventView(viewItemDetailsCmd);
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
            curmo.entityType = curmo.entityTypesObject.Event;
            addNewItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Event, curmo.accessRightsObject.createRight);
            editItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Event, curmo.accessRightsObject.editRight);
            deleteItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Event, curmo.accessRightsObject.deleteRight);
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
 * delete button event handler. Delete selected items
 * @returns void
 */
function deleteItemsBtnClick() {

    if (eventsGrid != null) {
        var items = eventsGrid.selection.getSelected();
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

    if (eventsGrid != null) {
        var items = eventsGrid.selection.getSelected();
        if (items.length > 0) {
            selectedIdsArray = new Array();
            for (var i = 0; i < items.length; i++) {
                itemId = eventsGrid.store.getValue(items[i], "eventId");
                itemId = $.trim(itemId);
                selectedIdsArray.push(itemId);
            }
            // close dialog
            closeConfirmDeletionModalDialog();
            // now delete items
            deleteSeletedEvents(selectedIdsArray);
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
        validateBeforeAddNewEvent();
    });
    $("#" + editItemBtnDialogId).click(function () {
        displayEventView(editItemDetailsCmd);
    });

    $("#" + closeEditBtnDialogId).click(function () {
        closeViewItemDetailsDialog();
    });
    $("#" + saveChangesBtnDialogId).click(function () {
        saveEventChanges();
    });
    $("#" + cancelChangesBtnDialogId).click(function () {
        displayEventView(cancelChangesCmd);
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

    $("#" + eventDetailsFormId).validate({
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

function validateBeforeAddNewEvent() {

    var isFormInputsValid = $("#" + eventDetailsFormId).valid();
    if (isFormInputsValid) {
        // close dialog
        closeAddEditItemDialog();
        // add callback
        addNewEvent();
    }
}

function showAddItemDialog() {

    if ($("#" + eventDetailsDialogId) != null) {
        // set content dialog
        $("#" + addNewItemDialogContentId).html(editItemDetailsFormContent);
        // set textfields values when Dojo parsing completed
        initDateTimeFields("date");
        settersMethodWithDefaultValues();
        $("#" + eventDetailsDialogId).modal("show");
    }
}

function closeAddEditItemDialog() {
    if ($("#" + eventDetailsDialogId) != null) {
        $("#" + eventDetailsDialogId).modal("hide");
    }
}

function closeConfirmDeletionModalDialog() {
    if ($("#" + confirmDeletionDialogId) != null) {
        $("#" + confirmDeletionDialogId).modal("hide");
    }
}

function addNewEvent() {

    var eventDetailsFormObject = $("#" + eventDetailsFormId).serializeObject();
    // convert form to json object
    var itemToAdd = eventDetailsFormObject;
    // read datetime field value
    eventDetailsFormObject.date = $("#date").data("DateTimePicker").date();
    // add 1 day to ajust
    var datePickerValue = strToShortDate(new String($("#date").data("DateTimePicker").date()));
    datePickerValue.setDate(datePickerValue.getDate() + 1);
    eventDetailsFormObject.date = datePickerValue;
    var postParameters = {
        "formValues[]": dojo.toJson(eventDetailsFormObject, true),
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
    function addNewEventCompleted(data) {

        debugMessageToConsole("addNewEventCompleted data : " + data, highLevel);
        // get json result
        var jsonData = data;
        // clear error message
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "addNewEventCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationCreationLabel, successImg);

        if (eventsStore != null && jsonData[0].insertedItemKey != null) {
            itemToAdd.eventId = jsonData[0].insertedItemKey;
            // remove 1 day to ajust display on grid
            datePickerValue.setDate(datePickerValue.getDate() - 1);
            itemToAdd.date = datePickerValue;
            // redisplay data grid    
            eventsStore.newItem(itemToAdd);
        }
    }

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, addNewEventCompleted);

}

function submitInlineGridChanges(eventId, jsonValues) {

    var postParameters = {
        "eventId": eventId,
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


function deleteSeletedEvents(eventIdsList) {
    var postParameters = {
        "selectedIds[]": eventIdsList,
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
        xhrArgs.error, deleteSeletedEventsCompleted);
    //get postback result
    function deleteSeletedEventsCompleted(data) {

        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent("errorContentDiv", "deleteSeletedEventsCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // delete items in store
        var itemsToDelete = eventsGrid.selection.getSelected();
        $.each(itemsToDelete, function (index, item) {
            if (item) {
                eventsStore.deleteItem(item);
            }
        });
        // save datastore
        eventsStore.save();
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationDeletionLabel, successImg);

        $("#" + resultsDivId).html("");
    }

}



function submitEventDetailsForm(eventId) {

    //if (!eventDetailsForm.validate()) {
    //    return;
    //}
    // convert form to json object
    var eventDetailsFormObject = $("#" + eventDetailsFormId).serializeObject();
    // format date type field
    eventDetailsFormObject.date = $("#date").data("DateTimePicker").date();
    // add 1 day to ajust
    var datePickerValue = strToShortDate(new String($("#date").data("DateTimePicker").date()));
    datePickerValue.setDate(datePickerValue.getDate() + 1);
    eventDetailsFormObject.date = datePickerValue;
    // convert to json arry
    var jsonValues = dojo.toJson(eventDetailsFormObject);

    var postParameters = {
        "eventId": eventId,
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
        xhrArgs.error, submitEventDetailsCompleted);
    //get postback result
    function submitEventDetailsCompleted(data) {
        //debugMessageToConsole(" EventDetailsForm-postback: " + $.trim(data), highLevel);
        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "submitEventDetailsCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }

        // get item to update
        var itemToUpdate = eventsGrid.getItem(currentItemIndex);
        // remove 1 day to ajust display on grid
        datePickerValue.setDate(datePickerValue.getDate() - 1);
        eventDetailsFormObject.date = datePickerValue;

        eventsStore.setValue(itemToUpdate, "date", eventDetailsFormObject.date);
        eventsStore.setValue(itemToUpdate, "title", eventDetailsFormObject.title);
        eventsStore.setValue(itemToUpdate, "category", eventDetailsFormObject.category);
        eventsStore.setValue(itemToUpdate, "location", eventDetailsFormObject.location);
        eventsStore.setValue(itemToUpdate, "summary", eventDetailsFormObject.summary);

        eventsStore.save();

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
    var eventId = itemsArrayIds[currentItemIndex];
    viewEventDetails(eventId);
}

function viewPrevousItemDetails() {
    currentItemIndex = getPreviousItemIndex();
    var eventId = itemsArrayIds[currentItemIndex];
    viewEventDetails(eventId);
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

function saveEventChanges() {
    submitEventDetailsForm(currentEventId);
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