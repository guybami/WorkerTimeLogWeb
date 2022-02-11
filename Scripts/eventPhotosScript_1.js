/**
 *This script was auto generated.
 * Script to manage a  EventPhoto model entity.
 * @author
 *     Guy Bami W.
 * Created changes: 08.04.2017 20:48:16
 */


// global varaibles
var eventPhotosStore = null;
var eventPhotosGrid = null;
var currentItemIndex = -1;
var itemsArrayIds = new Array();
var currentEventPhotoId = -1;


// some eventPhoto actions commands
var viewAllItemsCmd = "viewAllEventPhotos";
var editItemDetailsCmd = "editDetails";
var viewItemDetailsCmd = "viewDetails";
var addNewItemCmd = "addNewItem";
var insertNewItemCmd = "insertNewItem";
var cancelChangesCmd = "cancelChanges";
var saveChangesCmd = "saveChanges";

// controls and page divs Ids
var toolbarButtonsDivId = "toolbarButtonsDiv";
var dataItemsGridId = "eventPhotosGrid";
var itemDetailsDivId = "eventPhotoDetailsDiv";
var itemsGridDivId = "eventPhotosGridDiv";
var itemDetailsFormId = "eventPhotoDetailsForm";
var eventPhotoDetailsFormId = "eventPhotoDetailsForm";
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
var eventPhotoDetailsDialogId = "eventPhotoDetailsDialog";
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
var controllerUrl = "../../Controllers/EventPhotoController.php";
var postDataFormat = "text";
var postMethod = "POST";


// flags used to check user role
var readItemRight = true;
var addNewItemRight = true;
var deleteItemRight = true;
var editItemRight = true;

var menuItemSectionTitleLabel = pageLangTexts.menuItemSectionTitleLabel == null ? "Administration" : pageLangTexts.menuItemSectionTitleLabel;
var subMenuItemSectionTitleLabel = pageLangTexts.subMenuItemSectionTitleLabel == null ? "Photos" : pageLangTexts.subMenuItemSectionTitleLabel;


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
    "dijit/form/Select",
    "dijit/form/ValidationTextBox",
    "dijit/form/NumberTextBox",
    "dijit/form/CheckBox",
    "dijit/form/DropDownButton"
]);



/**
 * load data method
 * @param {type} parser
 * @param {type} ready
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
                            curmo.entityType = curmo.entityTypesObject.EventPhoto;
                            readItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.EventPhoto, curmo.accessRightsObject.readRight);
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
                            generateEventPhotosDataGrid(itemsGridDivId);
                            // load events
                            loadEventsList();
                            // bind events
                            bindChangeEventForFileSelectDialog("filesToUpload", "fileFullName", true);
                        }
                        else {
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
                }
                catch (err) {
                    logError(err);
                }
            });
        });




function setLabelFields(jsonData) {
    $("#eventIdLabel").html(jsonData[0].eventId);
    $("#fileFullNameLabel").html(jsonData[0].fileFullName);
    $("#titleLabel").html(jsonData[0].title);
}


function setTextFields(jsonData) {

    setFormFieldValue("eventId", jsonData[0].eventId);
    setFormFieldValue("fileFullName", jsonData[0].fileFullName);
    setFormFieldValue("title", jsonData[0].title);
}


function settersMethodWithDefaultValues() {

    //setFormFieldValue("eventId", "121339");
    //setFormFieldValue("fileFullName", "fileFullName-7eb3c8b");
    setFormFieldValue("title", "-");

}

/**
 * generate dynamic EventPhotos datagrid
 * @param {string} targetDiv
 * @returns {none}
 */
