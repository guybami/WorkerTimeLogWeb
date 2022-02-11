 
/**
 * CustomUserRolesManager class description
 * Author: Guy Bami
 * Last changed: 07.09.2015
 */

/**
 * Class constructor
 * @param objectFields
 * @returns
 */
function CustomUserRolesManager(objectFields) {
    // fields members 
    this.entityType = objectFields.entityType || "-"; // entity type name
    this.userName = objectFields.userName || currentUserName;
    this.userRolesData = objectFields.userRolesData || [];
    this.accessDeniedPage = objectFields.accessDeniedPage || webAccessDeniedPage;
    this.parsePageWidgetsCallbackMethod = objectFields.parsePageWidgetsCallbackMethod || function () { };
    this.rolesLoaded = false;
    this.useRoleManager = objectFields.useRoleManager || false;
    this.accessRights = ["createRight", "readRight", "editRight", "deleteRight", "fullRight"];
    this.entityTypes = [
        "Conference",
        "Event",
        "EventBillSummary",
        "EventPhoto",
        "EventPhotoComment",
        "EventVideo",
        "EventVideoComment",
        "Expense",
        "Income",
        "LogActivity",
        "Member",
        "MemberFee",
        "OfficeMember",
        "OldExam",
        "Project",
        "Publication",
        "Role",
        "RoleAccessRight",
        "User",
        "UserProfile",
        "Veteran"
    ];

    this.accessRightsObject = {
        createRight: "createRight",
        readRight: "readRight", editRight: "editRight", deleteRight: "deleteRight", fullRight: "fullRight"
    };

    this.entityTypesObject = {
        Conference: "Conference",
        Event: "Event",
        EventBillSummary: "EventBillSummary",
        EventPhoto: "EventPhoto",
        EventPhotoComment: "EventPhotoComment",
        EventVideo: "EventVideo",
        EventVideoComment: "EventVideoComment",
        Expense: "Expense",
        Income: "Income",
        LogActivity: "LogActivity",
        Member: "Member",
        MemberFee: "MemberFee",
        OfficeMember: "OfficeMember",
        OldExam: "OldExam",
        Project: "Project",
        Publication: "Publication",
        Role: "Role",
        RoleAccessRight: "RoleAccessRight",
        User: "User",
        UserProfile: "UserProfile",
        Veteran: "Veteran"
    };
    // main menu object
    this.mainMenuItemsObject = {
        HOME: { id: "homeMenuItem" },
        MEMBERS: {
            id: "membersMenuItem",
            subItems: {
                OfficeMembers: "officeMembersSubMenu",
                MembersList: "membersListSubMenu",
                TermsAndConditions: "termsAndConditionsSubMenu"
            },
            maxSubItemsVisible: 3 // number of sub item visible
        },
        STUDIES: {
            id: "studiesMenuItem",
            subItems: {
                Tutorials: "tutorialsSubMenu",
                Graduations: "graduationsSubMenu",
                OldExams: "oldExamsSubMenu"
            },
            maxSubItemsVisible: 3 // number of sub item visible
        },
        ACTIVITIES: {
            id: "activitiesMenuItem",
            subItems: {
                CuturalAndSocialActivities: {
                    id: "cuturalAndSocialActivitiesSubMenu",
                    subItems: {
                        GalaNight: "galaNightSubMenu",
                        FirstSemesterParty: "firstSemesterPartySubMenu",
                        CultureWeekSubMenu: "cultureDaySubMenu"
                    }
                }, 
                SportActivities: {
                    id: "sportActivitiesSubMenu",
                    subItems: {
                        Challenges: "challengesSubMenu",
                        SundayGame: "sundayGameSubMenu",
                        Handball: "handballSubMenu",
                        YearlyCompetitions: "yearlyCompetitionsSubMenu"
                    }
                },
                AcademicalActivities: {
                    id: "academicalActivitiesSubMenu",
                    subItems: {
                        Projects: "projectsSubMenu",
                        Expositions: "expositionsSubMenu"
                    }
                }
            },
            maxSubItemsVisible: 3 // number of sub item visible
        },
        VETERANS: {
            id: "veteransMenuItem",
            subItems: {
                VeteranMembers: "veteranMembersSubMenu",
                FriendMatches: "friendMatchesSubMenu"
            },
            maxSubItemsVisible: 2 // number of sub item visible
        },
        JOBS: {
            id: "jobsMenuItem",
            subItems: {
                JobOffers: "jobOffersSubMenu",
                Internships: "internshipsSubMenu"
            },
            maxSubItemsVisible: 2 // number of sub item visible
        },
        ADMINISTRATION: {
            id: "adminMenuItem",
            subItems: {
                UserAccounts: "userAccountsSubMenu",
                UserRoles: "userRolesSubMenu",
                Conferences: "conferencesSubMenu",
                Events: "eventsSubMenu",
                Incomes: "incomesSubMenu"
            },
            maxSubItemsVisible: 4 // number of sub item visible
        },
        Publications: {
            id: "publicationsMenuItem",
            subItems: {
                mourningSubMenu: "mourningSubMenu",
                concertsSubMenu: "concertsSubMenu",
                roomOffersSubMenu: "roomOffersSubMenu"
            },
            maxSubItemsVisible: 3 // number of sub item visible
        },
        FORUM: {
            id: "forumMenuItem",
            subItems: {
                BrainStorming: "brainStormingSubMenu",
                UsefullLinks: "usefullLinksSubMenu"
            },
            maxSubItemsVisible: 2 // number of sub item visible
        } 
    };


}


CustomUserRolesManager.prototype.decreaseMaxSubItemsVisible = function (value) {
    if (value == 0)
        return;
    value = value - 1;
}

