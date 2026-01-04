<?php
session_start();
$pass=$_REQUEST["old"]; // old pass
$password=$_REQUEST["new"]; // new pass
$p2=$_REQUEST["confirm"]; // confirm pass

$error=[];

if(isset($_POST['Change'])){

    
    $taka = htmlspecialchars($_POST['old']);
      $error["pass"]=$taka;
           $_SESSION["oldPass"] = $error["pass"];
            Header("Location: ..\View\changePassword.php");
if($password != $p2){
     $error["password"]="Not Matched";
}
if(count($error) > 0){
    
    if($error["password"]){
        $_SESSION["matchErr"] = $error["password"];
        
    }
     Header("Location: ..\View\changePassword.php");
     
}  
else{
    $error["password"]="Info required!";
    $_SESSION['matchErr']=$error['password'];
     Header("Location: ..\View\changePassword.php");
}
}



?>
