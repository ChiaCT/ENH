<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ENH</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
            body {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <div id="menu" class="col-md-1">
                <ul class="nav nav-pills nav-stacked">
                    <li role="button"><a href="#home" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="heading-home-">Home</a></li>
                    <li role="button"><a href="#company" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="heading-company">Company</a></li>
                    <li role="button"><a href="#person" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="heading-person">Person</a></li>
                    <li role="button"><a href="#employee" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="heading-employee">Employee</a></li>
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
                      <div class="panel-heading" role="tab" id="heading-company">
                        <h4 class="panel-title">
                            Company
                        </h4>
                      </div>
                      <div id="company" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-company">
                        <div class="panel-body">
                            Company content
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="heading-person">
                        <h4 class="panel-title">
                            Person
                        </h4>
                      </div>
                      <div id="person" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-person">
                        <div class="panel-body">
                            Person content
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading-employee">
                      <h4 class="panel-title">
                          Employee
                      </h4>
                    </div>
                    <div id="employee" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-employee">
                      <div class="panel-body">
                          employee content
                      </div>
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
    </body>
</html>
