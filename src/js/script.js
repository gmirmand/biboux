// Declare namespace
var Biboux = Biboux || {};

Biboux = function () {
};

Biboux.prototype = {
    init: function () {
        if ($('#bix').length !== 0)
            BixFront.init();
        if ($('.admin').length !== 0)
            BixAdmin.init();
    }
};

$(document).ready(function () {
    var g = new Biboux();
    g.init();
});