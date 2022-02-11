<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa e.V - Expenses';
    // load UI resource 
    Utils::loadUIResources("../../UIResources/expenses.fr.res.php", "../../UIResources/expenses.en.res.php");


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script  type="text/javascript">

        var pageLangTexts = {
		  viewAllItemsBtnLabel : "'.ExpenseUIResource::viewAllItemsBtnLabelText().'",
          viewDetailsBtnLabel : "'.ExpenseUIResource::viewDetailsBtnLabelText().'",
          updateItemBtnLabel : "'.ExpenseUIResource::updateItemBtnLabelText().'",
          viewPreviousItemBtnLabel : "'.ExpenseUIResource::viewPreviousItemBtnLabelText().'",
          viewNextItemBtnLabel : "'.ExpenseUIResource::viewNextItemBtnLabelText().'",
          saveItemBtnLabel : "'.ExpenseUIResource::saveItemBtnLabelText().'",
          cancelUpdateItemBtnLabel : "'.ExpenseUIResource::cancelUpdateItemBtnLabelText().'",
          cancelAddItemBtnLabel : "'.ExpenseUIResource::cancelAddItemBtnLabelText().'",

          addNewItemBtnLabel : "'.ExpenseUIResource::addNewItemBtnLabelText().'",
          addNewItemDialogBtnLabel : "'.ExpenseUIResource::addNewItemBtnLabelText().'",
          deleteItemsBtnLabel : "'.ExpenseUIResource::deleteItemsBtnLabelText().'",
          finishBtnLabel : "'.ExpenseUIResource::finishBtnLabelText().'",
          editItemBtnLabel : "'.ExpenseUIResource::editItemBtnLabelText().'",
          okBtnLabel : "'.ExpenseUIResource::okBtnLabelText().'",
          confirmDeletionLabel : "'.ExpenseUIResource::confirmDeletionLabelText().'",
          confirmationCreationLabel :  "'.ExpenseUIResource::confirmationCreationLabelText().'",
          confirmationUpdateLabel : "'.ExpenseUIResource::confirmationUpdateLabelText().'",
          confirmationDeletionLabel : "'.ExpenseUIResource::confirmationDeletionLabelText().'",

          oneSelectedItemLabel : "'.ExpenseUIResource::oneSelectedItemLabelText().'",
          manySelectedItemsLabel : " '.ExpenseUIResource::manySelectedItemsLabelText().'",
          sectionViewTitleLabel : "'.ExpenseUIResource::sectionViewTitleLabelText().'",

          emptyDataLabel : "'.ExpenseUIResource::emptyDataLabelText().'",
          viewAllItemsLabel : "'.ExpenseUIResource::viewAllItemsLabelText().'",
          loadingMessageLabel : "'.ExpenseUIResource::loadingMessageLabelText().'",
          noDataMessageLabel : "'.ExpenseUIResource::noDataMessageLabelText().'",  
          errorMessageLabel : "'.ExpenseUIResource::errorMessageLabelText().'",
          filterItemsNameLabel : "'.ExpenseUIResource::filterItemsNameLabelText().'",
          backBtnLabel : "'.ExpenseUIResource::backBtnLabelText().'",

          createNewItemTitleLabel : "'.ExpenseUIResource::createNewItemTitleLabelText().'",
          viewItemDetailsTitleLabel : "'.ExpenseUIResource::viewItemDetailsTitleLabelText().'",
          updateItemDetailsTitleLabel : "'.ExpenseUIResource::updateItemDetailsTitleLabelText().'",

          eventIdColLabel : "'.ExpenseUIResource::eventIdColLabelText().'",
          titleColLabel : "'.ExpenseUIResource::titleColLabelText().'",
          amountColLabel : "'.ExpenseUIResource::amountColLabelText().'",
          categoryColLabel : "'.ExpenseUIResource::categoryColLabelText().'",
          billFileNameColLabel : "'.ExpenseUIResource::billFileNameColLabelText().'",
          transactionDateColLabel : "'.ExpenseUIResource::transactionDateColLabelText().'",

          noItemSelectedLabel : "'.html_entity_decode(ExpenseUIResource::noItemSelectedLabelText()).'",

          editItemDetailsTitleLabel : "'.ExpenseUIResource::editItemDetailsTitleLabelText().'",
          menuItemSectionTitleLabel : "'.ExpenseUIResource::menuItemSectionTitleLabelText().'",
          subMenuItemSectionTitleLabel : "'.ExpenseUIResource::subMenuItemSectionTitleLabelText().'"
		  };

        </script>
        <script defer src="../../Scripts/expensesScript.js"  type="text/javascript"> </script> 

         
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
                                <h2>'.ExpenseUIResource::sectionViewTitleLabelText().'</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="" id="printDataListMenuItem"  >'.ExpenseUIResource::printDropMenuLabelText().'</a></li>
                                            <li><a href="#" id="exportDataListToCsvMenuItem">'.ExpenseUIResource::exportCsvDropMenuLabelText().'</a></li>
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
                                                                             '.ExpenseUIResource::addNewItemBtnLabelText().'
                                                                         </button>
                                                                    </span>
                                                                    <span id="spanDeleteItemsBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="deleteItemsBtn">
                                                                            <span class="glyphicon glyphicon-trash"></span> 
                                                                                  '.ExpenseUIResource::deleteItemsBtnLabelText().'
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
                                                <table class="fullWidth hideBorder cellspacing5">
                                                    <tr>
                                                        <td class="fullWidth cellpadding3 toRight fieldDetailsTitle">
                                                            <span id="totalTitleLabel">Total:</span>&nbsp;<span id="totalExpenses">-</span><span>&euro;</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fullWidth cellpadding0">
                                                            <!-- datagrid items view -->
                                                            <div id="expensesGridDiv"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- end data items view div -->

								<!-- Add item modal dialog form -->
                                <div id="expenseDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">'.ExpenseUIResource::addNewItemBtnLabelText().'</h4>
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
                                                                         '.ExpenseUIResource::addNewItemDialogBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">'.ExpenseUIResource::cancelAddItemBtnLabelText().'</button>
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
                                                    <h4 class="modal-title">'.ExpenseUIResource::editItemDetailsTitleLabelText().'</h4>
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
                                                                                     title="'.ExpenseUIResource::editItemDetailsTitleLabelText().'"
                                                                                    type="button" id="editItemBtnDialog">
                                                                                    <span>'.ExpenseUIResource::editItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCloseEditBtnDialog" class="hideContent">
                                                                                <button   type="button" class="btn btn-default"
                                                                                    id="closeEditBtnDialog" title="'.ExpenseUIResource::closeDialogBtnLabelText().'">
                                                                                    <span>'.ExpenseUIResource::closeDialogBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                              <span id="spanSaveChangesBtnDialog" class="hideContent">
                                                                                <button   id="saveChangesBtnDialog"
                                                                                    class="btn btn-primary"
                                                                                    type="button" title="'.ExpenseUIResource::saveItemBtnLabelText().'">
                                                                                    <span>'.ExpenseUIResource::saveItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCancelChangesBtnDialog" class="hideContent">
                                                                                <button  id="cancelChangesBtnDialog" class="btn btn-default"
                                                                                    type="button" title="'.ExpenseUIResource::cancelUpdateItemBtnLabelText().'">
                                                                                    <span>'.ExpenseUIResource::cancelUpdateItemBtnLabelText().'</span>
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
                                                <h4 class="modal-title">'.ExpenseUIResource::confirmDeletionDialogTitleLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <table class="fullWidth cellspacing5 cellpadding5">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <label class="">'.ExpenseUIResource::confirmDeletionLabelText().'</label>
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
                                                                        <button type="button" class="btn btn-primary" id="confirmItemsDeletionBtnDialog">'.ExpenseUIResource::okBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default confirmDeletion" data-dismiss="modal">'.ExpenseUIResource::cancelDeleteItemBtnLabelText().'</button>
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
                                                <label for="transactionDateLabel" class="control-label col-md-4">'.ExpenseUIResource::transactionDateColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="transactionDateLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="eventIdLabel" class="control-label col-md-4">'.ExpenseUIResource::eventIdColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="eventIdLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="titleLabel" class="control-label col-md-4">'.ExpenseUIResource::titleColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="titleLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="amountLabel" class="control-label col-md-4">'.ExpenseUIResource::amountColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="amountLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="categoryLabel" class="control-label col-md-4">'.ExpenseUIResource::categoryColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="categoryLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="billFileNameLabel" class="control-label col-md-4">'.ExpenseUIResource::billFileNameColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="billFileNameLabel"></label>
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
                                        <form id="expenseDetailsForm" class="form-horizontal" data-dojo-id="expenseDetailsForm" encType="multipart/form-data">
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="transactionDate">'.ExpenseUIResource::transactionDateColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <div class="input-group date">
                                                        <input type="text" class="form-control" id="transactionDate" name="transactionDate" 
                                                            aria-required="true" data-placement="top" aria-invalid="false" required />
                                                        <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="eventId">'.ExpenseUIResource::eventIdColLabelText().'</label>
                                                <div class="col-md-8" nowrap="nowrap">
                                                    <!-- <input type="number"  class="form-control" id="eventId" name="eventId"/> -->
                                                    <select   id="eventId" name="eventId" class="selectpicker1 show-tick1 form-control">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="title">'.ExpenseUIResource::titleColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="title" name="title" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="amount">'.ExpenseUIResource::amountColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="number" id="amount" name="amount" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="category">'.ExpenseUIResource::categoryColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <select   id="category" name="category" class="selectpicker1 show-tick1 form-control">
                                                        <option value="CultureWeek">CultureWeek</option>
                                                        <option value="FirstSemesterParty">FirstSemesterParty</option>
                                                        <option value="GalaNight">GalaNight</option>
                                                        <option value="Gaduation">Gaduation</option>
                                                        <option value="GrillParty">GrillParty</option>
                                                        <option value="Challenge">Challenge</option>
                                                        <option value="Mourning">Mourning</option>
                                                        <option value="Donation">Donation</option>
                                                        <option value="Sport">Sport</option>
                                                        <option value="Divers">Divers</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="billFileName">'.ExpenseUIResource::billFileNameColLabelText().'</label>
                                                <div class="col-md-8" nowrap="nowrap">
                                                    <div class="input-group">
                                                        <input type="text" id="billFileName" name="billFileName" readonly  class="form-control" />
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-secondary" type="button" onClick="showSelectFileDialog(\'billFileNameUpload\');">Selectionez...</button>
                                                        </span>
                                                        <div class="hideContent">
                                                            <input type="file"  id="billFileNameUpload" name="billFileNameUpload"   accept=".gif, .jpeg, .jpg, .pdf, .doc, .png"/>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </form>
                                    </div>
                                </div>
                                <!-- end Add/Edit Item details div content-->

                                <!-- View bill modal dialog form -->
                                <div id="expenseBillDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">'.ExpenseUIResource::addNewItemBtnLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="">
                                                    <table class="fullWidth">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <object data="../../Views/Association/KheV_Status.pdf" type="application/pdf" 
                                                                            width="800" height="700">
                                                                    <a href="../../Views/Association/KheV_Status.pdf">Voir nos Status</a>
                                                                 </object>    
                                                            </td>
                                                        </tr>
                                                    </table>
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
 
