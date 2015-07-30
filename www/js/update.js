/**
 * Created by Admin on 7/26/2015.
 */

function Update() {
}

Update.prototype = {
    get: function (action) {
        $.ajax({
            type: 'GET',
            url: options.URL_SERVER_API + action,
            success: function (res) {
                this.__check(res);
            }
        });
    },
    __check: function (objs) {
        objs.forEach(function (obj) {
            if (obj.post_is_new === "on") {
                switch (obj.post_category) {
                    case 1: // about
                        this.__about(obj);
                        break;
                    default:
                        break;
                }
            }
        });
    },
    __about: function (data) {

    }
};