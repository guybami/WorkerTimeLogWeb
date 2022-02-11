/* global customUserRolesManagerObject */

/**
 * Script to manage a  Conference model entity.
 * @author
 *     Guy Bami W.
 * Created changes: 08.04.2017 06:18:40
 */

// global varaibles
var conferencesStore = null;
var conferencesGrid = null;
var currentItemIndex = -1;
var itemsArrayIds = new Array();
var currentConferenceId = -1;

// some conference actions commands
var viewAllItemsCmd = "viewAllConferences";
var editItemDetailsCmd = "editDetails";
var viewItemDetailsCmd = "viewDetails";
var addNewItemCmd = "addNewItem";
var insertNewItemCmd = "insertNewItem";
var cancelChangesCmd = "cancelChanges";
var saveChangesCmd = "saveChanges";

// controls and page divs Ids
var toolbarButtonsDivId = "toolbarButtonsDiv";
var dataItemsGridId = "conferencesGrid";
var itemDetailsDivId = "conferenceDetailsDiv";
var itemsGridDivId = "conferencesGridDiv";
var itemDetailsFormId = "conferenceDetailsForm";
var conferenceDetailsFormId = "conferenceDetailsForm";
var dataViewDivId = "dataViewDiv";
var dataEditDivId = "dataEditDiv";
var confirmDialogDivId = "confirmDialogDiv";
var sectionTitleAndToolbarBtnDivId = "sectionTitleAndToolbarBtnDiv";
var toolbarButtonsTableId = "toolbarButtonsTable";
var dataViewHeaderId = "dataViewHeader";
var errorContentDivId = "errorContentDiv";
var sitePathDivId = "sitePathDiv";
var resultsDivId = "resultsDiv";
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
var conferenceDetailsDialogId = "conferenceDetailsDialog";
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
var controllerUrl = "../../Controllers/ConferenceController.php";
var postDataFormat = "text";
var postMethod = "POST";

// flags used to check user role
var readItemRight = true;
var addNewItemRight = true;
var deleteItemRight = true;
var editItemRight = true;

//var menuItemSectionTitleLabel = "Administration";
//var subMenuItemSectionTitleLabel = "Conferences";
var menuItemSectionTitleLabel = pageLangTexts.menuItemSectionTitleLabel == null ? "Administration" : pageLangTexts.menuItemSectionTitleLabel;
var subMenuItemSectionTitleLabel = pageLangTexts.subMenuItemSectionTitleLabel == null ? "Nos Conferences" : pageLangTexts.subMenuItemSectionTitleLabel;


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
                        curmo.entityType = curmo.entityTypesObject.Conference;
                        readItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Conference, curmo.accessRightsObject.readRight);
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
                        generateConferencesDataGrid(itemsGridDivId);
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

    //$("#dateLabel").html(jsonData[0].date);
    $("#dateLabel").html(dateToLocale(jsonData[0].date));
    $("#titleLabel").html(jsonData[0].title);
    $("#locationLabel").html(jsonData[0].location);
    $("#summaryLabel").html(jsonData[0].summary);

}

function setTextFields(jsonData) {

    //setFormFieldValue("date", jsonData[0].date);
    initDateTimeFields("date");
    setFormDateFieldValue("date", jsonData[0].date);
    setFormFieldValue("title", jsonData[0].title);
    setFormFieldValue("location", jsonData[0].location);
    setFormFieldValue("summary", jsonData[0].summary);

}

function settersMethodWithDefaultValues() {

    initDateTimeFields("date");
    setFormDateFieldValue("date", "2017-04-08");
    setFormFieldValue("title", "-");
    setFormFieldValue("location", "-");
    setFormFieldValue("summary", "");

}

/**
 * generate dynamic Conferences datagrid
 * @param {string} targetDiv
 * @returns {none}
 */
