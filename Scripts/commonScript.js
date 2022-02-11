
/*
 * Version 2.1
 * Script used for utils methods
 * Author: Guy Bami
 * Last changed: 09.02.2017
 */

var shouldLogToConsole = true;
// log level priority
var lowLevel = 1;
var normalLevel = 2;
var highLevel = 3;


function setHtmlPageDimensions() {

    var windowHeight = $(window).height() - 5;
    var headerHeight = windowHeight * 0.08;
    var contentHeight = windowHeight * 0.80;
    var footerHeight = windowHeight * 0.05;
    //alert("content: " + contentHeight);
    $("#pageTable").attr("height", windowHeight + "px");
    $("#pageHeader").attr("height", headerHeight + "px");
    $("#pageContent").attr("height", contentHeight + "px");
    $("#pageFooter").attr("height", footerHeight + "px");
}


function setFullHtmlPageDimension(holderId) {

    // page heigth
    var windowHeight = $(window).height() - 5;
    var headerHeight = windowHeight * 0.15;
    var contentHeight = windowHeight * 0.90;
    var footerHeight = windowHeight * 0.05;
    $('#' + holderId).attr("height", windowHeight + "px");
}

function setHtmlPageContentHeight(pageContentId) {

    var windowHeight = $(window).height() - 5;
    var headerHeight = windowHeight * 0.15;
    var contentHeight = windowHeight * 0.85;
    var footerHeight = windowHeight * 0.05;
    $('#' + pageContentId).attr("height", contentHeight + "px");
}

function destroyWidget(widgetId) {
    require(["dijit/registry"], function (registry) {
        var widget = registry.byId(widgetId);
        //var widget = dijit.byId(widgetId);
        if (widget != null) {
            // check if already exists and destroy it
            widget.destroy();
            widget = null;
        }
        else {
            widget = dijit.byId(widgetId);// dojo.byId(widgetId);
            if (widget != null) {
                // check if already exists and destroy it
                widget.destroy();
                widget = null;
            }
        }
    });
}


function destroyFormWidgets(formId) {

    // iterate over all input of the form
    $("#" + formId + " :input").each(function () {
        destroyWidget($(this).attr('id'));
    });

    $("#" + formId + " input[type=checkbox]").each(function () {
        destroyWidget($(this).attr('id'));
    });
    // destroy the form itself
    destroyWidget(formId);
}


function destroyRecursivelyWidget(widgetId) {
    var widget = dijit.byId(widgetId);
    //var widget = dijit.byId(widgetId);
    if (widget != null) {
        // check if already exists and destroy it
        widget.destroyRecursively();
        widget = null;
    }
    else {
        widget = dojo.byId(widgetId);
        if (widget != null) {
            // check if already exists and destroy it
            widget.destroy();
            widget = null;
        }
    }
}

function hideOverlay(targetDiv) {
    if ($('#' + targetDiv) != null) {
        $('#' + targetDiv).attr('class', '');
    }
    else
        logError("Error: hideOverlay: " + targetDiv + " not found.");
}

function showSearchingOverlay(targetDiv) {
    if ($('#' + targetDiv) != null) {
        $('#' + targetDiv).addClass('searchingOverlay');
    }
    else
        logError("Error: showSearchingOverlay: " + targetDiv + " not found.");
}



function hideSearchingOverlay(targetDiv) {
    if ($('#' + targetDiv) != null) {
        //  $('#' + targetDiv).html('');
        $('#' + targetDiv).removeClass('searchingOverlay');
    }
    else
        logError("Error: hideSearchingOverlay: " + targetDiv + " not found.");
}



function showLoadingOverlay(targetDiv) {
    targetDiv = targetDiv || "";
    var divId = targetDiv + 'loadingOverlay';
    if ($('#' + targetDiv) != null) {
        // create div node
        var overlayDiv = $('<div  ' +
                ' class="loadingOverlay"> </div>').attr('id', divId);
        overlayDiv.appendTo('#' + targetDiv);
    }
    else {
        logError({message: "showLoadingOverlay: " + targetDiv + " not found."});
    }
}


function hideLoadingOverlay(targetDiv) {
    // first clear old content
    targetDiv = targetDiv || "";
    var divId = targetDiv + 'loadingOverlay';
    //$('#' + divId).attr('style', 'display:none');
    $('#' + divId).removeClass('loadingOverlay');
}


function showLoadingTask(targetDiv) {
    // first clear old content !important
    //alert(targetDiv);
    targetDiv = targetDiv || "";
    var divId = targetDiv + 'loadingTask';
    if ($('#' + targetDiv) != null) {
        document.getElementById(targetDiv).innerHTML = '';
        var loadingTaskDiv = $('<div  ' +
                ' class="loadingTask"></div>').attr('id', divId);
        loadingTaskDiv.appendTo('#' + targetDiv);
    }
    else
        logError({message: "Error in showLoadingTask: " + targetDiv + " not found."});
}

function hideLoadingTask(targetDiv) {
    // first clear old content
    targetDiv = targetDiv || "";
    var divId = targetDiv + 'loadingTask';
    $('#' + divId).html('');
    $('#' + divId).removeClass('loadingTask');
    //$('#loadingOverlay').attr('style', 'display:none');
}


function showPostbackOverlay(targetDiv) {
    $('#' + targetDiv).html('');
    targetDiv = targetDiv || "";
    targetDiv = targetDiv + 'loadingOverlay';
    // first clear old content !important
    if ($('#' + targetDiv) != null) {
        $('#' + targetDiv).html('');
        // create div node
        var overlayDiv = $('<div class="loadingOverlay"> </div>').attr('id', targetDiv);
        if (overlayDiv != null)
            overlayDiv.appendTo('#' + targetDiv);
    }
    else {
        logError({message: "showPostbackOverlay: " + targetDiv + " not found."});
    }
}


function hidePostbackOverlay(targetDiv) {
    // first clear old content
    targetDiv = targetDiv || "";
    targetDiv = targetDiv + 'loadingOverlay';
    $('#' + targetDiv).attr('style', 'display:none');
}



function removeEmptyLines(str) {
    var result = "";
    if (str == null)
        return result;
    result = $.trim(str);

    return result;
}

