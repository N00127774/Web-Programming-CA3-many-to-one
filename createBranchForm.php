<?php
require 'ensureUserLoggedIn.php';
require_once "connection.php";



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










        <!-- This linking my register.js and create customer.js" javascript to this page -->
        <script type="text/javascript" src="js/branch.js"></script>
        <link rel="stylesheet" type="text/css" href="Css/style.css">
    </head>
    <body>




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


        <div class="col-lg-10 col-md-12 ">
            <h1 class="page-header">Create Branch</h1>
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
                <!-- validation linking back to javascript  and php too-->
                 <form id="createBranchForm" method="POST">
                    <!-- this is the table that as all this information in it, so the table makes it nice and tidy-->
                    <table class="table table-bordered createCus">
                        <tbody>
                            <tr>

                                
                        <th> Address</th>
                        <td>
                            <input type="text" name="address" value="<?php
                            if (isset($_POST) && isset($_POST['address'])) {
                                echo $_POST['address'];
                            }
                            ?>"/>
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


                            <th> Number </th> 
                            <td>
                                <input type="text" name="number" value="<?php
                                if (isset($_POST) && isset($_POST['number'])) {
                                    echo $_POST['number'];
                                }
                                ?>"/>
                                <span id="numberError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['number'])) {
                                        echo $errorMessage['number'];
                                    }
                                    ?>   

                                </span>
                            </td>
                        </tr>
                        <tr>    


                            <th>Opening Hours</th>
                            <td>
                                <input type="text" name="openingHours" value="<?php
                                if (isset($_POST) && isset($_POST['openingHours'])) {
                                    echo $_POST['openingHours'];
                                }
                                ?>"/>
                                <!-- span is also like a div-->
                                <span id="openingHoursError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['openingHours'])) {
                                        echo $errorMessage['openingHours'];
                                    }
                                    ?>   

                                </span> 
                            </td>
                        </tr>
                        <tr>


                            <th>manager Name</th>
                            <td>
                                <input type="text" name="managerName" value="<?php
                                if (isset($_POST) && isset($_POST['managerName'])) {
                                    echo $_POST['managerName'];
                                }
                                ?>"/>
                                <span id="managerNameError" class="error">
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
                                <input type="submit" value="Create Branch" name="createBranch" class="btn btn-submit" />

                            </td>
                            <td>
                                <a href="viewBranches.php "   class="btn btn-submit"> Go Back</a>
                            </td>
                        </tr>















                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>














</div> 
</body>
</html>



