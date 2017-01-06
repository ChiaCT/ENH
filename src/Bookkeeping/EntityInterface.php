<?php
namespace ENH\Bookkeeping;

interface EntityInterface
{
    /**
     * Add new entity such as company/person
     * @param array $data Data to be insert
     * @param string $table Table to be insert to
     * @param int $id ID is only needed to add company/person, address, email
     * phone do not need this id
     */
    public function addNew($data, $table, $id = null);
    
    /**
     * Update address, email, and phone
     * @param array $data Data which include ID
     * @param string $table Table of where the data should be update
     */
    public function update($data, $table);
    
    /**
     * Delete a record
     * @param int $id1 An ID to map to Id2
     * @param int $id2 An ID to map to Id1
     * @param string $table Table to be update
     */
    public function delete($id1, $id2, $table);    
        
    /**
     * Get database info
     * @param type $where
     * @param type $orderBy
     * @param type $limit
     */
    public function getRow($where = '', $orderBy = '', $limit = '');
}