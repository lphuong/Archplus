$(window).load(function () {
    $('#loading').fadeOut(1000);
    $("#btn-login").bind('click', function (event) {
        event.preventDefault();// using this page stop being refreshing

        $('#loading').fadeIn();
        $.ajax({
            type: 'POST',
            url: 'php/login.php',
            data: $('form').serialize(),
            datatype: 'json',
            success: function (result) {
                $('#loading').fadeOut(1000);
                if (result.login) {
                    window.location.href = "admin.php";
                } else {
                    $("#chkbx-1").prop("checked", false);
                    $('#formLogin')[0].reset();
                }
            }
        });
    });
    $("#footer-html").load("page/footer.html");
    //var
}); //.Ready