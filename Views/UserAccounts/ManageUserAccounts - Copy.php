
<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'Blue Money - User Accounts';
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
        <script defer src="../../Scripts/conferenceScript.js"  type="text/javascript"> </script> 

        <script type="text/javascript">
            /*
            $(document).ready(function () {
                 
                $("#date").datetimepicker({
                    locale: "de", format: "L"
                });
            });
            */

        </script>
        <style>
            .toRAA{
                text-align:right;
                width: 100%;
                border: 1px solid red;
            }
        </style>

        ';
    /// page content
    $content = ' 
        <div id="sitePathDiv"></div>
         
          <!-- page content -->
          <div class="row">
            <div class="container">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>User Accounts</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Delete selected</a>
                                            </li>
                                            <li><a href="#">Add newaccount</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div> <!-- close x_title -->
                            <div class="x_content">
                                <div id="sectionTitleAndToolbarBtnDiv" class="hideContent">
                                <!-- main toolbar -->
                                    <table class="fullWidth hideContent zeroSpacing zeroPadding"   id="toolbarButtonsTable">
                                        <tr>
                                            <td class="toLeft zeroPadding" align="left">
                                                <div>
                                                    <table class="fullWidth cellspacing2 cellpadding2">
                                                        <tr>
                                                            <td class="toLeft">
                                                                <div id="toolbarButtonsDiv" class="hideContent">
                                                                    <span id="spanAddNewItemBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" 
                                                                          id="addNewItemBtn" onClick="showAddItemDialog();">
                                                                            <span class="glyphicon glyphicon-plus"></span> 
                                                                             Add New Conference
                                                                         </button>
                                                                    </span>
                                                                    <span id="spanDeleteItemsBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="deleteItemsBtn" onClick="deleteItemBtnClick();">
                                                                            <span class="glyphicon glyphicon-trash"></span> Delete  
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
								<!-- end main toolbar -->
                                <br />

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
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- end data items view div -->


								<!-- Add item modal dialog form -->
                                <div id="conferenceDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add new Item</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="addNewItemDialogContent"></div>
                                            </div> <!-- end modal body -->
                                            <div class="modal-footer">
                                                <table class="fullWidth">
                                                    <tr>
                                                        <td>
                                                            <table align="right">
                                                                <tr>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-primary"
                                                                            onClick="validateBeforeAddNewConference();">Add Item</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<!-- end Add modal dialog form --> 

                                <!-- View/Edit item modal dialog form -->
                                <div id="viewItemDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Conference Item</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="viewItemDetailsDialogContent"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <table class="fullWidth">
                                                        <tr>
                                                            <td>
                                                                <table align="right">
                                                                    <tr>
                                                                        <td class="toRight">
                                                                            <span id="spanEditItemBtnDialogDialog" class="hideContent">
                                                                                <button  class="btn btn-primary"
                                                                                     title="Edit"
                                                                                     onClick="displayConferenceView(editItemDetailsCmd);"
                                                                                    type="button" id="editItemBtnDialog">
                                                                                    <span>Edit Conference</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCloseEditBtnDialog" class="hideContent">
                                                                                <button   type="button" class="btn btn-default"
                                                                                     onClick="closeViewItemDetailsDialog();"
                                                                                    id="closeEditBtnDialog" title="Close">
                                                                                    <span>Close</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                              <span id="spanSaveChangesBtnDialog" class="hideContent">
                                                                                <button   id="saveChangesBtnDialog"
                                                                                    class="btn btn-primary"
                                                                                    onClick="saveConferenceChanges();"
                                                                                    type="button" title="Save">
                                                                                    <span>Save</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCancelChangesBtnDialog" class="hideContent">
                                                                                <button  id="cancelChangesBtnDialog" class="btn btn-default"
                                                                                    onClick="displayConferenceView(cancelChangesCmd);"
                                                                                    type="button" title="Cancel">
                                                                                    <span>Cancel</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                    </div>
                                </div>
								<!-- end View modal dialog form -->   

  

                                <!-- Confirm deletion dialog form -->
                                <div id="confirmDeletionDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- confirm delete Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Confirm Deletion</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <table class="fullWidth cellspacing5 cellpadding5">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <label class="">Do you really want to delete selected Conference(s)? </label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <table class="fullWidth">
                                                    <tr>
                                                        <td>
                                                            <table align="right">
                                                                <tr>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-primary"
                                                                            onClick="onConfirmItemsDeletion();">OK</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default confirmDeletion" data-dismiss="modal">Cancel</button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<!-- end Confirm deletion modal dialog form -->    
         
                                <!-- view Item details div content-->
                                <div class="hideContent" id="viewItemDetailsFormContentDiv">
                                    <div class="container">
                                        <table class="fullWidth cellspacing5 cellpadding5" cellspacing="5" cellpadding="5">
                                            <tr>
                                                <td class="toLeft createFormLabelCol">
                                                    <label for="dateLabel">Date</label>
                                                </td>
                                                <td class="toLeft createFormInputCol">
                                                    <label class="dataViewLabel" id="dateLabel"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="toLeft createFormLabelCol">
                                                    <label for="titleLabel">Title</label>
                                                </td>
                                                <td class="toLeft createFormInputCol">
                                                    <label class="dataViewLabel" id="titleLabel"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="toLeft createFormLabelCol">
                                                    <label for="locationLabel">Location</label>
                                                </td>
                                                <td class="toLeft createFormInputCol">
                                                    <label class="dataViewLabel" id="locationLabel"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="toLeft createFormLabelCol">
                                                    <label for="summaryLabel">Summary</label>
                                                </td>
                                                <td class="toLeft createFormInputCol">
                                                    <label class="dataViewLabel" id="summaryLabel"></label>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <br />
                                <!-- end view Item details div content-->

                                <!-- Add/Edit Item details div content-->
                                <div   id="editItemDetailsFormContentDiv" class="hideContent">
                                    <div class="container">
                                        <form id="conferenceDetailsForm" data-dojo-id="conferenceDetailsForm" encType="multipart/form-data">
                                            <table class="fullWidth cellspacing5 cellpadding5" cellspacing="5" cellpadding="5">
                                                <tr>
                                                    <td class="toLeft createFormLabelCol">
                                                        <label for="date">Date</label>
                                                    </td>
                                                    <td class="toLeft  createFormInputCol">
                                                        <input type="text" id="date" name="date"
                                                                class="form-control" required="required"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="toLeft createFormLabelCol">
                                                        <label for="title">Title</label>
                                                    </td>
                                                    <td class="toLeft  createFormInputCol">
                                                        <input type="text" id="title" name="title"  
                                                                class="form-control" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="toLeft createFormLabelCol">
                                                        <label for="location">Location:</label>
                                                    </td>
                                                    <td class="toLeft createFormInputCol">
                                                        <input type="text" id="location" name="location"  
                                                                class="form-control" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="toLeft createFormLabelCol">
                                                        <label for="title">Summary</label>
                                                    </td>
                                                    <td class="toLeft createFormInputCol ">
                                                        <textarea class="form-control" rows="5" id="summary" name="summary"></textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                </div>
      ';
    $content .= '
                                <!-- success overlay content -->
                                <div id="successOverlayDiv"></div>
                                <div id="errorContentDiv"></div>

                          </div> 
                          <!-- end x_content -->       
                    </div>
                    <!-- close x_panel -->
                </div>
                <!-- close div m-12 -->
            </div> 
            <!-- end div container -->
        </div>     
        <!-- end div row -->
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
 
