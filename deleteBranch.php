<?php

require_once 'Branch.php';
require_once 'Connection.php';
require_once 'BranchTableGateway.php';


$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$branchID = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new BranchTableGateway($connection);

$gateway->deleteBranch($branchID);

header("Location: home.php");
?>
