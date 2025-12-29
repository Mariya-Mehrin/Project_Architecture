<?php
include "../Model/dataBaseConnection.php";
$password="";
$password=$_POST["password"];

if($password==""){
    echo "Password Empty";
}
else{

    $connection=new DatabaseConnection();
    $conobj=$connection->openConnection();
    $result=$connection->checkExistingUser($conobj,"users",$password);
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