function displayErrorMessageBox(err) {
}


function logMessage(message) {
    if (message != null && shouldLogToConsole)
        console.log(message);
}

function debugMessage(message) {
    if (message != null && shouldLogToConsole)
        console.debug(message);
}

function debugMessageToConsole(message, level) {

    if (pageConfig != null && pageConfig.logToConsole) {
        if (pageConfig.logLevel <= level) {
            if (message != null && console != null)
                console.debug(message);
        }
    }
}

function alertMessage(message) {
    if (message != null && shouldLogToConsole)
        alert(message);
}


function strToUSFullDate(dateStr) {
    //var dateStr = "2011/08-03 09:15:11"; //format yyyy/MM/dd HH:mm:ss
    //dateStr = dateStr.replace("/", "-");
    //return new Date();
    var dateAndTime = dateStr.split(" ");
    var date = dateAndTime[0].split("/");
    var time = dateAndTime[1].split(":");
    var fullDate = new Date(date[0], (date[1] - 1), date[2], time[0], time[1], time[2]);
    //alert(d);
    return fullDate;
}


/* converts a string into full Date and time
 *  dateStr in format yyyy-MM-dd HH:mm:ss
 */
function strToFullDate(dateStr) {
    //var dateStr = "2011-08-03 09:15:11"; //returned from mysql timestamp/datetime field
    var dateAndTime = dateStr.split(" ");

    var date = dateAndTime[0].split("-");
    var time = dateAndTime[1].split(":");
    var fullDate = new Date(date[0], (date[1] - 1), date[2], time[0], time[1], time[2]);
    return fullDate;
}


/* converts a sting into date
 *  dateStr in format yyyy-MM-dd or yyyy-MM-dd HH:mm:ss
 */
function strToShortDate(dateStr) {
    //returned from mysql timestamp/datetime field
    var dateAndTime = dateStr.split(" ");
    var date = dateAndTime[0].split("-");
    //var date = dateStr.split("-");
    var shortDate = new Date();

    if (date.length != 3) {
        //throw new Error("Invalid data given: " + dateStr);
        //alert('Error date: ' + dateStr);
        if (isDate(dateStr)) {
            return new Date(dateStr);
        }
        return shortDate;
    }

    if ($.browser && $.browser.msie && $.browser.msie == true) {
        //for IE browsers
        shortDate = new Date(date[0], (date[1] - 1), date[2], 0, 0, 0);
    }
    else {
        //for other browsers
        shortDate = new Date(date[0], (date[1] - 1), date[2], 0, 0, 0);
    }
    return shortDate;
}


/* converts a asp.net sting into date /Date(value_ms)/
 *  dateStr in format /Date(value_ms)/ and output yyyy-MM-dd HH:mm:ss
 */
function aspStrDateToEngFullDate(dateStr) {
    var parsedDate = dateStr.toString();
    if (dateStr.toString().indexOf("Date") != -1) {
        parsedDate = parseInt(dateStr.toString().substr(6));
    }
    else {
        parsedDate = parseInt(dateStr.toString());
    }
    var fullDate = new Date(parsedDate);
    //var fullDate = new Date(parsedDate); //Date object
    //var year = 2015;
    //var month = 3;
    //var day = 1;

    //var hours = 10;
    //var min = 45;
    //var sec = 34;
    //// new Date(year, month, day [, hour, minute, second, millisecond ])
    //var d = new Date(2011, 10, 30, 13, 34, 45);
    //var fullDate2 = new Date(year, month, date, hours, min, sec);

    return fullDate;
}

function aspStrDateToLong(dateStr) {
    var parsedDate = dateStr.toString();
    if (dateStr.toString().indexOf("Date") != -1) {
        parsedDate = parseInt(dateStr.toString().substr(6));
    }
    else {
        parsedDate = parseInt(dateStr.toString());
    }
    return parsedDate;


}

function isDate(value) {
    var d = new Date(value);
    return !isNaN(d.valueOf());
}

/* Validates email */
function validateEmail(email) {
    if (email == null)
        return false;
    if (email.length == 0)
        return false;
    //used link  http://stackoverflow.com/a/46181/11236
    var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(email);
}



// show or hide datagrid column
function showOrHideColumn(show, widget, index) {
    var d = show ? "" : "none";
    dojo.query('td[idx="' + index + '"]', widget.viewsNode).style("display", d);
    dojo.query('th[idx="' + index + '"]', widget.viewsHeaderNode).style("display", d);
}



/**
 * creates combobox widget
 * @param {type} controllerUrl
 * @param {type} userAction
 * @param {type} widgetSpanId
 * @param {type} widgetId
 * @param {type} externalParam
 * @param {type} _callbackFunc
 * @param {type} _callbackError
 * @param {type} _data
 * @returns {undefined}
 */
function createWidgetCombobox(controllerUrl, widgetSpanId, widgetId,
        postParameters, _callbackFunc, _callbackError, _data) {

    postParameters = postParameters || {"userAction": userAction};
    controllerUrl = controllerUrl || "../../Controllers/BaseController.aspx";
    var xhrArgs = {
        url: controllerUrl,
        postData: postParameters,
        handleAs: "text",
        method: "POST",
        error: function (errorMsg) {
            throw new ("Failed to add new item. Error: " + errorMsg);
        }
    };

    //get postback result
    function createWidgetCompleted(data) {

        // get json result
        var jsonData = data;
        //debugMessageToConsole("createWidgetCompleted data : " +  $.trim(data), lowLevel);
        // clear error message
        $('#errorContentDiv').html("");
        if (jsonData == null || jsonData.length == null) {
            displayErrorContent('errorContentDiv', "createWidgetCombobox: " + jsonErrorMsg);
            return;
        }
        else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
            displayErrorContent('errorContentDiv', jsonData[0].jsonErrorMessage);
            return;
        }
        else {
            var trimedData = $.trim(data);
            destroyWidget(widgetId);
            if (trimedData != null && trimedData.length > 0) {
                // parse customer select widget with customers list
                var dijitSelect = '<select style="width:15em" data-dojo-props="maxHeight:250" name="' + widgetId + '" id="' + widgetId
                        + '" data-dojo-type="dijit/form/Select">'
                        + data + '</select>';

                // append it to holder
                $('#' + widgetSpanId).html(dijitSelect);
                if (typeof _callbackFunc !== 'undefined'
                        && typeof _callbackFunc == 'function') {
                    _callbackFunc(_data);
                }
            }
            else {
                if (typeof _callbackError !== 'undefined'
                        && typeof _callbackError == 'function') {
                    _callbackError();
                }

            }
        }
    }

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method,
            xhrArgs.error, createWidgetCompleted);
}





