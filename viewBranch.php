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

$statement = $gateway->getBranchById($branchID);
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
    </body>
</html>
