// Author: Guy Bami 
// tournaments script
var errorContentDivId = "errorContentDiv";
var sitePathDivId = "sitePathDiv";
var resultsDivId = "resultsDiv";
var errorContentDivId = "errorContentDiv";
var successOverlayDivId = "successOverlayDiv";
var menuItemSectionTitleLabel = pageLangTexts.menuItemSectionTitleLabel == null ? "Activites" : pageLangTexts.menuItemSectionTitleLabel;
var menuItemSectionTitleLevel1Label = pageLangTexts.menuItemSectionTitleLabel == null ? "Activites Sportives" : pageLangTexts.menuItemSectionTitleLabel;
var subMenuItemSectionTitleLabel = pageLangTexts.subMenuItemSectionTitleLabel == null ? "Nos Tournois" : pageLangTexts.subMenuItemSectionTitleLabel;


var tournamentsArray = new Array();
var loaded = false;
var currentSlideIndex = 0;
var eventPhotosSlideList = new Array();

$(document).ready(function () {
    // display sitemap path
    displayCurrentPath(sitePathDivId, 3, [menuItemSectionTitleLabel, menuItemSectionTitleLevel1Label,
        subMenuItemSectionTitleLabel], $(location).attr("href"));

    fetchAndDisplayTournaments();

    $(".row").removeClass("hideContent");
     
    /*
    var d = "2017-04-22 22:00:00";
    var da = stringToDate(d, "yyyy-mm-dd", "-");
    var ge = dateToGermanStr(stringToDate(d, "yyyy-mm-dd", "-"));
    alert(da);
    alert(ge);
    
    id="filterPreviousPrevYearBtn">2015</button>
    <button type="button" class="btn btn-default" id="filterPreviousYearBtn">2016</button>
    <button type="button" class="btn btn-primary" id="filterCurrentYearBtn">2017
    */
    //register button click events
    var currentDate = new Date();
    $("#filterCurrentYearBtn").html(currentDate.getUTCFullYear().toString());
    $("#filterPreviousYearBtn").html((currentDate.getUTCFullYear() - 1).toString());
    $("#filterPreviousPrevYearBtn").html((currentDate.getUTCFullYear() - 2).toString());
    
    $("#filterCurrentYearBtn").click(function () {
        
        $(this).addClass("btn-primary");
        $("#filterPreviousYearBtn").removeClass("btn-primary");
        $("#filterPreviousPrevYearBtn").removeClass("btn-primary");

        $("#filterPreviousYearBtn").addClass("btn-default");
        $("#filterPreviousPrevYearBtn").addClass("btn-default");
        displayTournamentsList(tournamentsArray, currentDate.getUTCFullYear());

    });

    $("#filterPreviousYearBtn").click(function () {
        
        //alert('clicked; ' + itemKey);
        $(this).addClass("btn-primary");
        $("#filterCurrentYearBtn").removeClass("btn-primary");
        $("#filterPreviousPrevYearBtn").removeClass("btn-primary");

        $("#filterPreviousPrevYearBtn").addClass("btn-default");
        $("#filterCurrentYearBtn").addClass("btn-default");
        displayTournamentsList(tournamentsArray, currentDate.getUTCFullYear() - 1);
    });

    $("#filterPreviousPrevYearBtn").click(function () {
         
        $(this).addClass("btn-primary");
        $("#filterCurrentYearBtn").removeClass("btn-primary");
        $("#filterPreviousYearBtn").removeClass("btn-primary");

        $("#filterCurrentYearBtn").addClass("btn-default");
        $("#filterPreviousYearBtn").addClass("btn-default");
        displayTournamentsList(tournamentsArray, currentDate.getUTCFullYear() - 2);
    });
    
    if (!loaded) {
        registerThumnailBtnEvents();
        loaded = true;
    }
    $(window).bind("resize", rescaleWindow);

});


function viewPhotosDialog(eventId){
    
    loadThumbnailImages(eventId);
    
}
 

function rescaleWindow() {
    var size = { width: $(window).width(), height: $(window).height() };
    // calculate size
    var offset = 20;
    var offsetBody = 80;
    $('#eventPhotosModal').css('height', size.height - offset);
    $('#eventPhotosModal .modal-body').css('height', size.height - (offset + offsetBody));
    $('#eventPhotosModal').css('top', 0);


}


function fetchAndDisplayTournaments() {

    var controllerUrl = "../../Controllers/EventController.php";
    var postDataFormat = "json";
    var postMethod = "POST";
    var postParameters = { "userAction": "getAllTournaments" };
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
        var jsonData = data;
        debugMessageToConsole("items json data: " + data, lowLevel);
        for (var i = 0; i < jsonData.length; i++) {
            var eventDate = stringToDate(jsonData[i].date, "yyyy-mm-dd", "-");
            var eventId = jsonData[i].eventId;
            var tournamentDate = dateToGermanStr(eventDate);  
            var title = jsonData[i].title;
            var location = jsonData[i].location;
            var summary = jsonData[i].summary;
            var photosCount = jsonData[i].numPhotos;
            var year = eventDate.getUTCFullYear();
            var tournament = {
                ItemKey: i + 1,
                Date: tournamentDate,
                Location: location,
                Title: title,
                EventId: eventId,
                Summary: summary,
                PhotosCount: photosCount,
                Year: year
            };
            tournamentsArray.push(tournament);
        }

        // display first tournament per default
        if (tournamentsArray.length > 0) {
            var currentDate = new Date();
            displayTournamentsList(tournamentsArray, currentDate.getUTCFullYear());
            $(".row").removeClass("hideContent");
        }
        else{
            
        }
    }

}


