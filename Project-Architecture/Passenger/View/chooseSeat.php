<?php
include "../Model/dataBaseConnection.php";
session_start();
$flightId=$_POST["flight_id"] ?? "";
$db = new DatabaseConnection();
$connection = $db->openConnection();


if (isset($_POST['next'])) {
    if (!empty($_POST['seatNo'])) {
        $_SESSION['seatNo'] = $_POST['seatNo'];
        header("Location: payment.php");       
        exit();
    }
}

echo $_SESSION['flight_id'] ;
?>

<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" href="../Public/css/ChooseSeat.css"> 
    <style>
         button { width: 50px; height: 30px; margin: 5px; } 
    </style>
</head>
<body>
  <div class="container">
   <button type="button" id="b" onclick="window.location.href='flightList.php'">
    Back
</button><br>
<form method="post">
    <h3>Select Your Seat</h3>

    <?php
    for ($i = 1; $i <= 8; $i++) {
        $result = $db->checkBookedTicket($connection, "tickets", $i);
        $disabled = ($result && $result->num_rows > 0) ? "disabled" : "";

        echo "<button type='button' id='btn$i' $disabled onclick='selectSeat($i)'>$i</button>";
        if ($i % 2 == 0) echo "<br>";
    }
    ?>

    <input type="hidden" name="seatNo" id="seatNo">
    <br>
    <button type="submit" name="next" id="next" disabled style="width:200px; height:30px; background:lightblue;">
        Next
    </button>


<script>
function selectSeat(seat) {

    for (let i = 1; i <= 8; i++) {
        let btn = document.getElementById("btn" + i);
        if (btn && !btn.disabled) btn.style.backgroundColor = "white";
    }

    
    let selected = document.getElementById("btn" + seat);
    selected.style.backgroundColor = "blue";

    
    document.getElementById("seatNo").value = seat;
    document.getElementById("next").disabled = false;
}
</script>
</form>
</div>
</body>
</html>