function loadDataFromURL(postURL) {
    var jsonRawData = null;
    var postParameters = {"format": "jsonMode"};
    var xhrArgs = {
        url: postURL,
        postData: postParameters,
        handleAs: "text",
        error: function (errorMsg) {
            throw new Error("Reponse failed to get items  with error: " + errorMsg);
        }
    };
    //send data to php page
    var deferred = dojo.xhrPost(xhrArgs);
    //get postback result
    deferred.addCallback(function (data) {
        jsonRawData = JSON.parse($.trim(data));
        // handle postback data here

    }).then(function () {
        // callback function here
    });

}

function logError(err) {
    if (err == null || !console.error) {
        return;
    }
    var msg = "An error occured on this page. Error details: ";
    if (typeof (err.description) != 'undefined')
        msg = msg + "Error description: " + err.description + "\n";
    else if (typeof (err.message) != 'undefined' && typeof (err.message) != 'undefined')
        msg += "Error description: " + err.message;
    //msg = msg + "Error response text: " + err + "\n";
    else if (typeof (err.message) != 'undefined' && typeof (err.status) != 'undefined')
        msg = msg + "Error status: " + err.status;
    else
        msg = "An error occured on this page. Error details: " + err;

    if (typeof console != 'undefined' && typeof console.error != 'undefined') {
        console.error(msg);
    }
}


function logErrorMessage(errorMessage) {
    if (errorMessage != null) {
        var msg = "There was an error on this page.\n\n";
        msg = msg + "Error message: " + errorMessage + "\n\n";
        if (console && console.error) {
            console.error(msg);
        }
    }
}

function dateToString(dateObj) {
    return dateToStr(dateObj);
}

/**
 Converts a given date and time (dd.MM.yyyy hh:mm:ss) into string i.e english format
 */
function strToDate(dateAndTime) {
    //debugMessage('input time: ' + dateAndTime);
    var dd = new Date(2013, 6, 15);
    var hour = 0;
    var min = 0;
    var sec = 0;
    var day = 0;
    var month = 0;
    var year = 0;
    var datePart = "";
    var timePart = "";
    var strParts = dateAndTime.split(' ');
    if (strParts && strParts.length == 2) {
        datePart = strParts[0];
        timePart = strParts[1];
    }
    else {
        datePart = strParts[0];
    }
    // format date
    var dateItems = datePart.split('.');
    if (dateItems == null || dateItems.length != 3)
        throw new Error("Input conversion error to date: " + datePart);
    //    day = parseInt(dateItems[0], 10);
    //    month = parseInt(dateItems[1], 10);
    //    year = parseInt(dateItems[2]);
    // use valueOf for conversion!!!
    day = (dateItems[0]).valueOf();
    month = (dateItems[1]).valueOf();
    year = (dateItems[2]).valueOf();
    // format time
    var timeItems = timePart.split(':');
    if (timeItems != null && timeItems.length > 1) {
        hour = (timeItems[0]).valueOf();
        min = (timeItems[1]).valueOf();
    }
    // month is zero based
    return new Date(year, month - 1, day, hour, min);
}

/**
 Converts a given date and time into Date object i.e english format
 call stringToDate("17/9/2014", "dd/MM/yyyy", "/");
or call stringToDate("9-17-2014", "dd-MM-yyyy", "-"); // for mySQL datatime
or call stringToDate("17.09.2014", "dd.MM.yyyy", "."); // for german
 */
function stringToDate(dateValue, formatValue, delimiterValue){
    
    var formatLowerCase = formatValue.toLowerCase();
    var datePart = dateValue;
    if(dateValue == null){
        return new Date();
    }
    if(dateValue.indexOf(" ") != -1){
        // have time inside like dd.MM.yyyy hh:mm:ss
        datePart = dateValue.split(" ")[0];
    }
    
    var formatItems = formatLowerCase.split(delimiterValue);
    var dateItems =datePart.split(delimiterValue);
    var monthIndex = formatItems.indexOf("mm");
    var dayIndex = formatItems.indexOf("dd");
    var yearIndex = formatItems.indexOf("yyyy");
    var month = parseInt(dateItems[monthIndex]);
    month -= 1; // remove 1 because 0 based month
    /*
    alert('year:' + dateItems[yearIndex]);
    alert('month:' + month);
    alert('day:' + dateItems[dayIndex]);
    */
    var formatedDate = new Date(dateItems[yearIndex], month, dateItems[dayIndex]);
    return formatedDate;
}




// Converts a date into string in the form dd.MM.yyyy
function dateToStr(dateObj) {
    if (dateObj && dateObj instanceof Date) {
        //return (dateObj.getUTCDate() + 1) + "." + (dateObj.getUTCMonth() + 1) + "." + dateObj.getUTCFullYear();
        return dateObj.format("dd.MM.yyyy");
    }
    return "";
}

// Converts a date into string in the form dd.MM.yyyy
function dateToGermanStr(dateObj) {
    if (dateObj && dateObj instanceof Date ) {
        var day = (dateObj.getUTCDate() + 1) < 10 ? "0" + (dateObj.getUTCDate() + 1) : (dateObj.getUTCDate() + 1);
        var month = (dateObj.getUTCMonth() + 1) < 10 ? "0" + (dateObj.getUTCMonth() + 1) : (dateObj.getUTCMonth() + 1);
        
        return day + "." + month + "." + dateObj.getUTCFullYear();
        //return dateObj.format("dd.MM.yyyy");
    }
    return dateObj.toLocaleString();
}

