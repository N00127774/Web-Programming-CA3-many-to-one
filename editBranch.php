<?php

require_once 'Branch.php';
require_once 'Connection.php';
require_once 'BranchTableGateway.php';


$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new BranchTableGateway($connection);

/* echo '<pre>';
  print_r($_POST);
  print_r ($params);
  print_r($sqlQuery);
  echo '</pre>'; */ //allows user to see what is going wrong with code, to see for e.g names are matching or not.





$branchID = $_POST['id'];
$address = $_POST['address'];
$number = $_POST['number'];

$openingHours = $_POST['openingHours'];
$managerName= $_POST['managerName'];


$gateway->updateBranch($branchID, $address, $number, $openingHours, $managerName);

header('Location: home.php');

