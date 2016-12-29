(function (enh, undefined) {
    var url = "api/bookkeeping.php";
    function init()
    {
        console.log("init");
    }
    function testFunction()
    {
        return $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: {
                action: "test_reset"
            }
        });
    }
    enh.init = function() {
        init();
    };
    enh.publicTest = function() {
        testFunction().done(function(result) {
            console.log(result);
        }).fail(function(error) {
            console.log(error.responseText);
        });
    };
})(window.enh = window.enh || {});