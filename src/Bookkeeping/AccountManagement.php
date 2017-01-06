<?php
namespace ENH\Bookkeeping;

/**
 * Description of AccountManagement
 *
 * @author CTSAI
 */
class AccountManagement
{
    private $account, $company, $person, $email, $address, $phone;
    public function __construct()
    {
        $this->account = new \ENH\Database\Account();
        $this->email   = new \ENH\Database\Email();
        $this->address = new \ENH\Database\Address();
        $this->phone   = new \ENH\Database\Phone();
        $this->company = new \ENH\Database\Company();
        $this->person  = new \ENH\Database\Person();
    }
    
    public function addNewAccount($type, $data)
    {
        if ($type === "company") {
            return $this->addNewCompanyAccount($data);
        } else {
            return $this->addNewPersonAccount($data);
        }
    }
    
    public function addNewCompanyAccount($data)
    {
    }
    
    public function addNewPersonAccount($data)
    {
        
    }
}
