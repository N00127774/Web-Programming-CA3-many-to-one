<?php

require_once 'Branch.php';
require_once 'Connection.php';
require_once 'BranchTableGateway.php';

require 'ensureUserLoggedIn.php';

$id = session_id();
if ($id == "") {
    session_start();
}






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

$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_EMAIL);
$number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
$openingHours = filter_input(INPUT_POST, 'openingHours', FILTER_SANITIZE_STRING);
$managerName = filter_input(INPUT_POST, 'managerName', FILTER_SANITIZE_STRING);

/* Empty error message array that prints out warnings 
  depending  on the users action if he leaves th any section blank. */

$errorMessage = array();


if ($address === FALSE || $address === '') {
    $errorMessage['address'] = '* You left email blank !<br/>';
}



if ($number === FALSE || $number === '') {
    $errorMessage['number'] = '* You left mobileNumber blank!<br/>';
}

if ($openingHours === FALSE || $openingHours === '') {
    $errorMessage['openingHours'] = '* You left address blank!<br/>';
}

if ($managerName === FALSE || $managerName === '') {
    $errorMessage['managerName'] = '* you left  date Registered blank! <br/>';
}




if (empty($errorMessage)) {
    $connection = Connection::getInstance();
    $gateway = new BranchTableGateway($connection);
    $id = $gateway->insertbranch($address, $number, $openingHours, $managerName);



    /* If there are no errors that occur, the user will be redirected to the homepage */
    header("Location: home.php");
} else {
    require 'createBranchForm.php';
}
/* If errors do occur, the user will not be allowed to continue 
   to the homepage and will be redirected back to the createCustomerForm page */