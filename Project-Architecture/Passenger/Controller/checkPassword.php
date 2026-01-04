<?php
include "../Model/dataBaseConnection.php";
$Password="";
// $Password=$_POST["Password"];
$Password = isset($_POST["Password"]) ? trim($_POST["Password"]) : "";
if($Password==""){
    echo "Password Empty";
}
else{

    $connection=new DatabaseConnection();
    $conobj=$connection->openConnection();
    $result=$connection->checkExistingUser($conobj,"users",$Password);
    if ($result->num_rows > 0)
    {
       echo "Password Already Used";
    }

    else{
            echo "Unique Password";
    }
    $connection->closeConnection($conobj);
}




?>