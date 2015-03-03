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

$statement = $gateway->getCustomerById($customerID);
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
                echo '<td>Name</td>'
                . '<td>' . $row['name'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Email</td>'
                . '<td>' . $row['email'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Mobile</td>'
                . '<td>' . $row['mobileNumber'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Address</td>'
                . '<td>' . $row['address'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>dateRegistered</td>'
                . '<td>' . $row['dateRegistered'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                  echo '<td>branchID</td>'
                . '<td>' . $row['branchID'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                
                echo '<td>customerID</td>'
                .'<td>' . $row['customerID']  . '</td>';
                echo '</tr>';
                echo '<tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a href="editCustomerForm.php?id=<?php echo $row['customerID']; ?>">
                Edit Customer</a>
            <a class="deleteCustomer" href="deleteCustomer.php?id=<?php echo $row['customerID']; ?>">
                Delete Customer</a> <!-- to links at the bottom of table to edit customer and delete customer-->
        </p>
    </body>
</html>
