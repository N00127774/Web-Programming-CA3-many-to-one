<?php
require 'ensureUserLoggedIn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- This linking my register.js and create customer.js" javascript to this page -->
        <script type="text/javascript" src="js/customer.js"></script>
        <link rel="stylesheet" type="text/css" href="Css/style.css">
    </head>
    <body>
        <?php require 'toolbar.php'; ?>
        <h1><i> Enter your personal Details</i></h1>


        <!-- validation linking back to javascript  and php too-->
        <form id="createCustomerForm" action="createCustomer.php" method="POST">
            <!-- this is the table that as all this information in it, so the table makes it nice and tidy-->
            <table id="t"
                   border="1">
                <tbody>
                    <tr>

                        <th> Name</th>
                        <td>
                            <input type="text" name="name" value="<?php
                            if (isset($_POST) && isset($_POST['name'])) {
                                echo $_POST['name'];
                            }
                            ?>"/>
                            <span id="nameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['name'])) {
                                    echo $errorMessage['name'];
                                }
                                ?>  

                            </span>

                        </td>
                    </tr>
                <td> Email</td>
                <td>
                    <input type="text" name="email" value="<?php
                    if (isset($_POST) && isset($_POST['email'])) {
                        echo $_POST['email'];
                    }
                    ?>"/>
                    <span id="emailError" class="error">
                        <?php
                        if (isset($errorMessage) && isset($errorMessage['email'])) {
                            echo $errorMessage['email'];
                        }
                        ?>  

                    </span>


                </td>
                </tr>
                <tr>


                    <td>Mobile Number</td> 
                    <td>
                        <input type="text" name="mobileNumber" value="<?php
                        if (isset($_POST) && isset($_POST['mobileNumber'])) {
                            echo $_POST['mobileNumber'];
                        }
                        ?>"/>
                        <span id="mobileNumberError" class="error">
                            <?php
                            if (isset($errorMessage) && isset($errorMessage['mobileNumber'])) {
                                echo $errorMessage['mobileNumber'];
                            }
                            ?>   

                        </span>
                    </td>
                </tr>
                <tr>    


                    <td>Address</td>
                    <td>
                        <input type="text" name="address" value="<?php
                        if (isset($_POST) && isset($_POST['address'])) {
                            echo $_POST['address'];
                        }
                        ?>"/>
                        <!-- span is also like a div-->
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


                    <td>Date</td>
                    <td>
                        <input type="text" name="dateRegistered" value="<?php
                        if (isset($_POST) && isset($_POST['dateRegistered'])) {
                            echo $_POST['dateRegistered'];
                        }
                        ?>"/>
                        <span id="dateRegisteredError" class="error">
                            <?php
                            if (isset($errorMessage) && isset($errorMessage['dateRegistered'])) {
                                echo $errorMessage['dateRegistered'];
                            }
                            ?> 

                        </span> 
                    </td>
                </tr>

                <tr>
                    <td> Branch ID</td>
                    <td>
                     <input type="text" name="branchID" value="<?php
                        if (isset($_POST) && isset($_POST['branchID'])) {
                            echo $_POST['branchID'];
                        }
                        ?>"/>
                        <span id="branchIDError" class="error">
                            <?php
                            if (isset($errorMessage) && isset($errorMessage['branchID'])) {
                                echo $errorMessage['branchID'];
                            }
                            ?> 

                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Create Customer" name="createCustomer" />
                    </td>
                </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
