/**
 * Script to manage a  User model entity.
 * @author
 *     Guy Bami W.
 * Created changes: 31.03.2017 20:24:57
 */

// global varaibles
var usersStore = null;
var usersGrid = null;
var currentItemIndex = -1;
var itemsArrayIds = new Array();
var currentUserId = -1;

// some user actions commands
var viewAllItemsCmd = "viewAllUsers";
var editItemDetailsCmd = "editDetails";
var viewItemDetailsCmd = "viewDetails";
var addNewItemCmd = "addNewItem";
var insertNewItemCmd = "insertNewItem";
var cancelChangesCmd = "cancelChanges";
var saveChangesCmd = "saveChanges";

// controls and page divs Ids
var toolbarButtonsDivId = "toolbarButtonsDiv";
var dataItemsGridId = "usersGrid";
var itemDetailsDivId = "userDetailsDiv";
var itemsGridDivId = "usersGridDiv";
var itemDetailsFormId = "userDetailsForm";
var userDetailsFormId = "userDetailsForm";
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
var userDetailsDialogId = "userDetailsDialog";
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
var controllerUrl = "../../Controllers/UserController.php";
var postDataFormat = "text";
var postMethod = "POST";

// flags used to check user role
var readItemRight = true;
var addNewItemRight = true;
var deleteItemRight = true;
var editItemRight = true;

var menuItemSectionTitleLabel = "Administration";
var subMenuItemSectionTitleLabel = "Users";

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
                        curmo.entityType = curmo.entityTypesObject.User;
                        readItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.User, curmo.accessRightsObject.readRight);
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
                        generateUsersDataGrid(itemsGridDivId);
                    } else {
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
            } catch (err) {
                logError(err);
            }
        });
    });

function setLabelFields(jsonData) {

    $("#loginNameLabel").html(jsonData[0].loginName);
    $("#hashPasswordLabel").html(jsonData[0].hashPassword);
    $("#nameLabel").html(jsonData[0].name);
    $("#lastNameLabel").html(jsonData[0].lastName);
    $("#phoneNumberLabel").html(jsonData[0].phoneNumber);
    $("#emailLabel").html(jsonData[0].email);

}

function setTextFields(jsonData) {

    setFormFieldValue("loginName", jsonData[0].loginName);
    setFormFieldValue("hashPassword", jsonData[0].hashPassword);
    setFormFieldValue("name", jsonData[0].name);
    setFormFieldValue("lastName", jsonData[0].lastName);
    setFormFieldValue("phoneNumber", jsonData[0].phoneNumber);
    setFormFieldValue("email", jsonData[0].email);

}

function settersMethodWithDefaultValues() {

    setFormFieldValue("loginName", "loginName-e46bc06");
    setFormFieldValue("hashPassword", "hashPassword-38ef4b6");
    setFormFieldValue("name", "name-8137471");
    setFormFieldValue("lastName", "lastName-35c5a2c");
    setFormFieldValue("phoneNumber", "phoneNumber-4dff7cc");
    setFormFieldValue("email", "email-bcbf5e0");

}

/**
 * generate dynamic Users datagrid
 * @param {string} targetDiv
 * @returns {none}
 */
