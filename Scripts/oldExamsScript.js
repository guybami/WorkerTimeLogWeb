/**
*This script was auto generated.
* Script to manage a  OldExam model entity.
* @author
*     Guy Bami W.
* Created changes: 08.04.2017 20:48:18
*/


// global varaibles
var oldExamsStore = null;
var oldExamsGrid = null;
var currentItemIndex = -1;
var itemsArrayIds = new Array();
var currentOldExamId = -1;


// some oldExam actions commands
var viewAllItemsCmd = "viewAllOldExams";
var editItemDetailsCmd = "editDetails";
var viewItemDetailsCmd = "viewDetails";
var addNewItemCmd = "addNewItem";
var insertNewItemCmd = "insertNewItem";
var cancelChangesCmd = "cancelChanges";
var saveChangesCmd = "saveChanges";

// controls and page divs Ids
var toolbarButtonsDivId = "toolbarButtonsDiv";
var dataItemsGridId = "oldExamsGrid";
var itemDetailsDivId = "oldExamDetailsDiv";
var itemsGridDivId = "oldExamsGridDiv";
var itemDetailsFormId = "oldExamDetailsForm";
var oldExamDetailsFormId = "oldExamDetailsForm";
var dataViewDivId = "dataViewDiv";
var dataEditDivId = "dataEditDiv";
var confirmDialogDivId = "confirmDialogDiv";
var sectionTitleAndToolbarBtnDivId = "sectionTitleAndToolbarBtnDiv";
var toolbarButtonsTableId = "toolbarButtonsTable";
var dataViewHeaderId = "dataViewHeader";
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
var oldExamDetailsDialogId = "oldExamDetailsDialog";
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
var controllerUrl = "../../Controllers/OldExamController.php";
var postDataFormat = "text";
var postMethod = "POST";


// flags used to check user role
var readItemRight = true;
var addNewItemRight = true;
var deleteItemRight = true;
var editItemRight = true;

var menuItemSectionTitleLabel = pageLangTexts.menuItemSectionTitleLabel == null ? "Administration" : pageLangTexts.menuItemSectionTitleLabel;
var subMenuItemSectionTitleLabel = pageLangTexts.subMenuItemSectionTitleLabel == null ? "Anciens Examens" : pageLangTexts.subMenuItemSectionTitleLabel;

var currentUserId = "";
var currentUserFullName;

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
                        curmo.entityType = curmo.entityTypesObject.OldExam;
                        readItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.OldExam, curmo.accessRightsObject.readRight);
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
                        generateOldExamsDataGrid(itemsGridDivId);
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
                    bindChangeEventForFileSelectDialog("fileFullNameToUpload", "fileFullName", false);
                };

                // parse main menu and display page
                parseMainMenu(parsePageWidgets);
            }
            catch (err) {
                logError(err);
            }
        });
    });



function setLabelFields(jsonData) {

    $("#userIdLabel").html(jsonData[0].userId);
    $("#subjectLabel").html(jsonData[0].subject);
    $("#titleLabel").html(jsonData[0].title);
    $("#semesterLabel").html(jsonData[0].semester);
    //$("#dateLabel").html(jsonData[0].date);
    $("#dateLabel").html(dateToLocale(jsonData[0].date));
    $("#fileFullNameLabel").html(jsonData[0].fileFullName);

}


function setTextFields(jsonData) {

    setFormFieldValue("userId", jsonData[0].userId);
    setFormFieldValue("subject", jsonData[0].subject);
    setFormFieldValue("title", jsonData[0].title);
    setFormFieldValue("semester", jsonData[0].semester);
    setFormFieldValue("date", jsonData[0].date);
    setFormFieldValue("fileFullName", jsonData[0].fileFullName);

}


function settersMethodWithDefaultValues() {

    //setFormFieldValue("userId", "49935");
    setFormFieldValue("subject", "");
    setFormFieldValue("title", "-");
    setFormFieldValue("semester", "-");
    initDateTimeFields("date");
    setFormFieldValue("date", "");
    setFormFieldValue("fileFullName", "");

}


/**
 * generate dynamic OldExams datagrid
 * @param {string} targetDiv
 * @returns {none}
 */
