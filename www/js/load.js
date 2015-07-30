/**
 * Created by phuonglq1 on 13/07/2015.
 */

var load = angular.module('MainApp', []);

load.controller('MainCtrl', function ($scope) {
    var lang = options.lang;

    // index
    var lang_index = language[lang].index;
    $scope.about = lang_index.about;
    $scope.features = lang_index.features;
    $scope.gallery = lang_index.gallery;
    $scope.videos = lang_index.videos;
    $scope.blog = lang_index.blog;
    $scope.contact = lang_index.contact;
});