function generateConferencesDataGrid(targetDiv) {

    var windowWidth = $(window).width() - 200;
    var dateColWidth = windowWidth * 0.10 + "px";
    var titleColWidth = "auto";
    var locationColWidth = windowWidth * 0.30 + "px";
    var summaryColWidth = windowWidth * 0.30 + "px";

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
        var item = conferencesGrid.getItem(rowIndex);
        var formattedTtitle = $.trim(item.title);
        if (formattedTtitle == null || formattedTtitle.length == 0)
            formattedTtitle = "unknown";
        if (item) {
            var contains = false;
            for (i = 0; i < itemsArrayIds.length; i++) {
                if (itemsArrayIds[i].toString() == item.conferenceId.toString()) {
                    contains = true;
                    break;
                }
            }
            if (!contains)
                itemsArrayIds.push(item.conferenceId);
            var html = '<label class="itemNameLabelDiv"><a href="javascript:viewConferenceDetails(\'' + item.conferenceId + '\');" class="linkItemNameRow">'
                     + formattedTtitle + '</a></label>';
            return html;
        }
        return data;
    }


    function summaryFormatter(data, rowIndex) {
        var item = conferencesGrid.getItem(rowIndex);
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
        curmo.entityType = curmo.entityTypesObject.Conference;
        dataEditable = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Conference, curmo.accessRightsObject.editRight);
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
            widgetProps : { required : "true"}
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
            displayErrorContent("errorContentDiv", "Failed to get all conferences from server: " + errorMsg);
            logError({
                message: "Failed to get all conferences from server: \n" + errorMsg
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

        conferencesStore = new dojo.data.ItemFileWriteStore({
            data: {
                identifier: "conferenceId",
                items: jsonData
            }
        });

        if (conferencesStore != null) {
            // save data store
            conferencesStore.save({
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
            conferencesStore.comparatorMap = {};
            //conferencesStore.comparatorMap["date"] = compareStringIgnoreCase;
            conferencesStore.comparatorMap["title"] = compareStringIgnoreCase;
            conferencesStore.comparatorMap["location"] = compareStringIgnoreCase;
            conferencesStore.comparatorMap["summary"] = compareStringIgnoreCase;

            //destroy old controls
            destroyWidget(dataItemsGridId);
            // create datagrid
            conferencesGrid = new dojox.grid.EnhancedGrid({
                id: dataItemsGridId,
                store: conferencesStore,
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
                        itemsName: "Conferences"
                    }
                }
            });

            // set sort index col
            setSortColumnsIndexes(conferencesGrid, 1, false);
            // add events trigger
            conferencesGrid.on("SelectionChanged", reportSelection);
            conferencesGrid.on("StartEdit", gridStartEdit);
            conferencesGrid.on("ApplyCellEdit", gridApplyCellEdit);
            conferencesGrid.placeAt(targetDiv);
            // parse datagrid
            conferencesGrid.startup();
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
                obj["entityKeyId"] = storeItem["conferenceId"].toString();
                var itemId = storeItem["conferenceId"].toString();
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

function displayConferenceView(userAction) {

    var conferenceId = currentConferenceId;
    debugMessageToConsole("conferenceId:" + conferenceId, highLevel);
    debugMessageToConsole("userAction: " + userAction, highLevel);

    var windowHeight = $(window).height();
    var windowWidth = $(window).width();

    var postParameters = {
        "conferenceId": conferenceId,
        "userAction": userAction
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({
                message: "Reponse failed to get conference details with error: " + errorMsg
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
            displayErrorContent(errorContentDivId, "displayConferenceView: " + jsonErrorMsg);
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

function viewConferenceDetails(conferenceId) {
    currentConferenceId = conferenceId;
    currentItemIndex = getCurrentItemIndex(conferenceId);
    displayConferenceView(viewItemDetailsCmd);
}

function createToolbarBtns(userAction) {

    // check user role
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        if (!customUserRolesManagerObject.rolesLoaded) {
            // load roles only once
            curmo.entityType = curmo.entityTypesObject.Conference;
            addNewItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Conference, curmo.accessRightsObject.createRight);
            editItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Conference, curmo.accessRightsObject.editRight);
            deleteItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.Conference, curmo.accessRightsObject.deleteRight);
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

    if (conferencesGrid != null) {
        var items = conferencesGrid.selection.getSelected();
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

    if (conferencesGrid != null) {
        var items = conferencesGrid.selection.getSelected();
        if (items.length > 0) {
            selectedIdsArray = new Array();
            for (var i = 0; i < items.length; i++) {
                itemId = conferencesGrid.store.getValue(items[i], "conferenceId");
                itemId = $.trim(itemId);
                selectedIdsArray.push(itemId);
            }
            // close dialog
            closeConfirmDeletionModalDialog();
            // now delete items
            deleteSeletedConferences(selectedIdsArray);
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
        validateBeforeAddNewConference();
    });
    $("#" + editItemBtnDialogId).click(function () {
        displayConferenceView(editItemDetailsCmd);
    });

    $("#" + closeEditBtnDialogId).click(function () {
        closeViewItemDetailsDialog();
    });
    $("#" + saveChangesBtnDialogId).click(function () {
        saveConferenceChanges();
    });
    $("#" + cancelChangesBtnDialogId).click(function () {
        displayConferenceView(cancelChangesCmd);
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

    $("#" + conferenceDetailsFormId).validate({
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

function validateBeforeAddNewConference() {

    var isFormInputsValid = $("#" + conferenceDetailsFormId).valid();
    if (isFormInputsValid) {
        // close dialog
        closeAddEditItemDialog();
        // add callback
        addNewConference();
    }
}

function showAddItemDialog() {

    if ($("#" + conferenceDetailsDialogId) != null) {
        // set content dialog
        $("#" + addNewItemDialogContentId).html(editItemDetailsFormContent);
        // set textfields values when Dojo parsing completed
        initDateTimeFields("date");
        settersMethodWithDefaultValues();
        $("#" + conferenceDetailsDialogId).modal("show");
    }
}

function closeAddEditItemDialog() {
    if ($("#" + conferenceDetailsDialogId) != null) {
        $("#" + conferenceDetailsDialogId).modal("hide");
    }
}

function closeConfirmDeletionModalDialog() {
    if ($("#" + confirmDeletionDialogId) != null) {
        $("#" + confirmDeletionDialogId).modal("hide");
    }
}

function addNewConference() {

    var conferenceDetailsFormObject = $("#" + conferenceDetailsFormId).serializeObject();
    // convert form to json object
    var itemToAdd = conferenceDetailsFormObject;
    itemToAdd = conferenceDetailsFormObject;
    // read datetime field value
    conferenceDetailsFormObject.date = $("#date").data("DateTimePicker").date();
    // add 1 day to ajust
    var datePickerValue = strToShortDate(new String($("#date").data("DateTimePicker").date()));
    datePickerValue.setDate(datePickerValue.getDate() + 1);
    conferenceDetailsFormObject.date = datePickerValue;
    var postParameters = {
        "formValues[]": dojo.toJson(conferenceDetailsFormObject, true),
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
    function addNewConferenceCompleted(data) {

        debugMessageToConsole("addNewConferenceCompleted data : " + data, highLevel);
        // get json result
        var jsonData = data;
        // clear error message
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "addNewConferenceCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationCreationLabel, successImg);

        if (conferencesStore != null && jsonData[0].insertedItemKey != null) {
            itemToAdd.conferenceId = jsonData[0].insertedItemKey;
            // remove 1 day to ajust display on grid
            datePickerValue.setDate(datePickerValue.getDate() - 1);
            itemToAdd.date = datePickerValue;
            // redisplay data grid    
            conferencesStore.newItem(itemToAdd);
        }
    }

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, addNewConferenceCompleted);

}

function submitInlineGridChanges(conferenceId, jsonValues) {

    var postParameters = {
        "conferenceId": conferenceId,
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


function deleteSeletedConferences(conferenceIdsList) {
    var postParameters = {
        "selectedIds[]": conferenceIdsList,
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
        xhrArgs.error, deleteSeletedConferencesCompleted);
    //get postback result
    function deleteSeletedConferencesCompleted(data) {

        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent("errorContentDiv", "deleteSeletedConferencesCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // delete items in store
        var itemsToDelete = conferencesGrid.selection.getSelected();
        $.each(itemsToDelete, function (index, item) {
            if (item) {
                conferencesStore.deleteItem(item);
            }
        });
        // save datastore
        conferencesStore.save();
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationDeletionLabel, successImg);

        $("#" + resultsDivId).html("");
    }

}



function submitConferenceDetailsForm(conferenceId) {

    //if (!conferenceDetailsForm.validate()) {
    //    return;
    //}
    // convert form to json object
    var conferenceDetailsFormObject = $("#" + conferenceDetailsFormId).serializeObject();
    // format date type field
    conferenceDetailsFormObject.date = $("#date").data("DateTimePicker").date();
    // add 1 day to ajust
    var datePickerValue = strToShortDate(new String($("#date").data("DateTimePicker").date()));
    datePickerValue.setDate(datePickerValue.getDate() + 1);
    conferenceDetailsFormObject.date = datePickerValue;
    // convert to json arry
    var jsonValues = dojo.toJson(conferenceDetailsFormObject);

    var postParameters = {
        "conferenceId": conferenceId,
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
        xhrArgs.error, submitConferenceDetailsCompleted);
    //get postback result
    function submitConferenceDetailsCompleted(data) {
        //debugMessageToConsole(" ConferenceDetailsForm-postback: " + $.trim(data), highLevel);
        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "submitConferenceDetailsCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }

        // get item to update
        var itemToUpdate = conferencesGrid.getItem(currentItemIndex);
        // remove 1 day to ajust display on grid
        datePickerValue.setDate(datePickerValue.getDate() - 1);
        conferenceDetailsFormObject.date = datePickerValue;

        conferencesStore.setValue(itemToUpdate, "date", conferenceDetailsFormObject.date);
        conferencesStore.setValue(itemToUpdate, "title", conferenceDetailsFormObject.title);
        conferencesStore.setValue(itemToUpdate, "location", conferenceDetailsFormObject.location);
        conferencesStore.setValue(itemToUpdate, "summary", conferenceDetailsFormObject.summary);

        conferencesStore.save();

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
    var conferenceId = itemsArrayIds[currentItemIndex];
    viewConferenceDetails(conferenceId);
}

function viewPrevousItemDetails() {
    currentItemIndex = getPreviousItemIndex();
    var conferenceId = itemsArrayIds[currentItemIndex];
    viewConferenceDetails(conferenceId);
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

function saveConferenceChanges() {
    submitConferenceDetailsForm(currentConferenceId);
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