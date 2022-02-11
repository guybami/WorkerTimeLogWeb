// Author: Guy Bami 
// incomes script
var errorContentDivId = "errorContentDiv";
var sitePathDivId = "sitePathDiv";
var resultsDivId = "resultsDiv";
var errorContentDivId = "errorContentDiv";
var successOverlayDivId = "successOverlayDiv";
var menuItemSectionTitleLabel = pageLangTexts.menuItemSectionTitleLabel == null ? "Finances" : pageLangTexts.menuItemSectionTitleLabel;
//var menuItemSectionTitleLevel1Label = pageLangTexts.menuItemSectionTitleLabel == null ? "Activites Sportives" : pageLangTexts.menuItemSectionTitleLabel;
var subMenuItemSectionTitleLabel = pageLangTexts.subMenuItemSectionTitleLabel == null ? "Bilan Des Entr&eacute;es" : pageLangTexts.subMenuItemSectionTitleLabel;


var incomesArray = new Array();
var loaded = false;
var currentSlideIndex = 0;
var eventPhotosSlideList = new Array();

$(document).ready(function () {
    // display sitemap path
    displayCurrentPath(sitePathDivId, 2, [menuItemSectionTitleLabel, 
        subMenuItemSectionTitleLabel], $(location).attr("href"));
    var currentDate = new Date();
    fetchAndDisplayIncomes(null);
     
     
    $(window).bind("resize", rescaleWindow);

});


 

function rescaleWindow() {
    var size = { width: $(window).width(), height: $(window).height() };
    // calculate size
    var offset = 20;
    var offsetBody = 80;
    $('#billModalDialog').css('height', size.height - offset);
    $('#billModalDialog .modal-body').css('height', size.height - (offset + offsetBody));
    $('#billModalDialog').css('top', 0);


}


function fetchAndDisplayIncomes(yearToFilter) {

    var controllerUrl = "../../Controllers/IncomeController.php";
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
    incomesArray = new Array();
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
            var income = {
                ItemKey: i + 1,
                TransactionDate: billDate,
                Title: title,
                Amount: amount,
                EventTitle: eventTitle,
                BillFileName: billFileName,
                Year: year
            };
            if(yearToFilter != null && year == yearToFilter){
                incomesArray.push(income);
            }
            else if(yearToFilter == null){
                incomesArray.push(income);
            }
            
        }

        // display first income per default
        if (incomesArray.length > 0) {
            var currentDate = new Date();
            displayIncomesList(incomesArray, currentDate.getUTCFullYear());
        }
        else{
            
        }
    }

}


function displayIncomesList(incomesDataArray, year) {
    var divContent = "";
    var count = 0;
    var rowClass = "";
    var totalIncomes = 0;
    
    $("#incomesListTable tbody").html("");
    // add header
    var rowData = '<tr   class="' + rowClass + '">'
                    + '<td class="toCenter memberNumberCol"></td>'
                    + '<td class="toLeft fieldDetailsTitle">&Eacute;v&egrave;nement</td>'
                    + '<td class="toLeft fieldDetailsTitle">Titre</td>'
                    + '<td class="toLeft fieldDetailsTitle">Montant (&#8364;)</td>'
                    + '<td class="toLeft fieldDetailsTitle">Date</td>'
                    + '<td class="toLeft fieldDetailsTitle">Facture</td>'
                + '</tr>';
        $("#incomesListTable tbody").append(rowData);
    $.each(incomesArray, function (index, income) {
        index % 2 == 0 ? rowClass = "even rowPointer" : rowClass = "odd rowPointer";
        var rowData = '<tr data-role="' + income.ItemKey + '" class="' + rowClass + '">'
                    + '<td class="toCenter memberNumberCol">' + income.ItemKey + '.' + '</td>'
                    + '<td class="toLeft">' + income.EventTitle + '</td>'
                    + '<td class="toLeft">' + income.Title + '</td>'
                    + '<td class="toLeft">' + income.Amount + '&#8364;</td>'
                    + '<td class="toLeft">' + income.TransactionDate + '</td>'
                    + '<td class="toLeft ">' 
                            + '<a href="javascript:viewBillDialog(\'' + income.BillFileName 
                            + '\', \'' +  income.Title + '\')" class="linkDialogShow"><span id="eventPhotosLabel">Facture</span></a>'    
                       + '</td>'
                + '</tr>';
        $("#incomesListTable tbody").append(rowData);
        count++;
        var formattedAmount = income.Amount.toString().replace(",", ".");
        //alert(parseFloat(formattedAmount));
        totalIncomes += parseFloat(formattedAmount);
    });
    // display amount and replace '.' german locale
    totalIncomes = totalIncomes.toString().replace(".", ",");
    $("#totalIncomes").html(totalIncomes + "&#8364;");
    
    // display all
    $(".row").removeClass("hideContent");
    
    if(count == 0){
        $("#incomesListTable tbody").html("");
        $("#incomesDiv").html("<div>Aucune factures</div>");
    }

}



function viewBillDialog(billFileName, title){
    
    var incomeBillDialogId = "billModalDialog";
    var content = "";
    if ($("#" + incomeBillDialogId) != null) {
        // set content dialog
        if(billFileName && billFileName.length > 0){
            //alert("name:" + billFileName);
            if(billFileName.toString().endsWith("pdf")){
                // for .pdf or .doc files
                content = '<object data="../../UploadedFiles/Images/Bills/Incomes/'+ billFileName +'" type="application/pdf" width="800" height="700"> '
                + ' <a href="../../UploadedFiles/Images/Bills/Incomes/'+ billFileName +'">Voir nos Status</a> </object>  ';
            }
            else{
                content = '<img src="../../UploadedFiles/Images/Bills/Incomes/'+ billFileName +'"   alt="facture..." /> ';
            }
        }
        // set dialog title
        $("#billDialogTitle").html("Facture - " + title);
        $("#billDialogContent").html(content);
        // show dialog
        $("#" + incomeBillDialogId).modal("show");
        rescaleWindow();
    }
    
}
 




