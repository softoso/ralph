/* 
This block enables users to full screen the page of dashboard
//FULL SCREENMODE///
*/

/* Get the element you want displayed in fullscreen */
var button = document.getElementById('fullScreen');
var winscreen = document.documentElement;

// This Function will supports to compatible for every users from various platforms.
function getFullScreenElement() {
    return document.fullscreenElement
        || document.webkitFullscreenElement
        || document.msFullscreenElement
        || document.mozFullscreenElement
}


button.addEventListener('click', function (e) {
    e.preventDefault;
    if (getFullScreenElement()) {
        document.exitFullscreen();
    } else {
        winscreen.requestFullscreen().catch((e) => {

            var currentScreen = document.fullscreenElement;
            console.log(currentScreen);
            console.log(e);
        });
    }
})


//Swipe Functionality of Carousels
$(document).ready(function() {
    $("#top_news").swiperight(function() {
       $(this).carousel('prev');
     });
    $("#top_news").swipeleft(function() {
       $(this).carousel('next');
    });
 });