function generateOldExamsDataGrid(targetDiv) {

    var windowWidth = $(window).width() - 200;
    
    var subjectColWidth = windowWidth * 0.15 + "px";
    var titleColWidth = windowWidth * 0.17 + "px";
    var semesterColWidth = windowWidth * 0.10 + "px";
    var dateColWidth = windowWidth * 0.10 + "px";
    var fileFullNameColWidth =  windowWidth * 0.17 + "px";
    var userIdColWidth = "auto";



    // manage user role
    var dataEditable = true;
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        curmo.entityType = curmo.entityTypesObject.OldExam;
        dataEditable = curmo.getAccessRightByEntityType(curmo.entityTypesObject.OldExam, curmo.accessRightsObject.editRight);
    }
    
    // some formatters
    function shortDateFieldFormatter(data, rowIndex) {
        var strDate = strToShortDate(new String(data));
        debugMessageToConsole("shortDateFieldFormatter strDate: " + strDate, lowLevel);
        return dojo.date.locale.format(strDate, this.constraint);
    }
    
    function examFileNameFormatter(data, rowIndex) {
        var item = oldExamsGrid.getItem(rowIndex);
        var formattedTtitle = item.fileFullName;
        if (formattedTtitle == null || formattedTtitle.length == 0)
            formattedTtitle = "---";
        if (item) {
            var contains = false;
            for (i = 0; i < itemsArrayIds.length; i++) {
                if (itemsArrayIds[i].toString() == item.examId.toString()) {
                    contains = true;
                    break;
                }
            }
            if (!contains){
                itemsArrayIds.push(item.examId);
                
            }
                
            formattedTtitle = "Epreuve"; // to be changed...
            var html = '<label class="itemNameLabelDiv"><a href="javascript:viewOldExamFileDialog(\'' + item.fileFullName + '\');" class="linkItemNameRow">'
                    + formattedTtitle + '</a></label>';
            
           
            return html;
        }
        return data;
    }

    var columsLayout = [
           {
               name: pageLangTexts.subjectColLabel == null ? "Subject" : pageLangTexts.subjectColLabel,
               field: "subject",
               dataType: "string",
               editable: dataEditable,
               type: dojox.grid.cells._Widget,
               width: subjectColWidth,
               widgetClass: dijit.form.TextBox 
           }

           , {
               name: pageLangTexts.titleColLabel == null ? "Title" : pageLangTexts.titleColLabel,
               field: "title",
               dataType: "string",
               editable: dataEditable,
               type: dojox.grid.cells._Widget,
               width: titleColWidth,
               widgetClass: dijit.form.TextBox 
           }

           , {
               name: pageLangTexts.semesterColLabel == null ? "Semester" : pageLangTexts.semesterColLabel,
               field: "semester",
               dataType: "string",
               editable: dataEditable,
               type: dojox.grid.cells._Widget,
               width: semesterColWidth,
               widgetClass: dijit.form.TextBox 
           }

           , {
               name: pageLangTexts.dateColLabel == null ? "Date" : pageLangTexts.dateColLabel,
               field: "date",
               dataType: "date",
               editable: false,
               type: dojox.grid.cells._Widget,
               width: dateColWidth,
               widgetClass: dijit.form.DateTextBox,
               formatter: shortDateFieldFormatter,
               constraint: { formatLength: "short", selector: "date", locale:"de" }
                
           }
           , {
                name: pageLangTexts.fileFullNameColLabel == null ? "Epreuves" : pageLangTexts.fileFullNameColLabel,
                field: "fileFullName",
                dataType: "string",
                editable: false,
                type: dojox.grid.cells._Widget,
                width: fileFullNameColWidth,
                widgetClass: dijit.form.TextBox,
                formatter: examFileNameFormatter
            }
            ,{
               name: pageLangTexts.userIdColLabel == null ? "Utilisateur" : pageLangTexts.userIdColLabel,
               field: "userFullName",
               dataType: "string",
               editable: false,
               type: dojox.grid.cells._Widget,
               width: userIdColWidth,
               widgetClass: dijit.form.TextBox 
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
            displayErrorContent("errorContentDiv", "Failed to get all oldExams from server: " + errorMsg);
            logError({ message: "Failed to get all oldExams from server: \n" + errorMsg });
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

        oldExamsStore = new dojo.data.ItemFileWriteStore({
            data: {
                identifier: "examId",
                items: jsonData
            }
        });

        if (oldExamsStore != null) {
            // save data store
            oldExamsStore.save({
                onComplete: function () { debugMessageToConsole("Done saving items store.", lowLevel); },
                onError: function () { logError({ message: "Save failed items store." }); }
            });
            // custom sorting fields
            oldExamsStore.comparatorMap = {}; oldExamsStore.comparatorMap["userId"] = compareStringIgnoreCase; oldExamsStore.comparatorMap["subject"] = compareStringIgnoreCase; oldExamsStore.comparatorMap["title"] = compareStringIgnoreCase; oldExamsStore.comparatorMap["semester"] = compareStringIgnoreCase; oldExamsStore.comparatorMap["date"] = compareStringIgnoreCase;



            //destroy old controls
            destroyWidget(dataItemsGridId);
            // create datagrid
            oldExamsGrid = new dojox.grid.EnhancedGrid({
                id: dataItemsGridId,
                store: oldExamsStore,
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
                        itemsName: "OldExams"
                    }
                }
            });

            // set sort index col
            setSortColumnsIndexes(oldExamsGrid, 2, true);
            // add events trigger
            oldExamsGrid.on("SelectionChanged", reportSelection);
            oldExamsGrid.on("StartEdit", gridStartEdit);
            oldExamsGrid.on("ApplyCellEdit", gridApplyCellEdit);
            oldExamsGrid.placeAt(targetDiv);
            // parse datagrid
            oldExamsGrid.startup();
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
                obj["entityKeyId"] = storeItem["examId"].toString();
                var itemId = storeItem["examId"].toString();
                var jsonValues = dojo.toJson(obj);
                debugMessageToConsole("jsonValues: " + jsonValues, highLevel);
                submitInlineGridChanges(itemId, jsonValues);
            }
        }
    }

}



