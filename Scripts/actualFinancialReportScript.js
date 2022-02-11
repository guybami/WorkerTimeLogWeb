// Author: Guy Bami 
// actual financial status script
var errorContentDivId = "errorContentDiv";
var sitePathDivId = "sitePathDiv";
var resultsDivId = "resultsDiv";
var errorContentDivId = "errorContentDiv";
var successOverlayDivId = "successOverlayDiv";
var menuItemSectionTitleLabel = pageLangTexts.menuItemSectionTitleLabel == null ? "Finances" : pageLangTexts.menuItemSectionTitleLabel;
//var menuItemSectionTitleLevel1Label = pageLangTexts.menuItemSectionTitleLabel == null ? "Activites Sportives" : pageLangTexts.menuItemSectionTitleLabel;
var subMenuItemSectionTitleLabel = pageLangTexts.subMenuItemSectionTitleLabel == null ? "&Eacute;tat actuel" : pageLangTexts.subMenuItemSectionTitleLabel;
subMenuItemSectionTitleLabel =   "&Eacute;tat actuel";


var expensesArray = new Array();
var loaded = false;
var currentSlideIndex = 0;
var eventPhotosSlideList = new Array();

$(document).ready(function () {
    // display sitemap path
    displayCurrentPath(sitePathDivId, 2, [menuItemSectionTitleLabel, 
        subMenuItemSectionTitleLabel], $(location).attr("href"));
    fetchAndDisplayActualStatus();
     

});


  


function fetchAndDisplayActualStatus() {

    var controllerUrl = "../../Controllers/CommonController.php";
    var postDataFormat = "json";
    var postMethod = "POST";
    var postParameters = { "userAction": "getActualFinancesStatus" };
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
     
    sendAjaxRequest(xhrArgs, fetchDataCompleted);

    //get postback result
    function fetchDataCompleted(data) {
        var jsonData = data;
        debugMessageToConsole("items json data: " + data, lowLevel);
        // display all
        $(".row").removeClass("hideContent");
        // clear error message
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "fetchDataCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        
        if(jsonData[0] != null){
            var sumIncomes = jsonData[0].sumIncomes.toString().replace(".", ",");
            var sumExpenses = jsonData[0].sumExpenses.toString().replace(".", ",");;
            var actualAmount = jsonData[0].actualAmount.toString().replace(".", ",");;
            var index = 0;
            var rowClass = "";

            $("#actualFinancialStatusTable tbody").html("");
            // add header
            index % 2 == 0 ? rowClass = "even rowPointer" : rowClass = "odd rowPointer";
            var rowData = '<tr   class="' + rowClass + '">'
                            + '<td class="toLeft fieldDetailsTitle">Entr&eacute;es (&#8364;)</td>'
                            + '<td class="toLeft fieldDetailsTitle">D&eacute;penses (&#8364;)</td>'
                            + '<td class="toRight fieldDetailsTitle">&Eacute;tat actuel (&#8364;)</td>'
                        + '</tr>';
            $("#actualFinancialStatusTable tbody").append(rowData);
            index++;
            index % 2 == 0 ? rowClass = "even rowPointer" : rowClass = "odd rowPointer";
            var formattedAmount = actualAmount.replace(",", ".");
            //alert(parseFloat(formattedAmount));
            var value = parseFloat(formattedAmount);
            var actualCss = "toGreen"; 
            if(value < 0){
                actualCss = "toRed";
            }
            var rowData = '<tr  class="' + rowClass + '">'
                                + '<td class="toLeft">' + sumIncomes + ' &#8364;</td>'
                                + '<td class="toLeft">' + sumExpenses + ' &#8364;</td>'
                                + '<td class="toRight ' + actualCss + '">' + actualAmount + ' &#8364;</td>'
                    + '</tr>';
            $("#actualFinancialStatusTable tbody").append(rowData);
            // display actual
            
            $("#totalActual").attr("class", actualCss);
            $("#totalActual").html(actualAmount + "&#8364;");
        }
    }

}

 