// converts date in format yyyy-MM-dd
function dateToUSStr(dateObj) {
    if (dateObj && dateObj instanceof Date && dateObj.format) {
        return dateObj.format("yyyy-MM-dd");
    }
    return dateObj;
}


function dateAndTimeToStr(dateObj) {
    if (dateObj && dateObj instanceof Date) {
        //return (dateObj.getUTCDate() + 1) + "." + (dateObj.getUTCMonth() + 1) + "." + dateObj.getUTCFullYear();
        return dateObj.toLocaleString();
    }
    return "";
}


function germanDateToUSFormat(dateStr) {
    var dateItems = dateStr.split('.');
    if (dateItems == null || dateItems.length != 3)
        throw new Error("germanDateToUSFormat Conversion error to date: " + dateStr);
    var day = dateItems[0].toString();
    var month = dateItems[1].toString();
    var year = dateItems[2].toString();
    return year + "-" + month + "-" + day;
}


function formatToHHMMSS(dateObj) {
    if (dateObj && dateObj instanceof Date) {
        return appendZero(dateObj.getHours()) + ":" + appendZero(dateObj.getMinutes()) + ":" + appendZero(dateObj.getSeconds());
    }
    throw new Error("formatToHHMMSS Conversion error to date: " + dateObj);
}

function appendZero(value) {
    return value < 10 ? "0" + value : value.toString();
}

function addMinutes(date, minutes) {
    return new Date(date.getTime() + minutes * 60000);
}

// returns date in format dd.MM.yyyy HH:mm:ss
function dateToFullStr(dateObj) {
    return dateToStr(dateObj) + " " + formatToHHMMSS(dateObj);
}


function convertMS(ms) {
    var d, h, m, s;
    s = Math.floor(ms / 1000);
    m = Math.floor(s / 60);
    s = s % 60;
    h = Math.floor(m / 60);
    m = m % 60;
    d = Math.floor(h / 24);
    h = h % 24;
    //return { day: d, hours: h, min: m, sec: s };
    return d;
}

// converts milliseconds into hours
function convertMsToHours(ms) {
    var d, h, m, s;
    s = Math.floor(ms / 1000);
    m = Math.floor(s / 60);
    s = s % 60;
    h = Math.floor(m / 60);
    m = m % 60;
    d = Math.floor(h / 24);
    h = h % 24;
    var res = h + Math.round(m * 100) / 6000;
    return res;
}

function preciseRound(num, decimals) {
    return Math.round(num * Math.pow(10, decimals)) / Math.pow(10, decimals);
}


function dateHoursDiff(date1, date2) {
    var diffMill = Math.abs(date2 - date1);  // difference in milliseconds
    return preciseRound(convertMsToHours(diffMill), 2);
}

function dateDiff() {
    var d1 = new Date(); //"now"
    var d2 = new Date(2013, 6, 24, 6, 25, 0); // some date 23.07.13 10:00
    var diffMill = Math.abs(d2 - d1);  // difference in milliseconds
    debugMessageToConsole('diffMill: ' + preciseRound(convertMsToHours(diffMill), 2), highLevel);
    debugMessageToConsole('diffMill: ' + convertMsToHours(diffMill), highLevel);
}

function displayObjectContent(obj, logLevel) {
    require(["dojo/json"], function (JSON) {
        logLevel = logLevel || highLevel;
        if (logLevel >= highLevel) {
            debugMessageToConsole('object json data: ' + JSON.stringify(obj), logLevel);
        }
    });
}

String.prototype.replaceAll = function (search, replace) {
    //if replace is null, return original string otherwise it will
    //replace search string with 'undefined'.
    if (!replace)
        return this;
    return this.replace(new RegExp('[' + search + ']', 'g'), replace);
};


function toogleContentView(e, img_elt_js_id_list, div_elt_js_id_list) {
    var srcImg;
    var content;
    var img_elt_js_id = 'searchImg';
    var img_elt_jquery_id = '#' + img_elt_js_id;
    var content_elt_js_id = 'searchContentDiv';
    var content_elt_jquery_id = '#' + content_elt_js_id;

    if ($(e.target) == null || img_elt_js_id_list == null || div_elt_js_id_list == null) {
        return;
    }
    /*img_elt_js_id_list_test = new Array('searchImg', 'gridImg', 'standardAttributesImg',
     'additionalAttributesImg', 'phonesListImg', 'groupMembershipImg');
     div_elt_js_id_list_test = new Array('searchContentDiv', 'dataViewDiv', 'standardAttributesDiv',
     'additionalAttributesDiv', 'phonesListDiv', 'groupMembershipDiv');*/
    for (var i = 0; i < img_elt_js_id_list.length; i++) {
        if ((e.target != null) && ($(e.target).is('#' + img_elt_js_id_list[i]))) {
            img_elt_js_id = img_elt_js_id_list[i];
            img_elt_jquery_id = '#' + img_elt_js_id;
            content_elt_js_id = div_elt_js_id_list[i];
            content_elt_jquery_id = '#' + content_elt_js_id;
            break;
        }
    }

    if ($(e.target).is(img_elt_jquery_id)) {
        srcImg = document.getElementById(img_elt_js_id).src;
        content = document.getElementById(content_elt_js_id);
        if (srcImg != null && content != null) {
            if ($(content_elt_jquery_id).is(':visible')) {
                $(content_elt_jquery_id).hide('slow');
                document.getElementById(img_elt_js_id).src = srcImg.replace("expanded.jpg", "collapsed.jpg");
            }
            else {
                $(content_elt_jquery_id).show('slow');
                document.getElementById(img_elt_js_id).src = srcImg.replace("collapsed.jpg", "expanded.jpg");
            }
        }
    }
}

function hasSpecialChars() {

    var specialChars = "<>@!#$%^&�*()_+[]{}?:;|'\"\\,./~`-=";
    //var invalidUrlChars = "<>@!#$%^&�*()_+[]{}?:;|'\"\\,./~`-=";
    for (i = 0; i < specialChars.length; i++) {
        if (string.indexOf(specialChars[i]) > -1) {
            return true;
        }
    }
    return false;
}

