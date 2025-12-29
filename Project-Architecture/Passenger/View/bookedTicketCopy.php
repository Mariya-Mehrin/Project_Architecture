<?php
 include "../Model/dataBaseConnection.php";
session_start();

// $departure=$_REQUEST['departure'] ?? "";
$arrival=$_REQUEST['arrival'] ?? "";
$class=$_REQUEST['class'] ?? "";
$date=$_REQUEST['dd'] ?? "";
$departure =  $_SESSION["departure"];

// if(isset($_POST['departure'])){
//     $_SESSION['departure'] = $_POST['departure']; // store in session if needed
//     $departure = $_POST['departure'];
//     echo "Selected Departure: ".$departure;
// } else {
//     echo "No departure selected!";
// }


$email = $_SESSION["email"] ??"";
if(!$email){
    Header("Location: loginForm.php");
}
$db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->checkExistingUser($connection, "users", $email);
if(!$result || $result->num_rows ==0){
    echo "User not found";
    exit;
 }
$user = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 8px;
            background-color: lightgrey;
        }
        body {
            margin-left: 20%;
            margin-right: 20%;
        }
        </style>
    </head>
    <body>
        <div class="container">
             <?php
          foreach($user as $column =>$value){
            echo "<br>$column : $value <br>";
          }
          ?>
             <?php
        
          echo " Departure:$departure";
          echo $arrival;
          echo $class;
          echo $date;
          ?>
    </div>
    </body>
</html>
