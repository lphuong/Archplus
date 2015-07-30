/**
 * Created by phuonglq1 on 14/07/2015.
 */
function PageCtrl() {
}

PageCtrl.prototype = {
    blog: function () {
        // get json from server
        var result = getJsonAjax(options.URL_JSON_BLOG);
    }
};

var getJsonAjax = function (file) {
    jQuery.ajax({
        async: true,
        url: file,
        context: document.body
    }).done(function (result) {
        console.log(result);
        mainView.router.load({
            page: 'blog',
            context: {
                title: result.blog.title
            }
        })
        return result;
    }).error(function (err) {
        console.log(err);
        return null;
    });
};