function registerKeyPressedEvent(targetControlId, callbackFunc) {
    $('#' + targetControlId).bind("keypress", function (e) {
        if (e.keyCode == 13) {
            callbackFunc();
            debugMessageToConsole(" Cmmon file. key pressed fired... ", lowLevel);
            return false;
        }
    });
}


function formatWorkTime(value) {
    if (value) {
        return value.replace(".", ",");
    }
    return value;
}

function arrayContainsValue(arrayValues, value) {
    if (arrayValues) {
        for (var i = 0; i < arrayValues.length; i++) {
            if (arrayValues[i].toString() == value.toString())
                return true;
        }
    }
    return false;
}

function getDataGridAutoHeight(jsonSize, gridDefaultPageSize) {
    if (jsonSize > gridDefaultPageSize) {
        return false;
    }
    return true;
}


/*
 summary: 
 *    disables or enables button
 * params:
 *     enabled: boolean, true will disable and false will enable 
 *
 */
function toogleButtonState(dijitBtn, status) {
    if (dijitBtn) {
        dijitBtn.set('disabled', status);
        //dijitBtn.setDisabled(true);  // disable
        //dijitBtn.setDisabled(false);  // enable
    }
}

/**
 summary: 
 *    display error content message
 * params:
 *     divHolderId: string, the div id
 *     errorMessage: string, the error message
 *     errorImg: string, url image error  
 *
 */
function displayErrorContent(divHolderId, errorMessage, errorImg) {
    errorImg = errorImg || "../../Resources/Images/Buttons/error_icon.png";
    var content = '<div class="fullWidth centerContent"   id="__errorContentDiv">'
            + '  <table  class="errorTable almostFullWidth" cellspacing="3">'
            + '    <tr>'
            + '       <td class="toLeft" width="2%">'
            + '              <img src="' + errorImg + '" alt=""/>'
            + '          </td>'
            + '          <td class="toLeft fullWidth">'
            + '              <label id="errorMessageLabel" class="smallerMsg">Error occucred on this page!</label>'
            + '          </td>'
            + '      </tr>'
            + '  </table>'
            + '  <br /> '
            + '</div>';
    content = '<div class="alert alert-danger  alert-dismissable">'
            + '  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>'
            + '       <label id="errorMessageLabel" class="_smallerMsg">This alert box could indicate a dangerous or potentially negative action.</label>'
            + '</div>';
    $('#' + divHolderId).html(content);
    $('#errorMessageLabel').html(errorMessage);

}


function reloadPage() {
    if (window.location) {
        window.location.reload(true);
    }
}


function sendAjaxRequest(xhrArgs, callbackMethod) {

    var sendUsingAjax = true;
    if (sendUsingAjax)
        $.ajax({
            type: xhrArgs.method,
            url: xhrArgs.url,
            data: xhrArgs.postData,
            dataType: xhrArgs.handleAs,
            headers: xhrArgs.headers,
            success: function (data) {
                if (callbackMethod != null && typeof callbackMethod === 'function') {
                    callbackMethod(data);
                }
            },
            error: function (xhr, status, error) {
                if (xhrArgs.error != null && typeof xhrArgs.error === 'function') {
                    xhrArgs.error(error);
                }
            }
        });
}


function formatCalendarTitle(calendarTitle) {
    var newTitle = calendarTitle.replace("<br />", " ");
    newTitle = newTitle.replace("<b>", " ");
    //newTitle = newTitle.replace("</b>", " ");
    var index = calendarTitle.indexOf("<br />");
    if (index != -1) {
        return calendarTitle.toString().substr(0, index);
    }
    return newTitle;
}


function formatCalendarSummary(subject, location, projectNumber) {

    var formattedSummary = null;
    if (subject == null || subject == "")
        subject = "Unbenannt";
    if (location == null)
        location = "";
    //debugMessageToConsole("BEFORE ProjectNumber is: " + projectNumber, highLevel);
    var obj = new Object();
    obj.subject = subject;
    obj.location = location;
    obj.projectNumber = projectNumber;


    if (projectNumber = !null && projectNumber.length > 0) {
        // appointment with project number
        if (location.toString().length > 0) {
            formattedSummary = obj.subject.toString() + '<br />'
                    + '<b>' + obj.location.toString() + "#" + obj.projectNumber + '</b>';
            //formattedSummary = '<b>' + obj.location + "#" + obj.projectNumber + '</b>';
        }
        else {
            formattedSummary = obj.subject.toString() + '<br />' + '<b>' + "#" + obj.projectNumber + '</b>';
        }
    }
    else {
        // appointment without project number
        if (location != null && location.toString().length > 0) {
            // if location is not empty
            formattedSummary = obj.subject.toString() + '<br />'
                    + '<b>' + obj.location.toString() + '</b>';
        }
        else {
            // we use only the subject field
            if (obj.subject == null || obj.subject.toString().length == 0)
                formattedSummary = "Unbenannt";
            else
                formattedSummary = obj.subject.toString();
        }
    }
    //debugMessageToConsole("AFTER ProjectNumber is: " + obj.projectNumber, highLevel);
    return formattedSummary;
}


/** summary:
 //       sends async request (POST/GET) to server
 //   parameters
 //       postUrl:
 //           post URL
 //       dataToPost:
 //           data to post
 //       dataType:
 //           data type
 //       postMethod:
 //           the method used. GET or POST
 //       errorMethod:
 //           called to handle errors on postback
 //       callBackMethod:
 //          called when postback completes
 //
 */
