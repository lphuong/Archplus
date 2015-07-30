/**
 * Created by Admin on 7/25/2015.
 */
$(window).load(function () {
// checkbox slider change -> hide the widget
    $('.sl').change(function () {
        var thisRoot = $(this)
            .parent() // widget-header
            .parent() // widget-controls
            .parent(); // widget
        if (!this.checked) {
            //thisRoot.find('.widget-content').fadeOut();
            thisRoot.find('.widget-content, .widget-title, .xtra').animate({'opacity': 0.25}).css({
                'cursor': 'default',
                'pointer-events': 'none'
            });
            thisRoot.find('.etabs li a').css({'cursor': 'default', 'pointer-events': 'none'})
        } else {
            //thisRoot.find('.widget-content').fadeIn();
            thisRoot.find('.widget-content, .widget-title, .xtra').animate({'opacity': 1}).css({
                'cursor': 'pointer',
                'pointer-events': 'auto'
            });
            thisRoot.find('.etabs li a').css({'cursor': 'pointer', 'pointer-events': 'auto'});
        }
    });
});
