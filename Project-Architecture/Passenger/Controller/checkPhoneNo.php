<?php
include "../Model/dataBaseConnection.php";
$phone="";
$phone=$_POST["phone"];

if($phone==""){
    echo "Phone Number Empty";
}
else{

    $connection=new DatabaseConnection();
    $conobj=$connection->openConnection();
    $result=$connection->checkExistingUser($conobj,"users",$phone);
    if ($result->num_rows > 0)
    {
       echo "Phone Number Already Used";
    }

    else{
            echo "Unique Phone Number";
    }
    $connection->closeConnection($conobj);
}




?>