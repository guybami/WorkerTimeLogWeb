/**
* Script used for custom animations and effects
* Author: Guy Bami
* Created: 02.03.2014
* Last changed: 04.03.2017
*/


function showSuccessOverlay_old(message) {
    var fadeoutDelay = 8000; // 8seconds
    var fadeinDelay = 1500; // 1 seconds
    var divId = 'successOverlayDiv';
    $('#messageLabel').html(message);
    $("#" + divId).fadeIn(fadeinDelay, function () {
        // hide overlay
        $("#" + divId).fadeOut(fadeoutDelay);
    });

}

function showSuccessOverlay(divHolderId, message, successImg) {
    var fadeoutDelay = 2000; // 2seconds
    var fadeinDelay = 1000; // 1.5 seconds
    //var divId = 'overlayDiv';
    successImg = successImg || "../../Images/Buttons/success_icon.png";

    var content = '<div id="overlayDiv" class="successActionOverlay">'
             + '   <table class="fullWidth overlayTableContent">'
             + '       <tbody>'
             + '           <tr>'
             + '                <td  align="center">'
             + '                    <table cellpadding="3">'
             + '                       <tr>'
             + '                           <td class="toCenter">'
             + '                               <img src="' + successImg + '" alt="" />'
             + '                           </td>'
             + '                           <td class="toLeft fullWidth" nowrap="nowrap">'
             + '                                <label class="_toBold _whiteText" id="messageLabel"></label>'
             + '                           </td>'
             + '                       </tr>'
             + '                   </table>'
             + '               </td>'
             + '           </tr>'
             + '       </tbody>'
             + '   </table>'
             + '</div>';
    divHolderId = divHolderId || "holder_overlayDiv";
    var messageLabelId = divHolderId + "_messageLabel";
    content = '<div class="successActionOverlay">'
                  + '<div  class="alert alert-success  alert-dismissable">'
                  + '  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>'
                  + '       <span id="' + messageLabelId + '" class="">success messsage...</span>'
                  + '</div>'
             + '</div>';

    $('#' + divHolderId).html(""); // delete all content
    $('#' + divHolderId).append(content);
    $('#' + messageLabelId).html(message);
    $("#" + divHolderId).fadeIn(fadeinDelay, function () {
        // hide overlay
        $("#" + divHolderId).fadeOut(fadeoutDelay);
    });

}