<?php

//This is a class known has Customer.
// The class has 5 fields as stated/also known as instances.
class Customer {
    private $customerID;
    private $name;
    private $email;
    private $mobileNumber;
    private $address;
    private $dateRegistered;
    private $branchID;
    

    // This part is  known as your construction
    public function __construct($n, $e, $m, $a, $d, $cID, $bId) {
        $this->name = $n;
        $this->email = $e;
        $this->mobileNumber = $m;
        $this->address = $a;
        $this->dateRegistered = $d;
        $this->customerID=$cID;
        $this->branchID=$bId;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMobilenumber() {
        return $this->mobileNumber;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getDateRegistered() {
        return $this->dateRegistered;
    }
    
    public function getCustomerId(){
        return $this->customerID;
    }

    
    Public function getBranchId(){
        return $this->branchID;
    }
    
    
    
    //The get method retrives the input from the instances, then outputs it.
}
