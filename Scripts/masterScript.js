
 /*
 * Script used for master page.
 * Author: Guy Bami
 * Last change: 30.09.2015

 */


var customUserRolesManagerObject = null;



 
function parseMainMenu(_callbackFunc) {
    require(["dojo/dom",
        "dojo/parser",
        "dojo/ready",
    "dijit/registry",
    "dijit/MenuBar",
    "dijit/PopupMenuBarItem",
    "dijit/DropDownMenu",
    "dijit/layout/ContentPane",
    "dijit/form/Button"],
    function (dom, parser, ready, registry) {
        ready(function () {
            if (typeof parser.parse !== "undefined"
                                && typeof parser.parse == "function") {
                parser.parse().then(function () {
                    // main menu on master page
                    $('#mainMenuCol').removeClass("hideContent");
                    $('#toolbarBntsDiv').attr("class", "");
                    $('#sectionTitleAndToolbarBtnDiv').removeClass("hideContent");


                    if (typeof _callbackFunc !== "undefined"
                                    && typeof _callbackFunc == "function") {
                        fetchCurrentUserRoles(_callbackFunc);
                    }
                    else {
                        //alert('No call back');
                        fetchCurrentUserRoles();
                    }

                });
            }
            
        });
    });
}

 

function viewHomePage() {
    if (webSiteRootURL == null) {
        logError({ message: "webSiteRootURL is not defined or null!" });
        return;
    }
    $(window).attr('location', webSiteRootURL);
}

function viewConferencesPage() {
    if (webSiteRootURL == null) {
        logError({ message: "webSiteRootURL is not defined or null!" });
        return;
    }
    //alert(1);
    $(window).attr('location', webSiteRootURL + "/Views/Administration/ViewAllConferences.php");
}

function viewServiceSettingsPage() {
    if (webSiteRootURL == null) {
        logError({ message: "webSiteRootURL is not defined or null!" });
        return;
    }
    //alert(1);
    $(window).attr('location', webSiteRootURL + "/Views/Settings/EventStreamingService.aspx");
}





function viewEkahauPatients() {
    if (webSiteRootURL == null) {
        logError({ message: "webSiteRootURL is not defined or null!" });
        return;
    }
    //alert($(window).attr('location'));
    $(window).attr('location', webSiteRootURL + "/Views/EkahauPatient/ViewAllEkahauPatients.aspx");
}


function viewUserRolesPage() {
    if (webSiteRootURL == null) {
        logError({ message: "webSiteRootURL is not defined or null!" });
        return;
    }
    //alert(1);
    $(window).attr('location', webSiteRootURL + "/Views/Administration/ViewAllUserRoles.aspx");

}


function viewUserAccountsPage() {
    if (webSiteRootURL == null) {
        logError({ message: "webSiteRootURL is not defined or null!" });
        return;
    }
    $(window).attr('location', webSiteRootURL + "/Views/Administration/ViewAllUsers.aspx");
}
 
 


function setActiveMenuItem(menuItemId) {
    // remove old
    $('.activeMenuItem').removeClass('activeMenuItem');
    // add to new item
    $('#' + menuItemId).addClass('activeMenuItem');
}


function fetchCurrentUserRoles(_callback) {
   
    var objectFields = {
        entityType: "-",
        userName: currentUserName,
        userRolesData: [],
        accessDeniedPage: webAccessDeniedPage,
        useRoleManager: false,
        parsePageWidgetsCallbackMethod: function () { }
    };
    //$("#homeImg").attr("src", "Images/Logos/SMK_Zones.jpg");
    $("#homeImg").addClass("smallBorder");
    

    if (objectFields.useRoleManager == false) {
         
        customUserRolesManagerObject = new CustomUserRolesManager(objectFields);
        if (typeof _callback !== "undefined" && typeof _callback == "function") {
            _callback();
        }
        return;
        
    }
    // hier apply user role to the main menu

    customUserRolesManagerObject = new CustomUserRolesManager(objectFields);
    // callback function
    var applyUserRolesToCurrentPage = function () {

        var breakInnerLoop = false;
        var accessRight = "readRight";
        if (breakInnerLoop) {
            // break
            return false;
        }
        $.each(customUserRolesManagerObject.userRolesData, function (i, entry) {
            if (!objectFields.useRoleManager) {
                entry.readRight = true;
                entry.editRight = true;
                entry.deleteRight = true;
                entry.fullRight = true;
                entry.createRight = true;
            }
            // Menu NURSE
             

        });

         

        // now show main menu
        $('#mainMenuDiv').removeClass("hideContent");

        if (typeof _callback !== "undefined" && typeof _callback == "function") {
            _callback();
        }
    };
    customUserRolesManagerObject.getCurrentUserRoleData(applyUserRolesToCurrentPage);
}


 
$(document).ready(function () {
    $("footer").removeClass("hideContent");
});
 