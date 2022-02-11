<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa e.V - Anciens Examens';
    // load UI resource 
    Utils::loadUIResources("../../UIResources/oldExams.fr.res.php", "../../UIResources/oldExams.en.res.php");


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script  type="text/javascript">

        var pageLangTexts = {
		  viewAllItemsBtnLabel : "'.OldExamUIResource::viewAllItemsBtnLabelText().'",
          viewDetailsBtnLabel : "'.OldExamUIResource::viewDetailsBtnLabelText().'",
          updateItemBtnLabel : "'.OldExamUIResource::updateItemBtnLabelText().'",
          viewPreviousItemBtnLabel : "'.OldExamUIResource::viewPreviousItemBtnLabelText().'",
          viewNextItemBtnLabel : "'.OldExamUIResource::viewNextItemBtnLabelText().'",
          saveItemBtnLabel : "'.OldExamUIResource::saveItemBtnLabelText().'",
          cancelUpdateItemBtnLabel : "'.OldExamUIResource::cancelUpdateItemBtnLabelText().'",
          cancelAddItemBtnLabel : "'.OldExamUIResource::cancelAddItemBtnLabelText().'",

          addNewItemBtnLabel : "'.OldExamUIResource::addNewItemBtnLabelText().'",
          addNewItemDialogBtnLabel : "'.OldExamUIResource::addNewItemBtnLabelText().'",
          deleteItemsBtnLabel : "'.OldExamUIResource::deleteItemsBtnLabelText().'",
          finishBtnLabel : "'.OldExamUIResource::finishBtnLabelText().'",
          editItemBtnLabel : "'.OldExamUIResource::editItemBtnLabelText().'",
          okBtnLabel : "'.OldExamUIResource::okBtnLabelText().'",
          confirmDeletionLabel : "'.OldExamUIResource::confirmDeletionLabelText().'",
          confirmationCreationLabel :  "'.OldExamUIResource::confirmationCreationLabelText().'",
          confirmationUpdateLabel : "'.OldExamUIResource::confirmationUpdateLabelText().'",
          confirmationDeletionLabel : "'.OldExamUIResource::confirmationDeletionLabelText().'",

          oneSelectedItemLabel : "'.OldExamUIResource::oneSelectedItemLabelText().'",
          manySelectedItemsLabel : " '.OldExamUIResource::manySelectedItemsLabelText().'",
          sectionViewTitleLabel : "'.OldExamUIResource::sectionViewTitleLabelText().'",

          emptyDataLabel : "'.OldExamUIResource::emptyDataLabelText().'",
          viewAllItemsLabel : "'.OldExamUIResource::viewAllItemsLabelText().'",
          loadingMessageLabel : "'.OldExamUIResource::loadingMessageLabelText().'",
          noDataMessageLabel : "'.OldExamUIResource::noDataMessageLabelText().'",  
          errorMessageLabel : "'.OldExamUIResource::errorMessageLabelText().'",
          filterItemsNameLabel : "'.OldExamUIResource::filterItemsNameLabelText().'",
          backBtnLabel : "'.OldExamUIResource::backBtnLabelText().'",

          createNewItemTitleLabel : "'.OldExamUIResource::createNewItemTitleLabelText().'",
          viewItemDetailsTitleLabel : "'.OldExamUIResource::viewItemDetailsTitleLabelText().'",
          updateItemDetailsTitleLabel : "'.OldExamUIResource::updateItemDetailsTitleLabelText().'",
              // datagrid colums
          userIdColLabel : "'.OldExamUIResource::userIdColLabelText().'",
          subjectColLabel : "'.OldExamUIResource::subjectColLabelText().'",
          titleColLabel : "'.OldExamUIResource::titleColLabelText().'",
          semesterColLabel : "'.OldExamUIResource::semesterColLabelText().'",
          dateColLabel : "'.OldExamUIResource::dateColLabelText().'",

          noItemSelectedLabel : "'.html_entity_decode(OldExamUIResource::noItemSelectedLabelText()).'",

          editItemDetailsTitleLabel : "'.OldExamUIResource::editItemDetailsTitleLabelText().'",
          menuItemSectionTitleLabel : "'.OldExamUIResource::menuItemSectionTitleLabelText().'",
          subMenuItemSectionTitleLabel : "'.OldExamUIResource::subMenuItemSectionTitleLabelText().'"
              

		  };

        </script>
        <script defer src="../../Scripts/oldExamsScript.js"  type="text/javascript"> </script> 

         
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
                                <h2>'.OldExamUIResource::sectionViewTitleLabelText().'</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="" id="printDataListMenuItem"  >'.OldExamUIResource::printDropMenuLabelText().'</a></li>
                                            <li><a href="#" id="exportDataListToCsvMenuItem">'.OldExamUIResource::exportCsvDropMenuLabelText().'</a></li>
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
                                                                             '.OldExamUIResource::addNewItemBtnLabelText().'
                                                                         </button>
                                                                    </span>
                                                                    <span id="spanDeleteItemsBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="deleteItemsBtn">
                                                                            <span class="glyphicon glyphicon-trash"></span> 
                                                                                  '.OldExamUIResource::deleteItemsBtnLabelText().'
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
                                                            <div id="oldExamsGridDiv"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- end data items view div -->

				<!-- Add item modal dialog form -->
                                <div id="oldExamDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">'.OldExamUIResource::addNewItemBtnLabelText().'</h4>
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
                                                                         '.OldExamUIResource::addNewItemDialogBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">'.OldExamUIResource::cancelAddItemBtnLabelText().'</button>
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
                                                    <h4 class="modal-title">'.OldExamUIResource::editItemDetailsTitleLabelText().'</h4>
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
                                                                                     title="'.OldExamUIResource::editItemDetailsTitleLabelText().'"
                                                                                    type="button" id="editItemBtnDialog">
                                                                                    <span>'.OldExamUIResource::editItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCloseEditBtnDialog" class="hideContent">
                                                                                <button   type="button" class="btn btn-default"
                                                                                    id="closeEditBtnDialog" title="'.OldExamUIResource::closeDialogBtnLabelText().'">
                                                                                    <span>'.OldExamUIResource::closeDialogBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                              <span id="spanSaveChangesBtnDialog" class="hideContent">
                                                                                <button   id="saveChangesBtnDialog"
                                                                                    class="btn btn-primary"
                                                                                    type="button" title="'.OldExamUIResource::saveItemBtnLabelText().'">
                                                                                    <span>'.OldExamUIResource::saveItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCancelChangesBtnDialog" class="hideContent">
                                                                                <button  id="cancelChangesBtnDialog" class="btn btn-default"
                                                                                    type="button" title="'.OldExamUIResource::cancelUpdateItemBtnLabelText().'">
                                                                                    <span>'.OldExamUIResource::cancelUpdateItemBtnLabelText().'</span>
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
                                                <h4 class="modal-title">'.OldExamUIResource::confirmDeletionDialogTitleLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <table class="fullWidth cellspacing5 cellpadding5">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <label class="">'.OldExamUIResource::confirmDeletionLabelText().'</label>
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
                                                                        <button type="button" class="btn btn-primary" id="confirmItemsDeletionBtnDialog">'.OldExamUIResource::okBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default confirmDeletion" data-dismiss="modal">'.OldExamUIResource::cancelDeleteItemBtnLabelText().'</button>
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
                                                <label for="userIdLabel" class="control-label col-md-4">'.OldExamUIResource::userIdColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="userIdLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="subjectLabel" class="control-label col-md-4">'.OldExamUIResource::subjectColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="subjectLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="titleLabel" class="control-label col-md-4">'.OldExamUIResource::titleColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="titleLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="semesterLabel" class="control-label col-md-4">'.OldExamUIResource::semesterColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="semesterLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="dateLabel" class="control-label col-md-4">'.OldExamUIResource::dateColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="dateLabel"></label>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="fileFullNameLabel" class="control-label col-md-4">' . OldExamUIResource::fileFullNameColLabelText() . '</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="fileFullNameLabel"></label>
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
                                        <form id="oldExamDetailsForm" class="form-horizontal" data-dojo-id="oldExamDetailsForm" encType="multipart/form-data">

                                            <div class="form-group hideContent">
                                                <label class="control-label col-md-4" for="userId">'.OldExamUIResource::userIdColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="number" id="userId" name="userId" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="subject">'.OldExamUIResource::subjectColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="subject" name="subject" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="title">'.OldExamUIResource::titleColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="title" name="title" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="semester">'.OldExamUIResource::semesterColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="semester" name="semester" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group hideContent">
                                                <label class="control-label col-md-4" for="date">'.OldExamUIResource::dateColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <div class="input-group date">
                                                        <input type="text" class="form-control" id="date" name="date" aria-required="true" data-placement="top" aria-invalid="false" required />
                                                        <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="fileFullName">'.OldExamUIResource::fileFullNameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text"  id="fileFullName" name="fileFullName" class="form-control" />  
                                                </div>
                                            </div>
                                            -->
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="fileFullName">'.OldExamUIResource::fileFullNameColLabelText().'</label>
                                                <div class="col-md-8" nowrap="nowrap">
                                                    <div class="input-group">
                                                        <input type="text" id="fileFullName" name="fileFullName" readonly  class="form-control" />
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-secondary" type="button" onClick="showSelectFileDialog(\'fileFullNameToUpload\');">Selectionez...</button>
                                                        </span>
                                                        <div class="hideContent">
                                                            <input type="file"  id="fileFullNameToUpload" name="fileFullNameToUpload"   accept=".gif, .jpeg, .jpg, .pdf, .doc, .png"/>
                                                            <input type="hidden"  name="userAction" id="userAction" value="uploadOldExam"/>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- View old exam modal dialog form -->
                                <div id="oldExamFileDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" id="oldExamFileDialogTitle">Alte Klassur</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-body-thumbnail">
                                                    <div class="dialogViewBillDiv">
                                                        <table class="fullWidth">
                                                            <tr>
                                                                <td class="toCenter" >
                                                                    <div id="oldExamFileDialogContent"></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
				<!-- end Add modal dialog form -->

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
 
