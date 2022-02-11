
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


function viewMembersListPage() {
    if (webSiteRootURL == null) {
        logError({ message: "webSiteRootURL is not defined or null!" });
        return;
    }
    //alert(1);
    $(window).attr('location', webSiteRootURL + "/Views/Members/ViewMembers.php");
}


function viewAdminDashboard() {
    if (webSiteRootURL == null)
        logError({ message: "webSiteRootURL is not defined or null!" });
    //alert(1);
    $(window).attr('location', webSiteRootURL + "/Views/Administration/AdminDashboard.aspx");
}


function viewAllAlarmRules() {
    if (webSiteRootURL == null)
        logError({ message: "webSiteRootURL is not defined or null!" });
    //alert(1);
    $(window).attr('location', webSiteRootURL + "/Views/Administration/ViewAllAlarmRules.aspx");
}

function viewMycoMessageLogsPage() {
    if (webSiteRootURL == null)
        logError({ message: "webSiteRootURL is not defined or null!" });
    $(window).attr('location', webSiteRootURL + "/Views/Logs/ViewMycoMessageLogs.aspx");
}

function viewEkahauEventStreamLogsPage() {
    if (webSiteRootURL == null)
        logError({ message: "webSiteRootURL is not defined or null!" });
    //alert(1);
    $(window).attr('location', webSiteRootURL + "/Views/Logs/ViewEkahauEventStreamLogs.aspx");
}

function viewEventsHistoryPage() {
    if (webSiteRootURL == null)
        logError({ message: "webSiteRootURL is not defined or null!" });
    //alert(1);
    $(window).attr('location', webSiteRootURL + "/Views/History/EventsHistory.aspx");
}


