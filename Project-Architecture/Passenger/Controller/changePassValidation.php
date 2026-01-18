<?php
include "../Model/dataBaseConnection.php";
session_start();

if(isset($_POST["Change"])){
    $oldPass=$_POST["old"];
    $newPass=$_POST["new"];
    $confirmPass=$_POST["confirm"];
    
    $email=$_SESSION['email'];

    $error=[];

if( $newPass !=" " && $confirmPass !=" "){
    if(strlen($newPass !=8) || strlen($confirmPass !=8)){
        $error["password"]="Password Must Be contain 8 Character.";
    }
    if($newPass !=$confirmPass){
        $error["password"]="Password not Matched!!";
    }
    
    if(!empty($error)){
        $_SESSION["matchErr"]=$error["password"];
        Header("Location:../View/changePassword.php");
        exit;
    }

    $db=new DatabaseConnection();
    $connection=$db->openConnection();

    if(!$connection){
        die("DataBase connection failed!");
    }

    $rows=$db->updateUserPassword($connection,"users",$email,$newPass);

    if($rows && $connection->affected_rows > 0){
        $_SESSION["updateResult"]="Updated Successfully!";
    }
    else{
        $_SESSION["updatedResult"]="Password not Matched!";
    }

    Header("Location:../View/changePassword.php");
    exit;
}
}
?>

