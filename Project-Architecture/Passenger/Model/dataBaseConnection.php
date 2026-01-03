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
        $result = $connection->query($sql);
        return $result;
    }

function UpdatePassword($connection, $email, $newPassword)
{
    // Remove hashing, store exactly what user enters
    $sql = "UPDATE users SET password = ? WHERE email = ?";
    $stmt = $connection->prepare($sql);
    if (!$stmt) die("Prepare failed: " . $connection->error);

    $stmt->bind_param("ss", $newPassword, $email);
    $stmt->execute();

    return $stmt->affected_rows > 0;
}



    function closeConnection($connection){
        $connection->close();
    }
}




?>