function viewHelpPage() {
    if (webSiteRootURL == null)
        logError({ message: "webSiteRootURL is not defined or null!" });
    //alert(1);
    //alert('This document is not yet ready.');
    
    $(window).attr('location', webSiteRootURL + "/Views/Help/XLS_Ekahau_Handbook_eng_V2.0.pdf");
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
        /*
        // display main menu and return
       // $('#mainMenuDiv').removeClass("hideContent");
        if (typeof _callback !== "undefined" && typeof _callback == "function") {
           // _callback();
        }
        var defaultUserRolesData = [];
        var allEntityTypes = ["Patient",
                "NurseDashboard",
                "RtlsSetting",
                "RtlsStreamListenerService",
                "User",
                "Role",
                "AdminDashboard",
                "AlarmRule",
                "EventsHistory",
                "MycoMessageLog",
                "EkahauEventStreamLog"
        ];
        $.each(allEntityTypes, function (i, type) {
            var obj = {
                entityType: type, createRight: true, readRight: true,
                editRight: true, deleteRight: true, fullRight: true
            };

            defaultUserRolesData.push(obj);
        });
        customUserRolesManagerObject.userRolesData = defaultUserRolesData;
        */
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
            if (entry.entityType.toString() == "Patient") {
                if (entry.readRight.toString() == "false") {
                    //alert('must hide patient');
                    customUserRolesManagerObject.setSubMenuItemVisibility(
                        customUserRolesManagerObject.mainMenuItemsObject.NURSE.subItems.Patients, false);
                    //decrease counter
                    //return false;
                    if (customUserRolesManagerObject.mainMenuItemsObject.NURSE.maxSubItemsVisible > 0)
                        customUserRolesManagerObject.mainMenuItemsObject.NURSE.maxSubItemsVisible--;
                }
            }
            else if (entry.entityType.toString() == "NurseDashboard") {
                if (entry.readRight.toString() == "false") {
                    customUserRolesManagerObject.setSubMenuItemVisibility(
                        customUserRolesManagerObject.mainMenuItemsObject.NURSE.subItems.NurseDashboard, false);
                    if (customUserRolesManagerObject.mainMenuItemsObject.NURSE.maxSubItemsVisible > 0)
                        customUserRolesManagerObject.mainMenuItemsObject.NURSE.maxSubItemsVisible--;
                }
            }
            // Menu SETTINGS
            else if (entry.entityType.toString() == "RtlsSetting") {
                if (entry.readRight.toString() == "false") {
                    customUserRolesManagerObject.setSubMenuItemVisibility(
                        customUserRolesManagerObject.mainMenuItemsObject.SETTINGS.subItems.RtlsApi, false);
                    if (customUserRolesManagerObject.mainMenuItemsObject.SETTINGS.maxSubItemsVisible > 0)
                        customUserRolesManagerObject.mainMenuItemsObject.SETTINGS.maxSubItemsVisible--;
                }
            }
            else if (entry.entityType.toString() == "RtlsStreamListenerService") {
                if (entry.readRight.toString() == "false") {
                    customUserRolesManagerObject.setSubMenuItemVisibility(
                        customUserRolesManagerObject.mainMenuItemsObject.SETTINGS.subItems.StreamListenerService, false);
                    if (customUserRolesManagerObject.mainMenuItemsObject.SETTINGS.maxSubItemsVisible > 0)
                        customUserRolesManagerObject.mainMenuItemsObject.SETTINGS.maxSubItemsVisible--;
                }
            }
            // Menu ADMINISTRATION
            if (entry.entityType.toString() == "User") {
                if (entry.readRight.toString() == "false") {
                    customUserRolesManagerObject.setSubMenuItemVisibility(
                        customUserRolesManagerObject.mainMenuItemsObject.ADMINISTRATION.subItems.UserAccounts, false);
                    if (customUserRolesManagerObject.mainMenuItemsObject.ADMINISTRATION.maxSubItemsVisible > 0)
                        customUserRolesManagerObject.mainMenuItemsObject.ADMINISTRATION.maxSubItemsVisible--;
                }
            }
            else if (entry.entityType.toString() == "Role") {
                if (entry.readRight.toString() == "false") {
                    customUserRolesManagerObject.setSubMenuItemVisibility(
                        customUserRolesManagerObject.mainMenuItemsObject.ADMINISTRATION.subItems.UserRoles, false);
                    if (customUserRolesManagerObject.mainMenuItemsObject.ADMINISTRATION.maxSubItemsVisible > 0)
                        customUserRolesManagerObject.mainMenuItemsObject.ADMINISTRATION.maxSubItemsVisible--;
                }
            }
            else if (entry.entityType.toString() == "AdminDashboard") {
                if (entry.readRight.toString() == "false") {
                    customUserRolesManagerObject.setSubMenuItemVisibility(
                        customUserRolesManagerObject.mainMenuItemsObject.ADMINISTRATION.subItems.AdminDashboard, false);
                    if (customUserRolesManagerObject.mainMenuItemsObject.ADMINISTRATION.maxSubItemsVisible > 0)
                        customUserRolesManagerObject.mainMenuItemsObject.ADMINISTRATION.maxSubItemsVisible--;
                }
            }
            else if (entry.entityType.toString() == "AlarmRule") {
                if (entry.readRight.toString() == "false") {
                    customUserRolesManagerObject.setSubMenuItemVisibility(
                        customUserRolesManagerObject.mainMenuItemsObject.ADMINISTRATION.subItems.AlarmRules, false);
                    if (customUserRolesManagerObject.mainMenuItemsObject.ADMINISTRATION.maxSubItemsVisible > 0)
                        customUserRolesManagerObject.mainMenuItemsObject.ADMINISTRATION.maxSubItemsVisible--;
                }
            }
            // Menu LOGS
            else if (entry.entityType.toString() == "MycoMessageLog") {
                if (entry.readRight.toString() == "false") {
                    customUserRolesManagerObject.setSubMenuItemVisibility(
                        customUserRolesManagerObject.mainMenuItemsObject.LOGS.subItems.MycoMessageLogs, false);
                    if (customUserRolesManagerObject.mainMenuItemsObject.LOGS.maxSubItemsVisible > 0)
                        customUserRolesManagerObject.mainMenuItemsObject.LOGS.maxSubItemsVisible--;
                }
            }
            else if (entry.entityType.toString() == "EkahauEventStreamLog") {
                if (entry.readRight.toString() == "false") {
                    customUserRolesManagerObject.setSubMenuItemVisibility(
                        customUserRolesManagerObject.mainMenuItemsObject.LOGS.subItems.EkahauEventStreamLogs, false);
                    if (customUserRolesManagerObject.mainMenuItemsObject.LOGS.maxSubItemsVisible > 0)
                        customUserRolesManagerObject.mainMenuItemsObject.LOGS.maxSubItemsVisible--;
                }
            }
            // Menu HISTORY
            else if (entry.entityType.toString() == "EventsHistory") {
                if (entry.readRight.toString() == "false") {
                    customUserRolesManagerObject.setSubMenuItemVisibility(
                        customUserRolesManagerObject.mainMenuItemsObject.HISTORY.subItems.History, false);
                    if (customUserRolesManagerObject.mainMenuItemsObject.HISTORY.maxSubItemsVisible > 0)
                        customUserRolesManagerObject.mainMenuItemsObject.HISTORY.maxSubItemsVisible--;
                }
            }

        });

         

        // now show main menu
        $('#mainMenuDiv').removeClass("hideContent");

        if (typeof _callback !== "undefined" && typeof _callback == "function") {
            _callback();
        }
    };
    customUserRolesManagerObject.getCurrentUserRoleData(applyUserRolesToCurrentPage);
}


function setKeepSessionAliveUrl(frameId, frameUrl) {
    $(document).ready(function () {
        //var src = $('#' + frameId).attr('src');
        //var frameUrl = webSiteRootURL + "/" + src;
        ////alert('frameUrl: ' + frameUrl);
        //$('#' + frameId).attr('src', frameUrl);
        //src = $('#' + frameId).attr('src');
    });
}