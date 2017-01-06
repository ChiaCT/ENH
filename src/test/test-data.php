<?php
//COMPANY TEST DATA
$insertCompanyData = array(
    "id"=>null,
    "company_name"=>"Target",
    "modified_by"=>"SYSTEM",
    "created_by"=>"SYSTEM"
);
$updateCompanyData = array(
    "id"=>null,
    "company_name"=>"Costco",
    "modified_by"=>"ctsai",
    "created_by"=>"ctsai"
);
//ADDRESS TEST DATA
$insertAddressData = array(
    "id"=>null,
    "address_ln1"=>"111 Route 1",
    "address_ln2"=>"This should be line 2",
    "city"=>"East Brunswick",
    "state"=>"NJ",
    "zip"=>"07717",
    "modified_by"=>"SYSTEM",
    "created_by"=>"SYSTEM"
);
$updateAddressData = array(
    "id"=>1,
    "address_ln1"=>"This should be line 1",
    "address_ln2"=>"222 Route 2",
    "city"=>"New Brunswick",
    "state"=>"NY",
    "zip"=>"01133",
    "modified_by"=>"ctsai",
    "created_by"=>"SYSTEM"
);
//EMAIL TEST DATA
$insertEmailData = array(
    "id"=>null,
    "email_type"=>"WORK",
    "email_address"=>"workemail@example.com",
    "modified_by"=>"SYSTEM",
    "created_by"=>"SYSTEM"
);
$updateEmailData = array(
    "id"=>1,
    "email_type"=>"PERSONAL",
    "email_address"=>"personalemail@example.net",
    "modified_by"=>"ctsai",
    "created_by"=>"SYSTEM"
);
//PHONE TEST DATA
$insertPhoneData = array(
    "id"=>null,
    "phone_type"=>"WORK",
    "phone_number"=>"123456789",
    "phone_ext"=>"1234",
    "modified_by"=>"SYSTEM",
    "created_by"=>"SYSTEM"
);
$updatePhoneData = array(
    "id"=>1,
    "phone_type"=>"PERSONAL",
    "phone_number"=>"(987)654-3210",
    "phone_ext"=>"4321",
    "modified_by"=>"ctsai",
    "created_by"=>"SYSTEM"
);
//PERSON TEST DATA
$insertPersonData = array(
    "id"=>null,
    "nickname"=>"CEO",
    "first_name"=>"John",
    "last_name"=>"Doe",
    "modified_by"=>"SYSTEM",
    "created_by"=>"SYSTEM"
);
$updatePersonData = array(
    "id"=>null,
    "nickname"=>"Owner",
    "first_name"=>"Doe",
    "last_name"=>"John",
    "modified_by"=>"ctsai",
    "created_by"=>"SYSTEM"
);
//ACCOUNT_TYPE TEST DATA
$insertTransactionCategoryData = array(
    "id"=>null,
    "type_name"=>"Sale",
    "modified_by"=>"SYSTEM",
    "created_by"=>"SYSTEM"
);
$updateTransactionCategoryData = array(
    "id"=>null,
    "type_name"=>"Tipe",
    "modified_by"=>"ctsai",
    "created_by"=>"SYSTEM"
);
//Employee TEST DATA
$insertEmployeeData = array(
    "id"=>null,
    "person_id"=>1,
    "active"=>true,
    "modified_by"=>"SYSTEM",
    "created_by"=>"SYSTEM"
);
$updateEmployeeData = array(
    "id"=>null,
    "person_id"=>2,
    "active"=>false,
    "modified_by"=>"ctsai",
    "created_by"=>"SYSTEM"
);
//Note TEST DATA
$insertNoteData = array(
    "id"=>null,
    "note"=>"this is a note",
    "modified_by"=>"SYSTEM",
    "created_by"=>"SYSTEM"
);
$updateNoteData = array(
    "id"=>null,
    "note"=>"this is a note 2",
    "modified_by"=>"ctsai",
    "created_by"=>"SYSTEM"
);
//Reference TEST DATA
$insertReferenceData = array(
    "id"=>null,
    "reference_number"=>"ref123",
    "confirmation_number"=>"con123",
    "invoice_number"=>"inv123",
    "order_number"=>"ord123",
    "transaction_number"=>"tran123",
    "check_number"=>"chk123",
    "credit_card_id"=>111,
    "modified_by"=>"SYSTEM",
    "created_by"=>"SYSTEM"
);
$updateReferenceData = array(
    "id"=>null,
    "reference_number"=>"ref456",
    "confirmation_number"=>"con456",
    "invoice_number"=>"inv456",
    "order_number"=>"ord456",
    "transaction_number"=>"tran456",
    "check_number"=>"chk456",
    "credit_card_id"=>222,
    "modified_by"=>"ctsai",
    "created_by"=>"SYSTEM"
);
//Salary History TEST DATA
$insertSalaryHistoryData = array(
    "id"=>null,
    "salary"=>"111.11",
    "pay_period"=>1,
    "effective_date"=>"2016-1-1",
    "is_current"=>true,
    "modified_by"=>"SYSTEM",
    "created_by"=>"SYSTEM"
);
$updateSalaryHistoryData = array(
    "id"=>null,
    "salary"=>"222.22",
    "pay_period"=>2,
    "effective_date"=>"2016-2-2",
    "is_current"=>false,
    "modified_by"=>"ctsai",
    "created_by"=>"SYSTEM"
);
//Transaction TEST DATA
$insertTransactionData = array(
    "id"=>null,
    "account_id"=>1,
    "payment_type_id"=>1,
    "reference_id"=>1,
    "note_id"=>1,
    "amount"=>"111.11",
    "transaction_date"=>"2016-01-01",
    "pay_date"=>"2016-02-02",
    "exclude"=>false,
    "modified_by"=>"SYSTEM",
    "created_by"=>"SYSTEM"
);
$updateTransactionData = array(
    "id"=>null,
    "account_id"=>2,
    "payment_type_id"=>2,
    "reference_id"=>2,
    "note_id"=>2,
    "amount"=>"222.22",
    "transaction_date"=>"2016-03-03",
    "pay_date"=>"",
    "exclude"=>true,
    "modified_by"=>"ctsai",
    "created_by"=>"SYSTEM"
);
//Account TEST DATA
$insertAccountData = array(
    "id"=>null,
    "account_name"=>"Sale",
    "account_type_id"=>1,
    "active"=>true,
    "modified_by"=>"SYSTEM",
    "created_by"=>"SYSTEM"
);
$updateAccountData = array(
    "id"=>null,
    "account_name"=>"Tip",
    "account_type_id"=>2,
    "active"=>false,
    "modified_by"=>"ctsai",
    "created_by"=>"SYSTEM"
);

//Cash TEST DATA
$insertCashData = array(
    "id"=>null,
    "hundred"=>1,
    "fifty"=>0,
    "twenty"=>1,
    "ten"=>0,
    "five"=>1,
    "one"=>0,
    "modified_by"=>"SYSTEM",
    "created_by"=>"SYSTEM"
);
$updateCashData = array(
    "id"=>null,
    "hundred"=>0,
    "fifty"=>1,
    "twenty"=>0,
    "ten"=>1,
    "five"=>0,
    "one"=>1,
    "modified_by"=>"ctsai",
    "created_by"=>"SYSTEM"
);