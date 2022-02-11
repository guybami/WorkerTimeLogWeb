
// Author: Guy Bami 
// home script

// Author: Guy Bami 
// home script

var uploadedPercent = 0;
var refershRateMs = 10;  // refreh per Mb
var ratePerMegabytes = 600; // 600 ms / Mb (calculated from a test of import time for 1MB using Stopwatch.StartNew()
var setTimeoutFuncId;

// datagrid settings
var gridDefaultPageSize = 30;
var gridDefaultStyle = "width:100%;height:60em;";
var jsonErrorMsg = "An error occured with json returned data";
var successImg = ".../../Resources/Images/Buttons/success_icon.png";
var controllerUrl = "../../Controllers/UploadFileController.php";
var registred = false;
var confirmationImportLabel = "Die Daten wurden erfolgreich importiert.";
var taskCompleted = false;
var addisonDirectory = "\\\\srv-addison01\\Addison\\"; // addison live (addison01) or test (addison02) directory

// load all dojo dependencies modules
require(["dojo/parser",
     "dojo/dom",
     "dojo/Deferred",
    "dijit/form/Button",
    "dijit/form/ValidationTextBox",
    "dijit/form/NumberTextBox",
    "dijit/form/Form",
    "dojo/dom-form",
    "dojo/dom-construct",
    "dojo/domReady!",
    "dojo/_base/lang",
    "dijit/ProgressBar" 
]);



/**
 * load method
 * @param {type} parser
 * @param {type} ready
 * @param {type} dom
 * @returns {none}
 */
require(["dojo/parser", "dojo/ready", "dojo/dom"],
    function (parser, ready, dom) {
        ready(function () {
            try {
                // parse main menu
                parseMainMenu(displayHome);
                // bind onchange event for fileupload control
                $('input[type=file]').change(function () {
                    var selectedFileName = $(this).val(); // full file name
                    // remove directory name
                    var selectedFileNameWithoutDir = selectedFileName;
                    if (selectedFileName.lastIndexOf('\\') != -1)
                        selectedFileNameWithoutDir = selectedFileName.substr(selectedFileName.lastIndexOf('\\') + 1);
                        selectedFileNameWithoutDir = selectedFileNameWithoutDir.toString().toLowerCase();
                    //alert(selectedFileNameWithoutDir);
                    // set fileName field
                    $('#fileName').val(selectedFileNameWithoutDir);
                });
            }
            catch (err) {
                logError(err);
            }
        });
    });

function displayHome() {
}

function showSelectFileDialog() {
    //trigger event click of file control
    $('input[type=file]').trigger('click');
}

/*
 register client validator for required fields
*/
function registerClientValidators() {
    setFileNameClientValidator();
    setDirectoryNameClientValidator();
}

function setFileNameClientValidator() {
    var fileNameTextbox = dijit.byId("fileName");

    if (fileNameTextbox != null) {
        fileNameTextbox.validator = function () {

            var valueToValidate = dijit.byId("fileName").get('value'); // this.value;
            var isValid = true;

            if (valueToValidate.length == 0 || $.trim(valueToValidate).length == 0) {
                //this.set("invalidMessage", "Required field!");
                this.set("message", "Pflichtfeld!");
                fileNameTextbox.focus();
                return false;
            }
            var fileExtension = valueToValidate.substring(valueToValidate.lastIndexOf(".") + 1, valueToValidate.length);
            if (valueToValidate.length == 0) {
                // write error message
                return false;
            }

            // do not file name with directory
            if (valueToValidate.indexOf("\\") != -1) {
                this.set("invalidMessage", "Bitte die Dateiname ohne Pfad eingeben!");
                this.set("message", "Bitte Dateiname ohne Pfad eingeben!");
                fileNameTextbox.focus();
                return false;
            }
            ///alert(fileExtension);
            if (fileExtension != "jpg" && fileExtension != "gif" && fileExtension != "jpeg") {
                isValid = false;
            }

            if (isValid == false) {
                this.set("invalidMessage", "Es dürfen nur Image-Dateien hochgeladen werden!");
                this.set("message", "Es dürfen nur Image-Dateien hochgeladen werden!");
                fileNameTextbox.focus();
                return false;
            }
            return true;
        };
    }
}



