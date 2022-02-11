// Author: Guy Bami 
// Tests script
 
var loaded = false;
var slideIndex = 0;
var currentSlideIndex = 0;
var slideImagesList = new Array();



$(document).ready(function () {
    
    $("#openModal").on("click", function () {
        $("#myModal").modal("show");
        rescale();
        if (!loaded) {
            loadThumbnailImages();
            bindEvents();
            loaded = true;
        }
    });
    $("#showThumbnailBtn").on("click", function () {
        $("#myModal").modal("show");
        rescale();
        if (!loaded) {
            loadThumbnailImages();
            bindEvents();
            loaded = true;
        }
    });
    $(window).bind("resize", rescale);
});


function loadThumbnailImages() {
    var imgDirectory = "../../UploadedFiles/Images/Events/";
    var imgUrls = ["cS-1.jpg", "cS-2.jpg", "cS-3.jpg", "cS-4.jpg", "cS-5.jpg",
        "cS-6.jpg", "cS-7.jpg", "cS-8.jpg", "cS-9.jpg", "cS-10.jpg"];
    var imgObj = { imageId: 1, imgUrl: "" };
    var numbImage = 10;
    var buff = "Während ein Mieterrechtsschutz bereits in vielen Privatrechtsschutzpolicen enthalten ist, gibt es den"
        + " Während ein Mieterrechtsschutz bereits in vielen Privatrechtsschutzpolicen enthalten ist, gibt es den"
        + " Während ein Mieterrechtsschutz bereits in vielen Privatrechtsschutzpolicen enthalten ist, gibt es den"
        + "Während ein Mieterrechtsschutz bereits in vielen Privatrechtsschutzpolicen enthalten ist, gibt es den"
        + "Während ein Mieterrechtsschutz bereits in vielen Privatrechtsschutzpolicen enthalten ist, gibt es den"
        + " Während ein Mieterrechtsschutz bereits in vielen Privatrechtsschutzpolicen enthalten ist, gibt es den"
        + " Während ein Mieterrechtsschutz bereits in vielen Privatrechtsschutzpolicen enthalten ist, gibt es den"
        + " Während ein Mieterrechtsschutz bereits in vielen Privatrechtsschutzpolicen enthalten ist, gibt es den"
        + " Während ein Mieterrechtsschutz bereits in vielen Privatrechtsschutzpolicen enthalten ist, gibt es den"
        + "Während ein Mieterrechtsschutz bereits in vielen Privatrechtsschutzpolicen enthalten ist, gibt es den"
        + " Während ein Mieterrechtsschutz bereits in vielen Privatrechtsschutzpolicen enthalten ist, gibt es den";

    for (var i = 0; i < imgUrls.length; i++) {
        imgObj = { imageId: 1 + i * 85, imgUrl: imgDirectory + imgUrls[i], comment: buff + i };
        slideImagesList.push(imgObj);
    }


}

function bindEvents() {

    $(".left").click(function () {
        if (currentSlideIndex > 0) {
            currentSlideIndex--;
        }
        else {
            // restart
            currentSlideIndex = 0;
        }
        // display previous image
        $("#currentPhoto").attr("src", slideImagesList[currentSlideIndex].imgUrl);
        // comment
        $("#photoCommentText").html(slideImagesList[currentSlideIndex].comment);
        //insertComment();

        
    });

    $(".right").click(function () {
        if (currentSlideIndex < slideImagesList.length - 1) {
            currentSlideIndex++;
        }
        else {
            // restart
            currentSlideIndex = 0;
        }
        $("#currentPhoto").attr("src", slideImagesList[currentSlideIndex].imgUrl);
        $("#photoCommentText").html(slideImagesList[currentSlideIndex].comment);
        //insertComment();
    });
}

function insertComment() {
    buff = $(".buffer").html() + " -- " + (new Date()).toLocaleString();
    $("#insertCommentSpan").append(buff);

}


function rescale() {
    var size = { width: $(window).width(), height: $(window).height() };
    // calculate size
    var offset = 20;
    var offsetBody = 80;
    $('#myModal').css('height', size.height - offset);
    $('.modal-body').css('height', size.height - (offset + offsetBody));
    $('#myModal').css('top', 0);

    //$('#thumbnailHolder').css('height', size.height - 4 * offset);
    //$('#thumbnailHolder').css('vertical-align', "vertical-align:middle");

}


 
   
     
     
 

 


