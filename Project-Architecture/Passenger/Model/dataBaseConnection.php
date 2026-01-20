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
function addProfilePicture($connection,$tableName,$email, $profilePicture){
         $sql="UPDATE " . $tableName ." SET profilePicture='".$profilePicture."' WHERE email='".$email."'";
    return $connection->query($sql);
    }

    function signin($connection, $tableName, $email, $password){
        $sql = "SELECT * FROM ".$tableName." WHERE email='".$email."' AND password='".$password."'";
        $result = $connection->query($sql);
        return $result;
    }

    function checkExistingUser($connection, $tableName, $email){
        $sql = "SELECT * FROM ".$tableName." WHERE email='".$email."'";
        $user = $connection->query($sql);
        return $user;
    }

     function checkBookedTicket($connection, $tableName, $seatNo){
        $sql = "SELECT * FROM ".$tableName." WHERE seatNo='".$seatNo."'";
        $ticket = $connection->query($sql);
        return $ticket;
    }

 function checkBookingHistory($connection, $tableName, $id){
        $sql = "SELECT * FROM ".$tableName." WHERE passengerId='".$id."'";
        $result = $connection->query($sql);
        return $result;
    }

    function searchTicket($connection, $tableName, $id){
        $sql = "SELECT * FROM ".$tableName." WHERE id='".$id."'";
        $result = $connection->query($sql);
        return $result;
    }
function searchFlight($connection, $tableName, $id){
        $sql = "SELECT * FROM ".$tableName." WHERE id='".$id."'";
        $result = $connection->query($sql);
        return $result;
    }
    function searchReviews($connection, $tableName, $passengerId){
        $sql = "SELECT * FROM ".$tableName." WHERE passengerId='".$passengerId."'";
        $result = $connection->query($sql);
        return $result;
    }

function addTicket($connection,$tableName,$seatNo, $status,$passengerId,$flightId,$price,$class){
$connection->query("DELETE FROM tickets WHERE expire_at <=NOW()");
    $sql = "INSERT INTO $tableName (seatNo, status, passengerId, flightId,price,class, expire_at)
             VALUES ('".$seatNo."', '".$status."', '".$passengerId."', '".$flightId."','".$price."', '".$class."', NOW() + INTERVAL 1 DAY )";
    $result=$connection->query($sql);
return $result;
}


function updateUserPassword($connection,$tableName,$email,$newPassword){
    $sql="UPDATE " . $tableName ." SET password='".$newPassword."' WHERE email='".$email."'";
    return $connection->query($sql);
}
function editProfile($connection,$tableName,$email,$newEmail,$newName,$newRole){
    $sql="UPDATE " . $tableName ." SET email='".$newEmail."', name='".$newName."', role='".$newRole."' WHERE email='".$email."'";
    return $connection->query($sql);
}
function deleteTicket($connection,$tableName, $id) {

    $sql = " DELETE FROM " . $tableName . " WHERE id = $id ";

    return $connection->query($sql);
}

function addReview($connection,$tableName,$passengerId,$flightId,$feedback,$rating){
   $sql = "INSERT INTO ".$tableName." (passengerId,flightId,feedback,rating) VALUES ('".$passengerId."','".$flightId."', '".$feedback."','".$rating."')";
        $result = $connection->query($sql);
        return $result;
}

//sql injection
 function InsertData($connection,$table,$passengerId,$flightId,$feedback,$rating)
    {
        $sql = "INSERT INTO reviews (passengerId,flightId,feedback,rating) VALUES(?,?,?,?)";
        $stmt=$connection->prepare($sql); 
        $stmt->bind_param("iisi",$passengerId,$flightId,$feedback,$rating);
        $result = $stmt->execute();
        return $result;
    
    }

    function closeConnection($connection){
        $connection->close();
    }
}




?>