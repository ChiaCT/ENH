<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ENH\Bookkeeping;

/**
 * Description of PersonManagement
 *
 * @author CTSAI
 */
class PersonManagement implements \ENH\Bookkeeping\EntityInterface
{
    private $person, $email, $address, $phone;
    public function __construct()
    {
        $this->email   = new \ENH\Database\Email();
        $this->address = new \ENH\Database\Address();
        $this->phone   = new \ENH\Database\Phone();
        $this->person  = new \ENH\Database\Person();
    }

    public function addNewAddress($id, $data)
    {
        
    }

    public function addNewEmail($id, $data)
    {
        
    }

    public function addNewEntity($data)
    {
        
    }

    public function addNewPhone($id, $data)
    {
        
    }

    public function deleteAddress($id, $addressId)
    {
        
    }

    public function deleteEmail($id, $emailId)
    {
        
    }

    public function deletePhone($id, $phoneId)
    {
        
    }

    public function updateAddress($data)
    {
        
    }

    public function updateEmail($data)
    {
        
    }

    public function updatePhone($data)
    {
        
    }

}