function sendAsyncRequest(postUrl, dataToPost, dataType, postMethod, errorMethod, callBackMethod,
        synchronous, timeoutDuration) {

    require(["dojo/request/xhr",
        "dojo/date/locale", "dojo/json",
        "dojo/_base/array", "dojo/_base/lang"],
            function (xhr, locale, JSON) {

                var xhrArgs = {};
                var headerContent = "application/x-www-form-urlencoded; charset=UTF-8";
                // headerContent = "application/json";
                //headerContent = { 'Content-Type': 'application/x-www-form-urlencoded' };
                synchronous = synchronous || false;
                timeoutDuration = timeoutDuration || 1000 * 3600; // 1 hour default
                if (postMethod != null && postMethod.toLowerCase() === "get") {
                    // GET method is used
                    xhrArgs = {
                        url: postUrl,
                        postData: dataToPost,
                        handleAs: dataType,
                        header: {"Content-Type": headerContent},
                        method: "GET",
                        sync: synchronous,
                        timeout: timeoutDuration,
                        error: function (err) {
                            if (errorMethod != null && typeof errorMethod === 'function')
                                errorMethod(err);
                            else {
                                logError(err);
                            }
                        }
                    };

                    // send async xhr request to server
                    xhr(xhrArgs.url, {
                        handleAs: xhrArgs.handleAs,
                        headers: xhrArgs.headers,
                        method: xhrArgs.method,
                        query: xhrArgs.postData  // NB!! Use 'query' for GET request
                    }).then(
                            function (data) {
                                requestCallback(data);
                            },
                            xhrArgs.error);

                }
                else {
                    // POST is the default method
                    // set default header type
                    var headerContent = "application/x-www-form-urlencoded; charset=UTF-8";
                    if (dataType != null && dataType == "json") {
                        //headerContent = "application/json; charset=UTF-8";
                        headerContent = "application/x-www-form-urlencoded; charset=UTF-8";
                        //dataType = "text"; //ONLY for for web service calls
                    }
                    else if (dataType != null && dataType == "jsonAspx") {
                        // for ASPX as controller target
                        headerContent = "application/x-www-form-urlencoded; charset=UTF-8";
                        //dataType = "json";
                    }
                    xhrArgs = {
                        url: postUrl,
                        postData: dataToPost,
                        handleAs: dataType,
                        headers: {"Content-Type": headerContent},
                        method: "POST",
                        sync: synchronous,
                        timeout: timeoutDuration,
                        error: function (err) {
                            if (errorMethod != null && typeof errorMethod === 'function') {
                                errorMethod(err);
                            }
                            else {
                                logError(err);
                            }
                        }
                    };

                    //displayObjectContent(xhrArgs, highLevel);
                    // send async xhr request to server
                    xhr(xhrArgs.url, {
                        handleAs: xhrArgs.handleAs,
                        headers: xhrArgs.headers,
                        method: xhrArgs.method,
                        data: xhrArgs.postData,
                        sync: xhrArgs.sync,
                        timeout: timeoutDuration
                    }).then(
                            function (data) {
                                requestCallback(data);
                            },
                            xhrArgs.error);
                }

                // callback method
                function requestCallback(data) {
                    if (dataType != null && (dataType == "json")) {
                        displayObjectContent(data, lowLevel);
                    }
                    else {
                        if (data != null) {
                            debugMessageToConsole(' sendAsyncRequest postback completed: '
                                    + $.trim(data), lowLevel);
                        }
                    }

                    require(["dojo/json"], function (JSON) {

                        if (dataType != null && (dataType == "json" || dataType == "text")) {
                            var dataToParse = $.trim(data);
                            //  data.replace(/\n/g, "-");
                            // replace all invalid json chars
                            var jsonData = dataToParse; // for text response
                            if (jsonData.length == 0) {
                                // alert("No data to parse JSON");
                                return;
                            }
                            if (dataType == "text") {
                                //alert(jsonData);
                                jsonData = JSON.parse(dataToParse); //!! Not use trim with json formatting
                            }
                            debugMessageToConsole('sendAsyncRequest jsonData.length  data: '
                                    + jsonData.length, highLevel);
                            if (jsonData != null) {
                                // use json data formatted
                                if (callBackMethod != null && typeof callBackMethod == 'function') {
                                    callBackMethod(jsonData);
                                }
                            }
                        }
                        else {
                            // send data in raw format
                            if (callBackMethod != null && typeof callBackMethod == 'function') {
                                callBackMethod(data);
                            }
                        }
                    });
                }

            });
}


function postJsonData(postUrl, dataToPost, dataType, postMethod, errorMethod, callBackMethod) {
    sendAsyncRequest(postUrl, dataToPost, dataType, postMethod, errorMethod, callBackMethod);
}


function setSortColumnsIndexes(dataGrid, defaultSortColIndex, isAscendant) {
    if (dataGrid == null) {
        logWarning("Invalid dataGrid object");
        return;
    }
    dataGrid.canSort = function (colIndex) {
        if ((colIndex == 0) || (colIndex == 1)) {
            return false;
        }
        return true;
    };
    // set sort index
    //var ie = document.all;
    var mozilla = document.getElementById && !document.all;
    if (mozilla) {
        dataGrid.setSortIndex(defaultSortColIndex, isAscendant);
    }
}


function setWidgetValue(widgetId, value) {
    require(["dijit/registry"], function (registry) {
        var widget = registry.byId(widgetId);

        if (widget != null) {
            widget.set("value", value);
        }
        else {
            widget = dijit.byId(widgetId); // dojo.byId(widgetId);
            if (widget != null) {
                widget.set("value", value);
            }
        }
    });
}



function getGridAutoWidth(storeSize, gridDefaultPageSize) {
    //if(storeSize)
    //  return true;
    if (storeSize > 0) {
        return false;
    }
    return false;
}

function getGridAutoHeight(storeSize, gridDefaultPageSize) {
    if (storeSize > 0) {
        if (storeSize < gridDefaultPageSize) {
            return true;
        }
    }
    return false;
}

// custom string comparator
function compareStringIgnoreCase(a, b) {
    //console.log('sorting called with a: ' + a + ' and b: ' + b);
    if (a == null)
        return -1;
    else if (b == null)
        return 1;
    if (a.toLowerCase() < b.toLowerCase()) {
        return -1;
    }
    else if (a.toLowerCase() > b.toLowerCase()) {
        return 1;
    }
    else {
        return 0;
    }
}

// custom string comparator
function compareDateTime(a, b) {
    //console.log('sorting called with a: ' + a + ' and b: ' + b);
    if (a == null)
        return -1;
    else if (b == null)
        return 1;
    if (a < b) {
        return -1;
    }
    else if (a > b) {
        return 1;
    }
    else if (+a == +b) {
        return 0;
    }
}



