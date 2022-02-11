
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

 

$(document).ready(function () {
    try {

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


        // upload button event
        $('#uploadImgBtn').click(function () {
            var formData = null; //new FormData($('#uploadImageForm')[0]);
            if (window.FormData) {
                formData = new FormData($('#uploadImageForm')[0]);
            }
            else {
                formData = $('#uploadImageForm').serialize();
            }

            $.ajax({
                url: controllerUrl, //Server script to process data
                type: 'POST',
                xhr: function () {  // Custom XMLHttpRequest
                    var myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload) { // Check if upload property exists
                        myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // For handling the progress of the upload
                    }
                    return myXhr;
                },
                //Ajax events
                beforeSend: null,
                success: function (data) {
                    jsonData = $.parseJSON(data);
                    //alert(data);
                    $.each(jsonData, function(index, item){
                         
                        alert('Name: ' +  item.entryKey + ' Status: ' +  item.status);
                    });
                },
                error: function () {
                    alert('error');
                },
                // Form data
                data: formData,
                //Options to tell jQuery not to process data or worry about content-type.
                cache: false,
                contentType: false,
                processData: false
            });
        });

        // upload video
        $('#uploadVideoBtn').click(function () {
            var formData = new FormData($('#uploadVideoForm')[0]);
            if (window.FormData) {
                formData = new FormData($('#uploadVideoForm')[0]);
            }
            else {
                formData = $('#uploadVideoForm').serialize();
            }
            alert('video');
            $.ajax({
                url: controllerUrl, //Server script to process data
                type: 'POST',
                xhr: function () {  // Custom XMLHttpRequest
                    var myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload) { // Check if upload property exists
                        myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // For handling the progress of the upload
                    }
                    return myXhr;
                },
                //Ajax events
                beforeSend: null,
                success: function () {
                    
                },
                error: function () {
                    alert('error');
                },
                // Form data
                data: formData,
                //Options to tell jQuery not to process data or worry about content-type.
                cache: false,
                contentType: false,
                processData: false
            });
        });

    }
    catch (err) {
        logError(err);
    }
});





function progressHandlingFunction(e) {
    if (e.lengthComputable) {
        $('progress').attr({value: e.loaded, max: e.total});
    }
}
 
 


// get all selected file names

$('input#my_id').change(function(){
    var files = $(this)[0].files;
    
    
    $.each(files, function(index, cfile){
      var fileSize = cfile.size;//size in bytes
      if(fileSize > 1024)
      	fileSize = fileSize / 1024.0; //size in kb
    	alert('Name: ' +  cfile.name + ' Size: ' +  fileSize);
    });
    
    if(files.length > 10){
        //alert("you can select max 10 files.");
    }else{
        //alert("correct, you have selected less than 10 files");
    }
});


 