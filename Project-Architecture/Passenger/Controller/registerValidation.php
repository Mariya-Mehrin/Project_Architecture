<?php
include "../Model/dataBaseConnection.php";


error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$phone = $_REQUEST["phone"];
$role = $_REQUEST["role"];
$file = $_FILES["fileupload"];
$errors = [];
$values = [];


if(!$email){
$errors["email"] = "Email field is required!";
}
if(!$name){
$errors["name"] = "Name field is required!";
}
if(!$role){
$errors["role"] = "Select One!";
}
if(!$phone){
$errors["phone"] = "Phone number is required!";
}
if(strlen($phone) !=11){
$errors["phone"] = "Invalid Phone number.!";
}
if(!$password){
    $errors["password"] = "Password field is required";
}

if(count($errors) > 0){
    if($errors["email"]){
        $_SESSION["emailErr"] = $errors["email"];
    }
    else{
       if($_SESSION["emailErr"]){
         unset($_SESSION["emailErr"]);
       }
    }

    if($errors["name"]){
        $_SESSION["nameErr"] = $errors["name"];
    }
    else{
       if($_SESSION["nameErr"]){
         unset($_SESSION["nameErr"]);
       }
    }

    if($errors["phone"]){
        $_SESSION["phoneErr"] = $errors["phone"];
    }
    else{
       if($_SESSION["phoneErr"]){
         unset($_SESSION["phoneErr"]);
       }
    }

    if($errors["password"]){
        $_SESSION["passwordErr"] = $errors["password"];
    }

$values["email"] = $email;
$values["name"] = $name;
$values["role"] = $role;
// $values["file"] = $file;


$_SESSION["previousValues"] = $values;

// Header("Location: ..\View\registrationForm.php");

}else{
    $path = "";
    if($file){
        $targetDir = "../Uploads/RegistrationUploads";
        $path = $targetDir . basename($file["name"]);
        move_uploaded_file($file["tmp_name"], $path);
    
    }
    $db = new DatabaseConnection();
    $connection = $db->openConnection();
    if($role=="Passenger"){
    $result = $db->registration($connection, "passengers",$name, $email, $password,$phone,$role, $path);
    }
    $result = $db->allUser($connection, "users",$name, $email, $password,$phone,$role, $path);

    if($result){
        Header("Location: ..\View\loginForm.php");

    }else{
      $_SESSION["LoginErr"] = "Failed to sign up, please try again later";  
   Header("Location: ..\View\registrationForm.php");
      unset($_SESSION["emailErr"]);
      unset($_SESSION["passwordErr"]);
    }  
 }
//   Header("Location:../View/loginForm.php");
//      exit;
  
//  else if(isset($_POST['submit'])==false){
//     Header("Location:../View/registrationForm.php");
//  }
?>