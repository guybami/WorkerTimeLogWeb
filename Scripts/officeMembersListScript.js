
/*
 * Author: Guy Bami 
 * Last changes: 05.04.17
 * Description: Office members List script
*/

var errorContentDivId = "errorContentDiv";
var sitePathDivId = "sitePathDiv";
var resultsDivId = "resultsDiv";
var errorContentDivId = "errorContentDiv";
var successOverlayDivId = "successOverlayDiv";

var menuItemSectionTitleLabel = pageLangTexts.menuItemSectionTitleLabel == null ? "Administration" : pageLangTexts.menuItemSectionTitleLabel;
var subMenuItemSectionTitleLabel = pageLangTexts.subMenuItemSectionTitleLabel == null ? "Membres Du Bureau" : pageLangTexts.subMenuItemSectionTitleLabel;

var membersArray = new Array();

$(document).ready(function () {

    menuItemSectionTitleLabel = "Verein";
    subMenuItemSectionTitleLabel = "Mitglieder";

    // display sitemap path
    displayCurrentPath(sitePathDivId, 2, [menuItemSectionTitleLabel, subMenuItemSectionTitleLabel], $(location).attr("href"));
    //displayCurrentPath(sitePathDivId, 2, ["Verein", "Mitglieder"], $(location).attr("href"));

    fetchOfficeMembersDataJson();
});




function fetchOfficeMembersDataJson() {
    var memberPhotos = ["president.jpg", "chiefCulture.jpg", "secretary.jpg", "chiefSport.jpg", "treasure.jpg"];
        memberPhotos = ["president.jpg", "chiefCulture.png", "secretary.png", "chiefSport.png", "treasure.png"];
    //var positions = ["President", "Secretaire", "Responsable Sportif", "Responsable Culturel", "Tresoriere"];

    var controllerUrl = "../../Controllers/OfficeMemberController.php";
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

    sendAjaxRequest(xhrArgs, fetchDataCompleted);

    //get postback result
    function fetchDataCompleted(data) {
        var jsonData =  data;
         
        debugMessageToConsole("items json data: " + data, highLevel);
        for (var i = 0; i < jsonData.length; i++) {
            var memberName = jsonData[i].name;
            var lastName = jsonData[i].lastName;
            var email = jsonData[i].email;
            var phoneNumber = jsonData[i].phoneNumber;
            var profilePhotoUrl = "../../Resources/Images/UserProfiles/" + memberPhotos[i % memberPhotos.length];
             
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

    var rowData = '<tr class="even rowPointer"><td class="toLeft"></td><td class="toLeft"></td><td class="toLeft"></td></tr>';
    var i = 0;
    var rowClass = "";
    var profilePhotoUrl = "";
    $("#membersListTable tbody").html("");
    $.each(membersDataArray, function (index, member) {
        i % 2 == 0 ? rowClass = "even rowPointer" : rowClass = "odd rowPointer";
        rowData = '<tr data-role="' + member.ItemKey + '" class="' + rowClass + '"><td class="toLeft">' + member.Name + '</td>'
            + '<td class="toLeft">' + member.LastName + '</td>'
            + '<td class="toLeft toBold">' + member.Position + '</td>'
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
        $("#positionLabel").html(memberToDisplay.Position);
        $("#memberProfilePhoto").attr("src", memberToDisplay.ProfilePhotoUrl);
        $("#fullNameLabel").html(memberToDisplay.LastName + ", " + memberToDisplay.Name);
        $("#nameLabel").html(memberToDisplay.Name);
        $("#lastNameLabel").html(memberToDisplay.LastName);
        $("#emailLabel").html(memberToDisplay.Email);
        $("#phoneNumberLabel").html(memberToDisplay.PhoneNumber);
    }
}
     
     
     
 

 


