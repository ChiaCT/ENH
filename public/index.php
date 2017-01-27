<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ENH</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="css/index.css"/>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="js/enh.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="menu" class="col-md-1">
                <ul class="nav nav-pills nav-stacked">
                    <li role="button"><a href="#home" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="heading-home-">Home</a></li>
                    <li role="button"><a href="#account" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="heading-account">Account</a></li>
                    <li role="button"><a href="#transaction" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="heading-transaction">Transaction</a></li>
                </ul>
            </div>
            <div id="content" class="col-md-11">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="heading-home">
                        <h4 class="panel-title">
                            Home
                        </h4>
                      </div>
                      <div id="home" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-home">
                        <div class="panel-body">
                            Home content
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="heading-account">
                        <h4 class="panel-title">
                            Account
                        </h4>
                      </div>
                      <div id="account" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-account">
                        <div class="panel-body">
                            <form id="fm-account" class="form-horizontal">
                                <input type="hidden" id="input-account-id" value="0">
                                <div class="form-group">
                                    <label for="input-account-name" class="col-sm-2 control-label">Account Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" control-label id="input-account-name" placeholder="Account Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="select-account-type" class="col-sm-2 control-label">Account Type</label>
                                    <div class="col-sm-6">
                                        <select id="select-account-type" class="form-control"></select>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="checkbox">
                                            <label for="input-account-active">
                                                <input id="input-account-active" type="checkbox" checked="">Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </form>
                            <form id="fm-company" class="form-horizontal">
                                <input type="hidden" id="input-company-id" value="0">
                                <div class="form-group">
                                    <label for="input-company-name" class="col-sm-2 control-label">Company Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input-company-name" placeholder="Company Name">
                                    </div>
                                </div>
                                <hr>
                            </form>
                            <form id="fm-person" class="form-horizontal">
                                <input type="hidden" id="input-person-id" value="0">
                                <div class="form-group">
                                    <label for="input-person-nickname" class="col-sm-2 control-label">Nickname</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input-person-nickname" placeholder="A name you would call this person">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input-person-first-name" class="col-sm-2 control-label">First Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="input-person-first-name" placeholder="First Name">
                                    </div>
                                    <label for="input-person-last-name" class="col-sm-2 control-label">Last Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="input-person-last-name" placeholder="Last Name">
                                    </div>
                                </div>
                                <hr>
                            </form>
                            <form id="fm-contact" class="form-horizontal">
                                <div class="form-group">
                                    <label class="radio-inline col-sm-offset-2 col-sm-2">
                                        <input type="radio" name="input-choose-contact" id="input-choose-contact-phone" value="phone">Phone
                                    </label>
                                    <label class="radio-inline col-sm-2">
                                        <input type="radio" name="input-choose-contact" id="input-choose-contact-address" value="address">Address
                                    </label>
                                    <label class="radio-inline col-sm-2">
                                        <input type="radio" name="input-choose-contact" id="input-choose-contact-email" value="email">Email
                                    </label>
                                    <label class="radio-inline col-sm-2">
                                        <input type="radio" name="input-choose-contact" id="input-choose-contact-nothing" value="0">No contact
                                    </label>
                                </div>
                                <hr>
                                <div id="contact-phone">
                                    <div class="form-group">
                                        <label for="select-phone-contact-type" class="col-sm-offset-1 col-sm-1 control-label">
                                            Phone Type
                                        </label>
                                        <div class="col-sm-1">
                                            <select id="select-phone-contact-type" class="form-control"></select>
                                        </div>
                                        <label for="input-phone-number" class="col-sm-1 control-label">
                                            Phone Number
                                        </label>
                                        <div class="col-sm-4">
                                            <input id="input-phone-number" class="form-control" type="text">
                                        </div>
                                        <label for="input-phone-extension" class="col-sm-1 control-label">
                                            Extension
                                        </label>
                                        <div class="col-sm-3">
                                            <input id="input-phone-extension" class="form-control" type="text" >
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div id="contact-address">
                                    <div class="form-group">
                                        <label for="select-address-contact-type" class="col-sm-offset-1 col-sm-1 control-label">
                                            Address Type
                                        </label>
                                        <div class="col-sm-1">
                                            <select id="select-address-contact-type" class="form-control"></select>
                                        </div>
                                        <label for="input-address-ln1" class="col-sm-1 control-label">
                                            Address Line 1
                                        </label>
                                        <div class="col-sm-5">
                                            <input id="input-address-ln1" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3"></div>
                                        <label for="input-address-ln2" class="col-sm-1 control-label">
                                            Address Line 2
                                        </label>
                                        <div class="col-sm-5">
                                            <input id="input-address-ln2" class="form-control" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3"></div>
                                        <label for="input-address-city" class="col-sm-1 control-label">
                                            City
                                        </label>
                                        <div class="col-sm-2">
                                            <input id="input-address-city" class="form-control" type="text" >
                                        </div>
                                        <label for="select-address-state" class="col-sm-1 control-label">
                                            State
                                        </label>
                                        <div class="col-sm-2">
                                            <select id="input-address-state"></select>
                                        </div>
                                        <label for="input-address-zip" class="col-sm-1 control-label">
                                                Zip Code
                                        </label>
                                        <div class="col-sm-1">
                                            <input id="input-address-zip" class="form-control" type="text" >
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div id="contact-email">
                                    <for class="form-group">
                                        <label for="select-email-contact-type" class="col-sm-offset-1 col-sm-1 control-label">
                                            Email Type
                                        </label>
                                        <div class="col-sm-1">
                                            <select id="select-email-contact-type" class="form-control"></select>
                                        </div>
                                        <label for="input-email" class="col-sm-1 control-label">
                                            Email Address
                                        </label>
                                        <div class="col-sm-5">
                                            <input id="input-email" class="form-control" type="email">
                                        </div>
                                    </for>
                                </div>
                            </form>
                            <hr>
                            <div class="form-group">
                                <div class="col-sm-offset-1 col-sm-1">
                                    <button id="btn-submit-account" class="btn btn-primary">Submit</button>
                                </div>
                                <div id="account-status-respond"></div>
                            </div>
                        </div>
                        <div class="panel-footer">this is footer</div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading-transaction">
                      <h4 class="panel-title">
                          Transactions
                      </h4>
                    </div>
                    <div id="transaction" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-transaction">
                        <div class="panel-body">
                            <div id="transaction">
                                <form id="fm-sale" class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Cash</div>
                                            <input type="text" class="form-control" id="input-revenue-cash" placeholder="Cash">
                                            <div id="revenue-cash-adjust" class="input-group-addon">-</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Cash - Tip</div>
                                            <input type="text" class="form-control" id="input-tip-cash" placeholder="Tip (cash)">
                                            <div id="revenue-cash-tip-adjust" class="input-group-addon">-</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Credit</div>
                                            <input type="text" class="form-control" id="input-revenue-credit" placeholder="Credit">
                                            <div id="revenue-credit-adjust" class="input-group-addon">-</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Credit - Tip</div>
                                            <input type="text" class="form-control" id="input-tip-credit" placeholder="Tip (credit)">
                                            <div id="revenue-credit-tip-adjust" class="input-group-addon">-</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">Total</div>
                                            <input type="text" class="form-control" id="input-total" placeholder="Total">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button id="btn-submit-revenue" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                                <form id="fm-transaction">
                                    <div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <div id="output"></div>
        </div>
        <script>
            $( document ).ready(function() {
                "use strict";
                var config = {
                    accountTypeLocation: "select-account-type",
                    phoneTypeLocation: "select-phone-contact-type",
                    addressTypeLocation: "select-address-contact-type",
                    emailTypeLocation: "select-email-contact-type",
                    stateLocation: "select-address-state"
                };
                enh.init(config);
                //EVENTS
                $( "#btn-submit-account" ).click(function() {
                    var accountId      = $( "#input-account-id" ).val();
                    var accountName    = $( "#input-account-name" ).val();
                    var accountActive  = $( "#input-account-active" ).val();
                    var accountType    = $( "#select-account-type option:selected" ).val();
                    var companyId      = $( "#input-company-id" ).val();
                    var companyName    = $( "#input-company-name" ).val();
                    var personId       = $( "#input-person-id" ).val();
                    var personNickname = $( "#input-person-nickname" ).val();
                    var firstName      = $( "#input-person-first-name" ).val();
                    var lastName       = $( "#input-person-last-name" ).val();
                    var contactType    = $( "input[name='input-choose-contact']:checked" ).val()
                    var phoneType      = $( "#select-phone-contact-type option:selected" ).val();
                    var phoneNumber    = $( "#input-phone-number" ).val();
                    var phoneExtension = $( "#input-phone-extension" ).val();
                    var addressType    = $( "#select-address-contact-type option:selected" ).val();
                    var addressLn1     = $( "#input-address-ln1" ).val();
                    var addressLn2     = $( "#input-address-ln2" ).val();
                    var city      = $( "#input-address-city" ).val();
                    var state     = $( "#input-address-state" ).val();
                    var zip       = $( "#input-address-zip" ).val();
                    var emailType = $( "#select-email-contact-type option:selected" ).val();
                    var email     = $( "#input-email" ).val();
                    
                    console.log(
                        "account id: " + accountId + ' ' +
                        "account Name" + accountName + ' ' +
                        "account active" + accountActive + ' ' +
                        "account type" + accountType + ' ' +
                        "company id" + companyId + ' ' +
                        "company name" + companyName + ' ' +
                        "person id" + personId + ' ' +
                        "person nickname" + personNickname + ' ' +
                        "first name" + firstName + ' ' +
                        "last name" + lastName + ' ' +
                        "contact type" + contactType + ' ' +
                        "phone type" + phoneType + ' ' +
                        "phone number" + phoneNumber + ' ' +
                        "phone extension" + phoneExtension + ' ' +
                        "address type" + addressType + ' ' +
                        "address ln1" + addressLn1 + ' ' +
                        "address ln2" + addressLn2 + ' ' +
                        "city" + city + ' ' +
                        "state" + state + ' ' +
                        "zip" + zip + ' ' +
                        "emailType" + emailType + ' ' +
                        "email" + email + ' '
                    );
                });
                $( "#btn-submit-revenue" ).click(function() {
                    
                });
                $( "#btn-submit-transaction" ).click(function() {
                    
                });
            });
        </script>
    </body>
</html>
