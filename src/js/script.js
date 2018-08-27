// Declare namespace
var Biboux = Biboux || {};

Biboux = function () {
};

Biboux.prototype = {
    init: function () {
        if ($('#bix').length !== 0)
            Kappa.init();
        if ($('#file-upload').length !== 0)
            Kappa.upload();
    }
};

$(document).ready(function () {
    var g = new Biboux();
    g.init();
});

//Functions
var Kappa = {
    urlJson: 'loadbix.php',
    max: false,
    NumberOfKappa: 0,
    init: function () {
        setInterval(function () {
            Kappa.load();
        }, 250)
    },
    load: function () {
        $.ajax({
            url: 'loadbix.php',
            type: "POST",
            data: '',
            dataType: 'json',
            error: function (xhr) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            },
            success: function (data) {
                var bix = data;
                if (data.length !== 0) {
                    $('.container .img-container').removeClass('anim').addClass('noanim');
                    $diff = bix.length - Kappa.NumberOfKappa;
                    for ($i = 0; $i < $diff; $i++) {
                        index = bix.length - $i;
                        var bixuni = bix[index - 1];
                        var img = bixuni[2];
                        $('.container').append("<div class='img-container anim'><img src='src/img/bix/" + img + "' alt='bix'/></div>");
                    }
                }
                else {
                    $('.container').empty();
                }
                Kappa.NumberOfKappa = bix.length;
            }
        });
    },
    upload: function () {
        $('#file-upload').change(function () {
            var filepath = this.value;
            var m = filepath.match(/([^\/\\]+)$/);
            var filename = m[1];
            $('#filename').html(filename);
        });
    }
};
