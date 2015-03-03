<?php

require_once 'Customer.php';
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';

require 'ensureUserLoggedIn.php';

$id = session_id();
if ($id == "") {
    session_start();
}





$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);

//$email = $_POST['email'];
/* $mobileNumber = $_POST['mobileNumber'];
  $address = $_POST['address'];
  $dateRegistered = $_POST['dateRegistered'];


  /*
  FILTER_SANITIZE_ is used to filter out any
  input characters that are not strings

  The filter_input is commonly used for security purposes
  to prevent hackers/attackers from attempting to access or crash the system
 */
$name =  filter_input(INPUT_POST, 'name', FILTER_SANITIZE_EMAIL);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$mobileNumber = filter_input(INPUT_POST, 'mobileNumber', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$dateRegistered = filter_input(INPUT_POST, 'dateRegistered', FILTER_SANITIZE_STRING);
$branchID = filter_input(INPUT_POST, 'branchID', FILTER_SANITIZE_STRING);


/* Empty error message array that prints out warnings 
  depending  on the users action if he leaves th any section blank. */

$errorMessage = array();
if ($email === FALSE || $email === '') {
    $errorMessage['email'] = '* You left email blank !<br/>';
}

if ($name === FALSE || $name === '') {
    $errorMessage['name'] = '* you left name blank !<br/>';
}

if ($mobileNumber === FALSE || $mobileNumber === '') {
    $errorMessage['mobileNumber'] = '* You left mobilenumber blank!<br/>';
}

if ($address === FALSE || $address === '') {
    $errorMessage['address'] = '* You left address blank!<br/>';
}

if ($dateRegistered === FALSE || $dateRegistered === '') {
    $errorMessage['dateRegistered'] = '* you left  date Registered blank! <br/>';
}

if ($branchID === FALSE || $branchID === '') {
    $errorMessage['branchID'] = '* you left branch ID blank! <br/>';
}


if (empty($errorMessage)) {
    $connection = Connection::getInstance();
    $gateway = new CustomerTableGateway($connection);
    $id = $gateway->insertCustomer($name, $email, $mobileNumber, $address, $dateRegistered, $branchID);



    /* If there are no errors that occur, the user will be redirected to the homepage */
    header("Location: home.php");
} else {
    require 'createCustomerForm.php';
}
/* If errors do occur, the user will not be allowed to continue 
   to the homepage and will be redirected back to the createCustomerForm page */