function setDirectoryNameClientValidator() {
    var dirNameTextbox = dijit.byId("dirName");

    if (dirNameTextbox != null) {
        dirNameTextbox.validator = function () {

            var valueToValidate = dijit.byId("dirName").get('value'); // this.value;
            var isValid = true;

            if (valueToValidate.length == 0 || $.trim(valueToValidate).length == 0) {
                //this.set("invalidMessage", "Required field!");
                this.set("message", "Pflichtfeld!");
                dirNameTextbox.focus();
                return false;
            }
            // check directory name
            if (valueToValidate.indexOf("\\") == -1) {
                this.set("invalidMessage", "Bitte einen gültigen Pfadname eingeben!");
                this.set("message", "Bitte einen gültigen Pfadname eingeben!");
                dirNameTextbox.focus();
                return false;
            }

            return true;
        };
    }
}



function displayProgressBar() {

    var fileSizeInMegabytes = GetFileSize(fileUploadId);
    refershRateMs = fileSizeInMegabytes * ratePerMegabytes * 0.8;
    refreshProgressBar();
    //alert('refershRateMs: ' + refershRateMs + ' ms');
    //alert('fileSizeInMegabytes: ' + fileSizeInMegabytes + ' MB');

}

function hideProgressBar() {
    $('#progressCol').addClass("hideContent");
}


function refreshProgressBar() {
    if (taskCompleted == true) {
        //alert('Abgeschlossen!');
        uploadImageProgress.set({ value: 100 });
        hideSearchingOverlay("uploadImageFormContentDiv");
        dijit.byId('uploadImageBtn').set('disabled', false);
        showSuccessOverlay("successOverlayDiv", confirmationImportLabel, successImg, 3000, 2000);
        clearTimeout(setTimeoutFuncId);
        return;
    }
    if (uploadedPercent > 98 && taskCompleted == true) {
        //alert('Abgeschlossen!');
        uploadImageProgress.set({ value: 100 });
        hideSearchingOverlay("uploadImageFormContentDiv");
        dijit.byId('uploadImageBtn').set('disabled', false);
        showSuccessOverlay("successOverlayDiv", confirmationImportLabel, successImg, 3000, 2000);
        clearTimeout(setTimeoutFuncId);
    }
    else if (uploadedPercent <= 98) {
        uploadImageProgress.set({ value: ++uploadedPercent });
        setTimeoutFuncId = setTimeout(refreshProgressBar, refershRateMs);
    }

}


function resetProgressBar() {
    var uploadImageProgress = dijit.byId('uploadImageProgress');
    if (uploadImageProgress != null) {
        uploadedPercent = 0;
        uploadImageProgress.set({ value: uploadedPercent });
    }
    clearTimeout(setTimeoutFuncId);
}



function testReplace() {

    var dir = "O:\\Import Preisliste\\AddisonProductListImport";
    dir = dir.replace("O:\\", addisonDirectory);
    var data = dir.split("\\");
    for (var i = 0; i < data.length; i++) {
        if (data[i].length > 0) {
            alert(data[i]);
            break;
        }

    }
}

