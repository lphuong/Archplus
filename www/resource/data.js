/**
 * Created by Admin on 7/14/2015.
 */

function DataCtrl() {
}

DataCtrl.prototype = {
    check: function (objs) {
        objs.forEach(function (obj) {
            if (obj.post_is_new === "on") {
                switch (obj.post_category) {
                    case "1": // about
                        dataCtrl.setDataAbout(obj);
                        break;
                    default:
                        break;
                }
            }
        });
    },
    setDataAbout: function (data) {
        storage.set("about_title", data.post_title);
        storage.set("about_photo", "http://archplus.vn/v1/uploads/" + data.post_uploader);
        storage.set("about_quote", data.post_title);
        storage.set("about_quote_author", data.post_title);
        storage.set("about_list_title", data.post_title);
        storage.set("about_list", data.post_title);
        storage.set("about_content", data.post_title);
    },
    getDataAbout: function () {
        if (!dataCtrl) return false;
        return {
            about_subtitle: storage.get("about_title"),
            about_photo: storage.get("about_photo"),
            about_quote: "Design can be art. Design can be aesthetics. Design is so simple, that's why it is so complicated.",
            about_quote_author: "Paul Rand",
            about_list_title: "",
            about_list: ["", "", ""],
            about_content: storage.get("about_content")
        }
    }
};