function generateUsersDataGrid(targetDiv) {

    var windowWidth = $(window).width() - 200;
    var loginNameColWidth = windowWidth * 0.17 + "px";
    var hashPasswordColWidth = windowWidth * 0.17 + "px";
    var nameColWidth = windowWidth * 0.17 + "px";
    var lastNameColWidth = windowWidth * 0.17 + "px";
    var phoneNumberColWidth = windowWidth * 0.17 + "px";
    var emailColWidth = "auto";

    // manage user role
    var dataEditable = true;
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        curmo.entityType = curmo.entityTypesObject.User;
        dataEditable = curmo.getAccessRightByEntityType(curmo.entityTypesObject.User, curmo.accessRightsObject.editRight);
    }

    var columsLayout = [
        {
            name: pageLangTexts.loginNameColLabel == null ? "LoginName" : pageLangTexts.loginNameColLabel,
            field: "loginName",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: loginNameColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }
        /*
        , {
            name: pageLangTexts.hashPasswordColLabel == null ? "HashPassword" : pageLangTexts.hashPasswordColLabel,
            field: "hashPassword",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: hashPasswordColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }
        */
        , {
            name: pageLangTexts.nameColLabel == null ? "Name" : pageLangTexts.nameColLabel,
            field: "name",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: nameColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }

        , {
            name: pageLangTexts.lastNameColLabel == null ? "LastName" : pageLangTexts.lastNameColLabel,
            field: "lastName",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: lastNameColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }

        , {
            name: pageLangTexts.phoneNumberColLabel == null ? "PhoneNumber" : pageLangTexts.phoneNumberColLabel,
            field: "phoneNumber",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: phoneNumberColWidth,
            widgetClass: dijit.form.TextBox,
            widgetProps: {}
        }

        , {
            name: pageLangTexts.emailColLabel == null ? "Email" : pageLangTexts.emailColLabel,
            field: "email",
            dataType: "string",
            editable: dataEditable,
            type: dojox.grid.cells._Widget,
            width: emailColWidth,
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
            displayErrorContent("errorContentDiv", "Failed to get all users from server: " + errorMsg);
            logError({
                message: "Failed to get all users from server: \n" + errorMsg
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

        usersStore = new dojo.data.ItemFileWriteStore({
            data: {
                identifier: "userId",
                items: jsonData
            }
        });

        if (usersStore != null) {
            // save data store
            usersStore.save({
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
            usersStore.comparatorMap = {};
            usersStore.comparatorMap["loginName"] = compareStringIgnoreCase;
            //usersStore.comparatorMap["hashPassword"] = compareStringIgnoreCase;
            usersStore.comparatorMap["name"] = compareStringIgnoreCase;
            usersStore.comparatorMap["lastName"] = compareStringIgnoreCase;
            usersStore.comparatorMap["phoneNumber"] = compareStringIgnoreCase;
            usersStore.comparatorMap["email"] = compareStringIgnoreCase;

            //destroy old controls
            destroyWidget(dataItemsGridId);
            // create datagrid
            usersGrid = new dojox.grid.EnhancedGrid({
                id: dataItemsGridId,
                store: usersStore,
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
                        itemsName: "Users"
                    }
                }
            });

            // set sort index col
            setSortColumnsIndexes(usersGrid, 2, true);
            // add events trigger
            usersGrid.on("SelectionChanged", reportSelection);
            usersGrid.on("StartEdit", gridStartEdit);
            usersGrid.on("ApplyCellEdit", gridApplyCellEdit);
            usersGrid.placeAt(targetDiv);
            // parse datagrid
            usersGrid.startup();
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
                obj["entityKeyId"] = storeItem["userId"].toString();
                var itemId = storeItem["userId"].toString();
                var jsonValues = dojo.toJson(obj);
                debugMessageToConsole("jsonValues: " + jsonValues, highLevel);
                submitInlineGridChanges(itemId, jsonValues);
            }
        }
    }

}

function displayUserView(userAction) {

    var userId = currentUserId;
    debugMessageToConsole("userId:" + userId, highLevel);
    debugMessageToConsole("userAction: " + userAction, highLevel);

    var windowHeight = $(window).height();
    var windowWidth = $(window).width();

    var postParameters = {
        "userId": userId,
        "userAction": userAction
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({
                message: "Reponse failed to get user details with error: " + errorMsg
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
            displayErrorContent(errorContentDivId, "displayUserView: " + jsonErrorMsg);
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

function viewUserDetails(userId) {
    currentUserId = userId;
    currentItemIndex = getCurrentItemIndex(userId);
    displayUserView(viewItemDetailsCmd);
}

function createToolbarBtns(userAction) {

    // check user role
    if (customUserRolesManagerObject != null && customUserRolesManagerObject.userRolesData.length > 0) {
        var curmo = customUserRolesManagerObject; // short name
        if (!customUserRolesManagerObject.rolesLoaded) {
            // load roles only once
            curmo.entityType = curmo.entityTypesObject.User;
            addNewItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.User, curmo.accessRightsObject.createRight);
            editItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.User, curmo.accessRightsObject.editRight);
            deleteItemRight = curmo.getAccessRightByEntityType(curmo.entityTypesObject.User, curmo.accessRightsObject.deleteRight);
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

    if (usersGrid != null) {
        var items = usersGrid.selection.getSelected();
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

    if (usersGrid != null) {
        var items = usersGrid.selection.getSelected();
        if (items.length > 0) {
            selectedIdsArray = new Array();
            for (var i = 0; i < items.length; i++) {
                itemId = usersGrid.store.getValue(items[i], "userId");
                itemId = $.trim(itemId);
                selectedIdsArray.push(itemId);
            }
            // close dialog
            closeConfirmDeletionModalDialog();
            // now delete items
            deleteSeletedUsers(selectedIdsArray);
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
        validateBeforeAddNewUser();
    });
    $("#" + editItemBtnDialogId).click(function () {
        displayUserView(editItemDetailsCmd);
    });

    $("#" + closeEditBtnDialogId).click(function () {
        closeViewItemDetailsDialog();
    });
    $("#" + saveChangesBtnDialogId).click(function () {
        saveUserChanges();
    });
    $("#" + cancelChangesBtnDialogId).click(function () {
        displayUserView(cancelChangesCmd);
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

    $("#" + userDetailsFormId).validate({
        rules: {

        },
        messages: {

        },
        submitHandler: function (form) {

        },
        invalidHandler: function (form, validator) {
            console.log(validator.numberOfInvalids());
        },
        highlight: function (element, errorClass, validClass) {
            $(element).closest(".form-group").addClass("has-error");
        },
        unhighlight: function (element, errorClass, validClass) {

            $(element).closest(".form-group").removeClass("has-error");
        }
    });

}

function validateBeforeAddNewUser() {

    var isFormInputsValid = $("#" + userDetailsFormId).valid();

    //validate password
    function validatePassword() {
        if ($("#hashPassword").value != $("#confirm_hashPassword").value) {
            isFormInputsValid = false;
        } else {
            
        }
    }


    if (isFormInputsValid) {
        // close dialog
        closeAddEditItemDialog();
        // add callback
        addNewUser();
    }
}

function showAddItemDialog() {

    if ($("#" + userDetailsDialogId) != null) {
        // set content dialog
        $("#" + addNewItemDialogContentId).html(editItemDetailsFormContent);
        // set textfields values when Dojo parsing completed
        settersMethodWithDefaultValues();
        $("#" + userDetailsDialogId).modal("show");
    }
}

function closeAddEditItemDialog() {
    if ($("#" + userDetailsDialogId) != null) {
        $("#" + userDetailsDialogId).modal("hide");
    }
}

function closeConfirmDeletionModalDialog() {
    if ($("#" + confirmDeletionDialogId) != null) {
        $("#" + confirmDeletionDialogId).modal("hide");
    }
}

function addNewUser() {

    var userDetailsFormObject = $("#" + userDetailsFormId).serializeObject();
    // convert form to json object
    var itemToAdd = userDetailsFormObject;
    itemToAdd = userDetailsFormObject;
    var postParameters = {
        "formValues[]": dojo.toJson(userDetailsFormObject, true),
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
    function addNewUserCompleted(data) {

        debugMessageToConsole("addNewUserCompleted data : " + data, highLevel);
        // get json result
        var jsonData = data;
        // clear error message
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "addNewUserCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationCreationLabel, successImg);

        if (usersStore != null && jsonData[0].insertedItemKey != null) {
            itemToAdd.userId = jsonData[0].insertedItemKey;
            // redisplay data grid    
            usersStore.newItem(itemToAdd);
        }
    }

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, addNewUserCompleted);

}

function submitInlineGridChanges(userId, jsonValues) {

    var postParameters = {
        "userId": userId,
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

function deleteSeletedUsers(userIdsList) {
    var postParameters = {
        "selectedIds[]": userIdsList,
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
        xhrArgs.error, deleteSeletedUsersCompleted);
    //get postback result
    function deleteSeletedUsersCompleted(data) {

        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent("errorContentDiv", "deleteSeletedUsersCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // delete items in store
        var itemsToDelete = usersGrid.selection.getSelected();
        $.each(itemsToDelete, function (index, item) {
            if (item) {
                usersStore.deleteItem(item);
            }
        });
        // save datastore
        usersStore.save();
        // display overlay message
        showSuccessOverlay(successOverlayDivId, pageLangTexts.confirmationDeletionLabel, successImg);

        $("#" + resultsDivId).html("");
    }

}

function submitUserDetailsForm(userId) {

    //if (!userDetailsForm.validate()) {
    //    return;
    //}
    // convert form to json object
    var userDetailsFormObject = $("#" + userDetailsFormId).serializeObject();

    // convert to json arry
    var jsonValues = dojo.toJson(userDetailsFormObject);

    var postParameters = {
        "userId": userId,
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
        xhrArgs.error, submitUserDetailsCompleted);
    //get postback result
    function submitUserDetailsCompleted(data) {
        //debugMessageToConsole(" UserDetailsForm-postback: " + $.trim(data), highLevel);
        var jsonData = data;
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "submitUserDetailsCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }

        // get item to update
        var itemToUpdate = usersGrid.getItem(currentItemIndex);

        usersStore.save();

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
    var userId = itemsArrayIds[currentItemIndex];
    viewUserDetails(userId);
}

function viewPrevousItemDetails() {
    currentItemIndex = getPreviousItemIndex();
    var userId = itemsArrayIds[currentItemIndex];
    viewUserDetails(userId);
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

function saveUserChanges() {
    submitUserDetailsForm(currentUserId);
    if ($("#" + viewItemDetailsDialogId) != null) {
        $("#" + viewItemDetailsDialogId).modal("hide");
    }
}

function shortDateField(data) {
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