function uploadImageBtnClick() {


    if (!registred) {
        // add client validators
        registerClientValidators();
        registred = true;
    }

    if (uploadImageForm != null && !uploadImageForm.validate()) {
        return false;
    }

    taskCompleted = false;
    $('#progressCol').removeClass("hideContent");
    uploadedPercent = 0;
    resetProgressBar();
    displayProgressBar();

    //send data
    var uploadImageFormObject = dojo.formToObject("uploadImageForm");

    var fileNameWithPath = dijit.byId("fileName").get('value');
    var fileNameWithoutPath = fileNameWithPath;
    if (fileNameWithPath.lastIndexOf('\\') != -1)
        fileNameWithoutPath = fileNameWithPath.substr(fileNameWithPath.lastIndexOf('\\') + 1);
    //alert('file-name: ' + fileNameWithoutPath);
    //alert('dir-name: ' + uploadImageFormObject.dirName);
    uploadImageFormObject.fileName = fileNameWithoutPath;

    //// check directory and replace (if network disk) with the Addison network disc path
    //var sourceDirName = uploadImageFormObject.dirName;
    //uploadImageFormObject.dirName = sourceDirName.replace("O:\\", addisonDirectory);

    //var serverName = "."; // local by default
    //var remoteDirectory = uploadImageFormObject.dirName;
    //if (remoteDirectory.indexOf("\\\\") != -1) {
    //    var data = remoteDirectory.split("\\");
    //    for (var i = 0; i < data.length; i++) {
    //        if (data[i].length > 0) {
    //            serverName = "\\\\" + data[i];
    //            break;
    //        }
    //    }
    //}


    var postParameters = {
        // "formValues[]": dojo.toJson(uploadImageFormObject, true)
          "fileName": uploadImageFormObject.fileName
        , "userAction": "uploadImage"
    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: "text",
        method: "POST",
        sync: false,
        error: function (errorMsg) {
            logError("Failed to add new item. Error: " + errorMsg);
        }
    };

    $("#errorContentDiv").html("");
    showSearchingOverlay("uploadImageFormContentDiv");
    //dijit.byId('uploadImageBtn').set('disabled', true);
    taskCompleted = false;

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
        xhrArgs.error, importExcelDataCompleted, xhrArgs.sync);


    //get postback result
    function importExcelDataCompleted(data) {
        var jsonData = null;
        debugMessageToConsole("items json data: " + data, lowLevel);
        jsonData = data;

        $("#errorContentDiv").html("");
        //hideSearchingOverlay("uploadImageFormContentDiv");
        //dijit.byId('uploadImageBtn').set('disabled', false);

        if (jsonData == null) {
            hideSearchingOverlay("uploadImageFormContentDiv");
            displayErrorContent("errorContentDiv", "fetchDataCompleted: " + jsonErrorMsg);
            clearTimeout(setTimeoutFuncId);
            hideProgressBar();
            dijit.byId('uploadImageBtn').set('disabled', false);
            taskCompleted = true;
            return;
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            hideSearchingOverlay("uploadImageFormContentDiv");
            displayErrorContent("errorContentDiv", jsonData[0].jsonErrorMessage);
            clearTimeout(setTimeoutFuncId);
            hideProgressBar();
            dijit.byId('uploadImageBtn').set('disabled', false);
            taskCompleted = true;
            return;
        }
        taskCompleted = true;
        refreshProgressBar();
        alert('Der Import Vorgang wurde erfolgreich abgeschlossen!');
        //alert('result: ' + jsonData[0].jsonResult);
        //$('#reportContentDiv').html(jsonData[0].jsonResult);
    }


}



function GetFileSize(fileUplaoderId) {

    try {
        var fileSize = 0;
        //for IE
        if ($.browser.msie == true) {
            //we could use this $.browser.msie but since it's depracted we'll use this function
            //before making an object of ActiveXObject, 
            //please make sure ActiveX is enabled in your IE browser
            var objFSO = new ActiveXObject("Scripting.FileSystemObject");
            var filePath = $("#" + fileUplaoderId)[0].value;
            var objFile = objFSO.getFile(filePath);
            var fileSize = objFile.size; //size in kb
            fileSize = fileSize / 1048576; //size in mb 
        }
        else {
            //for FF, Safari, Opeara and Others
            fileSize = $("#" + fileUplaoderId)[0].files[0].size; //size in kb
            fileSize = fileSize / 1048576.0; //size in mb 

        }
        // alert("Uploaded File Size is: " + fileSize + "MB");
        return fileSize;
    }
    catch (e) {
        logError("Error occured : " + e);
    }
}




function openLogDatails() {
}

function fileName(openFileDialog) {
    return $('#' + openFileDialog).val();
}
function hasFile(openFileDialog) {
    return $('#' + openFileDialog).val() != "";
}
function fileNameWithoutFakePath(openFileDialog) {
    var fileName = $('#' + openFileDialog).val();
    return fileName.substr(fileName.lastIndexOf('\\') + 1);
}
function fakePathWithoutFileName(openFileDialog) {
    var fileName = $('#' + openFileDialog).val();
    return fileName.substr(0, fileName.lastIndexOf('\\'));
}
