<?php
namespace ENH\Core;

/**
 * Description of account
 *
 * @author CTSAI
 */
class account extends DB_Wrapper
{
    public function __construct($config, $option = false)
    {
        parent::__construct($config, $option);
    }

    public function insert($data)
    {
        ;
    }
    
    public function update($data)
    {
        
    }
    
    public function delete($id)
    {
        ;
    }
    
    public function resetAll($db)
    {
        return parent::resetDB($db);
    }
    
    public function getRow($where = '', $orderBy = '', $limit = '')
    {
        ;
    }

    protected function prepareData($accountData, $insert = false)
    {
        
    }

}
