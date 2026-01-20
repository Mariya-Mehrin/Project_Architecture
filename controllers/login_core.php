<?php
session_start();
require_once '../models/db.php';

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    
    if (empty($username) || empty($password)) {
        header("location: ../views/login.php?error=empty_fields");
        exit();
    }

    
    $sql = "SELECT * FROM employees WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];

        
        setcookie("user_login", $username, time() + (86400 * 1), "/"); 

        header("location: ../views/dashboard.php");
    } else {
        header("location: ../views/login.php?error=wrong_pass");
    }
}
?>