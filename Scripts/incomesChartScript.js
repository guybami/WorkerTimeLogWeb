/**
 * Script to manage a  Income model entity.
 * @author
 *     Guy Bami W.
 * Created changes: 31.03.2017 20:24:54
 */

// global varaibles
var incomesStore = null;
var incomesGrid = null;
var currentItemIndex = -1;
var itemsArrayIds = new Array();
var currentIncomeId = -1;
 
 var controllerUrl = "../../Controllers/IncomeController.php";
var jsonErrorMsg = "An error occured with json returned data";
var chartContainerId = "chartContainer";
var incomesList = new Array();
var chartCaption = "Statistique Des Dépenses";



$(document).ready(function () {
                      
    var currentDate = new Date();
    loadIncomesChart(null);
    
    $("#filterCurrentYearBtn").click(function () {
        
        $(this).addClass("btn-primary");
        $("#filterPreviousYearBtn").removeClass("btn-primary");
        $("#filterPreviousPrevYearBtn").removeClass("btn-primary");

        $("#filterPreviousYearBtn").addClass("btn-default");
        $("#filterPreviousPrevYearBtn").addClass("btn-default");
        fetchAndDisplayIncomes(currentDate.getUTCFullYear());
        loadIncomesChart(currentDate.getUTCFullYear());  
        
    });

    $("#filterPreviousYearBtn").click(function () {
        
        $(this).addClass("btn-primary");
        $("#filterCurrentYearBtn").removeClass("btn-primary");
        $("#filterPreviousPrevYearBtn").removeClass("btn-primary");

        $("#filterPreviousPrevYearBtn").addClass("btn-default");
        $("#filterCurrentYearBtn").addClass("btn-default");
        fetchAndDisplayIncomes(currentDate.getUTCFullYear() - 1);
        loadIncomesChart(currentDate.getUTCFullYear() - 1);  
    });

    $("#filterPreviousPrevYearBtn").click(function () {
         
        $(this).addClass("btn-primary");
        $("#filterCurrentYearBtn").removeClass("btn-primary");
        $("#filterPreviousYearBtn").removeClass("btn-primary");

        $("#filterCurrentYearBtn").addClass("btn-default");
        $("#filterPreviousYearBtn").addClass("btn-default");
        fetchAndDisplayIncomes(null);
        loadIncomesChart(null);
    });

});


function loadIncomesChart(year){
    var controllerUrl = "../../Controllers/IncomeController.php";
    var postDataFormat = "json";
    var postMethod = "POST";
    var postParameters = { "userAction": "getAllIncomesByYear" };
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
    
    // show overlay
    //$(".row").addClass("hideContent");
    clearContentDivs();
    // reset list
    incomesList = new Array();
    
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
            var income = {
                    "label": getFrenchMonthName(jsonData[i].currentMonth) + " " + jsonData[i].currentYear,
                    "value": jsonData[i].sumIncomes
                };
            if(year != null && jsonData[i].currentYear == year){
                incomesList.push(income);
            }
            else if(year == null){
                incomesList.push(income);
            }
        }
        $(".row").removeClass("hideContent");
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
                "yAxisName": "Entrées Anuelles (Euro)",
                "labelFontColor": "0075c2",
                "labelFontSize": "13",
                "rotateValues": "0",
                "theme": "fint",
                "showLegend": "0",
                "showPercentValues": "1",
                "showPercentInToolTip": "0",
                "legendPosition": "bottom",
                "legendCaption": "Entrées session mandant ",
                "legendScrollBgColor": "#cccccc",
                "legendScrollBarColor": "#999999"
            },
            "data":  incomesList
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
    $("#incomesListTable tbody").html("");
    //$('#incomesListTable tbody').slideUp("slow", function() { $('#expensesListTable tbody').remove();});
    $("#tournamentsDiv").html("");
}












