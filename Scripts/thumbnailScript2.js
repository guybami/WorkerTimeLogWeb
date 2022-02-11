
// Author: Guy Bami 
// Tests script
 
var imgsArray = new Array();

$(document).ready(function () {
    
    $("#showThumbnailBtn").on("click", function () {
        $("#thumbnailDialog").modal("show");
        return;
        $('#image-gallery').lightSlider({
            gallery: true,
            item: 1,
            thumbItem: 8,
            slideMargin: 0,
            speed: 500,
            auto: false,
            loop: true,
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
                alert('index: ' + counter);
                $("#image-gallery").each(function (index) {
                    var d = $(this).find("li:eq(" + (++counter) + ")").attr("data-thumb");
                    alert('d: ' + d);
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

    });
    
    

});

 
   
     
     
 

 