function displayOldExamView(userAction) {

    var examId = currentOldExamId;
    debugMessageToConsole("examId:" + examId, highLevel);
    debugMessageToConsole("userAction: " + userAction, highLevel);

    var windowHeight = $(window).height();
    var windowWidth = $(window).width();

    var postParameters = { "examId": examId, "userAction": userAction };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({ message: "Reponse failed to get oldExam details with error: " + errorMsg });
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
            displayErrorContent(errorContentDivId, "displayOldExamView: " + jsonErrorMsg);
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
            $("#" + spanCancelChangesBtnDialogId).addClass(hideContentClass);

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
            $("#" + spanEditItemBtnDialogDialogId).removeClass(hideContentClass);
            $("#" + spanCloseEditBtnDialogId).removeClass(hideContentClass);
            //hide buttons
            $("#" + spanSaveChangesBtnDialogId).addClass(hideContentClass);
            $("#" + spanCancelChangesBtnDialogId).addClass(hideContentClass);
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




function viewOldExamDetails(examId) {
    currentOldExamId = examId;
    currentItemIndex = getCurrentItemIndex(examId);
    displayOldExamView(viewItemDetailsCmd);
}




function createToolbarBtns(userAction) {

    // check user role
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        if (!customUserRolesManagerObject.rolesLoaded) {
            // load roles only once
            curmo.entityType = curmo.entityTypesObject.OldExam;
            addNewItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.OldExam, curmo.accessRightsObject.createRight);
            editItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.OldExam, curmo.accessRightsObject.editRight);
            deleteItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.OldExam, curmo.accessRightsObject.deleteRight);
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

    if (oldExamsGrid != null) {
        var items = oldExamsGrid.selection.getSelected();
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

    if (oldExamsGrid != null) {
        var items = oldExamsGrid.selection.getSelected();
        if (items.length > 0) {
            selectedIdsArray = new Array();
            for (var i = 0; i < items.length; i++) {
                itemId = oldExamsGrid.store.getValue(items[i], "examId");
                itemId = $.trim(itemId);
                selectedIdsArray.push(itemId);
            }
            // close dialog
            closeConfirmDeletionModalDialog();
            // now delete items
            deleteSeletedOldExams(selectedIdsArray);
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
        validateBeforeAddNewOldExam();
    });
    $("#" + editItemBtnDialogId).click(function () {
        displayOldExamView(editItemDetailsCmd);
    });

    $("#" + closeEditBtnDialogId).click(function () {
        closeViewItemDetailsDialog();
    });
    $("#" + saveChangesBtnDialogId).click(function () {
        saveOldExamChanges();
    });
    $("#" + cancelChangesBtnDialogId).click(function () {
        displayOldExamView(cancelChangesCmd);
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

    $("#" + oldExamDetailsFormId).validate({
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

function validateBeforeAddNewOldExam() {

    var isFormInputsValid = $("#" + oldExamDetailsFormId).valid();
    if (isFormInputsValid) {
        // close dialog
        closeAddEditItemDialog();
        // add callback
        addNewOldExam();
    }
}


function showAddItemDialog() {

    if ($("#" + oldExamDetailsDialogId) != null) {
        // set content dialog
        $("#" + addNewItemDialogContentId).html(editItemDetailsFormContent);
        // set textfields values when Dojo parsing completed
        settersMethodWithDefaultValues();
        $("#" + oldExamDetailsDialogId).modal("show");
    }
}


function closeAddEditItemDialog() {
    if ($("#" + oldExamDetailsDialogId) != null) {
        $("#" + oldExamDetailsDialogId).modal("hide");
    }
}

function closeConfirmDeletionModalDialog() {
    if ($("#" + confirmDeletionDialogId) != null) {
        $("#" + confirmDeletionDialogId).modal("hide");
    }
}




function addNewOldExam() {

    var oldExamDetailsFormObject = $("#" + oldExamDetailsFormId).serializeObject();
    // convert form to json object
    // set user Id
    oldExamDetailsFormObject.userId = currentUserId;
    oldExamDetailsFormObject.date = new Date();
    var itemToAdd = oldExamDetailsFormObject;
    itemToAdd = oldExamDetailsFormObject;
    var postParameters = {
        "formValues[]": dojo.toJson(oldExamDetailsFormObject, true)
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
    function addNewOldExamCompleted(data) {

        debugMessageToConsole("addNewOldExamCompleted data : " + data, highLevel);
        // get json result
        var jsonData = data;
        // clear error message
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "addNewOldExamCompleted: " + jsonErrorMsg);
            return;
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
         
        // upload file
        function uploadOldExamFileCompleted(data){
            var uploadJsonData = $.parseJSON(data);
            if(uploadJsonData && uploadJsonData.status > 0){
                 if(uploadJsonData.status.toString() == "true"){
                     if (oldExamsStore != null && jsonData[0].insertedItemKey != null) {
                        itemToAdd.examId = jsonData[0].insertedItemKey;
                        itemToAdd.userFullName = currentUserFullName;
                        
                        if(uploadJsonData.entryKey != null)
                            itemToAdd.fileFullName = uploadJsonData.entryKey;
                        // redisplay data grid    
                        oldExamsStore.newItem(itemToAdd);
                    }
                    // display overlay message
                    showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationCreationLabel, successImg);
                 }
                 else{
                     displayErrorContent(errorContentDivId, uploadJsonData.message);
                 }
            }
            
        }
        // upload exam file
        uploadOldExamFile(oldExamDetailsFormId, uploadOldExamFileCompleted);
        
        
    }

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, addNewOldExamCompleted);

}


function submitInlineGridChanges(examId, jsonValues) {

    var postParameters = {
        "examId": examId,
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
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent("errorContentDiv", jsonData[0].jsonErrorMessage);
            return;
        }
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationUpdateLabel, successImg);
    }
}


function deleteSeletedOldExams(examIdsList) {
    var postParameters = {
        "selectedIds[]": examIdsList,
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
        xhrArgs.error, deleteSeletedOldExamsCompleted);
    //get postback result
    function deleteSeletedOldExamsCompleted(data) {

        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent("errorContentDiv", "deleteSeletedOldExamsCompleted: " + jsonErrorMsg);
            return;
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // delete items in store
        var itemsToDelete = oldExamsGrid.selection.getSelected();
        $.each(itemsToDelete, function (index, item) {
            if (item) {
                oldExamsStore.deleteItem(item);
            }
        });
        // save datastore
        oldExamsStore.save();
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationDeletionLabel, successImg);

        $("#" + resultsDivId).html("");
    }

}


