<?php
session_start();
if(isset($_GET['logout'])){
    session_destroy();
    setcookie("user_login", "", time() - 3600, "/");
    header("location: views/login.php");
} else {
    
    if(isset($_SESSION['username'])){
        header("location: views/dashboard.php");
    } else {
        header("location: views/login.php");
    }
}
?>