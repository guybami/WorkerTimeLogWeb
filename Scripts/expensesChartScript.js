/**
 * Script to manage a  Expense model entity.
 * @author
 *     Guy Bami W.
 * Created changes: 31.03.2017 20:24:54
 */

// global varaibles
var expensesStore = null;
var expensesGrid = null;
var currentItemIndex = -1;
var itemsArrayIds = new Array();
var currentExpenseId = -1;
 
 var controllerUrl = "../../Controllers/ExpenseController.php";
var jsonErrorMsg = "An error occured with json returned data";
var chartContainerId = "chartContainer";
var expensesList = new Array();
var chartCaption = "Statistique Des Dépenses";



$(document).ready(function () {
                      
    var currentDate = new Date();
    loadExpensesChart(null);
    
    $("#filterCurrentYearBtn").click(function () {
        
        $(this).addClass("btn-primary");
        $("#filterPreviousYearBtn").removeClass("btn-primary");
        $("#filterPreviousPrevYearBtn").removeClass("btn-primary");

        $("#filterPreviousYearBtn").addClass("btn-default");
        $("#filterPreviousPrevYearBtn").addClass("btn-default");
        fetchAndDisplayExpenses(currentDate.getUTCFullYear());
        loadExpensesChart(currentDate.getUTCFullYear());  
        
    });

    $("#filterPreviousYearBtn").click(function () {
        
        $(this).addClass("btn-primary");
        $("#filterCurrentYearBtn").removeClass("btn-primary");
        $("#filterPreviousPrevYearBtn").removeClass("btn-primary");

        $("#filterPreviousPrevYearBtn").addClass("btn-default");
        $("#filterCurrentYearBtn").addClass("btn-default");
        fetchAndDisplayExpenses(currentDate.getUTCFullYear() - 1);
        loadExpensesChart(currentDate.getUTCFullYear() - 1);  
    });

    $("#filterPreviousPrevYearBtn").click(function () {
         
        $(this).addClass("btn-primary");
        $("#filterCurrentYearBtn").removeClass("btn-primary");
        $("#filterPreviousYearBtn").removeClass("btn-primary");

        $("#filterCurrentYearBtn").addClass("btn-default");
        $("#filterPreviousYearBtn").addClass("btn-default");
        fetchAndDisplayExpenses(null);
        loadExpensesChart(null);
    });

});


function loadExpensesChart(year){
    var controllerUrl = "../../Controllers/ExpenseController.php";
    var postDataFormat = "json";
    var postMethod = "POST";
    var postParameters = { "userAction": "getAllExpensesByYear" };
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
    
    // clear old content
    clearContentDivs();
    //$(".row").addClass("hideContent");
    ////showSearchingOverlay(holderContentDivId);
    // reset list
    expensesList = new Array();
    
    sendAjaxRequest(xhrArgs, fetchDataCompleted);
    
    function fetchDataCompleted(data){
        
        var jsonData = data;
        debugMessageToConsole('items json data: ' + data, lowLevel);
        // hide loading img
        //hidePostbackOverlay();
         
        if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent('errorContentDiv', jsonData[0].jsonErrorMessage);
            return;
        }
        
        for(var i = 0; i < jsonData.length; i++){
            var expense = {
                    "label": getFrenchMonthName(jsonData[i].currentMonth) + " " + jsonData[i].currentYear,
                    "value": jsonData[i].sumExpenses
                };
            if(year != null && jsonData[i].currentYear == year){
                expensesList.push(expense);
            }
            else if(year == null){
                expensesList.push(expense);
            }
        }
        //$(".row").removeClass("hideContent");
        // gantt data
        var chartJsonData = {
            "chart": {
                "caption": chartCaption,
                "subCaption": "Kameruner Heilbronn e.V.",
                "xAxisName": "Mois",
                //"yNumberSuffix": "M",
                //"numberSuffix": "M",
                "numberPrefix" : " ",
                "formatNumberScale": "0",
                "decimalSeparator": ",",
                "thousandSeparator": ".",
                "yFormatNumberScale": "1",
                "yAxisName": "Dépenses Anuelles (Euro)",
                "labelFontColor": "0075c2",
                "labelFontSize": "13",
                "rotateValues": "0",
                "theme": "fint",
                "showLegend": "0",
                "showPercentValues": "1",
                "showPercentInToolTip": "0",
                "legendPosition": "bottom",
                "legendCaption": "Dépenses session mandant ",
                "legendScrollBgColor": "#cccccc",
                "legendScrollBarColor": "#999999"
            },
            "data":  expensesList
        };
             
        // create gantt chart
        FusionCharts.ready(function () {
            var windowWidth = $(window).width() - 500;
            var ganttProjectsChart = new FusionCharts({
                "type": "column3d",
                "renderAt": chartContainerId,
                "width": windowWidth,
                "height": "600",
                "dataFormat": "json",
                "dataSource": chartJsonData
            });

            ganttProjectsChart.render();
        });
    }
}
    

function clearContentDivs(){
    $("#expensesListTable tbody").html("");
    //$('#expensesListTable tbody').slideUp("slow", function() { $('#expensesListTable tbody').remove();});
    $("#tournamentsDiv").html("");
}










