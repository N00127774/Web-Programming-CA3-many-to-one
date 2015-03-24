
<?php

$session_id = session_id();
if ($session_id == "") {
    session_start();
}

if (isset($_SESSION['username'])) {
    echo '<a href="logout.php">Logout <span class="glyphicon glyphicon-off"></span></a>';
} else {
    echo '<a href="login.php">Login <span class="glyphicon glyphicon-user"></span></a>';
}