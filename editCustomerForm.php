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
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new CustomerTableGateway($connection);

$statement = $gateway->getCustomerById($id);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/customer.js"></script>
        <link rel="stylesheet" type="text/css" href="Css/style.css">
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Edit Customer Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editCustomerForm" name="editCustomerForm" action="editCustomer.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table border="1">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" value="<?php
                            if (isset($_POST) && isset($_POST['name'])) {
                                echo $_POST['name'];
                            } else
                                echo $row['name'];
                            ?>" />
                            <span id="nameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['name'])) {
                                    echo $errorMessage['name'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="<?php
                            if (isset($_POST) && isset($_POST['email'])) {
                                echo $_POST['email'];
                            } else
                                echo $row['email'];
                            ?>" />
                            <span id="emailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['email'])) {
                                    echo $errorMessage['email'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>
                            <input type="text" name="mobileNumber" value="<?php
                            if (isset($_POST) && isset($_POST['mobileNumber'])) {
                                echo $_POST['mobileNumber'];
                            } else
                                echo $row['mobileNumber'];
                            ?>" />
                            <span id="mobileNumberError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['mobileNumber'])) {
                                    echo $errorMessage['mobileNumber'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="<?php
                            if (isset($_POST) && isset($_POST['address'])) {
                                echo $_POST['address'];
                            } else
                                echo $row['address'];
                            ?>" />
                            <span id="addressError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['address'])) {
                                    echo $errorMessage['address'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Date Registered</td>
                        <td>
                            <input type="text" name="dateRegistered" value="<?php
                            if (isset($_POST) && isset($_POST['dateRegistered'])) {
                                echo $_POST['dateRegistered'];
                            } else
                                echo $row['dateRegistered'];
                            ?>" />
                            <span id="dateRegisteredError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['dateRegistered'])) {
                                    echo $errorMessage['dateRegistered'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <input type="submit" value="Update Customer" name="updateCustomer" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
