/**
 * Script for progressbar
 * @author
 *     Guy Bami W.
 * Created changes: 10.05.2017 20:24:54
 */

var uploadedPercent = 0;
var refershRateMs = 10;  // refreh per Mb
var ratePerMegabytes = 10; // 600 ms / Mb (calculated from a test of import time for 1MB using Stopwatch.StartNew()
var setTimeoutFuncId;

// datagrid settings
var jsonErrorMsg = "An error occured with json returned data";
 
var controllerUrl = "../../Controllers/UploadFileController.php";
 
var fileUploadProgressId = "fileUploadProgress";
var progressBarDivId = "progressBarDiv";
var holderContentDivId = "holderContentDiv";
var taskCompleted = false;

$(document).ready(function () {
   $("#taskBtn").click(function(){
        var currentValue = $("#" + fileUploadProgressId).attr("aria-valuenow");
        //alert(currentValue);
        //var val = parseInt(currentValue) + 10;
        //$(".progress-bar").attr("aria-valuenow", val);
        //$('.progress-bar').css('width', val+'%').attr('aria-valuenow', val); 
        displayProgressBar();
   });
});


function setValueProgress(val){
    if(val && val > 0){
        $("#" + fileUploadProgressId).css("width", val + "%").attr("aria-valuenow", val); 
    }
    
}


function displayProgressBar() {
    
    var fileSizeInMegabytes = 5; //GetFileSize(fileUplaoderId);
    refershRateMs = fileSizeInMegabytes * ratePerMegabytes * 0.9;
    $("#" + progressBarDivId).removeClass("hideContent");
    showSearchingOverlay(holderContentDivId);
    refreshProgressBar();
    //alert('refershRateMs: ' + refershRateMs + ' ms');
    //alert('fileSizeInMegabytes: ' + fileSizeInMegabytes + ' MB');
    var postDataFormat = "json";
    var postMethod = "POST";
    var postParameters = { "userAction": "testDelay" };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: postDataFormat,
        method: postMethod,
        error: function (errorMsg) {
            logError({
                message: "Reponse failed to simulate with error: " + errorMsg
            });
        }
    };

    sendAjaxRequest(xhrArgs, fetchDataCompleted);
    
    function fetchDataCompleted(data) {
        var jsonData =  data;
        taskCompleted = true;
        refreshProgressBar();
        debugMessageToConsole("items json data: " + data, highLevel);
    }

}

function hideProgressBar() {
    $("#" + progressBarDivId).addClass("hideContent");
}


function refreshProgressBar() {
    //alert(11);
    if (taskCompleted == true) {
        //alert('done!');
        setValueProgress(100);
        hideSearchingOverlay(holderContentDivId);
        clearTimeout(setTimeoutFuncId);
        return;
    }
    if (uploadedPercent > 98 && taskCompleted == true) {
        
        setValueProgress(100);
        hideSearchingOverlay("holderContentDiv");
        clearTimeout(setTimeoutFuncId);
        alert('done2!');
    }
    else if (uploadedPercent <= 98){
        ++uploadedPercent;
        setValueProgress(uploadedPercent);
        setTimeoutFuncId = setTimeout(refreshProgressBar, refershRateMs);
    }
}


function resetProgressBar() {
    setValueProgress(0);
    clearTimeout(setTimeoutFuncId);
}


 