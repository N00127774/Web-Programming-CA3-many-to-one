<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php
        if (!isset($username)) {
            $username = '';
        }
        ?>
        <form action="checkLogin.php" method="POST">
            <table border="1">
                <tbody>
                    <tr>
                        <th>Username</th>
                        <td>
                            <input type="text"
                                   name="username"
                                   value="<?php echo $username; ?>" />
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
                        <td>Password</td>
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
                        <td></td>
                        <td>
                            <input type="submit" value="Login" name="login" />
                            <input type="button"
                                   value="Register"
                                   name="register"
                                   onclick="document.location.href = 'register.php'"
                                   />
                            <input type="button" onclick="forgetPassword()" value="forgot password"/> 


                        </td>
                    </tr>
                </tbody>
            </table>
            <script type="text/javascript" src="js/forgetPassword.js"></script>
        </form>
    </body>
</html>
