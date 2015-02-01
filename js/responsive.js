/* 
 * Javascript required to make site responsive
 */

jQuery(document).ready(function($) {
    adjustMenu(jQuery);
});

jQuery(window).bind('resize orientationchange', function($) {
    adjustMenu(jQuery);
});

function adjustMenu($) {
    var ww = document.body.clientWidth;
    if (ww < 750) {
        $("#nav").addClass("mob");
    } else {
        $("#nav").removeClass("mob");
    }
}
