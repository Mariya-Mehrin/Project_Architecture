<?php
include "../Model/dataBaseConnection.php";
$Phone="";
// $Phone=$_POST["phone"];
$Phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : "";
if($Phone==" "){
    echo "Phone Number Empty";
}
else{

    $connection=new DatabaseConnection();
    $conobj=$connection->openConnection();
    $result=$connection->checkExistingUser($conobj,"users",$Phone);
    if ($result->num_rows > 0)
    {
        echo "Unique Phone Number";
    }

    else{
           
            echo "Phone Number Already Used";
    }
    $connection->closeConnection($conobj);
}




?>