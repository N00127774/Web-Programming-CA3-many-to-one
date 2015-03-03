<?php

require_once 'Customer.php';
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';


$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new CustomerTableGateway($connection);

/* echo '<pre>';
  print_r($_POST);
  echo '</pre>'; */ //allows user to see what is going wrong with code, to see for e.g names are matching or not.

$name = $_POST['name'];

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);

//$email = $_POST['email'];
$mobileNumber = $_POST['mobileNumber'];
$address = $_POST['address'];
$dateRegistered = $_POST['dateRegistered'];
$customerID = $_POST['id'];

$gateway->updateCustomer($name, $email, $mobileNumber, $address, $dateRegistered, $customerID);

header('Location: home.php');






