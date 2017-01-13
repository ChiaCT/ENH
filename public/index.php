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
                                        <input type="text" class="form-control" id="input-account-name" placeholder="Account Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input-account-type" class="col-sm-2 control-label">Account Type</label>
                                    <div class="col-sm-6">
                                        <select id="input-account-type" class="form-control"></select>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="checkbox">
                                            <label for="input-account-active">
                                                <input id="input-account-active" type="checkbox" checked="">Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
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
                            
                            <form>
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
                                <hr>
                            </form>
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
                          transaction content
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
                enh.init();
            });
        </script>
    </body>
</html>
