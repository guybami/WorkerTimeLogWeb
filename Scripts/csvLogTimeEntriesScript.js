
var webServiceURL = "http://localhost/timelogwebservice/EmployeeAppointmentService.svc";


function testExport() {

    var serviceUrlWithParams = webServiceURL + "/GetTimeLoggerServices"; //  "/GetNotExportedLogTimeEntries";
    var postParameters = {};
    var xhrArgs = {
        url: serviceUrlWithParams,
        postData: postParameters,
        handleAs: "json",
        method: "GET",
        error: function (err) {
            logError(err);
        }
    };

    // send async xhr request to server
    sendAsyncRequest(xhrArgs.url, xhrArgs.postData, xhrArgs.handleAs, xhrArgs.method, xhrArgs.error, fetchCompleted);



    function fetchCompleted(data) {
        var csvRawData = $.trim(data);
        debugMessageToConsole('csvRawData data: ' + csvRawData, highLevel);
        // hide loading img
        //hideSearchingOverlay(targetDiv);
        //hidePostbackOverlay();
        //var data = $.csv.toArray(csvRawData);
        var html = generateTableJson(data);
        $('#result1').empty();
        $('#result1').html(html);
        //var csvString = csvRawData.join("\n");
    }

}


function testExport2() {
    //window.location = webSiteRootURL + "/Appointments/ExportEmployeeLogTimeEntriesToCSV.aspx";
}


function loadLinkButton(){
  var btn = document.getElementById("linkButton");
  var axx = document.getElementById("ax");
  axx.href = 'data:text/csv;base64,'+Base64.encode("3;2;1");
} // I used the javascript encoder from this page.


function example1() {
    var input = '"You col 1","data col 2"," data col 3"';
     
    var data = $.csv.toArray(input);
    var html = generateTable(data);
    $('#result1').empty();
    $('#result1').html(html);
}

function generateTableJson(data) {
    var html = '';

    if (typeof (data[0]) === 'undefined') {
        return "";
    }

    if (data[0].constructor === Object) {
        html += '<tr>\r\n';
        for (var i = 0; i < data.length; i++) {
            html += '<td>' + data[i].ServiceName + '</td>\r\n';
            html += '<td>' + data[i].DisplayName + '</td>\r\n';
            html += '<td>' + data[i].repeatInterval + '</td>\r\n';
            html += '<td>' + data[i].exportDirectory + '</td>\r\n';
        }
        html += '</tr>\r\n';
    }
    return html;
}


// build HTML table data from an array (one or two dimensional)
function generateTable(data) {
    var html = '';

    if (typeof (data[0]) === 'undefined') {
        return null;
    }

    if (data[0].constructor === String) {
        html += '<tr>\r\n';
        for (var item in data) {
            html += '<td>' + data[item] + '</td>\r\n';
        }
        html += '</tr>\r\n';
    }

    if (data[0].constructor === Array) {
        for (var row in data) {
            html += '<tr>\r\n';
            for (var item in data[row]) {
                html += '<td>' + data[row][item] + '</td>\r\n';
            }
            html += '</tr>\r\n';
        }
    }

    if (data[0].constructor === Object) {
        for (var row in data) {
            html += '<tr>\r\n';
            for (var item in data[row]) {
                html += '<td>' + item + ':' + data[row][item] + '</td>\r\n';
            }
            html += '</tr>\r\n';
        }
    }

    return html;
}

$(document).ready(function () {
    var $link = $("#dataLink");
    var $nameFields = $(".nameField");
    var $cookieFields = $(".cookieField");

    // set file name
    $link.attr('download', 'xcs_log_28.08.14.csv');
    $("#downloadLink").on("click", function (e) {
        var csv = "";
        var delimiter = ";";
        //we should have the same amount of name/cookie fields
        for (var i = 0; i < $nameFields.length; i++) {
            var name = $nameFields.eq(i).val();
            var cookies = $cookieFields.eq(i).val();
            if (name !== '' && cookies !== '')
                csv += name + delimiter + cookies + "\n";
        }
        console.log(csv);

        $link.attr("href", 'data:Application/octet-stream,' + encodeURIComponent(csv))[0].click();
    });
});


   