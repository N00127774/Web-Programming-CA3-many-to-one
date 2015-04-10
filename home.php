<!DOCTYPE html>
<?php
require_once 'Customer.php';
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';
require 'ensureUserLoggedIn.php';

if (isset($_GET) && isset($_GET['sortOrder'])){
    $sortOrder = $_GET['sortOrder'];
    $columnNames = array("name", "email", "mobileNumber", "address", "dateRegistered", "customerID","managerName");
    if (!in_array($sortOrder, $columnNames)) {
        $sortOrder='name';
    }
}

else{
    $sortOrder='name';
}


$connection = Connection::getInstance();
$gateway = new CustomerTableGateway($connection);

$statement = $gateway->getCustomers($sortOrder);
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






        <div class="container-fluid"><!-- start of :container -->
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
        </nav>	<!-- end row1: navigation -->




        <div class="col-lg-2 col-md-2 sidebar visible-lg"> <!-- sidebar -->
             
            <ul class="nav nav-sidebar">  <!-- nav-sidebar -->
                <h3> Welcome</h3>
                <li><img src="img/beardGame.jpg" class="img img-circle usericon img-responsive"></li>

                <?php
                $username = $_SESSION ['username'];
                echo '<p class="greetings">Logged in as : ' . $username . '</p>';
                ?>
                <li><a><span class="glyphicon glyphicon-lock"> </span> Projects</a></li>

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







            </ul><!-- end of nav-sidebar -->
        </div><!-- sidebar -->




         <!-- Dashboard -->
        <div class="col-lg-10 col-md-12 Details">
            <h1 class="page-header">Dashboard</h1>
            <div class="row placeholders Dashboard">


                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                    <a href="viewCustomers.php " class="buttonsforTables"> 
                        <div class="thumbnail text-center adminoptions CustomerBG">

                            <span class="glyphicon glyphicon-user customers"></span>


                            <h2>20,000</h2>
                            <h4> Customers</h4>
                        </div>
                    </a>


                </div>


                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <a href="viewBranches.php" class ="buttonsforTables">
                        <div class="thumbnail text-center adminoptions BranchesBG">
                            <img src="img/webBuilding.png" class="img-responsive adminoptionicons">
                            <h2>500</h2>
                            <h4> Branches</h4>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <a>
                        <div class="thumbnail text-center adminoptions SalesBG">
                            <span class="glyphicon glyphicon-signal"></span>
                            <h2>200,000</h2>
                            <h4>Sales</h4>
                        </div>
                    </a>
                </div>



            </div>

            <div class="row Charts"><!-- Barchat and Line Graph-->
                <div class= "graph">

                    <h3> Sales 2010-2013</h3>
                    <img src="img/graph.png" class="img-responsive">

                </div>
            </div>

            <div class="table-responsive col-lg-12">

                <table class="table table-striped Member">
                    <h1>MANAGERS</h1>
                    <thead>
                        <tr>
                            <!-- the different headers inside a table-->
                            <th>ID</th>
                            <th>Name</th>
                            <th>Balance</th>
                            <th>Subscription</th>

                        <tr>
                            <td> <a>IR531</a></td>
                            <td> Jameson Blackson </td>
                            <td>€32,000</td>
                            <td> <span class="badge green">Secretary</span></td>

                        </tr>

                        <tr>
                            <td> <a>IR532</a></td>
                            <td>Scott S. Calabrese </td>
                            <td>€39,000</td>
                            <td> <span class="badge blue">Asset Management</span></td>

                        </tr>


                        <tr>
                            <td> <a>IR533</a></td>
                            <td> Chester Abllera</td>
                            <td>€45,000</td>
                            <td> <span class="badge light-purple">Manager</span></td>

                        </tr>

                        <tr>
                            <td> <a>IR534</a></td>
                            <td> Joshua Hayes</td>
                            <td>€35,000</td>
                            <td> <span class="badge green ">Stock Manager</span></td>

                        </tr>

                        <tr>
                            <td> <a>IR535</a></td>
                            <td> Teresa L. Doe</td>
                            <td>€50,000</td>
                            <td> <span class="badge blue ">Branch Manager</span></td>

                        </tr>


                        <tr>
                            <td> <a>IR536</a></td>
                            <td> Lucy Doe</td>
                            <td>€53,000</td>
                            <td> <span class="badge light-purple">Area Manager</span></td>

                        </tr>

                        <tr>
                            <td> <a>IR537</a></td>
                            <td>Charles S Boyle</td>
                            <td>€56,000</td>
                            <td> <span class="badge green">Facility  Manager</span></td>

                        </tr>

                        <tr>
                            <td> <a>IR538</a></td>
                            <td>Paul Aguillier</td>
                            <td>€58,000</td>
                            <td> <span class="badge blue">HR Director</span></td>

                        </tr>





                    </thead>
                    <tbody>
                </table> <!-- End OF TABLE -->


            </div><!-- End OF TABLE Responsive -->






        </div> <!-- Dashboard -->

    </div> <!--End of Container -->

























    <!-- javascript -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
