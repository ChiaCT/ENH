(function (enh, undefined) {
    var bookkeepingUrl = "api/bookkeeping.php";
    var testUrl = "test/test.php";
    function init()
    {
        console.log("init");
    }
    function createView(typeOfView, data)
    {
        var html = '';
        switch (typeOfView) {
            case "getAccountType":
                html+= "<option value=0>Please select an account type...</option>";
                $.each(data, function(i, v) {
                    html+= "<option value=" + v.id + ">" + v.name + "</option>";
                });
                break;
        }
        return html;
    }
    function getAccountType()
    {
        $.ajax({
            type: "POST",
            url: bookkeepingUrl,
            dataType: "json",
            data: {
                action: "get_account_type"
            }
        }).done(function(result) {
            var view = createView("getAccountType", result);
            $( "#input-account-type" ).html(view);
        }).fail(function(error) {
            console.log(error);
        });
    }
    function testFunction()
    {
        return $.ajax({
            type: "POST",
            url: testUrl,
            dataType: "json",
            data: {
                action: "test_reset"
            }
        });
    }
    enh.init = function() {
        getAccountType(location);
    };
    enh.publicTest = function() {
        testFunction().done(function(result) {
            console.log(result);
        }).fail(function(error) {
            console.log(error.responseText);
        });
    };
})(window.enh = window.enh || {});