CustomUserRolesManager.prototype.setMenuItemVisibility = function (itemId, visible) {
    if (visible) {
        $("#" + itemId).removeClass("hideContent");
        $("#" + itemId).attr("style", "");
    }
    else {
        $("#" + itemId).addClass("hideContent");
        $("#" + itemId).attr("style", "display:none");
    }
}



CustomUserRolesManager.prototype.setSubMenuItemVisibility = function (itemId, visible) {
    this.setMenuItemVisibility(itemId, visible);
}


CustomUserRolesManager.prototype.hideMenuItem = function (menuItemId) {
    /*
    require(["dijit/registry"],
    function (registry) {
        var menuItem = registry.byId(menuItemId);
        if (menuItem != null) {
            menuItem.set('disabled', true);
            menuItem.destroy();
        }
        else {
            
        }
    });
    */

    $("#" + menuItemId).addClass("hideContent");
    $("#" + menuItemId).attr("style", "display:none");
    
}

CustomUserRolesManager.prototype.hideAllMenuItems = function () {
    var that = this;
    if (!that.useRoleManager || this.mainMenuItemsObject == null) {
        return;
    }
    // menu Members
    this.hideMenuItem(this.mainMenuItemsObject.MEMBERS.id);
    //sub items
    this.setMenuItemVisibility(this.mainMenuItemsObject.MEMBERS.subItems.MembersList, false);
    this.setMenuItemVisibility(this.mainMenuItemsObject.MEMBERS.subItems.NurseDashboard, false);

    // Menu SETTINGS
    this.hideMenuItem(this.mainMenuItemsObject.SETTINGS.id);
    // sub items
    this.setMenuItemVisibility(this.mainMenuItemsObject.SETTINGS.subItems.RtlsApi, false);
    this.setMenuItemVisibility(this.mainMenuItemsObject.SETTINGS.subItems.StreamListenerService, false);

    // menu Administration
    this.hideMenuItem(this.mainMenuItemsObject.ADMINISTRATION.id);
    // sub items
    this.setMenuItemVisibility(this.mainMenuItemsObject.ADMINISTRATION.subItems.UserAccounts, false);
    this.setMenuItemVisibility(this.mainMenuItemsObject.ADMINISTRATION.subItems.UserRoles, false);
    this.setMenuItemVisibility(this.mainMenuItemsObject.ADMINISTRATION.subItems.AdminDashboard, false);
    this.setMenuItemVisibility(this.mainMenuItemsObject.ADMINISTRATION.subItems.AlarmRules, false);

    // Menu LOGS
    this.hideMenuItem(this.mainMenuItemsObject.LOGS.id);
    // sub items
    this.setMenuItemVisibility(this.mainMenuItemsObject.LOGS.subItems.MycoMessageLogs, false);
    this.setMenuItemVisibility(this.mainMenuItemsObject.LOGS.subItems.EkahauEventStreamLogs, false);

    // menu History
    this.hideMenuItem(this.mainMenuItemsObject.HISTORY.id);
    this.setMenuItemVisibility(this.mainMenuItemsObject.HISTORY.subItems.History, false);
}


CustomUserRolesManager.prototype.redirectToUserAccessDenied = function () {
    if (this.useRoleManager) {
        //window.location = this.userObject.accessDeniedPage;
        $(window).attr('location', this.userObject.accessDeniedPage);
    }
    
}



CustomUserRolesManager.prototype.redirectToHomePage = function () {
    if (webSiteRootURL != null) {
        window.location = webSiteRootURL;
    }
}



// get current user role data
CustomUserRolesManager.prototype.getCurrentUserRoleData = function (applyUserRolesCallbackMethod) {
    
    var that = this;
    if (!that.useRoleManager) {
        if (typeof applyUserRolesCallbackMethod !== "undefined"
            && typeof applyUserRolesCallbackMethod == "function") {
           // applyUserRolesCallbackMethod();
        }
        return;
    }

    var controllerUrl = webSiteRootURL + "/Controllers/RoleAccessRightController.php";
    var postParameters = {
        userAction: "getUserRolesData"
        , "aspUserName": this.userName

    };
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: "json",
        method: "POST",
        error: function (errorMsg) {
            logError({ message: "Failed to get data from server: " + errorMsg });
        }
    };
    var classReference = this;
    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
            xhrArgs.error, getUserRoleDataCompleted);

    function getUserRoleDataCompleted(jsonData) {
        // check return data
        if (jsonData == null) {
            displayErrorContent("errorContentDiv", "getUserRoleData: " + jsonErrorMsg);
            return;
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent("errorContentDiv", jsonData[0].jsonErrorMessage);
            return;
        }
        // save data
        //alert('len: ' + classReference.userRolesData.length);
        classReference.userRolesData = jsonData;
        //alert('finish load roles');
        if (typeof applyUserRolesCallbackMethod !== "undefined"
            && typeof applyUserRolesCallbackMethod == "function") {

            applyUserRolesCallbackMethod();
        }
    }
}


CustomUserRolesManager.prototype.getAccessRightByEntityType = function (entityType, accessRight) {
    var accessRightValue = false;
    var that = this;
    if (!that.useRoleManager) {
        return true;
    }
    //alert('entityType: ' + entityType + '  accessRight: ' + accessRight);
    $.each(that.userRolesData, function (i, entry) {
        //each Menu   item
        if (entry.entityType.toString() == entityType) {
            if (accessRight != null && entry[accessRight] != null) {
                accessRightValue = entry[accessRight].toString() == "true";
            }
            // break loop
            return false;
        }
    });
    
    return accessRightValue;
}
