
<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa e.V - Publications';
    // load UI resource 
    Utils::loadUIResources("../../UIResources/publications.fr.res.php", "../../UIResources/publications.en.res.php");


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script  type="text/javascript">

        var pageLangTexts = {
		  viewAllItemsBtnLabel : "'.PublicationUIResource::viewAllItemsBtnLabelText().'",
          viewDetailsBtnLabel : "'.PublicationUIResource::viewDetailsBtnLabelText().'",
          updateItemBtnLabel : "'.PublicationUIResource::updateItemBtnLabelText().'",
          viewPreviousItemBtnLabel : "'.PublicationUIResource::viewPreviousItemBtnLabelText().'",
          viewNextItemBtnLabel : "'.PublicationUIResource::viewNextItemBtnLabelText().'",
          saveItemBtnLabel : "'.PublicationUIResource::saveItemBtnLabelText().'",
          cancelUpdateItemBtnLabel : "'.PublicationUIResource::cancelUpdateItemBtnLabelText().'",
          cancelAddItemBtnLabel : "'.PublicationUIResource::cancelAddItemBtnLabelText().'",

          addNewItemBtnLabel : "'.PublicationUIResource::addNewItemBtnLabelText().'",
          addNewItemDialogBtnLabel : "'.PublicationUIResource::addNewItemBtnLabelText().'",
          deleteItemsBtnLabel : "'.PublicationUIResource::deleteItemsBtnLabelText().'",
          finishBtnLabel : "'.PublicationUIResource::finishBtnLabelText().'",
          editItemBtnLabel : "'.PublicationUIResource::editItemBtnLabelText().'",
          okBtnLabel : "'.PublicationUIResource::okBtnLabelText().'",
          confirmDeletionLabel : "'.PublicationUIResource::confirmDeletionLabelText().'",
          confirmationCreationLabel :  "'.PublicationUIResource::confirmationCreationLabelText().'",
          confirmationUpdateLabel : "'.PublicationUIResource::confirmationUpdateLabelText().'",
          confirmationDeletionLabel : "'.PublicationUIResource::confirmationDeletionLabelText().'",

          oneSelectedItemLabel : "'.PublicationUIResource::oneSelectedItemLabelText().'",
          manySelectedItemsLabel : " '.PublicationUIResource::manySelectedItemsLabelText().'",
          sectionViewTitleLabel : "'.PublicationUIResource::sectionViewTitleLabelText().'",

          emptyDataLabel : "'.PublicationUIResource::emptyDataLabelText().'",
          viewAllItemsLabel : "'.PublicationUIResource::viewAllItemsLabelText().'",
          loadingMessageLabel : "'.PublicationUIResource::loadingMessageLabelText().'",
          noDataMessageLabel : "'.PublicationUIResource::noDataMessageLabelText().'",  
          errorMessageLabel : "'.PublicationUIResource::errorMessageLabelText().'",
          filterItemsNameLabel : "'.PublicationUIResource::filterItemsNameLabelText().'",
          backBtnLabel : "'.PublicationUIResource::backBtnLabelText().'",

          createNewItemTitleLabel : "'.PublicationUIResource::createNewItemTitleLabelText().'",
          viewItemDetailsTitleLabel : "'.PublicationUIResource::viewItemDetailsTitleLabelText().'",
          updateItemDetailsTitleLabel : "'.PublicationUIResource::updateItemDetailsTitleLabelText().'",

           
          
          noItemSelectedLabel : "'.html_entity_decode(PublicationUIResource::noItemSelectedLabelText()).'",

          editItemDetailsTitleLabel : "'.PublicationUIResource::editItemDetailsTitleLabelText().'",
          menuItemSectionTitleLabel : "'.PublicationUIResource::menuItemSectionTitleLabelText().'",
          subMenuItemSectionTitleLabel : "'.PublicationUIResource::subMenuItemSectionTitleLabelText().'"
		  };

        </script>
        <script defer src="../../Scripts/publicationsScript.js"  type="text/javascript"> </script> 

         
        ';
    /// page content
    $content = ' 
        <div id="sitePathDiv"></div>
         
          <!-- page content -->
          <div class="row hideContent">
            <div class="container">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>'.PublicationUIResource::sectionViewTitleLabelText().'</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="" id="printDataListMenuItem"  >'.PublicationUIResource::printDropMenuLabelText().'</a></li>
                                            <li><a href="#" id="exportDataListToCsvMenuItem">'.PublicationUIResource::exportCsvDropMenuLabelText().'</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
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
                                                                        <button type="button" class="btn btn-default" id="addNewItemBtn"  > 
                                                                            <span class="glyphicon glyphicon-plus"></span> 
                                                                             '.PublicationUIResource::addNewItemBtnLabelText().'
                                                                         </button>
                                                                    </span>
                                                                    <span id="spanDeleteItemsBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="deleteItemsBtn">
                                                                            <span class="glyphicon glyphicon-trash"></span> 
                                                                                  '.PublicationUIResource::deleteItemsBtnLabelText().'
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
                                <!-- success and error overlay content -->
                                <div id="successOverlayDiv"></div>
                                <div id="errorContentDiv"></div>
                                <!-- data items view div -->
                                <div id="gridDataViewDiv">
                                    <span id="resultsDiv" class="selectedItemsDiv toLeft"></span>
                                    <table class="hideBorder fullWidth cellspacing0">
                                        <tr>
                                            <td class="cellpadding0">
                                                <table class="fullWidth hideBorder cellspacing0">
                                                    <tr>
                                                        <td class="fullWidth cellpadding0">
                                                            <!-- datagrid items view -->
                                                            <div id="publicationsGridDiv"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- end data items view div -->

								<!-- Add item modal dialog form -->
                                <div id="publicationDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">'.PublicationUIResource::addNewItemBtnLabelText().'</h4>
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
                                                                        <button type="button" class="btn btn-primary" id="addNewItemBtnDialog" >
                                                                         '.PublicationUIResource::addNewItemDialogBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">'.PublicationUIResource::cancelAddItemBtnLabelText().'</button>
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
                                                    <h4 class="modal-title">'.PublicationUIResource::editItemDetailsTitleLabelText().'</h4>
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
                                                                                     title="'.PublicationUIResource::editItemDetailsTitleLabelText().'"
                                                                                    type="button" id="editItemBtnDialog">
                                                                                    <span>'.PublicationUIResource::editItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCloseEditBtnDialog" class="hideContent">
                                                                                <button   type="button" class="btn btn-default"
                                                                                    id="closeEditBtnDialog" title="'.PublicationUIResource::closeDialogBtnLabelText().'">
                                                                                    <span>'.PublicationUIResource::closeDialogBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                              <span id="spanSaveChangesBtnDialog" class="hideContent">
                                                                                <button   id="saveChangesBtnDialog"
                                                                                    class="btn btn-primary"
                                                                                    type="button" title="'.PublicationUIResource::saveItemBtnLabelText().'">
                                                                                    <span>'.PublicationUIResource::saveItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCancelChangesBtnDialog" class="hideContent">
                                                                                <button  id="cancelChangesBtnDialog" class="btn btn-default"
                                                                                    type="button" title="'.PublicationUIResource::cancelUpdateItemBtnLabelText().'">
                                                                                    <span>'.PublicationUIResource::cancelUpdateItemBtnLabelText().'</span>
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
                                                <h4 class="modal-title">'.PublicationUIResource::confirmDeletionDialogTitleLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <table class="fullWidth cellspacing5 cellpadding5">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <label class="">'.PublicationUIResource::confirmDeletionLabelText().'</label>
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
                                                                        <button type="button" class="btn btn-primary" id="confirmItemsDeletionBtnDialog">'.PublicationUIResource::okBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default confirmDeletion" data-dismiss="modal">'.PublicationUIResource::cancelDeleteItemBtnLabelText().'</button>
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
                                        <div class="form-horizontal" id="viewForm">
                                            <div class="form-group ">
                                                <label for="userIdLabel" class="control-label col-md-4">'.PublicationUIResource::userIdColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="userIdLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="subjectLabel" class="control-label col-md-4">'.PublicationUIResource::subjectColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="subjectLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="titleLabel" class="control-label col-md-4">'.PublicationUIResource::titleColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="titleLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="semesterLabel" class="control-label col-md-4">'.PublicationUIResource::semesterColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="semesterLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="dateLabel" class="control-label col-md-4">'.PublicationUIResource::dateColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="dateLabel"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <!-- end view Item details div content-->

                                <!-- Add/Edit Item details div content-->
                                <div id="editItemDetailsFormContentDiv" class="hideContent">
                                    <div class="container">
                                        <form id="publicationDetailsForm" class="form-horizontal" data-dojo-id="publicationDetailsForm" encType="multipart/form-data">

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="userId">'.PublicationUIResource::userIdColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="number" id="userId" name="userId" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="subject">'.PublicationUIResource::subjectColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="subject" name="subject" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="title">'.PublicationUIResource::titleColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="title" name="title" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="semester">'.PublicationUIResource::semesterColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="semester" name="semester" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="date">'.PublicationUIResource::dateColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <div class="input-group date">
                                                        <input type="text" class="form-control" id="date" name="date" aria-required="true" data-placement="top" aria-invalid="false" required />
                                                        <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
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
    $mainPage->setDirectoryLevel(2);
    $mainPage->setUserLanguage($userLang);
    $mainPage->setShouldDisplayLanguageSelection(false);
    $mainPage->setPageJscript($script);
    $mainPage->setTitle($title);
    $mainPage->setContent($content);
    $mainPage->displayPage();
 
