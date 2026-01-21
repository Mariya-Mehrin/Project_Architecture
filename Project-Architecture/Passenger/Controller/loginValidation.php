<?php
include "../Model/dataBaseConnection.php";
session_start();

$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$errors = [];
$values = [];
if(empty($email) && empty($password)){
$_SESSION["LoginErr"]="Empty Field";
Header("Location: ../View/loginForm.php");
exit;
}
else{
$db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->checkExistingUser($connection, "users", $email);
if(!$result || $result->num_rows ==0){
    echo "User not found";
    exit;
 }
$user = $result->fetch_assoc();




if(!$email){
$errors["email"] = "Email field is required";
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

    if($errors["password"]){
        $_SESSION["passwordErr"] = $errors["password"];
    }

$values["email"] = $email;
$_SESSION["previousValues"] = $values;

Header("Location: ../View/loginForm.php");
exit;
}
else{
    // $data = ["email"=> "test@test.com","password"=> 'password'];

     $db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->signin($connection, "users", $email, $password);


    if($result->num_rows  == 1){
        $_SESSION["email"] =$email;
        if($user["role"]=="Passenger"){
        $_SESSION["isLoggedIn"] =true;
        Header("Location: ../View/dashboard.php");
        exit;
        }
    }

    // if($email == $data["email"] && $password == $data["password"]){
    //     $_SESSION["email"] = $data["email"];
    //     $_SESSION["isLoggedIn"] =true;
    //     Header("Location: ..\View\dashboard.php");

    // }
    
    else{
      $_SESSION["LoginErr"] = "Email or password is incorrect";  
      Header("Location: ../View/loginForm.php");
      unset($_SESSION["emailErr"]);
      unset($_SESSION["passwordErr"]);
      exit;
    }


    
}
}

?>