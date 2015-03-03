<?php

require_once 'Customer.php';
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';


$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$customerID = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new CustomerTableGateway($connection);

$gateway->deleteCustomer($customerID);

header("Location: home.php");
?>