function generateEventPhotosDataGrid(targetDiv) {

    var windowWidth = $(window).width() - 200;
    var eventIdColWidth = windowWidth * 0.33 + "px";
    var fileFullNameColWidth = windowWidth * 0.33 + "px";
    var titleColWidth = "auto";



    // manage user role
    var dataEditable = false;
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        curmo.entityType = curmo.entityTypesObject.EventPhoto;
        dataEditable = curmo.getAccessRightByEntityType(curmo.entityTypesObject.EventPhoto, curmo.accessRightsObject.editRight);
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
            name: pageLangTexts.fileFullNameColLabel == null ? "FileFullName" : pageLangTexts.fileFullNameColLabel,
            field: "fileFullName",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: fileFullNameColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
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
    ];



    var postParameters = {userAction: "getAllItems"};
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: "text",
        method: postMethod,
        error: function (errorMsg) {
            // hide loading img
            hideLoadingTask(targetDiv);
            displayErrorContent("errorContentDiv", "Failed to get all eventPhotos from server: " + errorMsg);
            logError({message: "Failed to get all eventPhotos from server: \n" + errorMsg});
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

        eventPhotosStore = new dojo.data.ItemFileWriteStore({
            data: {
                identifier: "photoId",
                items: jsonData
            }
        });

        if (eventPhotosStore != null) {
            // save data store
            eventPhotosStore.save({
                onComplete: function () {
                    debugMessageToConsole("Done saving items store.", lowLevel);
                },
                onError: function () {
                    logError({message: "Save failed items store."});
                }
            });
            // custom sorting fields
            eventPhotosStore.comparatorMap = {};
            eventPhotosStore.comparatorMap["eventTitle"] = compareStringIgnoreCase;
            eventPhotosStore.comparatorMap["fileFullName"] = compareStringIgnoreCase;
            eventPhotosStore.comparatorMap["title"] = compareStringIgnoreCase;



            //destroy old controls
            destroyWidget(dataItemsGridId);
            // create datagrid
            eventPhotosGrid = new dojox.grid.EnhancedGrid({
                id: dataItemsGridId,
                store: eventPhotosStore,
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
                        itemsName: "EventPhotos"
                    }
                }
            });

            // set sort index col
            setSortColumnsIndexes(eventPhotosGrid, 2, true);
            // add events trigger
            eventPhotosGrid.on("SelectionChanged", reportSelection);
            eventPhotosGrid.on("StartEdit", gridStartEdit);
            eventPhotosGrid.on("ApplyCellEdit", gridApplyCellEdit);
            eventPhotosGrid.placeAt(targetDiv);
            // parse datagrid
            eventPhotosGrid.startup();
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
                obj["entityKeyId"] = storeItem["photoId"].toString();
                var itemId = storeItem["photoId"].toString();
                var jsonValues = dojo.toJson(obj);
                debugMessageToConsole("jsonValues: " + jsonValues, highLevel);
                submitInlineGridChanges(itemId, jsonValues);
            }
        }
    }

}



