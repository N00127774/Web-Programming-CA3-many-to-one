<?php

class CustomerTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getCustomers() {
        // execute a query to get all customers
        $sqlQuery = "SELECT * FROM customers";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve users");
        }

        return $statement;
    }

    public function getCustomerById($customerID) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM customers WHERE customerID = :cID";

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

    public function insertCustomer($n, $e, $m, $a, $d, $bId) {
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
            "branchID"=> $bId
            
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
    public function updateCustomer($n, $e, $m, $a, $d, $cID, $bId) {
        $sqlQuery = "UPDATE customers SET " .
                "name = :name, " .
                "email = :email, " .
                "mobileNumber = :mobileNumber, " .
                "address = :address, " .
                "dateRegistered = :dateRegistered, " .
                "branchID= :branchID " .
                "WHERE customerID = :customerID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "email" => $e,
            "mobileNumber" => $m,
            "address" => $a,
            "dateRegistered" => $d,
            "customerID"=>$cID,
            "branchID"=> $bId
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