function submitOldExamDetailsForm(examId) {
    //check form validation
    //if (!oldExamDetailsForm.validate()) {
    //    return;
    //}
    // convert form to json object
    var oldExamDetailsFormObject = $("#" + oldExamDetailsFormId).serializeObject();
    
    // set user Id
    oldExamDetailsFormObject.userId = currentUserId;
    oldExamDetailsFormObject.date = new Date();

    // convert to json arry
    var jsonValues = dojo.toJson(oldExamDetailsFormObject);

    var postParameters = {
        "examId": examId,
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
    };

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, submitOldExamDetailsCompleted);
    //get postback result
    function submitOldExamDetailsCompleted(data) {
        //debugMessageToConsole(" OldExamDetailsForm-postback: " + $.trim(data), highLevel);
        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "submitOldExamDetailsCompleted: " + jsonErrorMsg);
            return;
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }

        // get item to update
        var itemToUpdate = oldExamsGrid.getItem(currentItemIndex);

        oldExamsStore.setValue(itemToUpdate, "userId", oldExamDetailsFormObject.userId);
        oldExamsStore.setValue(itemToUpdate, "subject", oldExamDetailsFormObject.subject);
        oldExamsStore.setValue(itemToUpdate, "title", oldExamDetailsFormObject.title);
        oldExamsStore.setValue(itemToUpdate, "semester", oldExamDetailsFormObject.semester);
        oldExamsStore.setValue(itemToUpdate, "date", oldExamDetailsFormObject.date);
        oldexamsStore.setValue(itemToUpdate, "fileFullName", oldexamDetailsFormObject.fileFullName);

        oldExamsStore.save();
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
    var examId = itemsArrayIds[currentItemIndex];
    viewOldExamDetails(examId);
}

