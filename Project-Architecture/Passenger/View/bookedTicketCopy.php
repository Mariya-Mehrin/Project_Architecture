<?php
 include "../Model/dataBaseConnection.php";
session_start();
$arrival=$_SESSION['arrival'] ?? "";
$class=$_SESSION['class'] ?? "";
$date=$_SESSION['dd'] ?? "";
$departure =  $_SESSION["departure"];
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
        <link rel="stylesheet" href="../Public/css/BookedTicket.css">
    </head>
    <body>
        <div class="container">

         <button type="button" onclick="window.location.href='payment.php'">
    Back
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
