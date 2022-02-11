<?php

/**
 * ViewAllConferences page content
 * Display all conferences items
 * @author Guy Watcho
 */


    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";

    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa eV - Conferences';
    // load UI resource
    Utils::loadUIResources("../../UIResources/conferences.fr.res.php", "../../UIResources/conferences.en.res.php");

    // custon page script, if needed
    $script = '
        <!--language texts for page -->
        <script  type="text/javascript">

        var pageLangTexts = {
		  viewAllItemsBtnLabel : "'.ConferenceUIResource::viewAllItemsBtnLabelText().'",
          viewDetailsBtnLabel : "'.ConferenceUIResource::viewDetailsBtnLabelText().'",
          updateItemBtnLabel : "'.ConferenceUIResource::updateItemBtnLabelText().'",
          viewPreviousItemBtnLabel : "'.ConferenceUIResource::viewPreviousItemBtnLabelText().'",
          viewNextItemBtnLabel : "'.ConferenceUIResource::viewNextItemBtnLabelText().'",
          saveItemBtnLabel : "'.ConferenceUIResource::saveItemBtnLabelText().'",
          cancelUpdateItemBtnLabel : "'.ConferenceUIResource::cancelUpdateItemBtnLabelText().'",
          cancelAddItemBtnLabel : "'.ConferenceUIResource::cancelAddItemBtnLabelText().'",

          addNewItemBtnLabel : "'.ConferenceUIResource::addNewItemBtnLabelText().'",
          deleteItemsBtnLabel : "'.ConferenceUIResource::deleteItemsBtnLabelText().'",
          finishBtnLabel : "'.ConferenceUIResource::finishBtnLabelText().'",
          editItemBtnLabel : "'.ConferenceUIResource::editItemBtnLabelText().'",
          okBtnLabel : "'.ConferenceUIResource::okBtnLabelText().'",
          confirmDeletionLabel : "'.ConferenceUIResource::confirmDeletionLabelText().'",
          confirmationCreationLabel :  "'.ConferenceUIResource::confirmationCreationLabelText().'",
          confirmationUpdateLabel : "'.ConferenceUIResource::confirmationUpdateLabelText().'",
          confirmationDeletionLabel : "'.ConferenceUIResource::confirmationDeletionLabelText().'",

          oneSelectedItemLabel : "'.ConferenceUIResource::oneSelectedItemLabelText().'",
          manySelectedItemsLabel : " '.ConferenceUIResource::manySelectedItemsLabelText().'",
          sectionViewTitleLabel : "'.ConferenceUIResource::sectionViewTitleLabelText().'",

          emptyDataLabel : "'.ConferenceUIResource::emptyDataLabelText().'",
          viewAllItemsLabel : "'.ConferenceUIResource::viewAllItemsLabelText().'",
          loadingMessageLabel : "'.ConferenceUIResource::loadingMessageLabelText().'",
          noDataMessageLabel : "'.ConferenceUIResource::noDataMessageLabelText().'",  
          errorMessageLabel : "'.ConferenceUIResource::errorMessageLabelText().'",
          filterItemsNameLabel : "'.ConferenceUIResource::filterItemsNameLabelText().'",
          backBtnLabel : "'.ConferenceUIResource::backBtnLabelText().'",

          createNewItemTitleLabel : "'.ConferenceUIResource::createNewItemTitleLabelText().'",
          viewItemDetailsTitleLabel : "'.ConferenceUIResource::viewItemDetailsTitleLabelText().'",
          updateItemDetailsTitleLabel : "'.ConferenceUIResource::updateItemDetailsTitleLabelText().'",

          titleColLabel : "'.ConferenceUIResource::viewAllItemsBtnLabelText().'",
          descriptionColLabel : "'.ConferenceUIResource::descriptionColLabelText().'",
          
          noItemSelectedLabel : "'.ConferenceUIResource::noItemSelectedLabelText().'",

          editItemDetailsTitleLabel : "'.ConferenceUIResource::editItemDetailsTitleLabelText().'",
          menuItemSectionTitleLabel : "'.ConferenceUIResource::menuItemSectionTitleLabelText().'",
          subMenuItemSectionTitleLabel : "'.ConferenceUIResource::subMenuItemSectionTitleLabelText().'"
		  };

        </script>
        ';