function viewPrevousItemDetails() {
    currentItemIndex = getPreviousItemIndex();
    var examId = itemsArrayIds[currentItemIndex];
    viewOldExamDetails(examId);
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

function saveOldExamChanges() {
    submitOldExamDetailsForm(currentOldExamId);
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




function fetchUserCredentials() {

    var controllerUrl = "../../Controllers/UserController.php";
    var postDataFormat = "json";
    var postMethod = "POST";
    var postParameters = { "userAction": "getUserCredentials", "userName" : "guybami" };
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
        //alert(data[0].userId);
        debugMessageToConsole("items json data: " + data, lowLevel);
        // display all
         
        // clear error message
        //$("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "fetchDataCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
   
        if(jsonData[0] != null){
             currentUserId = data[0].userId;
             currentUserFullName = data[0].name + " " + data[0].lastName;
        }
    }

}


function viewOldExamFileDialog(oldExamFile) {
    var oldExamFileDialogId = "oldExamFileDialog";
    var content = "";
    if ($("#" + oldExamFileDialogId) != null) {
        // set content dialog
        
        if(oldExamFile && oldExamFile.length > 0){
            //alert("name:" + oldExamFile);
            if(oldExamFile.toString().endsWith("pdf")){
                // for .pdf or .doc files
                content = '<object data="../../UploadedFiles/Images/OldExams/'+ oldExamFile +'" type="application/pdf" width="800" height="700"> '
                + ' <a href="../../UploadedFiles/Images/OldExams/'+ oldExamFile +'">Voir Contenu</a> </object>  ';
            }
            else{
                content = '<img src="../../UploadedFiles/Images/OldExams/'+ oldExamFile +'"   alt="Epreuve introuvee..." /> ';
            }
        }
        
        $("#oldExamFileDialogContent").html(content);
        // show dialog
        $("#" + oldExamFileDialogId).modal("show");
    }

}

function uploadOldExamFile(formId, _callbackMethod) {
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
        if (e != null && e.lengthComputable && $('progress') != null) {
            $('progress').attr({value: e.loaded, max: e.total});
        }
    }
}


 
$(document).ready(function () {
    // display sitemap path
     
    fetchUserCredentials();
    $(window).bind("resize", rescaleWindow);
     

});


function rescaleWindow() {
    var size = { width: $(window).width(), height: $(window).height() };
    // calculate size
    var offset = 20;
    var offsetBody = 80;
    $("#oldExamFileDialog").css("height", size.height - offset);
    $("#oldExamFileDialog .modal-body").css("height", size.height - (offset + offsetBody));
    $("#oldExamFileDialog").css("top", 0);
}