
// Author: Guy Bami 
// Tests script
 
var imgsArray = new Array();
var loaded = false;

$(document).ready(function () {
    
    $("#openModal").on("click", function () {
        $("#myModal").modal("show");
        rescale();
        if (!loaded) {
            generateThumbnail();
            loaded = true;
        }
        //$('.carousel').carousel({
        //    interval: 3000
        //});

    });
    $(window).bind("resize", rescale);
});




function generateThumbnail() {

    $('#image-gallery').lightSlider({
        gallery: true,
        slideMargin:4,
        autoWidth: true,
        slideMargin: 5,
        speed: 500,
        item:1,
        auto: false,
        loop: true,
        thumbItem: 15,
        adaptiveHeight: true,
        onSliderLoad: function () {
            $('#image-gallery').removeClass('cS-hidden');
        },
        // callbacks

        onBeforeSlide: function (el) {
            console.log('onBeforeSlide');
        },
        onAfterSlide: function (el) {
            console.log('onAfterSlide');
            var counter = el.getCurrentSlideCount() - 1;
            //alert('index: ' + counter);
            $("#image-gallery").each(function (index) {
                var d = $(this).find("li:eq(" + (++counter) + ")").attr("data-thumb");
                //alert('d: ' + d);
            });
        },
        onBeforeNextSlide: function (el) {
            console.log('onBeforeNextSlide');

            //alert(thumb);
        },
        onBeforePrevSlide: function (el) {
            console.log('onBeforePrevSlide');
        }


    });
}


function rescale() {
    var size = { width: $(window).width(), height: $(window).height() }
    // calculate size
    var offset = 20;
    var offsetBody = 80;
    $('#myModal').css('height', size.height - offset);
    $('.modal-body').css('height', size.height - (offset + offsetBody));
    $('#myModal').css('top', 0);
}


 
   
     
     
 

 


