// Declare namespace
var Biboux = Biboux || {};

Biboux = function () {
};

Biboux.prototype = {
    init: function () {
        if ($('#kappa').length !== 0)
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
    NumberOfKappa: 0,
    init: function () {
        console.log('Kappa');
        setInterval(function () {
            Kappa.load();
        }, 250)
    },
    load: function () {
        $.ajax({
            url: 'loadkappa.php',
            type: "POST",
            data: '',
            dataType: 'json',
            error: function (xhr) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            },
            success: function (data) {
                var kappa = data;
                if (data.length !== 0) {
                    $('.container .img-container').removeClass('anim').addClass('noanim');
                    $diff = kappa.length - Kappa.NumberOfKappa;
                    for ($i = 0; $i < $diff; $i++) {
                        index = kappa.length - $i;
                        var kappauni = kappa[index - 1];
                        var img = kappauni[2];
                        $('.container').append("<div class='img-container anim'><img src='src/img/kappa/" + img + "' alt='kappa'/></div>");
                    }
                }
                else {
                    $('.container').empty();
                }
                Kappa.NumberOfKappa = kappa.length;
            }
        });
    }
};