function callCrossDomain() {

    var invocation = new XMLHttpRequest();
    var url = 'http://aruner.net/resources/access-control-with-credentials/';
    var invocationHistoryText;


    function callOtherDomain() {
        if (invocation) {
            invocation.open('GET', url, true);
            invocation.withCredentials = "true";
            invocation.onreadystatechange = handler;
            invocation.send();
        }
        else {
            invocationHistoryText = "Whoops -- Sorry.  No Invocation TookPlace At All or Errors Took Place";
            var textNode = document.createTextNode(invocationHistoryText);
            var textDiv = document.getElementById("textDiv");
            textDiv.appendChild(textNode);
        }

    }
    function handler(evtXHR) {
        if (invocation.readyState == 4) {
            if (invocation.status == 200) {
                var response = invocation.responseText;
                invocationHistoryText = document.createTextNode(response);
                var textDiv = document.getElementById("textDiv");
                textDiv.appendChild(invocationHistoryText);

            }
            else
                alert("Invocation Errors Occured" + invocation.readyState);
        }
        else {
            dump("currently the application is at" + invocation.readyState);
        }
    }

}


function parseContent(divId, _callbackFunc) {
    require(["dojo/parser", "dojo/ready", "dojo/dom"],
            function (parser, ready, dom) {
                ready(function () {
                    try {
                        // now we can parse the postback content
                        parser.parse(dom.byId(divId)).then(function () {
                            //$("#" + divId).attr("class", "");
                            if (typeof _callbackFunc !== "undefined"
                                    && typeof _callbackFunc == "function") {
                                _callbackFunc();
                            }
                        });
                    }
                    catch (err) {
                        logError(err);
                    }
                });
            });
}


function displayCurrentPath(holderDiv, numLevels, arrayTexts, hLink, homeLinkUrl) {

    var imgDir = "../../Resources/Images/Commons/";
    var homeImg = imgDir + "path_home_icon.gif";
    var separatorImg = imgDir + "path_menu_icon.gif";
    var pathTable = $("<table></table>").addClass("hideBorder").attr("id", "pathTable");
    pathTable.attr("cellspacing", "1");
    pathTable.attr("cellpadding", "1");
    var pathTableRow = null;
    homeLinkUrl = homeLinkUrl || webSiteRootURL;
    var homeHref = '<a href="' + homeLinkUrl + '"  title="go to Home" class="siteMapItemLinkBtn"><img src="' + homeImg + '" alt="" /></a>';
    var tableCol = $('<td nowrap="nowrap"></td>').addClass("toLeft").html(homeHref);
    var pathTableRow = $('<tr></tr>');
    arrayTexts = arrayTexts || [];

    if (arrayTexts.length == 0) {
        return "<span>--</span>";
    }
    pathTableRow.append(tableCol);
    tableCol = $('<td nowrap="nowrap"></td>').addClass("toLeft").html('<img src="' + separatorImg + '" alt="" />'); // separator
    pathTableRow.append(tableCol);
    for(var i = 0; i < numLevels; i++){
        if(i == 0){
            tableCol = $('<td nowrap="nowrap"></td>').addClass("smallerMsg toTop").html(arrayTexts[i]);
            pathTableRow.append(tableCol);
            
        }
        else if(i != numLevels - 1){
            // last level
            tableCol = $('<td nowrap="nowrap"></td>').addClass("toLeft").html('<img src="' + separatorImg + '" alt="" />'); // separator
            pathTableRow.append(tableCol);
            //var ahref = '<a href="' + hLink + '"  title="' + arrayTexts[i] + '" class="siteMapItemLinkBtn">' + arrayTexts[i] + '</a>';
            tableCol = $('<td nowrap="nowrap"></td>').addClass("smallerMsg toTop").html(arrayTexts[i]);
            pathTableRow.append(tableCol);
        }
        else {
            // last level
            tableCol = $('<td nowrap="nowrap"></td>').addClass("toLeft").html('<img src="' + separatorImg + '" alt="" />'); // separator
            pathTableRow.append(tableCol);
            var ahref = '<a href="' + hLink + '"  title="' + arrayTexts[i] + '" class="siteMapItemLinkBtn">' + arrayTexts[i] + '</a>';
            tableCol = $('<td nowrap="nowrap"></td>').addClass("smallerMsg toTop").html(ahref);
            pathTableRow.append(tableCol);
        }
        

        
    }
    

    //pathTableRow.append(tableCol);
    // add to table
    pathTable.append(pathTableRow);
    // ceeate div
    var pathDiv = $('<div></div>').attr("align", "left");
    pathDiv.html(pathTable);
    // add div to holder div

    $('#' + holderDiv).html(pathDiv);
    $('#' + holderDiv).removeClass("hideContent");

}


function showFilterBar(gridId) {
    if (dijit.byId(gridId) != null) {
        dijit.byId(gridId).showFilterBar(true);
    }
}


function customDelay(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
            break;
        }
    }
}

// Prototypes of String class

function endsWithString(searchString, pattern) {
        alert(searchString);
        var diff = searchString.length - pattern.length;
        return diff >= 0 && searchString.lastIndexOf(pattern) === diff;
}


// add startsWith prototype from EMAC 2015
if (!String.prototype.startsWith) {
    String.prototype.startsWith = function (searchString, position) {
        position = position || 0;
        return this.indexOf(searchString, position) === position;
    };
}

if (!String.prototype.endsWith) {
    /*
    String.prototype.endsWith = function (searchString, position) {
        var subjectString = this.toString();
        if (position === undefined || position > subjectString.length) {
            position = subjectString.length;
        }
        position -= searchString.length;
        var lastIndex = subjectString.indexOf(searchString, position);
        return lastIndex !== -1 && lastIndex === position;
    };
    */
    String.prototype.endsWith = function(searchString) {
        var diff = this.length - searchString.length;
        return diff >= 0 && this.lastIndexOf(searchString) === diff;
    };
}

if (!String.prototype.includes) {
    String.prototype.includes = function () {
        'use strict';
        return String.prototype.indexOf.apply(this, arguments) !== -1;
    };
}

