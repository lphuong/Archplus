// Initialize your app

var dataCtrl = new DataCtrl();

// Export selectors engine
var $$ = Dom7;

var myApp;

// Add main View
var mainView;

reqApi(options.ACTION_GET_POST_LIST);

function reqApi(action) {
    $.ajax({
        type: 'GET',
        url: options.URL_SERVER_API + action,
        success: function (res) {
            dataCtrl.check(res);
            init();
        },
        error: function (err) {
            init();
        }
    });
};

function init() {
    myApp = new Framework7({
        animateNavBackIcon: true,
        // Enable templates auto precompilation
        precompileTemplates: true,
        // Enabled pages rendering using Template7
        swipeBackPage: true,
        pushState: false,
        // pushStateSeparator:"#pages/",  // if pushState: true
        // Hide and show indicator during ajax requests
        //onAjaxStart: function (xhr) {
        //    myApp.showIndicator();
        //},
        //onAjaxComplete: function (xhr) {
        //    myApp.hideIndicator();
        //},
        template7Pages: true,
        template7Data: {
            'page:about': dataCtrl.getDataAbout()
        }
    });
    mainView = myApp.addView('.view-main', {
        // Enable dynamic Navbar
        dynamicNavbar: true
    });
    $$(document).on('pageInit', function (e) {
        $(".swipebox").swipebox();
        $(".videocontainer").fitVids();

        $("#ContactForm").validate({
            submitHandler: function (form) {
                ajaxContact(form);
                return false;
            }
        });


        $(".posts li").hide();
        size_li = $(".posts li").size();
        x = 3;
        $('.posts li:lt(' + x + ')').show();
        $('#loadMore').click(function () {
            x = (x + 1 <= size_li) ? x + 1 : size_li;
            $('.posts li:lt(' + x + ')').show();
            if (x == size_li) {
                $('#loadMore').hide();
                $('#showLess').show();
            }
        });


        $("a.switcher").bind("click", function (e) {
            e.preventDefault();

            var theid = $(this).attr("id");
            var theproducts = $("ul#photoslist");
            var classNames = $(this).attr('class').split(' ');


            if ($(this).hasClass("active")) {
                // if currently clicked button has the active class
                // then we do nothing!
                return false;
            } else {
                // otherwise we are clicking on the inactive button
                // and in the process of switching views!

                if (theid == "view13") {
                    $(this).addClass("active");
                    $("#view11").removeClass("active");
                    $("#view11").children("img").attr("src", "images/switch_11.png");

                    $("#view12").removeClass("active");
                    $("#view12").children("img").attr("src", "images/switch_12.png");

                    var theimg = $(this).children("img");
                    theimg.attr("src", "images/switch_13_active.png");

                    // remove the list class and change to grid
                    theproducts.removeClass("photo_gallery_11");
                    theproducts.removeClass("photo_gallery_12");
                    theproducts.addClass("photo_gallery_13");

                }

                else if (theid == "view12") {
                    $(this).addClass("active");
                    $("#view11").removeClass("active");
                    $("#view11").children("img").attr("src", "images/switch_11.png");

                    $("#view13").removeClass("active");
                    $("#view13").children("img").attr("src", "images/switch_13.png");

                    var theimg = $(this).children("img");
                    theimg.attr("src", "images/switch_12_active.png");

                    // remove the list class and change to grid
                    theproducts.removeClass("photo_gallery_11");
                    theproducts.removeClass("photo_gallery_13");
                    theproducts.addClass("photo_gallery_12");

                }
                else if (theid == "view11") {
                    $("#view12").removeClass("active");
                    $("#view12").children("img").attr("src", "images/switch_12.png");

                    $("#view13").removeClass("active");
                    $("#view13").children("img").attr("src", "images/switch_13.png");

                    var theimg = $(this).children("img");
                    theimg.attr("src", "images/switch_11_active.png");

                    // remove the list class and change to grid
                    theproducts.removeClass("photo_gallery_12");
                    theproducts.removeClass("photo_gallery_13");
                    theproducts.addClass("photo_gallery_11");

                }

            }

        });

        document.addEventListener('touchmove', function (event) {
            if (event.target.parentNode.className.indexOf('navbarpages') != -1 || event.target.className.indexOf('navbarpages') != -1) {
                event.preventDefault();
            }
        }, false);

        var ScrollFix = function (elem) {
            // Variables to track inputs
            var startY = startTopScroll = deltaY = undefined,

                elem = elem || elem.querySelector(elem);

            // If there is no element, then do nothing
            if (!elem)
                return;

            // Handle the start of interactions
            elem.addEventListener('touchstart', function (event) {
                startY = event.touches[0].pageY;
                startTopScroll = elem.scrollTop;

                if (startTopScroll <= 0)
                    elem.scrollTop = 1;

                if (startTopScroll + elem.offsetHeight >= elem.scrollHeight)
                    elem.scrollTop = elem.scrollHeight - elem.offsetHeight - 1;
            }, false);
        };

        // Add ScrollFix
        var scrollingContent = document.getElementById("pages_maincontent");
        new ScrollFix(scrollingContent);

        //var page = e.detail.page;
        //
        //if (page.name === "about") {
        //    //pageCtrl.blog();
        //
        //}
    });

    $(".loader").fadeOut("slow");
}

window.storage = {
    store: localStorage,
    isSupported: function () {
        try {
            return ('localStorage' in window && window['localStorage'] !== null);
        } catch (e) {
            return false;
        }
    },
    get: function (key) {
        if (!this.isSupported()) return undefined;
        try {
            return JSON.parse(this.store[key]);
        } catch (e) {
        }
        return undefined;
    },
    set: function (key, value) {
        if (!this.isSupported()) return undefined;
        try {
            this.store[key] = JSON.stringify(value);
        } catch (e) {
        }
    }
};