<!DOCTYPE html>
<?php
require_once 'Customer.php';
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

$connection = Connection::getInstance();
$gateway = new CustomerTableGateway($connection);

$statement = $gateway->getCustomers(); //gateway method()
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Css/style.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
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
                    <th>Customer ID</th>
                    <th> branch ID</th>

                </tr>
            </thead>
            <tbody>
<?php
$row = $statement->fetch(PDO::FETCH_ASSOC);
while ($row) {

    // the table name here have to match the name in the datatbase online (mySQL php.adMin)
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['mobileNumber'] . '</td>';
    echo '<td>' . $row['address'] . '</td>';
    echo '<td>' . $row['dateRegistered'] . '</td>';
    echo '<td>' . $row['customerID'] . '</td>';
    echo '<td>' . $row['branchID'] . '</td>';
    echo '</tr>';

    $row = $statement->fetch(PDO::FETCH_ASSOC);
}






//each customers assigned to the instance c.
/* foreach ($customers as $c) {
  echo '<tr>';
  echo '<td>' . $c->getName() . '</td>';
  echo '<td>' . $c->getEmail() . '</td>';
  echo '<td>' . $c->getMobilenumber() . '</td>';
  echo '<td>' . $c->getAddress() . '</td>';
  echo '<td>' . $c->getDateRegistered() . '</td>';
  echo '</tr>';
  } */
?>
            </tbody>
        </table>
    </body>
</html>

