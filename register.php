<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Sign Up</h1>
        <hr/>
        <form id="registerForm" action="checkRegister.php" method="POST">
            <table
                border="1">
                <tbody>
                    <tr>
                        <th>Username</th>
                        <td>
                            <input type="text" name="username" value="<?php
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
                        </td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td>
                            <input type="password" name="password" value="" />
                            <span id="passwordError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password'])) {
                                    echo $errorMessage['password'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Confirm Password</th>
                        <td>
                            <input type="password" name="password2" value="" />
                            <span id="password2Error" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                    echo $errorMessage['password2'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Register" name="register" />
                            <input type="button" value="Return" name="Return to Log in" onclick="document.location.href = 'login.php'"  />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
        <script type="text/javascript" src="js/register.js"></script>
    </body>
</html>