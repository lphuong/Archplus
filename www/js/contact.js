function ajaxContact(theForm) {
    var $ = jQuery;
    $('#loader').fadeIn();
    var formData = JSON.stringify($(theForm).serializeObject()),
        note = $('#Note');
    jQuery.ajax({
        type: "POST",
        url: options.URL_JSON_CONTACT,
        data: formData,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
            $('#LoadingGraphic').hide();
            $('#loader').text("Your message has been sent. Thank you!");
        },
        error: function (errorMsg) {
            $('#LoadingGraphic').hide();
            $('#loader').text("Your message has not been sent. Please try again!");
            console.log(errorMsg);
        }
    });
//    $.ajax({
//        type: "POST",
//        url: "send.php",
//        data: formData,
//        success: function (response) {
//            if (note.height()) {
//                note.fadeIn('fast', function () {
//                    $(this).hide();
//                });
//            } else {
//                note.hide();
//            }
//            $('#LoadingGraphic').fadeOut('fast', function () {
//                if (response === 'success') {
//
//                    $('.page_subtitle').hide();
//
//                }
//// Message Sent? Show the 'Thank You' message and hide the form
//                var result = '';
//                var c = '';
//                if (response === 'success') {
//                    result = 'Your message has been sent. Thank you!';
//                    c = 'success';
//                } else {
//                    result = response;
//                    c = 'error';
//                }
//                note.removeClass('success').removeClass('error').text('');
//                var i = setInterval(function () {
//                    if (!note.is(':visible')) {
//                        note.html(result).addClass(c).slideDown('fast');
//                        clearInterval(i);
//                    }
//                }, 40);
//            }); // end loading image fadeOut
//        }
//    });
    return false;
}
$.fn.serializeObject = function () {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function () {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};