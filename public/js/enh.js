(function (enh, undefined) {
    var self = this;
    var bookkeepingUrl = "api/bookkeeping.php";
    var testUrl = "test/test.php";
    var type;
    
    function createView(viewType, data)
    {
        var html = '';
        switch (viewType) {
            case "getAccountType":
                html+= "<option value=0>Please select an account type...</option>";
                $.each(data, function(i, v) {
                    html+= "<option value=" + v.id + ">" + v.name + "</option>";
                });
                break;
        }
        return html;
    }
    function getType(type, location)
    {
        var data = {type: type};
        $.ajax({
            type: "POST",
            url: bookkeepingUrl,
            dataType: "json",
            data: {
                action: "getType",
                data: JSON.stringify(data)
            }
        }).done(function(data) {
            console.log(data);
            //setType(data, type, location);
        }).fail(function(error) {
            console.log(error);
        });
    }
    function getState(location)
    {
        console.log(location);
    }
    function setType(data, type, location)
    {
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
    function init(config)
    {

    }
    enh.init = function(config) {
        getState(config.stateLocation);
        getType("account", config.accountTypeLocation);
        getType("address", config.addressTypeLocation);
        getType("email", config.emailTypeLocation);
    };
    enh.publicTest = function() {
        testFunction().done(function(result) {
            console.log(result);
        }).fail(function(error) {
            console.log(error.responseText);
        });
    };
})(window.enh = window.enh || {});