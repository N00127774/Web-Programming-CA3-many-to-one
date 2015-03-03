<!DOCTYPE html>
<?php
require_once 'Customer.php';
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';
require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new CustomerTableGateway($connection);

$statement = $gateway->getCustomers();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/customer.js"></script>
        <link rel="stylesheet" type="text/css" href="Css/style.css">
        <title></title>
        <link rel="icon" type="image/x-icon" href="Images/logo.ico">

    </head>
    <body>
        <?php require 'toolbar.php'; ?>
        <h1> List of Customers</h1>
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>

        <table border="1">
            <thead>
                <tr>
                    <!-- the different headers inside a table-->
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Date Registered</th>
                    <th> Customer ID</th>
                    <th> Options</th>

                </tr>
            </thead>
            <tbody>
            <?php
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            while ($row) {


                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['mobileNumber'] . '</td>';
                echo '<td>' . $row['address'] . '</td>';
                echo '<td>' . $row['dateRegistered'] . '</td>';
                echo '<td>' .$row['customerID'] . '</td>';

                // this is to see the view/delete links in my home page with the list of customers
                echo '<td>'
                . '<a href="viewCustomer.php?id=' . $row['customerID'] . '">View</a> '
                . '<a href="editCustomerForm.php?id=' . $row['customerID'] . '">Edit</a> '
                . '<a class="deleteCustomer" href="deleteCustomer.php?id=' . $row['customerID'] . '">Delete</a> '
                . '</td>';
                echo '</tr>';

                $row = $statement->fetch(PDO::FETCH_ASSOC);
            }
            ?>
            </tbody>
        </table>

        <p><a href="createCustomerForm.php">Create Customer</a></p>
    </body>
</html>

