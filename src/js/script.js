// Declare namespace
var Biboux = Biboux || {};

Biboux = function () {
};

Biboux.prototype = {
    init: function () {
        Kappa.init();
    }
};

$(document).ready(function () {
    var g = new Biboux();
    g.init();
});

//Functions
var Kappa = {
    init: function () {
        console.log('Kappa');
    }
};
