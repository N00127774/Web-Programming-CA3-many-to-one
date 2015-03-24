<?php

class CustomerTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getCustomers() {
        // execute a query to get all customers
        $sqlQuery = "SELECT c.*, b.managerName As managerName 
                     FROM   customers c
                     LEFT JOIN branches b ON b.branchID = c.branchID" ;

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve users");
        }

        return $statement;
    }

    public function getCustomerById($customerID) {
        // execute a query to get the user with the specified id
        $sqlQuery =  "SELECT c.*, b.managerName  
                      FROM customers c
                    LEFT JOIN branches b on b.branchID = c.branchID
                    WHERE c.customerID = :cID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "cID" => $customerID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve user");
        }

        return $statement;
    }

    public function insertCustomer($n, $e, $m, $a, $d, $bID) {
        $sqlQuery = "INSERT INTO customers " .
                "(name, email, mobileNumber, address, dateRegistered, branchID) " .
                "VALUES (:name, :email, :mobileNumber, :address, :dateRegistered, :branchID)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "email" => $e,
            "mobileNumber" => $m,
            "address" => $a,
            "dateRegistered" => $d,
            "branchID"=> $bID
            
        );

        $status = $statement->execute($params);

        echo '<pre>';
        print_r($_POST);
        print_r($params);
        print_r($sqlQuery);
        echo '</pre>';

        if (!$status) {
            die("Could not insert user");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteCustomer($customerID) {
        $sqlQuery = "DELETE FROM customers WHERE customerID = :cID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "cID" => $customerID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete user");
        }

        return ($statement->rowCount() == 1);
    }

    //function to update the customer
    public function updateCustomer($n, $e, $m, $a, $d,  $bID, $cID) {
        $sqlQuery = "UPDATE customers SET " .
                "name = :name, " .
                "email = :email, " .
                "mobileNumber = :mobileNumber, " .
                "address = :address, " .
                "dateRegistered = :dateRegistered, " .
                "branchID = :branchID " .
                "WHERE customerID = :customerID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "email" => $e,
            "mobileNumber" => $m,
            "address" => $a,
            "dateRegistered" => $d,
            "branchID" => $bID,
            "customerID"=> $cID
            
        );

      echo '<pre>';
         
          print_r($_POST );
          print_r($params );
             print_r($sqlQuery);
          echo '</pre>';

        $status = $statement->execute($params);
        
        if(!$status)
        {
            die("Could not insert customer");
        }

        return ($statement->rowCount() == 1);
    }

}
