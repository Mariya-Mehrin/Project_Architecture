<?php 
class DatabaseConnection{

    function openConnection(){
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "airlinemanagement";

        $connection = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if($connection->connect_error){
            die("Failed to connect database ".$connection->connect_error);
        }
        return $connection;
     }

    function registration($connection,$tableName,$name, $email, $password,$phone,$role, $filepath){
        $sql = "INSERT INTO ".$tableName." (name,email, password, phone,role,filepath) VALUES ('".$name."','".$email."', '".$password."','".$phone."','".$role."', '".$filepath."')";
        $result = $connection->query($sql);
        return $result;
    }
     function allUser($connection,$tableName,$name, $email, $password,$phone,$role, $filepath){
        $sql = "INSERT INTO ".$tableName." (name,email, password, phone,role,filepath) VALUES ('".$name."','".$email."', '".$password."','".$phone."','".$role."', '".$filepath."')";
        $result = $connection->query($sql);
        return $result;
    }

    function signin($connection, $tableName, $email, $password){
        $sql = "SELECT * FROM ".$tableName." WHERE email='".$email."' AND password='".$password."'";
        $result = $connection->query($sql);
        return $result;
    }

    function checkExistingUser($connection, $tableName, $email){
        $sql = "SELECT * FROM ".$tableName." WHERE email='".$email."'";
        $ticket = $connection->query($sql);
        return $ticket;
    }
 function addTicket($connection,$tableName,$seatNo, $status,$passengerId,$flightId){
        $sql = "INSERT INTO ".$tableName." (seatNo,status, passengerId,flightId) VALUES ('".$seatNo."', '".$status."','".$passengerId."','".$flightId."')";
        $result = $connection->query($sql);
        return $result;
    }

function updateUserPassword($connection,$tableName,$email,$newPassword){
    $sql="UPDATE " . $tableName ." SET password='".$newPassword."' WHERE email='".$email."'";
    return $connection->query($sql);
}

    function closeConnection($connection){
        $connection->close();
    }
}




?>