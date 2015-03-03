<?php

$id = session_id();
if ($id == "") {
    session_start();
}

// you have to be logged i to view home page. If not this redirects you to the log in page.
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
