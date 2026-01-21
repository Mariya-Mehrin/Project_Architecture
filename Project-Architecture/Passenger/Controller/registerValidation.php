<?php
include "../Model/dataBaseConnection.php";
session_start();
if($_SERVER["REQUEST_METHOD"]=== "POST"){
$name = $_POST["name"];
$email = $_POST["email"];

$password=$_POST["Password"];
$phone = $_POST["phone"];
$role = $_POST["role"];
$file = $_FILES["fileupload"];
$errors = [];
$values = [];

    $phone = $_POST['phone'];
    if (!preg_match('/^\d{11}$/', $phone)) {
      
        $errors["phone"] = "Phone must be contain 11 digit !";
    }
if (!preg_match('/^\S+@\S+\.\S+$/', $email)) {
      
        $errors["email"] = "invalid email!";
    }

if(strlen($password)!=8 ){
    $errors["password"] = "Password must be 8 character!";

       Header("Location: ../View/registrationForm.php");
}
if(count($errors) > 0){
    if($errors["email"]){
        $_SESSION["emailErr"] = $errors["email"];
    }

    if($errors["password"]){
        $_SESSION["passwordErr"] = $errors["password"];
    }
    if($errors["phone"]){
        $_SESSION["phoneErr"] = $errors["phone"];
    }

Header("Location: ../View/registrationForm.php");
exit;
}
else{
    $path = "";
    if($file){
        if($role=="Passenger"){
        $targetDir = "../Uploads/";
        $path = $targetDir . basename($file["name"]);
        move_uploaded_file($file["tmp_name"], $path);
        }
    }
    $db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->allUser($connection, "users",$name, $email, $password,$phone,$role, $path);

    if($result){
        Header("Location: ../View/loginForm.php");

    }else{
      $_SESSION["LoginErr"] = "Failed to sign up, please try again later";  
   Header("Location: ../View/registrationForm.php");
      unset($_SESSION["emailErr"]);
      unset($_SESSION["passwordErr"]);
    }  
 }

session_unset();
}
?>