function displayTournamentsList(tournamentsDataArray, year) {
    var divContent = "";
    var count = 0;
    var rowClass = "";
    $("#tournamentsDiv").html("");
    $.each(tournamentsDataArray, function (index, tournament) {
        index % 2 == 0 ? rowClass = "even rowPointer" : rowClass = "odd rowPointer";
        divContent = '<div class="marginBotton">' +
                        '<table class="fullWidth cellspacing5 cellpadding5 normalBorder grayBackground">'
                        + '<tr>'
                            + '<td class="toLeft">'
                                + '<h4  id="tournamentTitle">' + tournament.Title + ' </h4>'  
                                + '<hr class="black"/>'
                            + '</td>'
                        + '</tr>'
                        + '<tr>'
                            + '<td class="fullWidth">' 
                                + '<table class="fullWidth cellspacing5 cellpadding5 whiteBackground">' 
                                    + '<tr>'
                                        + '<td class="toLeft fieldDetailsTitle">' 
                                             + '<span>Date</span>'
                                        + '</td>'
                                        + '<td class="toLeft">' 
                                             + '<span id="dateLabel">' + tournament.Date + '</span>' 
                                        + '</td>'
                                    + '</tr>'
                                    + '<tr>'
                                        + '<td class="toLeft fieldDetailsTitle">' 
                                             + '<span>Lieu</span>'
                                        + '</td>'
                                        + '<td class="toLeft ">' 
                                             + '<span id="locationLabel">' + tournament.Location + '</span>'    
                                        + '</td>'
                                    + '</tr>'
                                    + '<tr>'
                                        + '<td class="toLeft fieldDetailsTitle">' 
                                             + '<span>Photos</span>'
                                        + '</td>'
                                        + '<td class="toLeft ">' 
                                             + '<a href="javascript:viewPhotosDialog(\'' + tournament.EventId 
                                             + '\')" class="linkDialogShow"><span id="eventPhotosLabel">Albulm (' + tournament.PhotosCount + ')</span></a>'    
                                        + '</td>'
                                    + '</tr>'
                                    + '<tr>'
                                        + '<td class="toLeft fieldDetailsTitle">' 
                                             + '<span>Bilan financier</span>'
                                        + '</td>'
                                        + '<td class="toLeft">' 
                                             + '<a class="linkDialogShow" href="#"><span id="viewSummaryLabel">Voir Factures</span></a>'  
                                        + '</td>'
                                    + '</tr>'
                                    + '<tr>'
                                        + '<td class="toLeft fieldDetailsTitle col-md-6">' 
                                             + '<span>Resum&eacute;</span>'
                                        + '</td>'
                                        + '<td class="toLeft fullWith normalBorder ">' 
                                                + '<div class="dialogViewSummaryFieldDiv  fullWith" id="summaryDiv">' + tournament.Summary + '</div>' 
                                        + '</td>'
                                    + '</tr>'
                                + '</table>'
                            + '</td>'
                        + '</tr>'
                    + '</table>'
                + '</div>';
        if(year == tournament.Year){
            $("#tournamentsDiv").append(divContent);
            count++;
        }
        
    });

    if(count == 0){
        $("#tournamentsDiv").html("<div>Aucun Tournois</div>");
    }

}


function loadThumbnailImages(eventId) {
    var imgDirectory = "../../UploadedFiles/Images/Events/";
    var imgObj = { imageId: 1, imgUrl: "" };
    var numbImage = 0;
    var buff = "Votre commentaire...";

    var controllerUrl = "../../Controllers/EventPhotoController.php";
    var postDataFormat = "json";
    var postMethod = "POST";
    var postParameters = { "userAction": "selectAllPhotosByEvent", "eventId" : eventId };
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
    // clear
    eventPhotosSlideList = new Array();
    sendAjaxRequest(xhrArgs, fetchDataCompleted);
    
    //get postback result
    function fetchDataCompleted(data) {
        var jsonData = data;
        for (var i = 0; i < jsonData.length; i++) {
            imgObj = { imageId: 1 + i * 85, imgUrl: imgDirectory + jsonData[i].fileFullName, comment: buff + i };
            eventPhotosSlideList.push(imgObj);
        }
        if(eventPhotosSlideList.length > 0){
            $("#currentPhoto").attr("src", eventPhotosSlideList[0].imgUrl);
            // comment
            $("#photoCommentText").html(eventPhotosSlideList[0].comment);
            $("#modalTitle").html("Photo - " + jsonData[0].eventTitle);
            $("#eventPhotosModal").modal("show");
            rescaleWindow();
        }
        else{
            alert("Pas de photos disponible");
        }
        
    }


}

function registerThumnailBtnEvents() {

    $(".left").click(function () {
        if (currentSlideIndex > 0) {
            currentSlideIndex--;
        }
        else {
            // restart
            currentSlideIndex = 0;
        }
        // display previous image
        $("#currentPhoto").attr("src", eventPhotosSlideList[currentSlideIndex].imgUrl);
        // comment
        $("#photoCommentText").html(eventPhotosSlideList[currentSlideIndex].comment);
        //displayPhotoComment();
    });

    $(".right").click(function () {
        if (currentSlideIndex < eventPhotosSlideList.length - 1) {
            currentSlideIndex++;
        }
        else {
            // restart
            currentSlideIndex = 0;
        }
        $("#currentPhoto").attr("src", eventPhotosSlideList[currentSlideIndex].imgUrl);
        $("#photoCommentText").html(eventPhotosSlideList[currentSlideIndex].comment);
        //displayPhotoComment();
    });
}






