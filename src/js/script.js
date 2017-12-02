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
    urlJson: 'loadkappa.php',
    max: false,
    loaderNb: $('.loader__number'),
    loader: $('.loader__container'),
    loaderProgressBar: $('.loader__progressbar'),
    pictures: [],
    init: function () {
        console.log('Kappa');
        setInterval(function () {
            console.log('load');
            Kappa.load();
            Kappa.move();
        }, 500)
    },
    load: function () {
        Kappa.pictures = [];
        $.ajax({
            url: Kappa.urlJson,
            dataType: 'json',
            error: function (xhr) {
                console.log('error');
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            },
            success: function (data) {
                Kappa.max = data.length;
                var loaded = 0;
                var nbImgPerSecond = Kappa.max / 100;
                var delay = 1000 / nbImgPerSecond;
                for (var i = 0; i < Kappa.max; i++) {
                    var img = new Image();
                    Kappa.pictures.push('src/img/kappa/' + data[i]);
                    console.log(Kappa.pictures);
                }
                $('.container').empty();
                $('.container').append('<img src="' + Kappa.pictures[0] + '" alt="Kappa" class="kappa">')
            }
        });
    }
};