// page content
    $content = '
    <script  src="../../Scripts/conferenceScript.js"  type="text/javascript"> </script>

    <div id="sitePathDiv"></div>
    <br />
	<!-- main section title -->
    <div id="sectionTitleAndToolbarBtnDiv" class="hideContent">
        <table class="fullWidth  zeroPadding zeroSpacing cellspacing0">
            <tr>
                <td class="toLeft sectionTitleDiv fullWidth">
                    <label>Conferences List</label>
                </td>
            </tr>
            <tr>
                <td class="toLeft fullWidth">
                    <div> &nbsp;</div>
                </td>
            </tr>
        </table>
        <!-- main toolbar -->
        <table class="fullWidth hideContent cellspacing0"   id="toolbarButtonsTable">
            <tr>
                <td class="toLeft zeroPadding" align="left">
                    <div data-dojo-typeAA="dijit/Toolbar">
                        <table class="fullWidth cellspacing2 cellpadding2">
                            <tr>
                                <td class="toLeft">
                                    <div id="toolbarButtonsDiv" class="hideContent">
                                        <span id="spanAddNewItemBtn" class="hideContent">
                                            <button data-dojo-type="dijit/form/Button" id="addNewItemBtn"
                                                    data-dojo-props=" iconClass:\'flat-add\',
                                                    onClick:function(){ displayConferenceView(addNewItemCmd); }"
                                                    type="button"  title="Add new Conference">
                                                <span>Add new Conference</span>
                                            </button>
                                        </span>
                                        <span id="spanDeleteItemsBtn" class="hideContent">
                                            <button data-dojo-type="dijit/form/Button" id="deleteItemsBtn"
                                                    data-dojo-props=" iconClass:\'dijitIconDelete\',
                                                    onClick:function(){ deleteItemBtnClick(); }"
                                                    type="button" title="Delete">
                                                <span>Delete</span>
                                            </button>
                                        </span>
                                        <span id="spanViewAllItemBtn" class="hideContent">
                                            <button data-dojo-type="dijit/form/Button" id="viewAllItemBtn"
                                                    data-dojo-props=" iconClass:\'dijitIconViewAllItems\',
                                                    onClick:function(){ generateConferencesDataGrid(itemsGridDivId); }"
                                                    type="button" title="Back to List">
                                                <span>Back to List</span>
                                            </button>
                                        </span>
                                        <span id="spanEditItemBtn" class="hideContent">
                                            <button data-dojo-type="dijit/form/Button" id="editItemBtn"
                                                    data-dojo-props=" iconClass:\'dijitIconEditDetails\',
                                                    onClick:function(){ displayConferenceView(editItemDetailsCmd); }"
                                                    type="button" title="Edit">
                                                <span>Edit</span>
                                            </button>
                                        </span>
                                        <span id="spanSaveChangesBtn" class="hideContent">
                                            <button data-dojo-type="dijit/form/Button" id="saveChangesBtn"
                                                    data-dojo-props=" iconClass:\'dijitIconSaveChange\',
                                                    onClick:function(){ addNewConference(); }"
                                                    type="button" title="Save">
                                                <span>Save</span>
                                            </button>
                                        </span>
                                        <span id="spanCancelChangesBtn" class="hideContent">
                                            <button data-dojo-type="dijit/form/Button" id="cancelChangesBtn"
                                                    data-dojo-props=" iconClass:\'dijitIconCancelChange\',
                                                    onClick:function(){ displayConferenceView(cancelChangesCmd); }"
                                                    type="button" title="Cancel">
                                                <span>Cancel</span>
                                            </button>
                                        </span>
                                        <span id="spanCancelAddItemBtn" class="hideContent">
                                            <button data-dojo-type="dijit/form/Button" id="cancelAddItemBtn"
                                                    data-dojo-props=" iconClass:\'dijitIconCancelChange\',
                                                    onClick:function(){ generateConferencesDataGrid(itemsGridDivId); }"
                                                    type="button">
                                                <span>Cancel</span>
                                            </button>
                                        </span>
                                        <span id="spanMoveUpBtn" class="hideContent">
                                            <button data-dojo-type="dijit/form/Button" id="moveUpBtn"
                                                    data-dojo-props=" iconClass:\'dijitIconUp\', showLabel: false,
                                                    onClick:function(){ viewPrevousItemDetails(); }"
                                                    type="button" title="View previous Conference">
                                                <span>View previous Conference</span>
                                            </button>
                                        </span>
                                        <span id="spanMoveDownBtn" class="hideContent">
                                            <button data-dojo-type="dijit/form/Button" id="moveDownBtn"
                                                    data-dojo-props=" iconClass:\'dijitIconDown\', showLabel: false,
                                                    onClick:function(){ viewNextItemDetails(); }"
                                                    type="button" title="View next Conference">
                                                <span>View next Conference</span>
                                            </button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>

            </tr>
        </table>
    </div>

    <br />
    <!-- data view header -->
    <table class="hideContent fullWidth hideBorder cellspacing0" id="dataViewHeader" >
        <tr class="sectionTitleColor">
            <td class="toCenter toogleImg cellpadding2">
                <img src="../../Resources/Images/Buttons/expanded.jpg" alt="show or hide data"
                   title="show or hide content"   class="collapseImg" id="gridImg" />
            </td>
            <td class="toLeft cellpadding2">
                <label id="viewLabel">All Conferences</label>
            </td>
        </tr>
    </table>
    <div id="errorContentDiv"></div>
    <!-- data items view div -->
    <div id="gridDataViewDiv" style="display:block;">
        <table class="hideBorder fullWidth cellspacing0">
            <tr>
                <td class="cellpadding0">
                    <table class="fullWidth hideBorder cellspacing0">
                        <tr>
                            <td class="fullWidth cellpadding0">
                                <div id="resultsDivId" class="selectedItemsDiv"></div>
                                <!-- datagrid items view -->
                                <div id="conferencesGridDiv"></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="toCenter">
                                <!-- item details view -->
                                <table class="biggerWidth">
                                    <tr>
                                        <td class="fullWidth">
                                            <div id="conferenceDetailsDiv"></div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
    </div>

    <!-- view Item details div content-->
    <div class="hideContent" id="viewItemDetailsFormContentDiv">
        <div id="dataViewDiv" class="_lowestOpacity">
            <table class="fullWidth formContent" >
                <tr>
                    <td align="center">
                        <div class="fieldDiv">
                            <table class="fullWidth cellspacing5 cellpadding5" cellspacing="5" cellpadding="5">
                                 <tr>
                                    <td class="toLeft createFormLabelCol">
                                        <label for="dateLabel">Date:</label>
                                    </td>
                                    <td class="toLeft createFormInputCol">
                                        <label class="dataViewLabel" id="dateLabel"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="toLeft createFormLabelCol">
                                        <label for="titleLabel">Title:</label>
                                    </td>
                                    <td class="toLeft createFormInputCol">
                                        <label class="dataViewLabel" id="titleLabel"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="toLeft createFormLabelCol">
                                        <label for="locationLabel">Location:</label>
                                    </td>
                                    <td class="toLeft createFormInputCol">
                                        <label class="dataViewLabel" id="locationLabel"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="toLeft createFormLabelCol">
                                        <label for="summaryLabel">Summary:</label>
                                    </td>
                                    <td class="toLeft createFormInputCol">
                                        <label class="dataViewLabel" id="summaryLabel"></label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <br />
    </div>

    <!-- edit/create Item div content -->
    <div class="hideContent" id="editItemDetailsFormContentDiv">
        <div id="dataEditDiv" class="_lowestOpacity">
            <table class="fullWidth">
                <tr>
                    <td class="fullWidth">
                        <div class="formContent fullWidth">
                            <div data-dojo-type="dijit/form/Form" id="conferenceDetailsForm" data-dojo-id="conferenceDetailsForm" encType="multipart/form-data">
                                <table class="fullWidth cellspacing0 cellpadding0">
                                    <tr>
                                        <td align="center">
                                            <div class="fieldDiv">
                                                <table class="fullWidth" cellspacing="5" cellpadding="5">
                                                     <tr>
                                                        <td class="toLeft createFormLabelCol">
                                                            <label for="date">Date:</label>
                                                        </td>
                                                        <td class="toLeft createFormInputCol">
                                                            <input type="text" id="date" name="date"  
                                                                   data-dojo-type=dijit/form/DateTextBox />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="toLeft createFormLabelCol">
                                                            <label for="title">Title:</label>
                                                        </td>
                                                        <td class="toLeft createFormInputCol">
                                                            <input type="text" id="title" name="title"  
                                                                   data-dojo-type=dijit/form/TextBox />
                                                        </td>
                                                    </tr>
                
                                                    <tr>
                                                        <td class="toLeft createFormLabelCol">
                                                            <label for="location">Location:</label>
                                                        </td>
                                                        <td class="toLeft createFormInputCol">
                                                            <input type="text" id="location" name="location"  
                                                                   data-dojo-type=dijit/form/TextBox />
                                                        </td>
                                                    </tr>
                
                                                    <tr>
                                                        <td class="toLeft createFormLabelCol">
                                                            <label for="summary">Summary:</label>
                                                        </td>
                                                        <td class="toLeft createFormInputCol">
                                                            <input type="text" id="summary" name="summary"  
                                                                   data-dojo-type=dijit/form/Textarea />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <br />
    </div>


    <!-- success overlay content -->
    <div id="successOverlayDiv"></div>

    <!-- confirmation delete dialog content -->
    <div class="hideContent" id="confirmDialogDiv">
        <div data-dojo-type="dijit/Dialog" data-dojo-id="confirmDialog"
             id="confirmDialog" title="Delete Item(s)">
            <table class="dijitDialogPaneContentArea">
                <tr>
                    <td class="toCenter">
                        <label class="">Do you really want to delete selected Conference(s)? </label>
                    </td>
                </tr>
            </table>
            <div class="dijitDialogPaneActionBar">
                <button data-dojo-type="dijit/form/Button"
                        data-dojo-props="onClick:function(){if(confirmDialog != null) confirmDialog.hide();
                        onConfirmItemsDeletion();}"
                        type="button" id="okBtnDialog">
                        <span>OK</span>
                    </button>
                <button data-dojo-type="dijit/form/Button" type="button"
                        data-dojo-props="onClick:function(){if(confirmDialog != null) confirmDialog.hide();}"
                        id="cancelBtnDialog" title="Cancel">
                    <span>Cancel</span>
                </button>
            </div>
        </div>

        <!--- add item dialog -->
        <div data-dojo-type="dijit/Dialog" data-dojo-id="addNewItemDialog"
             id="addNewItemDialog" title="Add new Item">
            <table class="dijitDialogPaneContentArea">
                <tr>
                    <td class="toCenter">
                        <div id="addNewItemDialogContent"></div>
                    </td>
                </tr>
            </table>
            <div class="dijitDialogPaneActionBar">
                <button data-dojo-type="dijit/form/Button"
                    class="alt-primary" title="Add item"
                    data-dojo-props="onClick:function(){
                     validateBeforeAddNewConference();}"
                    type="button" id="okAddBtnDialog">
                    <span>Add Conference</span>
                </button>
                <button data-dojo-type="dijit/form/Button" type="button"
                        data-dojo-props="onClick:function(){if(addNewItemDialog != null) addNewItemDialog.hide();}"
                        id="cancelAddBtnDialog" title="Cancel">
                    <span>Cancel</span>
                </button>
            </div>
        </div>

        <!--- view/edit item dialog -->
        <div data-dojo-type="dijit/Dialog" data-dojo-id="viewItemDetailsDialog"
             id="viewItemDetailsDialog" title="View Item Details">
            <table class="dijitDialogPaneContentArea">
                <tr>
                    <td class="toCenter">
                        <div id="viewItemDetailsDialogContent"></div>
                    </td>
                </tr>
            </table>
            <div class="dijitDialogPaneActionBar">
                <span id="spanEditItemBtnDialogDialog" class="hideContent">
                    <button data-dojo-type="dijit/form/Button"
                        class="alt-primary" title="Edit"
                        data-dojo-props="onClick:function(){ 
                         displayConferenceView(editItemDetailsCmd);}"
                        type="button" id="editItemBtnDialog">
                        <span>Edit Conference</span>
                    </button>
                </span>
                <span id="spanCloseEditBtnDialog" class="hideContent">
                    <button data-dojo-type="dijit/form/Button" type="button"
                        data-dojo-props="onClick:function(){ if(viewItemDetailsDialog != null) viewItemDetailsDialog.hide();}"
                        id="closeEditBtnDialog" title="Close">
                        <span>Close</span>
                    </button>
                </span>
                <span id="spanSaveChangesBtnDialog" class="hideContent">
                    <button data-dojo-type="dijit/form/Button" id="saveChangesBtnDialog"
                        class="alt-primary"
                        data-dojo-props="  
                            onClick:function(){ saveConferenceChanges(); }"
                        type="button" title="Save">
                        <span>Save</span>
                    </button>
                </span>
                <span id="spanCancelChangesBtnDialog" class="hideContent">
                    <button data-dojo-type="dijit/form/Button" id="cancelChangesBtnDialog"
                            data-dojo-props="  
                            onClick:function(){ displayConferenceView(cancelChangesCmd);  }"
                            type="button" title="Cancel">
                        <span>Cancel</span>
                    </button>
                </span>
            </div>
        </div>

    </div>
    ';
    $mainPage->setUseDojoScripts(true);
    $mainPage->setActiveMenu("administration");
    $mainPage->setDirectoryLevel(2);
    $mainPage->setUserLanguage($userLang);
    $mainPage->setShouldDisplayLanguageSelection(true);
    $mainPage->setPageJscript($script);
    $mainPage->setTitle($title);
    $mainPage->setContent($content);
    $mainPage->displayPage();




