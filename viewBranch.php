<?php
require_once 'Branch.php';
require_once 'Connection.php';
require_once 'BranchTableGateway.php';
require_once 'CustomerTableGateway.php';

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
$customerGateway= new CustomerTableGateway($connection);

$statement = $gateway->getBranchById($branchID);
$customers = $customerGateway->getCustomersByBranchID($branchID);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <script src="js/respond.js"></script>
        <link href="css/style.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="styles/ihover.css" rel="stylesheet"> <!-- for the images and effects on them-->
        <link href="styles/ihover.min.css" rel="stylesheet"> 
        <link href='http://fonts.googleapis.com/css?family=Lato:400,900|Kreon' rel='stylesheet' type='text/css'>

        <script type="text/javascript" src="js/customer.js"></script>
        <link rel="icon" type="image/x-icon" href="Images/logo.ico">

    </head>

    <body>
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>
        
        
      
              <div class="table-responsive">
        <table class="table table-bordered ViewCus">
             <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                echo '<tr>';
                echo '<th>branchID</th>'
                . '<td>' . $row['branchID'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<th>Address</th>'
                . '<td>' . $row['address'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<th>Number</th>'
                . '<td>' . $row['number'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<th>OpeningHours</th>'
                . '<td>' . $row['openingHours'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<th>managerName</th>'
                . '<td>' . $row['managerName'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                 
                
                
                
                ?>
        </table>
     </div>
        <p>
            <a href="editBranchForm.php?id=<?php echo $row['branchID']; ?>">
                Edit Branch</a>
            <a class="delete" href="deleteBranchForm.php?id=<?php echo $row['branchID']; ?>">
                Delete Branch</a> <!-- to links at the bottom of table to edit customer and delete customer-->
        </p>
        
        <h3 class="page-header">Customers Assigned to  <?php echo $row['managerName']; ?></h3>
        <?php if ($customers->rowCount() !== 0) { ?>
            <div class="table-responsive">
                <table class="table table-striped ">
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
                        $row = $customers->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                            echo '<td>' . $row['mobileNumber'] . '</td>';
                            echo '<td>' . $row['address'] . '</td>';
                            echo '<td>' . $row['dateRegistered'] . '</td>';
                            echo '<td>' . $row['customerID'] . '</td>';
                     

                            // this is to see the view/delete links in my home page with the list of customers
                            echo '<td>'
                            . '<a href="viewCustomer.php?id=' . $row['customerID'] . '"><button span class = "glyphicon glyphicon-search  btn btn-search"></span></button></a> '
                            . '<a href="editCustomerForm.php?id=' . $row['customerID'] . '"><button span class = "glyphicon glyphicon glyphicon-edit btn btn-edit"></span></button></a> '
                            . '<a class="deleteCustomer" href="deleteCustomer.php?id=' . $row['customerID'] . '"><button span class = "glyphicon glyphicon-trash btn btn-delete"></span></button></a> '
                            . '</td>';
                            echo '</tr>';



                            $row = $customers->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                    </tbody>

                </table>
        <?php } else { ?>
            <p class="assigned"> There are no customers assigned to this branch.</p>
        <?php } ?>
    </body>
</html>
