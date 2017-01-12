<?php
namespace ENH\Bookkeeping;

class ContactManagement
{
    private $dbh, $table;
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
        $this->table["company"] = new \ENH\Database\Company();
        $this->table["person"]  = new \ENH\Database\Person();
        $this->table["email"]   = new \ENH\Database\Email();
        $this->table["address"] = new \ENH\Database\Address();
        $this->table["phone"]   = new \ENH\Database\Phone();
        $this->table["contact"] = new \ENH\Database\Contact();
    }
    
    public function add($table)
    {
        
    }
    
    public function update($table)
    {
        
    }
    
    public function delete($table)
    {
        
    }
    
}