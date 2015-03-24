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
        <?php
        if (!isset($username)) {
            $username = '';
        }
        ?>




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
                            <li><a href="FirstPage.php">Home <span class=" glyphicon glyphicon-home"></span></a></li>
                            <li><a href="#">About US <span class=" glyphicon glyphicon-user "></span></a></li>

                            <li><a href="#">Contact Us <span class=" glyphicon glyphicon-envelope "></span></a> </li>
                            <li><a href="register.php">Register <span class="glyphicon glyphicon-pencil"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>









        <div class="container">
            <div class="row all">

                <div class="Absolute-Center is-Responsive">
                    <div class=" thumbnail BigPic">
                        <img src= "img/BigImageLogin.png" class="img-responsive icons " alt="">
                    </div>
                    <h2 class="SignIN"> Sign in to your Account</h2>
                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                        <form action="checkLogin.php" method="POST">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="form-control"
                                       type="text"
                                       name="username"
                                       placeholder="username"
                                       value="<?php echo $username; ?>" />
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
                            <div class="checkbox text-center">
                                <label class="text-center">
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" name="login" class="btn btn-login btn-block"/>
                            </div>
                            <div class="form-group text-center">
                                <a href="register.php"  > Register</a>&nbsp;|&nbsp;<a href="#" onclick="forgetPassword()" value="forgot password"/>Forgot Password?</a>
                                <script type="text/javascript" src="js/forgetPassword.js"></script>
                            </div>
                        </form>        
                    </div>  
                </div>    
            </div>
        </div>







    </body>
</html>
