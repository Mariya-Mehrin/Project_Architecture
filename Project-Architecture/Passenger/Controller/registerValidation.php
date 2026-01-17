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

if(strlen($password)!=8 && strlen($phone) !=11){
    $errors["phone"] = "Phone number invalid!";

       Header("Location: ../View/registrationForm.php");
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