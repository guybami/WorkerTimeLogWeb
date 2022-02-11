// Author: Guy Bami 
// expenses script
var errorContentDivId = "errorContentDiv";
var sitePathDivId = "sitePathDiv";
var resultsDivId = "resultsDiv";
var errorContentDivId = "errorContentDiv";
var successOverlayDivId = "successOverlayDiv";
var menuItemSectionTitleLabel = pageLangTexts.menuItemSectionTitleLabel == null ? "Finances" : pageLangTexts.menuItemSectionTitleLabel;
//var menuItemSectionTitleLevel1Label = pageLangTexts.menuItemSectionTitleLabel == null ? "Activites Sportives" : pageLangTexts.menuItemSectionTitleLabel;
var subMenuItemSectionTitleLabel = pageLangTexts.subMenuItemSectionTitleLabel == null ? "Bilan Des D&eacute;penses" : pageLangTexts.subMenuItemSectionTitleLabel;


var expensesArray = new Array();
var loaded = false;
var currentSlideIndex = 0;
var eventPhotosSlideList = new Array();

$(document).ready(function () {
    // display sitemap path
    displayCurrentPath(sitePathDivId, 2, [menuItemSectionTitleLabel, 
        subMenuItemSectionTitleLabel], $(location).attr("href"));
    // fetch data for all years
    fetchAndDisplayExpenses(null);
    $(window).bind("resize", rescaleWindow);

});


 

function rescaleWindow() {
    var size = { width: $(window).width(), height: $(window).height() };
    // calculate size
    var offset = 20;
    var offsetBody = 80;
    $("#billModalDialog").css("height", size.height - offset);
    $("#billModalDialog .modal-body").css("height", size.height - (offset + offsetBody));
    $("#billModalDialog").css("top", 0);
}


function fetchAndDisplayExpenses(yearToFilter) {

    var controllerUrl = "../../Controllers/ExpenseController.php";
    var postDataFormat = "json";
    var postMethod = "POST";
    var postParameters = { "userAction": "getAllItems" };
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
    expensesArray = new Array();
    sendAjaxRequest(xhrArgs, fetchDataCompleted);

    //get postback result
    function fetchDataCompleted(data) {
        var jsonData = data;
        debugMessageToConsole("items json data: " + data, lowLevel);
        for (var i = 0; i < jsonData.length; i++) {
            var transactionDate = stringToDate(jsonData[i].transactionDate, "yyyy-mm-dd", "-");
            var eventTitle = jsonData[i].eventTitle;
            var billDate = dateToGermanStr(transactionDate);  
            var billFileName = jsonData[i].billFileName;
            var amount = jsonData[i].amount;
            var title = jsonData[i].title;
            var year = transactionDate.getUTCFullYear();
            var expense = {
                ItemKey: i + 1,
                TransactionDate: billDate,
                Title: title,
                Amount: amount,
                EventTitle: eventTitle,
                BillFileName: billFileName,
                Year: year
            };
            if(yearToFilter != null && year == yearToFilter){
                expensesArray.push(expense);
            }
            else if(yearToFilter == null){
                expensesArray.push(expense);
            }
            
        }

        // display first expense per default
        if (expensesArray.length > 0) {
            var currentDate = new Date();
            displayExpensesList(expensesArray, currentDate.getUTCFullYear());
        }
        else{
            
        }
    }

}


function displayExpensesList(expensesDataArray, year) {
    var divContent = "";
    var count = 0;
    var rowClass = "";
    var totalExpenses = 0;
    
    $("#expensesListTable tbody").html("");
    // add header
    var rowData = '<tr   class="' + rowClass + '">'
                    + '<td class="toCenter memberNumberCol"></td>'
                    + '<td class="toLeft fieldDetailsTitle">&Eacute;v&egrave;nement</td>'
                    + '<td class="toLeft fieldDetailsTitle">Titre</td>'
                    + '<td class="toLeft fieldDetailsTitle">Montant (&#8364;)</td>'
                    + '<td class="toLeft fieldDetailsTitle">Date</td>'
                    + '<td class="toLeft fieldDetailsTitle">Facture</td>'
                + '</tr>';
        $("#expensesListTable tbody").append(rowData);
    $.each(expensesArray, function (index, expense) {
        index % 2 == 0 ? rowClass = "even rowPointer" : rowClass = "odd rowPointer";
        var rowData = '<tr data-role="' + expense.ItemKey + '" class="' + rowClass + '">'
                    + '<td class="toCenter memberNumberCol">' + expense.ItemKey + '.' + '</td>'
                    + '<td class="toLeft">' + expense.EventTitle + '</td>'
                    + '<td class="toLeft">' + expense.Title + '</td>'
                    + '<td class="toLeft">' + expense.Amount + '&#8364;</td>'
                    + '<td class="toLeft">' + expense.TransactionDate + '</td>'
                    + '<td class="toLeft ">' 
                            + '<a href="javascript:viewBillDialog(\'' + expense.BillFileName 
                            + '\', \'' +  expense.Title + '\')" class="linkDialogShow"><span id="eventPhotosLabel">Facture</span></a>'    
                       + '</td>'
                + '</tr>';
        $("#expensesListTable tbody").append(rowData);
        count++;
        var formattedAmount = expense.Amount.toString().replace(",", ".");
        //alert(parseFloat(formattedAmount));
        totalExpenses += parseFloat(formattedAmount);
    });
    // display amount and replace '.' german locale
    totalExpenses = totalExpenses.toString().replace(".", ",");
    $("#totalExpenses").html(totalExpenses + "&#8364;");
    
    // display all
    $(".row").removeClass("hideContent");
    
    if(count == 0){
        $("#expensesListTable tbody").html("");
        $("#expensesDiv").html("<div>Aucune factures</div>");
    }

}



function viewBillDialog(billFileName, title){
    
    var expenseBillDialogId = "billModalDialog";
    var content = "";
    if ($("#" + expenseBillDialogId) != null) {
        // set content dialog
        if(billFileName && billFileName.length > 0){
            //alert("name:" + billFileName);
            if(billFileName.toString().endsWith("pdf")){
                // for .pdf or .doc files
                content = '<object data="../../UploadedFiles/Images/Bills/Expenses/'+ billFileName +'" type="application/pdf" width="800" height="700"> '
                + ' <a href="../../UploadedFiles/Images/Bills/Expenses/'+ billFileName +'">Voir nos Status</a> </object>  ';
            }
            else{
                content = '<img src="../../UploadedFiles/Images/Bills/Expenses/'+ billFileName +'"   alt="facture..." /> ';
            }
        }
        // set dialog title
        $("#billDialogTitle").html("Facture - " + title);
        $("#billDialogContent").html(content);
        // show dialog
        $("#" + expenseBillDialogId).modal("show");
        rescaleWindow();
    }
    
}
 