function displayEventPhotoView(userAction) {

    var photoId = currentEventPhotoId;
    debugMessageToConsole("photoId:" + photoId, highLevel);
    debugMessageToConsole("userAction: " + userAction, highLevel);

    var windowHeight = $(window).height();
    var windowWidth = $(window).width();

    var postParameters = {"photoId": photoId, "userAction": userAction};
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({message: "Reponse failed to get eventPhoto details with error: " + errorMsg});
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
            displayErrorContent(errorContentDivId, "displayEventPhotoView: " + jsonErrorMsg);
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




function viewEventPhotoDetails(photoId) {
    currentEventPhotoId = photoId;
    currentItemIndex = getCurrentItemIndex(photoId);
    displayEventPhotoView(viewItemDetailsCmd);
}




function createToolbarBtns(userAction) {

    // check user role
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        if (!customUserRolesManagerObject.rolesLoaded) {
            // load roles only once
            curmo.entityType = curmo.entityTypesObject.EventPhoto;
            addNewItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.EventPhoto, curmo.accessRightsObject.createRight);
            editItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.EventPhoto, curmo.accessRightsObject.editRight);
            deleteItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.EventPhoto, curmo.accessRightsObject.deleteRight);
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

    if (eventPhotosGrid != null) {
        var items = eventPhotosGrid.selection.getSelected();
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

    if (eventPhotosGrid != null) {
        var items = eventPhotosGrid.selection.getSelected();
        if (items.length > 0) {
            selectedIdsArray = new Array();
            for (var i = 0; i < items.length; i++) {
                itemId = eventPhotosGrid.store.getValue(items[i], "photoId");
                itemId = $.trim(itemId);
                selectedIdsArray.push(itemId);
            }
            // close dialog
            closeConfirmDeletionModalDialog();
            // now delete items
            deleteSeletedEventPhotos(selectedIdsArray);
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
        validateBeforeAddNewEventPhoto();
    });
    $("#" + editItemBtnDialogId).click(function () {
        displayEventPhotoView(editItemDetailsCmd);
    });

    $("#" + closeEditBtnDialogId).click(function () {
        closeViewItemDetailsDialog();
    });
    $("#" + saveChangesBtnDialogId).click(function () {
        saveEventPhotoChanges();
    });
    $("#" + cancelChangesBtnDialogId).click(function () {
        displayEventPhotoView(cancelChangesCmd);
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

    $("#" + eventPhotoDetailsFormId).validate({
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

function validateBeforeAddNewEventPhoto() {

    var isFormInputsValid = $("#" + eventPhotoDetailsFormId).valid();
    if (isFormInputsValid) {
        // close dialog
        closeAddEditItemDialog();
        // add callback
        //addNewEventPhoto();
        addEventPhotos();
    }
}


function showAddItemDialog() {

    if ($("#" + eventPhotoDetailsDialogId) != null) {
        // set content dialog
        $("#" + addNewItemDialogContentId).html(editItemDetailsFormContent);
        // set textfields values when Dojo parsing completed
        settersMethodWithDefaultValues();
        $("#" + eventPhotoDetailsDialogId).modal("show");
    }
}


function closeAddEditItemDialog() {
    if ($("#" + eventPhotoDetailsDialogId) != null) {
        $("#" + eventPhotoDetailsDialogId).modal("hide");
    }
}

function closeConfirmDeletionModalDialog() {
    if ($("#" + confirmDeletionDialogId) != null) {
        $("#" + confirmDeletionDialogId).modal("hide");
    }
}




function addNewEventPhoto() {

    var eventPhotoDetailsFormObject = $("#" + eventPhotoDetailsFormId).serializeObject();
    // convert form to json object
    var itemToAdd = eventPhotoDetailsFormObject;
    itemToAdd = eventPhotoDetailsFormObject;
    var postParameters = {
        "formValues[]": dojo.toJson(eventPhotoDetailsFormObject, true)
        , "userAction": insertNewItemCmd
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({message: "Failed to add new item. Error: " + errorMsg});
        }
    };


    //get postback result
    function addNewEventPhotoCompleted(data) {

        debugMessageToConsole("addNewEventPhotoCompleted data : " + data, highLevel);
        // get json result
        var jsonData = data;
        // clear error message
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "addNewEventPhotoCompleted: " + jsonErrorMsg);
            return;
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationCreationLabel, successImg);
        
        
        if (eventPhotosStore != null && jsonData[0].insertedItemKey != null) {
            itemToAdd.photoId = jsonData[0].insertedItemKey;
            itemToAdd.eventTitle = $("#eventId").find("option:selected").text();
            // redisplay data grid    
            eventPhotosStore.newItem(itemToAdd);
        }
    }

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
            xhrArgs.error, addNewEventPhotoCompleted);

}


function submitInlineGridChanges(photoId, jsonValues) {

    var postParameters = {
        "photoId": photoId,
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


function deleteSeletedEventPhotos(photoIdsList) {
    var postParameters = {
        "selectedIds[]": photoIdsList,
        "userAction": "deleteItem"
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({message: "Failed to delete items from server: \n\n" + errorMsg});
        }
    };

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
            xhrArgs.error, deleteSeletedEventPhotosCompleted);
    //get postback result
    function deleteSeletedEventPhotosCompleted(data) {

        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent("errorContentDiv", "deleteSeletedEventPhotosCompleted: " + jsonErrorMsg);
            return;
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // delete items in store
        var itemsToDelete = eventPhotosGrid.selection.getSelected();
        $.each(itemsToDelete, function (index, item) {
            if (item) {
                eventPhotosStore.deleteItem(item);
            }
        });
        // save datastore
        eventPhotosStore.save();
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationDeletionLabel, successImg);

        $("#" + resultsDivId).html("");
    }

}


function submitEventPhotoDetailsForm(photoId) {
    //check form validation
    //if (!eventPhotoDetailsForm.validate()) {
    //    return;
    //}
    // convert form to json object
    var eventPhotoDetailsFormObject = $("#" + eventPhotoDetailsFormId).serializeObject();

    // convert to json arry
    var jsonValues = dojo.toJson(eventPhotoDetailsFormObject);

    var postParameters = {
        "photoId": photoId,
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
            logError({message: "Failed to update item from server: \n\n" + errorMsg});
        }
    };

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
            xhrArgs.error, submitEventPhotoDetailsCompleted);
    //get postback result
    function submitEventPhotoDetailsCompleted(data) {
        //debugMessageToConsole(" EventPhotoDetailsForm-postback: " + $.trim(data), highLevel);
        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "submitEventPhotoDetailsCompleted: " + jsonErrorMsg);
            return;
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }

        // get item to update
        var itemToUpdate = eventPhotosGrid.getItem(currentItemIndex);

        eventPhotosStore.setValue(itemToUpdate, "eventId", eventPhotoDetailsFormObject.eventId);
        eventPhotosStore.setValue(itemToUpdate, "fileFullName", eventPhotoDetailsFormObject.fileFullName);
        eventPhotosStore.setValue(itemToUpdate, "title", eventPhotoDetailsFormObject.title);

        eventPhotosStore.save();

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
    var photoId = itemsArrayIds[currentItemIndex];
    viewEventPhotoDetails(photoId);
}

