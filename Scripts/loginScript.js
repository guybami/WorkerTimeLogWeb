/**
 * Script use to handle user login process
 * @author
 *     Guy Bami W.
 * Created changes: 08.07.2017 10:24:57
 */




var userRegistrationDialogContentDialogId = "userRegistrationDialogContentDialog";
var userRegistrationFormId = "userRegistrationForm";
var userLoginDivId = "userLoginDiv";
var userRegistrationDialogContentId = "userRegistrationDialogContent";
var userRegistrationFormContentDivId = "userRegistrationFormContentDiv";
var errorContentDivId = "errorContentDiv";
var controllerUrl = "./Controllers/UserController.php";

$(document).ready(function () {
    $("#userLoginDiv").attr("class", "");
    //showSearchingOverlay("userLoginDiv");
    // register events
    registerKeyPressedEvent("userLoginName", checkUserCredentials);
    registerKeyPressedEvent("userPassword", checkUserCredentials);
    
    $("#userRegistrationLink").click(function () {
        // open registration dialog
        var userRegistrationFormContent = $("#" + userRegistrationFormContentDivId).html();
        $("#" + userRegistrationDialogContentId).html(userRegistrationFormContent);
        if ($("#" + userRegistrationDialogContentDialogId) != null) {
            $("#" + userRegistrationDialogContentDialogId).modal("show");
        }
        
    });
    
    $("#registerUserBtnDialog").click(function () {
        validateInputsBeforeRegisterNewUser();
    });
    
    
    $("#loginBtn").click(function () {
        validateUserLogin();
    });
    // onchange
    //var userCulture = $("#userCultureSelect");
    //userCulture.on("change", function (evt) {
    //    var selectedCulture = userCulture.get("value");
    //    // set value to post
    //    $("#" + initLocaleBtnId).val(selectedCulture);
    //    $("#" + initLocaleBtnId).click();
    //});

});


 

function validateUserLogin() {
    checkUserCredentials();
}


function checkUserCredentials() {
    
    var loginName = $("#userLoginName").val();
    var userPassword = $("#userPassword").val();
    var postParameters = {
        userAction: "checkUserCredentials",
        userName: loginName,
        userHashPassword: userPassword
    };

    // set credentials 
    var credentialsObj = { UserName: (loginName),  
        UserHashPassword: userPassword
    };

    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: "json",
        method: "POST",
        error: function (errorMsg) {
            displayErrorContent("errorContentDiv", "checkEmployeeCredentials failed: " + errorMsg);
            logError({ message: "Failed to checkEmployeeCredentials. Error: " + errorMsg });
        }
    };
    var invalidLoginMsgLabel =   "Identifiant ou mot-de-passe incorrect";
   
    $("#invalidLoginSpan").html("");
    $("#errorContentDiv").html("");
    showSearchingOverlay("userLoginDiv");
    // disable button
    //$("#loginBtn").attr("disabled", true);
    if (loginName == "" || loginName.length == 0 || userPassword.length == 0) {
        $("#invalidLoginSpan").html(invalidLoginMsgLabel);
        return;
    }

    // send async xhr request to server
    sendAjaxRequest(xhrArgs, checkCredentialsCompleted);

    function checkCredentialsCompleted(data) {
        debugMessageToConsole("retrieveCompleted postback data: " + data, lowLevel);
        var jsonData = data;
        try {
            hideSearchingOverlay("userLoginDiv");
            
            debugMessageToConsole("retrieveCompleted data length: " + jsonData.length, highLevel);
            if (jsonData.length == 0) {
                $("#invalidLoginSpan").html(invalidLoginMsgLabel);
                //$("#loginBtn").attr("disabled", false);
                return;
            }
            else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
                //displayErrorContent("errorContentDiv", jsonData[0].jsonErrorMessage);
                displayErrorContent("errorContentDiv", "Internal server error 2002. Please contact the administrator(guybami@yahoo.fr)");
                //$("#loginBtn").attr("disabled", false);
                return;
            }
            else {
                //alert(jsonData[0].jsonResult);
                var isAuthenticated =  jsonData[0].jsonResult;
                // reset button state
                //$("#loginBtn").attr("disabled", false);
                if (isAuthenticated != null && isAuthenticated.toString() == "true") {
                    //alert("init session....");
                    initUserSession(loginName, userPassword);
                }
                else {
                    $("#invalidLoginSpan").html(invalidLoginMsgLabel);
                }
            }
        }
        catch (err) {
            displayErrorContent("errorContentDiv", err + "");
        }
    }
}


function initUserSession(_loginName, _encryptedData) {
  
    var xhrArgs = {
        url: "./Models/InitUserSession.php",
        postData: { loginName: _loginName, encryptedData: _encryptedData},
        success: function (data) {
            // load home page 
            $(window).attr("location", webSiteRootURL);
        },
        error: function (err) {
            logError(err);
        }
    };
    // send data
    $("#hiddenDiv").load(xhrArgs.url, xhrArgs.postData, xhrArgs.success);
}

 

function validateInputsBeforeRegisterNewUser() {

    var isFormInputsValid = true; // $("#" + userRegistrationFormId).valid();

    //validate password
    function validatePassword() {
        if ($("#hashPassword").value != $("#confirm_hashPassword").value) {
            isFormInputsValid = false;
        } else {
            
        }
    }
    //validatePassword();

    if (isFormInputsValid) {
        // close dialog
        closeUserRegistrationDialog();
        // add callback
        $( document ).ready( function(){
            registerNewUser();
        });
        
    }
}



function closeUserRegistrationDialog() {
    if ($("#" + userRegistrationDialogContentDialogId) != null) {
        $("#" + userRegistrationDialogContentDialogId).modal("hide");
    }
}

function registerNewUser() {

    
    // convert form to json object
    var userRegistrationFormObject = $("#" + userRegistrationFormId).serializeObject();
   
    var postParameters = {
        "formValues[]": JSON.stringify(userRegistrationFormObject),
        "userAction": "insertNewItem"
    };
     

    //get postback result
    function addNewUserCompleted(data) {

        debugMessageToConsole("addNewUserCompleted data : " + data, highLevel);
        // get json result
        var jsonData = data;
        // clear error message
        $("#" + errorContentDivId).html("");
        if (jsonData == null) {
            displayErrorContent(errorContentDivId, "addNewUserCompleted: " + jsonErrorMsg);
            return;
        } else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent(errorContentDivId, jsonData[0].jsonErrorMessage);
            return;
        }
        // redirect to home
        initUserSession(userRegistrationFormObject.loginName, userRegistrationFormObject.hashPassword);
    }

    // send async xhr request to server
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: "json",
        method: "POST",
        error: function (errorMsg) {
            displayErrorContent("errorContentDiv", "checkEmployeeCredentials failed: " + errorMsg);
            logError({ message: "Failed to checkEmployeeCredentials. Error: " + errorMsg });
        }
    };
     
     

    // send async xhr request to server
    sendAjaxRequest(xhrArgs, addNewUserCompleted);

}
