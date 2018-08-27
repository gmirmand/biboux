//Functions
var BixAdmin = {
    btnAdd: '.bix',
    btnReset: '.reset',
    htmlNbBix: '.nbbix b',
    init: function () {
        BixAdmin.addBix();
        BixAdmin.removeBix();
        BixAdmin.resetBix();
        BixAdmin.upload();
    },
    addBix: function () {
        $(BixAdmin.btnAdd).on('click', function(){
            $.ajax({
                url: 'insert.php',
                type: "POST",
                error: function (xhr) {
                    var err = eval;
                    err("(" + xhr.responseText + ")");
                    console.log(err.Message, 'background: red; color: white');
                },
                success: function (data) {
                    console.log('%c Bix added! ', 'background: green; color: white');
                    $(BixAdmin.htmlNbBix).html(data);
                }
            });
        });
    },
    removeBix: function(){

    },
    resetBix: function(){
        $(BixAdmin.btnReset).on('click', function(){
            $.ajax({
                url: 'reset.php',
                type: "POST",
                error: function (xhr) {
                    var err = eval;
                    err("(" + xhr.responseText + ")");
                    console.log(err.Message, 'background: red; color: white');
                },
                success: function (data) {
                    console.log('%c Bix reset! ', 'background: lightgreen; color: white');
                    $(BixAdmin.htmlNbBix).html(data);
                }
            });
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
