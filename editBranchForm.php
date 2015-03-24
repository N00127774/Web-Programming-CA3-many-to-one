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
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new BranchTableGateway($connection);

$statement = $gateway->getBranchById($id);
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
        
        
        
        
    </head>
    <body>
       
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        
        
        <div class="container-fluid">
            <div class="row">	<!-- row 1: navigation -->

                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <!-- Dropdown Menu for Mobile Devices -->
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="FirstPage.php">  <img src= "img/piechart.png" class="img-responsive BigLogo " alt=""></a>
                        </div>

                        <div class="collapse navbar-collapse" id="collapse">
                            <div class="container-fluid">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href=" FirstPage.php ">Home <span class=" glyphicon glyphicon-home"></span></a></li>
                                    <li><a href="#">About US <span class=" glyphicon glyphicon-user "></span></a></li>
                                    
                                    <li><a href="#">Contact Us <span class=" glyphicon glyphicon-envelope "></span></a> </li>
                                    <li><a href="home.php ">Dashboard<span class=" glyphicon glyphicon-stats "></span></a> </li>
                                    <li><?php require 'toolbar.php' ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
                </nav>
        
        
        
                 <div class="col-lg-2 col-md-2 sidebar visible-lg">

                        <ul class="nav nav-sidebar">
                            <h3> Welcome</h3>
                            <li><img src="img/beardGame.jpg" class="img img-circle usericon img-responsive"></li>
                      
                            <?php
                            $username = $_SESSION ['username'];
                            echo '<p class="greetings">Logged in as : ' . $username . '</p>';
                            ?>
                            <li><a><span class="glyphicon glyphicon-lock"> </span> Projects</a></li>
                            <hr></hr>
                            <li><a><span class="glyphicon glyphicon-tasks"></span>   Tasks</a><li>
                                <hr></hr>
                            <li><a><span class="glyphicon glyphicon-envelope"></span>  Messages <span class="badge mmm">55</span></a></li>
                            <li><a><span class="glyphicon glyphicon-file"></span> files</a></li>
                            <li><a><span class="glyphicon glyphicon-comment"></span> chat <span class="badge chat">4</span></a></li>


                        </ul>
                        <!-- <hr></hr>                                                -->
                        <ul class="nav nav-sidebar">
                             <hr></hr>
                            <li><a><span class="glyphicon glyphicon-question-sign"></span> Help</a></li>
                            <li><a><span class="glyphicon glyphicon-wrench"></span>  Settings</a></li>







                        </ul>
                    </div>
        
        
        
                <div class="col-lg-10 col-md-12">
                        <h1 class="page-header">Edit Branch</h1>
                        <div class="row placeholders">


                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="thumbnail text-center adminoptions CustomerBG">

                                    <span class="glyphicon glyphicon-user customers"></span>


                                    <h2>20,000</h2>
                                    <h4> Customers</h4>






                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="thumbnail text-center adminoptions BranchesBG">
                                    <img src="img/webBuilding.png" class="img-responsive adminoptionicons">
                                    <h2>500</h2>
                                    <h4> Branches</h4>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="thumbnail text-center adminoptions SalesBG">
                                    <span class="glyphicon glyphicon-signal"></span>
                                    <h2>200,000</h2>
                                    <h4>Sales</h4>
                                </div>
                            </div>



                        </div>
                
                
        
        
        
        
         <div class="table-responsive">
        <form id="editCustomerForm" name="editBranchForm" action="editBranch.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table class="table table-bordered createCus">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>
                            <input type="text" name="address" value="<?php
                            if (isset($_POST) && isset($_POST['address'])) {
                                echo $_POST['address'];
                            } else
                                echo $row['address'];
                            ?>" />
                            <span id="nameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['address'])) {
                                    echo $errorMessage['address'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            <input type="text" name="number" value="<?php
                            if (isset($_POST) && isset($_POST['number'])) {
                                echo $_POST['number'];
                            } else
                                echo $row['number'];
                            ?>" />
                            <span id="emailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['number'])) {
                                    echo $errorMessage['number'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    
                    <tr>
                        <th>Address</th>
                        <td>
                            <input type="text" name="openingHours" value="<?php
                            if (isset($_POST) && isset($_POST['openingHours'])) {
                                echo $_POST['openingHours'];
                            } else
                                echo $row['openingHours'];
                            ?>" />
                            <span id="addressError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['openingHours'])) {
                                    echo $errorMessage['openingHours'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Date Registered</th>
                        <td>
                            <input type="text" name="managerName" value="<?php
                            if (isset($_POST) && isset($_POST['managerName'])) {
                                echo $_POST['managerName'];
                            } else
                                echo $row['managerName'];
                            ?>" />
                            <span id="dateRegisteredError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['managerName'])) {
                                    echo $errorMessage['managerName'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    
                        <tr>
                            <td>
                                 <input type="submit" value="Update Branch" name="updateBranch" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>


