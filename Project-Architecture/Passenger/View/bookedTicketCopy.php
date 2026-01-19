<?php
 include "../Model/dataBaseConnection.php";
session_start();
$arrival=$_SESSION['arrival'] ?? "";
$class=$_SESSION['class'] ?? "";
$date=$_SESSION['dd'] ?? "";
$departure =  $_SESSION["departure"];
$email = $_SESSION["email"] ??"";
if($class=="Economy"){
  $price="5000";
 }
 if($class=="Business"){
  $price="10000";
 }
 if($class=="Economy"){
  $price="5000";
 }
 if($class=="Premium"){
  $price="15000";
 }
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


$flight_id=$_SESSION['flight_id'] ?? "";

     //echo "Selected Flight ID: " . $flight_id;
    $seatNo=$_SESSION['seatNo'] ?? "";

    // echo "Selected seatNo2: " . $seatNo;

     $db = new DatabaseConnection();
    $connection = $db->openConnection();
    $status="Booked";
   $ticket = $db->addTicket($connection, "tickets",$seatNo, $status,$user['id'],$flight_id,$price,$class);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Public/css/BookedTicket.css">
    </head>
    <body>
        <div class="container">

         <button type="button" onclick="window.location.href='payment.php'">
    Back
</button>
 <button type="button" onclick="window.location.href='dashBoard.php'">
    Go to Home
</button><br><br>

    ID: <?php echo $user['id'];?><br><br>
    NAME: <?php echo $user['name'];?><br><br>
    EMAIL: <?php echo $user['email'];?><br><br>
    PHONE NO.: <?php echo $user['phone'];?><br><br>
    ROLE: <?php echo $user['role'];?><br><br>
  
         <img src="<?php echo $user['filepath'];?>" alt="" width="200" height="200"><br><br>
             <?php
          echo "Departure:$departure <br> <br>";
          echo "Arrival :$arrival <br> <br>";
          echo "Class: $class <br> <br>";
          echo "Journey Date: $date <br>";
          ?>
    </div>
    </body>
</html>
