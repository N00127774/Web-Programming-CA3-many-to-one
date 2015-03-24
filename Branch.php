<?php

//This is a class known has Customer.
// The class has 5 fields as stated/also known as instances.
class Branch {
    private $branchID;
    private $address;
    private $number;
    private $openingHours;
    private $managerName;
  
    

    // This part is  known as your construction
    public function __construct( $bID, $a, $n, $o, $m) {
        $this->branchID= $bID;
        $this->address= $a;
        $this->number = $n;
        $this->openingHours = $o;
        $this->managerName = $m;
    }

  
     public function getBranchID() {
        return $this->branchID;
    }

    
    public function getAddress() {
        return $this->address;
    }

  

    public function getNumber() {
        return $this->number;
    }

 

    public function getOpeningHours() {
        return $this->openingHours;
    }
    
    public function getManagerName(){
        return $this->managerName;
    }

    
    
    
    
    
    //The get method retrives the input from the instances, then outputs it.
}