if (!Date.prototype.addDays) {

    Date.prototype.addDays = function (days) {
        var thisDate = new Date(this.valueOf());
        thisDate.setDate(thisDate.getDate() + days);
        return thisDate;
    };
}

if (!String.prototype.escapeSpecialChars) {
    String.prototype.escapeSpecialChars = function() {
        return this.replace(/\\n/g, "\\n")
               .replace(/\\'/g, "\\'")
               .replace(/\\"/g, '\\"')
               .replace(/\\&/g, "\\&")
               .replace(/\\r/g, "\\r")
               .replace(/\\t/g, "\\t")
               .replace(/\\b/g, "\\b")
               .replace(/\\f/g, "\\f");
    };
}


/* end prototypes */
//Gets english data part
function getDatePart(dateAndTimeStr) {
    var dateItems = dateAndTimeStr.split(' ');
    if (dateItems == null || dateItems.length != 2) {
        logError({message: "getDatePart Conversion error to date: " + dateAndTimeStr});
    }
    return dateItems[0].toString();
}

function setFormFieldValue(fieldId, value) {
    if ($("#" + fieldId) != null && typeof $("#" + fieldId).val == 'function') {
        $("#" + fieldId).val(value);
    }
    else {
        $("#" + fieldId).attr("value", value);
    }
}


function randomString(size, mode) {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    if (mode != null && mode == "number") {
        possible = "0123456789";
    }
    for (var i = 0; i < size; i++) {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }
    return text;
}


function randomNumberString(size) {
    var text = "";
    var possible = "0123456789";
    for (var i = 0; i < size; i++) {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }
    return text;
}


function initDateTimeFields(fieldId, localeValue) {
    localeValue = localeValue || "de";
    $("#" + fieldId).datetimepicker({
        locale: localeValue, format: "L"
    });
}


function setFormDateFieldValue(fieldId, value) {
    if ($("#" + fieldId) != null && typeof $("#" + fieldId).data == "function") {
        if ($("#" + fieldId).data("DateTimePicker") != null && typeof strToShortDate == "function") {
            $("#" + fieldId).data("DateTimePicker").date(strToShortDate(value));
        }
    }
    else {
        $("#" + fieldId).attr("value", value);
    }
}


function dateToLocale(dateVal, locale) {
    var dateValue = strToShortDate(new String(dateVal));
    locale = locale || "de-DE";
    debugMessageToConsole("shortDateFieldFormatter strDate: " + dateValue, lowLevel);
    return dateValue.toLocaleDateString(locale);
}



function dateToYMD(dateVal) {
    var dateValue = strToShortDate(new String(dateVal));
    var month = dateValue.getMonth() < 10 ? "0" + (dateValue.getMonth() + 1) : dateValue.getMonth() + 1;
    var day = dateValue.getDate() < 10 ? "0" + dateValue.getDate() : dateValue.getDate();
    return dateValue.getFullYear() + "-" + month + "-" + day;
}



function showSelectFileDialog(controlId) {
    //trigger event click of file control
    //alert(controlId);
    $("input[type=file][id='" + controlId + "']").trigger("click");
    //$("input[type=file]").trigger("click");
}

function bindChangeEventForFileSelectDialog(uploadInputFieldId, targetInputFieldId, multiple, _callback) {
    // $("input[id^='DiscountType']")
    //$("input[id^='" + uploadInputFieldId + "']")
    var selector = "";
    if (multiple == null || !multiple) {
        // for one selection
        selector = "#" + uploadInputFieldId;
        $(selector).change(function () {
            var selectedFileName = $(this).val(); // full file name
            // remove directory name
            var selectedFileNameWithoutDir = selectedFileName;
            if (selectedFileName.lastIndexOf('\\') != -1)
                selectedFileNameWithoutDir = selectedFileName.substr(selectedFileName.lastIndexOf('\\') + 1);
            //selectedFileNameWithoutDir = selectedFileNameWithoutDir.toString().toLowerCase();
            // orignal file name
            selectedFileNameWithoutDir = selectedFileNameWithoutDir.toString();
            //alert(selectedFileNameWithoutDir);
            // set fileName field
            $("#" + targetInputFieldId).val(selectedFileNameWithoutDir);
        });
    }
    else if (multiple == true) {
        // multiple selections
        selector = "input[id^='" + uploadInputFieldId + "']";
        var selectedFileNamesList = "";
        $(selector).change(function () {
            
            var selectedFiles = $(this)[0].files; // all files
            $.each(selectedFiles, function (index, selectedFile) {
                var fileSize = selectedFile.size;//size in bytes
                var selectedFileName = selectedFile.name;
                if (fileSize > 1024)
                    fileSize = fileSize / 1024.0; //size in kb
                //alert('Name: ' + selectedFile.name + ' Size: ' + fileSize);
                // remove directory name
                var selectedFileNameWithoutDir = selectedFileName;
                if (selectedFileName.lastIndexOf('\\') != -1){
                    selectedFileNameWithoutDir = selectedFileName.substr(selectedFileName.lastIndexOf('\\') + 1);
                }
                //selectedFileNameWithoutDir = selectedFileNameWithoutDir.toString().toLowerCase();
                //keep original file name
                selectedFileNameWithoutDir = selectedFileNameWithoutDir.toString();
                selectedFileNamesList += selectedFileNameWithoutDir + ";";
            
            });

            //alert(selectedFileNameWithoutDir);
            // set fileName field
            $("#" + targetInputFieldId).val(selectedFileNamesList);
        });
    }

}


function getFrenchMonthName(monthValue) {
    //var dateStr = "2011-08-03 09:15:11"; //returned from mysql field
    if(monthValue == null || monthValue.length == 0){
        logError('Invalid parameter dateStr in formatDate getFrenchMonthName');
        return;
    }
     
    var monthsFrList = ["Janvier", "Fevrier", "Mars"
        , "Avril", "Mai", "Juin"
        , "Juillet", "Aout", "Septembre"
        , "Octobre", "Novembre", "Decembre"
    ]; // french
    if(monthsFrList != null){
        var month = parseInt(monthValue);
        if(month <= 12 && month >= 1){
            return monthsFrList[month - 1];
        }
    }
    return monthsFrList[0];    
}