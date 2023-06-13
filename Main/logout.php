<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../Login/login.php");
}

unset($_SESSION['username']);
session_destroy();
header("location: ../Login/login.php");
?>