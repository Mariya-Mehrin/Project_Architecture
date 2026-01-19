<?php
session_start();
 include "../Model/dataBaseConnection.php";

 if(isset($_GET['ticket_id'])){
    $_SESSION['refund'] = $_GET['ticket_id'];
} 
$success=false;
$deleted=false;
 $db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->searchTicket($connection, "tickets", $_SESSION['refund']);
    if(!$result || $result->num_rows ==0){
        $deleted=true;
    }
    $user = $result->fetch_assoc();
if(isset($_POST["confirm"])){
$db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->deleteTicket($connection, "tickets", $_SESSION['refund']);

    if($result){
        $success=true;
        unset($_SESSION['refund']);
 }

}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Public/css/Registration.css">
       
</head>
<body>
    <div class="container">
    <form method="post"   >
        <fieldset>
            <legend>Refund Details</legend>
            <button type="button" id="b" onclick="window.location.href='bookingHistory.php'">
    Back
</button><br><br><br>
<!-- <?php  echo "Ticket ID: " . $_SESSION['refund'];?> -->
    
    <!-- ID: <?php echo $user['id'];?><br><br>
    Seat NO.: <?php echo $user['seatNo'];?><br><br>
    Status: <?php echo $user['status'];?><br><br>
    Passenger ID: <?php echo $user['passengerId'];?><br><br>
    Flight ID: <?php echo $user['flightId'];?><br><br>
    Price: <?php echo $user['price'];?><br><br>
    Class: <?php echo $user['class'];?><br><br> -->
<?php 
if($deleted){
    echo "Ticket is in Refund.";
   exit;
 }
 ?>
  ID: <?php echo $user['id'];?><br><br>
    Seat NO.: <?php echo $user['seatNo'];?><br><br>
    Status: <?php echo $user['status'];?><br><br>
    Passenger ID: <?php echo $user['passengerId'];?><br><br>
    Flight ID: <?php echo $user['flightId'];?><br><br>
    <h3><p style="color:red">Deduct 10% for Refund.</p></h3>
    Actual Price: <?php echo $user['price'];?><br><br>
    Refund Amount: <?php echo $user['price']-$user['price'] * 0.1 ;?><br><br>
    Class: <?php echo $user['class'];?><br><br>
  <button type="submit" name="confirm" >
    Confirm Refund
</button><br>
<?php 
if($success){
    echo "Refund successful!!";
   
 }
 ?>
</fieldset>
</form>
</div>
</body>
</html>