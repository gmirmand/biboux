//Functions
var BixFront = {
    urlJson: 'loadbix.php',
    max: false,
    NumberOfBixFront: 0,
    init: function () {
        setInterval(function () {
            BixFront.load();
            BixFront.copyright();
        }, 250);
    },
    load: function () {
        $.ajax({
            url: 'loadbix.php',
            type: "POST",
            data: '',
            dataType: 'json',
            error: function (xhr) {
                var err = eval;
                err("(" + xhr.responseText + ")");
                console.log(err.Message);
            },
            success: function (data) {
                var bix = data;
                if (bix.length !== 0) {
                    $('.container .img-container').removeClass('anim').addClass('noanim');
                    $diff = bix.length - BixFront.NumberOfBixFront;
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
                BixFront.NumberOfBixFront = bix.length;
            }
        });
    },
    copyright: function(){
        $('.copyright').remove();
        $('body').append(
            "<div class='copyright' style='" +
            "display: block !important; " +
            "position: fixed !important;" +
            "top:0 !important;" +
            "right:0 !important;" +
            "margin: 10px !important;" +
            "transform: translate(0) !important;" +
            "color:#2d2d2d !important;" +
            "width: auto !important;" +
            "height: auto !important;" +
            "overflow: visible !important;" +
            "opacity:1 !important;" +
            "font-size: 10px !important;" +
            "font-weight: bold !important'>" +
            "Twitter:@Huroyy // @Biboux-extension" +
            "</div>"
        )
    }
};
