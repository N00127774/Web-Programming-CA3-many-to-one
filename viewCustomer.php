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

        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
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
                            <a class="navbar-brand hidden-xs" href="index.php">  <img src= "img/piechart.png" class="img-responsive BigLogo " alt=""> </a>
                            <a class="navbar-brand visible-xs" href="index.php"> <p> ASPM | AGENCY</p></a>
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


        <div class="col-lg-2 col-md-2 sidebar visible-lg"><!--  start  of sidebar div -->

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
            <ul class="nav nav-sidebar"> <!--  start  of nav-sidebar -->
                <hr></hr>
                <li><a><span class="glyphicon glyphicon-question-sign"></span> Help</a></li>
                <li><a><span class="glyphicon glyphicon-wrench"></span>  Settings</a></li>







            </ul><!-- End of nav-sidebar -->
        </div><!--  end  of sidebar div  -->



        <div class="col-lg-10 col-md-12  Details">
            <h1 class="page-header">View Customer</h1>
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













            <!--  start  of table -->
            <div class="table-responsive">
                <table class="table table-bordered ViewCus">
                    <tbody>
                        <?php
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                        echo '<tr>';
                        echo '<th>Name</th>'
                        . '<td>' . $row['name'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>Email</th>'
                        . '<td>' . $row['email'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>Mobile</th>'
                        . '<td>' . $row['mobileNumber'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>Address</th>'
                        . '<td>' . $row['address'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>dateRegistered</th>'
                        . '<td>' . $row['dateRegistered'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>managerName</th>'
                        . '<td>' . $row['managerName'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';

                        echo '<th>customerID</th>'
                        . '<td>' . $row['customerID'] . '</td>';


                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>Manager Name</th>'
                        . '<td>' . $row['managerName'] . '</td>';


                        echo '</tr>';
                        ?>
                    </tbody>
                </table> <!-- End of table -->




                <p>
                    <button type="button" class="btn btn-submit"><a href="editCustomerForm.php?id=<?php echo $row['customerID']; ?>">
                            Edit Customer</a></button>
                    <button type="button" class="btn btn-submit"> <a class="deleteCustomer" href="deleteCustomer.php?id=<?php echo $row['customerID']; ?>">
                            Delete Customer</a></button> <!-- to links at the bottom of table to edit customer and delete customer-->
                </p>

            </div>
        </div>
    </div>















    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>
</html>
