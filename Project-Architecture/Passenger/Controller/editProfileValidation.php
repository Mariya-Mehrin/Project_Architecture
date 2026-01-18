<?php
include "../Model/dataBaseConnection.php";
session_start();
$email=$_SESSION['email'];

if(isset($_POST["change"])){
   $newEmail=$_POST["email"];
   $newName=$_POST["name"];
   $newRole=$_POST["role"];
    $emailRegex = "/^\S+@\S+\.\S+$/";
    $error=[];

if( !empty(trim($newEmail))){
    if(!preg_match($emailRegex,$newEmail)){
        $error["email"]="Invalid email format!!";
        $_SESSION["regex"]=$error["email"];
    }
    if(!empty($error)){
        Header("Location:../View/editProfile.php");
        exit;
    }

    $db=new DatabaseConnection();
    $connection=$db->openConnection();

    if(!$connection){
        die("DataBase connection failed!");
    }

    $rows=$db->editProfile($connection,"users",$email,$newEmail, $newName,$newRole);

    if($rows){
        $_SESSION["updateResult"]="Updated Successfully!";
        $_SESSION['email']=$newEmail;
    }
    else{
         $_SESSION["updateResult"]="No change";
    }

    Header("Location:../View/editProfile.php");
    exit;
}
}
?>

