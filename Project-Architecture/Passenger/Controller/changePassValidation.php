<?php
session_start();
$pass=$_REQUEST["old"]; // old pass
$password=$_REQUEST["new"]; // new pass
$p2=$_REQUEST["confirm"]; // confirm pass

$error=[];

// if (isset($_GET['pass'])) {
//     $password = htmlspecialchars($_GET['pass']);
//     echo "Received value: " . $password;
// } else {
//     echo "No variable received.";
// }

// if($password !=$pass){
//    $error["pass"] ="Wrong password";
// }

if($password != $p2){
     $error["password"]="Not Matched";
}
if(count($error) > 0){
    
    if($error["password"]){
        $_SESSION["matchErr"] = $error["password"];
        
    }
     Header("Location: ..\View\changePassword.php");
}



?>
