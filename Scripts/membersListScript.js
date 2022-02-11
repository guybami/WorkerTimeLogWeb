// Author: Guy Bami 
// members script
var errorContentDivId = "errorContentDiv";
var sitePathDivId = "sitePathDiv";
var resultsDivId = "resultsDiv";
var errorContentDivId = "errorContentDiv";
var successOverlayDivId = "successOverlayDiv";
var menuItemSectionTitleLabel = pageLangTexts.menuItemSectionTitleLabel == null ? "Administration" : pageLangTexts.menuItemSectionTitleLabel;
var subMenuItemSectionTitleLabel = pageLangTexts.subMenuItemSectionTitleLabel == null ? "Liste Des Membres" : pageLangTexts.subMenuItemSectionTitleLabel;


var membersArray = new Array();

$(document).ready(function () {
    // display sitemap path
    displayCurrentPath(sitePathDivId, 2, [menuItemSectionTitleLabel, subMenuItemSectionTitleLabel], $(location).attr("href"));

    fetchMembersData();

    displayMembersList(membersArray);
    
    $(".memberDetailsBox").removeClass("hideContent");
    // display first member per default
    if (membersArray.length > 0) {
        displayMemberDetails(membersArray[0].ItemKey);
    }

    //register button click events

    $("#filterAllBtn").click(function () {
        var itemKey = 1;
        //alert('clicked; ' + itemKey);
        // displayMemberDetails(itemKey);
        $(this).addClass("btn-primary");
        $("#filterUnregisteredMembersBtn").removeClass("btn-primary");
        $("#filterRegisteredMembersBtn").removeClass("btn-primary");

        $("#filterUnregisteredMembersBtn").addClass("btn-default");
        $("#filterRegisteredMembersBtn").addClass("btn-default");

    });

    $("#filterUnregisteredMembersBtn").click(function () {
        var itemKey = 2;
        //alert('clicked; ' + itemKey);
        $(this).addClass("btn-primary");
        $("#filterAllBtn").removeClass("btn-primary");
        $("#filterRegisteredMembersBtn").removeClass("btn-primary");

        $("#filterRegisteredMembersBtn").addClass("btn-default");
        $("#filterAllBtn").addClass("btn-default");
        //$("#filterAllBtn").button("toggle");
    });

    $("#filterRegisteredMembersBtn").click(function () {
        var itemKey = 3;
        //alert('clicked; ' + itemKey);
        $(this).addClass("btn-primary");
        $("#filterAllBtn").removeClass("btn-primary");
        $("#filterUnregisteredMembersBtn").removeClass("btn-primary");

        $("#filterAllBtn").addClass("btn-default");
        $("#filterUnregisteredMembersBtn").addClass("btn-default");
        //$("#filterAllBtn").button("toggle");
    });

});

function filterData() {



}

function filterMembers() {
    var filter = $("#searchMemberField").val().toString().toUpperCase();
    var filteredMembersArray = new Array();
    if (filter.length == 0) {
        displayMembersList(membersArray);
        return;
    }
    //$("#filter").html(filter);
    $.each(membersArray, function (index, member) {
        var rowClass = "";
        if (member.Name.toString().toUpperCase().toString().startsWith(filter)) {
            filteredMembersArray.push(member);
        }
    });
    displayMembersList(filteredMembersArray);
}


function fetchMembersData() {

    var memberPhotos = ["president.jpg", "chiefCulture.jpg", "secretary.jpg", "chiefSport.jpg", "treasure.jpg"];
    var controllerUrl = "../../Controllers/CustomerController.php";
    var postDataFormat = "json";
    var postMethod = "POST";
    var postParameters = { "userAction": "getAllItems" };
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
    memberPhotos = ["president.jpg", "defaultUser.png"];
    sendAjaxRequest(xhrArgs, fetchDataCompleted);

    //get postback result
    function fetchDataCompleted(data) {
        var jsonData = data;
        debugMessageToConsole("items json data: " + data, lowLevel);
        for (var i = 0; i < jsonData.length; i++) {
            var memberName = jsonData[i].name;
            var lastName = jsonData[i].lastName;
            var email = jsonData[i].email;
            var phoneNumber = jsonData[i].phoneNumber;
            var photo = memberPhotos[1];
            var profilePhotoUrl = "../../Resources/Images/UserProfiles/" + memberPhotos[i % memberPhotos.length];
             
            if(memberName.toString().indexOf("Bami") != -1){
                photo = memberPhotos[0];
            }
            profilePhotoUrl = "../../Resources/Images/UserProfiles/" + photo;

            var member = {
                ItemKey: i + 1,
                Name: memberName,
                LastName: lastName,
                Email: email,
                PhoneNumber: phoneNumber,
                ProfilePhotoUrl: profilePhotoUrl,
                Position: jsonData[i].position
            };
            membersArray.push(member);
        }

        displayMembersList(membersArray);
        $(".memberDetailsBox").removeClass("hideContent");
        $(".container").removeClass("hideContent");

        // display first member per default
        if (membersArray.length > 0) {
            displayMemberDetails(membersArray[0].ItemKey);
        }
    }

}


function displayMembersList(membersDataArray) {
    var rowData = '<tr class="even rowPointer"><td class="toCenter memberNumberCol"></td><td class="toLeft"></td><td class="toLeft"></td></tr>';
    var i = 0;
    var rowClass = "";
    var profilePhotoUrl = "";
    $("#membersListTable tbody").html("");
    $.each(membersDataArray, function (index, member) {
        i % 2 == 0 ? rowClass = "even rowPointer" : rowClass = "odd rowPointer";
        rowData = '<tr data-role="' + member.ItemKey + '" class="' + rowClass + '">'
                    + '<td class="toCenter memberNumberCol">' + member.ItemKey + '.' + '</td>'
                    + '<td class="toLeft">' + member.Name + '</td>'
                    + '<td class="toLeft">' + member.LastName + '</td>'
                + '</tr>';
        $("#membersListTable tbody").append(rowData);
    });

    // register event
    $(".rowPointer").click(function () {
        var itemKey = $(this).attr("data-role");
        //alert('clicked; ' + itemKey);
        displayMemberDetails(itemKey);
    });

}


function displayMemberDetails(itemKey) {
    var memberToDisplay = null;
    $.each(membersArray, function (index, member) {
        if (member.ItemKey == itemKey) {
            memberToDisplay = member;
            return false; // break the loop
        }
    });
    if (memberToDisplay != null) {
        // display member details
        //alert(memberToDisplay.PhoneNumber);
        $("#memberProfilePhoto").attr("src", memberToDisplay.ProfilePhotoUrl);
        $("#fullNameLabel").html(memberToDisplay.LastName + ", " + memberToDisplay.Name);
        $("#nameLabel").html(memberToDisplay.Name);
        $("#lastNameLabel").html(memberToDisplay.LastName);
        $("#emailLabel").html(memberToDisplay.Email);
        $("#phoneNumberLabel").html(memberToDisplay.PhoneNumber);
    }
}