function viewPrevousItemDetails() {
    currentItemIndex = getPreviousItemIndex();
    var photoId = itemsArrayIds[currentItemIndex];
    viewEventPhotoDetails(photoId);
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

function saveEventPhotoChanges() {
    submitEventPhotoDetailsForm(currentEventPhotoId);
    if ($("#" + viewItemDetailsDialogId) != null) {
        $("#" + viewItemDetailsDialogId).modal("hide");
    }
}

function shortDateField(data) {
    var strDate = strToShortDate(new String(data));
    debugMessageToConsole("shortDateFieldFormatter strDate: " + strDate, lowLevel);
    return dojo.date.locale.format(strDate, {formatLength: "short", selector: "date", timePattern: "HH:mm:ss"});
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

function uploadSelectedEventPhotos(formId, _callbackMethod) {
    var formData = null;  
    //var formId = "eventPhotoDetailsForm";
    if (window.FormData) {
        formData = new FormData($("#" + formId)[0]);
    }
    else {
        formData = $("#" + formId).serialize();
    }

    $.ajax({
        url: "../../Controllers/UploadFileController.php", //Server script to process data
        type: "POST",
        xhr: function () {  // Custom XMLHttpRequest
            var uploaderXhr = $.ajaxSettings.xhr();
            if (uploaderXhr.upload) { // Check if upload property exists
                uploaderXhr.upload.addEventListener('progress', progressHandlingCallback, false); // For handling the progress of the upload
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
            alert('error occured on uploading: ' + err);
        },
        // Form data
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



function addEventPhotos() {

    // step 1. upload selected photos
    uploadSelectedEventPhotos(eventPhotoDetailsFormId, uploadPhotosCompleted);
    
    function uploadPhotosCompleted(data) {
        jsonData = $.parseJSON(data);
        //alert(data);
        var fileNamesArray = new Array();
        $.each(jsonData, function(index, item){
            //alert('Name: ' +  item.entryKey + ' Status: ' +  item.status);
            fileNamesArray.push(item.entryKey);
        });
        // setp 2: 
        var postParameters = {
            "fileNamesList[]": fileNamesArray
            , "eventId": $("#eventId").val()
            , "title": $("#title").val()
            , "userAction": "assignPhotosToEvent"
        };
        var xhrArgs = {
            url: controllerUrl,
            postData: postParameters,
            handleAs: postDataFormat,
            method: postMethod,
            error: function (errorMsg) {
                logError({message: "Failed to assign photos .Error: " + errorMsg});
            }
        };
        // send async xhr request to server
        sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
            xhrArgs.error, assignPhotosToEventCompleted);
        //get postback result
        function assignPhotosToEventCompleted(data) {

            debugMessageToConsole("assignPhotosToEventCompleted data : " + data, highLevel);
            // get json result
            var jsonData = data;
            // clear error message
            $("#" + errorContentDivId).html("");
            if (jsonData == null) {
                displayErrorContent(errorContentDivId, "assignPhotosToEventCompleted: " + jsonErrorMsg);
                return;
            }
            else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
                displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
                return;
            }
            
            var itemToAdd = {};
            if (eventPhotosStore != null && fileNamesArray != null) {
                $.each(fileNamesArray, function(index, fileFullName){
                    //alert('Name: ' +  item.entryKey + ' Status: ' +  item.status);
                     itemToAdd.photoId = 12 * (index + 1);
                     itemToAdd.fileFullName = fileFullName;
                     itemToAdd.eventTitle = $("#eventId").find("option:selected").text();
                     itemToAdd.title = $("#title").val();
                     // redisplay data grid    
                     eventPhotosStore.newItem(itemToAdd);
                });
                // display overlay message
                showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationCreationLabel, successImg);
            }
        }
         
         
    }
    
    
     
    



    

    

}




            