/**
 * Created by Admin on 7/25/2015.
 */
$(window).load(function () {
    var inputPostUploader = document.getElementById("inputPostUploader"),
        labelPostUploader = document.getElementById("labelPostUploader"),
        uploadData = false;

    if (window.FormData) {
        uploadData = new FormData();
    }

    inputPostUploader.addEventListener("change", function (evt) {
        var i = 0, len = this.files.length, img, reader, file;

        for (; i < len; i++) {
            file = this.files[i];

            if (!!file.type.match(/image.*/)) {
                if (window.FileReader) {
                    reader = new FileReader();
                    reader.onloadend = function (e) {
                        //showUploadedItem(e.target.result, file.fileName);
                        labelPostUploader.textContent = file.name;
                    };
                    reader.readAsDataURL(file);
                }
                if (uploadData) {
                    uploadData.append("images[]", file);
                }
            }
        }
    }, false);

    $("#btnPostSubmit").bind('click', function (event) {
        event.preventDefault();// using this page stop being refreshing

        $('#loading').fadeIn();

        if (uploadData && !formEmpty()) {
            $.ajax({
                url: "php/uploads.php",
                type: "POST",
                data: uploadData,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.upload) {
                        var formData = $('form').serialize() + "&inputPostUploader=" + res.filename;
                        $.ajax({
                            type: 'POST',
                            url: 'php/posts.php',
                            data: formData,
                            datatype: 'json',
                            success: function (res) {
                                if (res.post) {
                                    resetForm();
                                    success("Post Success!");
                                } else {
                                    error("Post Unsuccess!");
                                }
                            },
                            error: function (e) {
                                error("Post Unsuccess!");
                            }
                        });
                    }
                },
                error: function (e) {
                    error("Post Unsuccess!");
                }
            });
        } else {
            error("Post Unsuccess!");
        }

    });

    $("#btnPostClear").bind('click', function (event) {
        event.preventDefault();// using this page stop being refreshing
        resetForm();
    });

    function formEmpty() {
        var boo = false;
        if (document.forms["formPost"]["inputPostTitle"].value == ""
            || document.forms["formPost"]["inputPostCategory"].value == ""
            || document.forms["formPost"]["inputPostUploader"].value == ""
            || document.forms["formPost"]["inputPostContent"].value == "") {
            boo = true;
        }
        return boo;
    }

    function resetForm() {
        $('#formPost')[0].reset();
        labelPostUploader.textContent = "Uploader Image";
    }

    function success(mess) {
        $('#loading').fadeOut(1000);
        setTimeout(function () {
            toastr.info('<span style="color:#333;">' + mess + '</span>');
        }, 0);
    }

    function error(mess) {
        $('#loading').fadeOut(1000);
        setTimeout(function () {
            toastr.error('<span style="color:#333;">' + mess + '</span>');
        }, 0);
    }
});