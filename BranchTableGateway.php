<?php

class BranchTableGateway {
    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getBranchs() {
        // execute a query to get all customers
        $sqlQuery = "SELECT * FROM branches";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve users");
        }

        return $statement;
      }
        
        public function getBranchById($branchID) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM branches WHERE branchID = :bID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "bID" => $branchID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve user");
        }

        return $statement;
    }
    
    
    public function insertbranch($a, $n, $o, $m) {
        $sqlQuery = "INSERT INTO branches " .
                "(address, number, openingHours, managerName) " .
                "VALUES (:address, :number, :openingHours, :managerName)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "address" => $a,
            "number" => $n,
            "openingHours" => $o,
            "managerName" => $m
           
            
        );

        $status = $statement->execute($params);

        echo '<pre>';
        print_r($_POST);
        print_r($params);
        print_r($sqlQuery);
        echo '</pre>';

        if (!$status) {
            die("Could not insert Branch");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }
    
    
  

    public function deleteBranch($branchID) {
        $sqlQuery = "DELETE FROM branches WHERE branchID = :bID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "bID" => $branchID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete user");
        }

        return ($statement->rowCount() == 1);
    }

    //function to update the customer
    public function updateBranch($a, $n, $o, $m) {
        $sqlQuery = "UPDATE branches SET " .
                "address = :address, " .
                "number = :number, " .
                "openingHours= :openingHours, " .
                "managerName= :managerName " .
               
                "WHERE branchID = :branchID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
          "address" => $a,
            "number" => $n,
            "openingHours" => $o,
            "managerName" => $m
           
        );

      /*  echo '<pre>';
         
          print_r($_POST );
          print_r($params );
             print_r($sqlQuery);
          echo '</pre>';*/

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }

}

    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   
        
