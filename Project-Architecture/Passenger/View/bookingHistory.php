<?php
include "../Model/dataBaseConnection.php";
session_start();
$id=$_SESSION['user_id'];

$db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->checkBookingHistory($connection, "tickets", $id);

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Public/css/bookingHistory.css">
    </head>
    <body>
         <div class="container">
         <button type="button" onclick="window.location.href='dashboard.php'">
    Back
</button><br><br>
        
    <?php
    if(!$result){
        echo "Failed to Search.";
    }
    else if($result->num_rows == 0){
        echo "No Ticket Booked!!";
    }
    else{
        while($ticket=$result->fetch_assoc()){
            echo "<div style='border:1px solid #000; margin:10px; padding:10px'>";
            echo "Ticket ID:" .$ticket['id'] . "<br>";
            echo "Seat No.:" .$ticket['seatNo'] . "<br>";
            echo "Flight ID:" .$ticket['flightId'] . "<br>";
            echo "Status:" .$ticket['status'] . "<br>";


            echo "<form method='post' style='margin-top:5px;'>";
    echo "<input type='hidden' name='ticket_id' value='" . $ticket['id'] . "'>";
echo '<button type="button" onclick="window.location.href=\'refundDetails.php?ticket_id='.$ticket['id'].'\'">
            Cancel Ticket
          </button>';
    echo "</form>";



            echo "</div>";
        }
    }
?>
</div>
    </body>
    </html>