<?php
require_once 'Customer.php';
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

$statement = $gateway->getCustomerById($branchID);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/customer.js"></script> <!--linking this so javascript file can validate this page-->
         <link rel="stylesheet" type="text/css" href="Css/style.css">
        <title></title>
    </head>

    <body>
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>
        
        
      
        <table border="1">
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                echo '<tr>';
                echo '<td>Address</td>'
                . '<td>' . $row['address'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Number</td>'
                . '<td>' . $row['number'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>OpeningHours</td>'
                . '<td>' . $row['openingHours'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>ManagerName</td>'
                . '<td>' . $row['managerName'] . '</td>';
                echo '</tr>';
                echo '<tr>';
            
               
                ?>
            </tbody>
        </table>
        <p>
            <a href="editCuForm.php?id=<?php echo $row['customerID']; ?>">
                Edit Customer</a>
            <a class="deleteCustomer" href="deleteCustomer.php?id=<?php echo $row['customerID']; ?>">
                Delete Customer</a> <!-- to links at the bottom of table to edit customer and delete customer-->
        </p>
    </body>
</html>
