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

    <body class="BackgroundImage">
       
        
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
                    <a class="navbar-brand" href="index.php">  <img src= "img/piechart.png" class="img-responsive BigLogo " alt=""></a>
                </div>

                <div class="collapse navbar-collapse" id="collapse">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Home <span class=" glyphicon glyphicon-home"></span></a></li>
                            <li><a href="#">About US <span class=" glyphicon glyphicon-user "></span></a></li>
                            <li><a href="#">Sign Up <span class=" glyphicon glyphicon-pencil "></span></a></li>
                            <li><a href="#">Contact Us <span class=" glyphicon glyphicon-envelope "></span></a> </li>
                            <li><a href="login.php">Login <span class="glyphicon glyphicon-user"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        
        
        <div class="container">
           <div class="row">
               
               <div class="Absolute-Center is-Responsive">
                        <div class=" thumbnail BigPic">
                            <img src= "img/Register.png" class="img-responsive icons " alt="">
                        </div>
                   <h2 class="Register"> Register With Us</h2>
         <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <form id="registerForm" action="checkRegister.php" method="POST">
                           <div class="form-group input-group">
                               <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                               <input class="form-control"
                                      type="text"
                                      name="username"
                                      placeholder="username"
                                      value="<?php
                                        if (isset($_POST) && isset($_POST['username'])) {
                                            echo $_POST['username'];
                                        }
                                        ?>" />
                                       
                                        <span id="usernameError" class="error">
                                            <?php
                                            if (isset($errorMessage) && isset($errorMessage['username'])) {
                                                echo $errorMessage['username'];
                                            }
                                            ?>
                                        </span>
                           </div>
                           <div class="form-group input-group">
                               <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                               <input class="form-control"
                                      type="password" 
                                      name="password" 
                                      placeholder="password"
                                      value="" />
                               <span id="passwordError" class="error">
                                   <?php
                                   if (isset($errorMessage) && isset($errorMessage['password'])) {
                                       echo $errorMessage['password'];
                                   }
                                   ?>
                               </span>
                           </div>
                                
                                <div class="form-group input-group">
                               <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                               <input class="form-control"
                                      type="password" 
                                      name="password2" 
                                      placeholder="Confirm password"
                                      value="" />
                            <span id="password2Error" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                    echo $errorMessage['password2'];
                                }
                                ?>
                            </span>
                           </div>
                        
                        
                        
                        
                           
                           <div class="form-group">
                               <input type="submit" value="Register" name="register" class="btn btn-login btn-block"/>
                             
                       </form>
                       
                     <div class="form-group text-center GOBACK">
                         <a href = "login.php">Go back</a>
                     </div>

                    </div>
               </div>
           </div>
        </div>
            
        
        
        
        
        
        
        
        
        
        
        <script type="text/javascript" src="js/register.js"></script>
    </body>
</html>