<!DOCTYPE html>
<?php
require_once 'Branch.php';
require_once 'Connection.php';
require_once 'BranchTableGateway.php';
require 'ensureUserLoggedIn.php';

if (isset($_GET) && isset($_GET['sortOrder'])){
    $sortOrder = $_GET['sortOrder'];
    $columnNames = array("branchID", "address", "number", "openingHours", "dateRegistered", "managerName");
    if (!in_array($sortOrder, $columnNames)) {
        $sortOrder='branchID';
    }
}

else{
    $sortOrder='branchID';
}




$connection = Connection::getInstance();
$gateway = new BranchTableGateway($connection);

$statement = $gateway->getBranchs($sortOrder);
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






        <div class="container-fluid"><!--  start  of container -->
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
                            <a class="navbar-brand hidden-xs " href="index.php">  <img src= "img/piechart.png" class="img-responsive BigLogo " alt=""> </a>
                            <a class="navbar-brand visible-xs " href="index.php"> <p> ASPM | AGENCY</p></a>

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
            <h1 class="page-header">Branch Table</h1>
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

            <h1 class="page-header">Section 2</h1>
            <div class="table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <!-- the different headers inside a table-->
                            <th><a href ="viewBranches.php?sortOrder=branchID">branchID</th>
                            <th><a href ="viewBranches.php?sortOrder=address">address</th>
                            <th><a href ="viewBranches.php?sortOrder=number">number</th>
                            <th><a href ="viewBranches.php?sortOrder=OpeningHours">openingHours</th>
                            <th><a href ="viewBranches.php?sortOrder=managerName">managerName</th>


                            <th> Options</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                        while ($row) {


                            echo '<td>' . $row['branchID'] . '</td>';
                            echo '<td>' . $row['address'] . '</td>';
                            echo '<td>' . $row['number'] . '</td>';
                            echo '<td>' . $row['openingHours'] . '</td>';
                            echo '<td>' . $row['managerName'] . '</td>';


                            // this is to see the view/delete links in my home page with the list of customers
                            echo '<td>'
                            . '<a href="viewBranch.php?id=' . $row['branchID'] . '"><button span class = "glyphicon  glyphicon-camera btn btn-view"></span></button></a> '
                            . '<a href="editBranchForm.php?id=' . $row['branchID'] . '"><button span class = "glyphicon glyphicon glyphicon-edit btn btn-edit"></span></button></a> '
                            . '<a class="deleteBranch.php" href="deleteBranch.php?id=' . $row['branchID'] . '"><button span class = "glyphicon glyphicon-trash btn btn-delete"></span></button></a> '
                            . '</td>';
                            echo '</tr>';



                            $row = $statement->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                    </tbody>

                </table>
         <button type="button" class="btn btn-submit "><a href="createBranchForm.php">Create Branch</a></button> 
            </div>
        </div>

    </div>


    <div class="container-fluid footer">
        <div class="container footer">
            <div class="footer">
                <div class="row">
                    <div class="col-lg-4">
                        <h2>Contact Information <span class=" glyphicon glyphicon-phone-alt"></h2>
                        <li> Some Address 987,NY</li>
                        <li> <span class=" glyphicon glyphicon-earphone"></span> tel:00353439359894</li>
                        <li> <span class=" glyphicon glyphicon-phone"></span> tel:00353439359894</li>
                        <li> <span class="glyphicon glyphicon-folder-close"></span> AsssetManagementagency@yahoo.ie</li>
                        <li> <span class="glyphicon glyphicon-briefcase" ></span> @Asset_co</li>
                        <li>  <span class=" glyphicon glyphicon-lock "></span> BaabatundeAgency</li> 
                    </div>

                    <div class="col-lg-5">
                        <h2>Newsletter <span class=" glyphicon glyphicon-list "></h2>
                        <p> Register to our newsletter and be updated with the latest information regarding our services, offers
                            and much more.
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label col-xs-2" for="email">Email:</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control email" id="email" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-2" for="pwd">Password:</label>
                                <div class="col-sm-8 ">          
                                    <input type="password" class="form-control " id="pwd" placeholder="Enter password">
                                </div>
                            </div>
                            <div class="form-group">        
                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label><input type="checkbox"> Remember me</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">        
                                <div class=" col-sm-12">
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="col-lg-3">
                        <h2>Opening Hours  <span class=" glyphicon glyphicon-time "></h2>
                        <li> Monday 9:00am-5:00pm</li>
                        <li> Tuesday 9:00am-5:00pm</li>
                        <li> Wednesday9:00am-5:00pm</li>
                        <li> Thursday 9:00am-5:00pm</li>
                        <li> Friday 9:00am-5:00pm</li>

                    </div>

                </div>

            </div>
        </div>
        <!-- End of Footer-->



    </div><!--  End of footer container -->
























    <!-- javascript -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
