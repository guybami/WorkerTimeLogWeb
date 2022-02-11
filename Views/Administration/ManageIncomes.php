
<?php
        
    require_once "../../Includes/Common.php";
    require_once "../../DataAccessObject/DaoCommon.php";
    require_once "../../Models/EntityCommon.php";
    require "../PageModel.php";
    
    $mainPage = new PageModel();
    // get user language
    $userLang = $_SESSION['userLang'];
    $title = 'My Africa e.V - Incomes';
    // load UI resource 
    Utils::loadUIResources("../../UIResources/incomes.fr.res.php", "../../UIResources/incomes.en.res.php");


    // custon page script, if needed
   $script = '
        <!--language texts for page -->
        <script  type="text/javascript">

        var pageLangTexts = {
		  viewAllItemsBtnLabel : "'.IncomeUIResource::viewAllItemsBtnLabelText().'",
          viewDetailsBtnLabel : "'.IncomeUIResource::viewDetailsBtnLabelText().'",
          updateItemBtnLabel : "'.IncomeUIResource::updateItemBtnLabelText().'",
          viewPreviousItemBtnLabel : "'.IncomeUIResource::viewPreviousItemBtnLabelText().'",
          viewNextItemBtnLabel : "'.IncomeUIResource::viewNextItemBtnLabelText().'",
          saveItemBtnLabel : "'.IncomeUIResource::saveItemBtnLabelText().'",
          cancelUpdateItemBtnLabel : "'.IncomeUIResource::cancelUpdateItemBtnLabelText().'",
          cancelAddItemBtnLabel : "'.IncomeUIResource::cancelAddItemBtnLabelText().'",

          addNewItemBtnLabel : "'.IncomeUIResource::addNewItemBtnLabelText().'",
          addNewItemDialogBtnLabel : "'.IncomeUIResource::addNewItemBtnLabelText().'",
          deleteItemsBtnLabel : "'.IncomeUIResource::deleteItemsBtnLabelText().'",
          finishBtnLabel : "'.IncomeUIResource::finishBtnLabelText().'",
          editItemBtnLabel : "'.IncomeUIResource::editItemBtnLabelText().'",
          okBtnLabel : "'.IncomeUIResource::okBtnLabelText().'",
          confirmDeletionLabel : "'.IncomeUIResource::confirmDeletionLabelText().'",
          confirmationCreationLabel :  "'.IncomeUIResource::confirmationCreationLabelText().'",
          confirmationUpdateLabel : "'.IncomeUIResource::confirmationUpdateLabelText().'",
          confirmationDeletionLabel : "'.IncomeUIResource::confirmationDeletionLabelText().'",

          oneSelectedItemLabel : "'.IncomeUIResource::oneSelectedItemLabelText().'",
          manySelectedItemsLabel : " '.IncomeUIResource::manySelectedItemsLabelText().'",
          sectionViewTitleLabel : "'.IncomeUIResource::sectionViewTitleLabelText().'",

          emptyDataLabel : "'.IncomeUIResource::emptyDataLabelText().'",
          viewAllItemsLabel : "'.IncomeUIResource::viewAllItemsLabelText().'",
          loadingMessageLabel : "'.IncomeUIResource::loadingMessageLabelText().'",
          noDataMessageLabel : "'.IncomeUIResource::noDataMessageLabelText().'",  
          errorMessageLabel : "'.IncomeUIResource::errorMessageLabelText().'",
          filterItemsNameLabel : "'.IncomeUIResource::filterItemsNameLabelText().'",
          backBtnLabel : "'.IncomeUIResource::backBtnLabelText().'",

          createNewItemTitleLabel : "'.IncomeUIResource::createNewItemTitleLabelText().'",
          viewItemDetailsTitleLabel : "'.IncomeUIResource::viewItemDetailsTitleLabelText().'",
          updateItemDetailsTitleLabel : "'.IncomeUIResource::updateItemDetailsTitleLabelText().'",

          eventIdColLabel : "'.IncomeUIResource::eventIdColLabelText().'",
          titleColLabel : "'.IncomeUIResource::titleColLabelText().'",
          amountColLabel : "'.IncomeUIResource::amountColLabelText().'",
          categoryColLabel : "'.IncomeUIResource::categoryColLabelText().'",
          billFileNameColLabel : "'.IncomeUIResource::billFileNameColLabelText().'",
          transactionDateColLabel : "'.IncomeUIResource::transactionDateColLabelText().'",
          
          // combobox
          cultureWeekLabel : "'.IncomeUIResource::cultureWeekLabelText().'",
            firstSemesterPartyLabel : "'.IncomeUIResource::firstSemesterPartyLabelText().'",
            galaNightLabel : "'.IncomeUIResource::galaNightLabelText().'",
            gaduationLabel : "'.IncomeUIResource::gaduationLabelText().'",
            grillPartyLabel : "'.IncomeUIResource::grillPartyLabelText().'",
            challengeLabel : "'.IncomeUIResource::challengeLabelText().'",
            mourningLabel : "'.IncomeUIResource::mourningLabelText().'",
            donationLabel : "'.IncomeUIResource::donationLabelText().'",
            sportLabel : "'.IncomeUIResource::sportLabelText().'",
            diversLabel : "'.IncomeUIResource::diversLabelText().'",

          noItemSelectedLabel : "'.html_entity_decode(IncomeUIResource::noItemSelectedLabelText()).'",

          editItemDetailsTitleLabel : "'.IncomeUIResource::editItemDetailsTitleLabelText().'",
          menuItemSectionTitleLabel : "'.IncomeUIResource::menuItemSectionTitleLabelText().'",
          subMenuItemSectionTitleLabel : "'.IncomeUIResource::subMenuItemSectionTitleLabelText().'"
		  };

        </script>
        <script defer src="../../Scripts/incomesScript.js"  type="text/javascript"> </script> 

         
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
                                <h2>'.IncomeUIResource::sectionViewTitleLabelText().'</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="" id="printDataListMenuItem"  >'.IncomeUIResource::printDropMenuLabelText().'</a></li>
                                            <li><a href="#" id="exportDataListToCsvMenuItem">'.IncomeUIResource::exportCsvDropMenuLabelText().'</a></li>
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
                                                                             '.IncomeUIResource::addNewItemBtnLabelText().'
                                                                         </button>
                                                                    </span>
                                                                    <span id="spanDeleteItemsBtn" class="hideContent">
                                                                        <button type="button" class="btn btn-default" id="deleteItemsBtn">
                                                                            <span class="glyphicon glyphicon-trash"></span> 
                                                                                  '.IncomeUIResource::deleteItemsBtnLabelText().'
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
                                                        <td class="fullWidth cellpadding3 toRight fieldDetailsTitle">
                                                            <span id="totalTitleLabel">Total:</span>&nbsp;<span id="totalIncomes">-</span><span>&euro;</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fullWidth cellpadding0">
                                                            <!-- datagrid items view -->
                                                            <div id="incomesGridDiv"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- end data items view div -->

								<!-- Add item modal dialog form -->
                                <div id="incomeDetailsDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">'.IncomeUIResource::addNewItemBtnLabelText().'</h4>
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
                                                                         '.IncomeUIResource::addNewItemDialogBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">'.IncomeUIResource::cancelAddItemBtnLabelText().'</button>
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
                                                    <h4 class="modal-title">'.IncomeUIResource::editItemDetailsTitleLabelText().'</h4>
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
                                                                                     title="'.IncomeUIResource::editItemDetailsTitleLabelText().'"
                                                                                    type="button" id="editItemBtnDialog">
                                                                                    <span>'.IncomeUIResource::editItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCloseEditBtnDialog" class="hideContent">
                                                                                <button   type="button" class="btn btn-default"
                                                                                    id="closeEditBtnDialog" title="'.IncomeUIResource::closeDialogBtnLabelText().'">
                                                                                    <span>'.IncomeUIResource::closeDialogBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                              <span id="spanSaveChangesBtnDialog" class="hideContent">
                                                                                <button   id="saveChangesBtnDialog"
                                                                                    class="btn btn-primary"
                                                                                    type="button" title="'.IncomeUIResource::saveItemBtnLabelText().'">
                                                                                    <span>'.IncomeUIResource::saveItemBtnLabelText().'</span>
                                                                                </button>
                                                                            </span>
                                                                        </td>
                                                                        <td class="toRight">
                                                                             <span id="spanCancelChangesBtnDialog" class="hideContent">
                                                                                <button  id="cancelChangesBtnDialog" class="btn btn-default"
                                                                                    type="button" title="'.IncomeUIResource::cancelUpdateItemBtnLabelText().'">
                                                                                    <span>'.IncomeUIResource::cancelUpdateItemBtnLabelText().'</span>
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
                                                <h4 class="modal-title">'.IncomeUIResource::confirmDeletionDialogTitleLabelText().'</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <table class="fullWidth cellspacing5 cellpadding5">
                                                        <tr>
                                                            <td class="toCenter">
                                                                <label class="">'.IncomeUIResource::confirmDeletionLabelText().'</label>
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
                                                                        <button type="button" class="btn btn-primary" id="confirmItemsDeletionBtnDialog">'.IncomeUIResource::okBtnLabelText().'</button>
                                                                    </td>
                                                                    <td class="toRight">
                                                                        <button type="button" class="btn btn-default confirmDeletion" data-dismiss="modal">'.IncomeUIResource::cancelDeleteItemBtnLabelText().'</button>
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
                                                <label for="transactionDateLabel" class="control-label col-md-4">'.IncomeUIResource::transactionDateColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="transactionDateLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="eventIdLabel" class="control-label col-md-4">'.IncomeUIResource::eventIdColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="eventIdLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="titleLabel" class="control-label col-md-4">'.IncomeUIResource::titleColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="titleLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="amountLabel" class="control-label col-md-4">'.IncomeUIResource::amountColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="amountLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="categoryLabel" class="control-label col-md-4">'.IncomeUIResource::categoryColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <label class="form-control-static dataViewLabel" id="categoryLabel"></label>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="billFileNameLabel" class="control-label col-md-4">'.IncomeUIResource::billFileNameColLabelText().'</label>
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
                                        <form id="incomeDetailsForm" class="form-horizontal" data-dojo-id="incomeDetailsForm" encType="multipart/form-data">
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="transactionDate">'.IncomeUIResource::transactionDateColLabelText().'</label>
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
                                                <label class="control-label col-md-4" for="eventId">'.IncomeUIResource::eventIdColLabelText().'</label>
                                                <div class="col-md-8" nowrap="nowrap">
                                                    <!-- <input type="number"  class="form-control" id="eventId" name="eventId"/> -->
                                                    <select   id="eventId" name="eventId" class="selectpicker1 show-tick1 form-control">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="title">'.IncomeUIResource::titleColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="title" name="title" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="amount">'.IncomeUIResource::amountColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <input type="number" id="amount" name="amount" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="category">'.IncomeUIResource::categoryColLabelText().'</label>
                                                <div class="col-md-8">
                                                    <select   id="category" name="category" class="selectpicker1 show-tick1 form-control">
                                                        <option value="CultureWeek">'.IncomeUIResource::cultureWeekLabelText().'</option>
                                                        <option value="FirstSemesterParty">'.IncomeUIResource::firstSemesterPartyLabelText().'</option>
                                                        <option value="GalaNight">'.IncomeUIResource::galaNightLabelText().'</option>
                                                        <option value="Gaduation">'.IncomeUIResource::gaduationLabelText().'</option>
                                                        <option value="GrillParty">'.IncomeUIResource::grillPartyLabelText().'</option>
                                                        <option value="Challenge">'.IncomeUIResource::challengeLabelText().'</option>
                                                        <option value="Mourning">'.IncomeUIResource::mourningLabelText().'</option>
                                                        <option value="Donation">'.IncomeUIResource::donationLabelText().'</option>
                                                        <option value="Sport">'.IncomeUIResource::sportLabelText().'</option>
                                                        <option value="Divers">'.IncomeUIResource::diversLabelText().'</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="billFileName">'.IncomeUIResource::billFileNameColLabelText().'</label>
                                                <div class="col-md-8" nowrap="nowrap">
                                                    <div class="input-group">
                                                        <input type="text" id="billFileName" name="billFileName" readonly  class="form-control" />
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-secondary" type="button" onClick="showSelectFileDialog(\'billFileNameToUpload\');">Selectionez...</button>
                                                        </span>
                                                        <div class="hideContent">
                                                            <input type="file"  id="billFileNameToUpload" name="billFileNameToUpload"   accept=".gif, .jpeg, .jpg, .pdf, .doc, .png"/>
                                                            <input type="hidden"  name="userAction" id="userAction" value="uploadIncomeBill"/>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </form>
                                    </div>
                                </div>
                                <!-- end Add/Edit Item details div content-->

                                <!-- View bill modal dialog form -->
                                <div id="incomeBillDialog" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" id="billDialogTitle">Facture</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-body-thumbnail">
                                                    <div class="dialogViewBillDiv">
                                                        <table class="fullWidth">
                                                            <tr>
                                                                <td class="toCenter" >
                                                                    <div id="billDialogContent"></div>
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
 
