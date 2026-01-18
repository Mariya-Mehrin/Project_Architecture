<?php
include "../Model/dataBaseConnection.php";
session_start();

 $departure=$_SESSION['departure'] ?? "";
 $class = $_SESSION['class'] ?? '';
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

if (isset($_POST['flight_id']) && $_POST['flight_id'] != '') {
    $_SESSION['flight_id'] = $_POST['flight_id'];
     "Selected Flight ID: " . $_SESSION['flight_id'];
 } 
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Public/css/ChooseSeat.css">
 </head>
    <body>
        <form method="post" action="payment.php">
    <div class="container">
         <button type="button" id="b" onclick="window.location.href='flightList.php'">
    Back
</button><br>
Price:  <input type="text" value="<?php echo $price ?>" style="display:center"><br><br><br>
<?php 
$seatNo=1;
$is_button_disabled1=false;
$is_button_disabled2=false;
$is_button_disabled3=false;
$is_button_disabled4=false;
$is_button_disabled5=false;
$is_button_disabled6=false;
$is_button_disabled7=false;
$is_button_disabled8=false;
$db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->checkBookedTicket($connection, "tickets", $seatNo);
$user = $result->fetch_assoc();
if($result && $result->num_rows > 0){
if($user["seatNo"]==$seatNo){
  $is_button_disabled1 = true;
}
}
$seatNo2=2;
    $result2 = $db->checkBookedTicket($connection, "tickets", $seatNo2);
    $user2 = $result2->fetch_assoc();
    if($result2 && $result2->num_rows > 0){
    if($user2["seatNo"]==$seatNo2){
  $is_button_disabled2 = true;
}
    }
$seatNo3=3;
    $result3 = $db->checkBookedTicket($connection, "tickets", $seatNo3);
    $user3 = $result3->fetch_assoc();
    if($result3 && $result3->num_rows > 0){
if($user3["seatNo"]==$seatNo3){
  $is_button_disabled3 = true;
}
    }
$seatNo4=4;
    $result4 = $db->checkBookedTicket($connection, "tickets", $seatNo4);
    $user4 = $result4->fetch_assoc();
    if($result4 && $result4->num_rows > 0)
if($user4["seatNo"]==$seatNo4){
  $is_button_disabled4 = true;
}
$seatNo=5;
    $result = $db->checkBookedTicket($connection, "tickets", $seatNo);
if($user["seatNo"]==$seatNo){
  $is_button_disabled5 = true;
}
$seatNo=6;
    $result = $db->checkBookedTicket($connection, "tickets", $seatNo);
if($user["seatNo"]==$seatNo){
  $is_button_disabled6= true;
}
$seatNo=7;
    $result = $db->checkBookedTicket($connection, "tickets", $seatNo);
if($user["seatNo"]==$seatNo){
  $is_button_disabled7 = true;
}
$seatNo=8;
    $result = $db->checkBookedTicket($connection, "tickets", $seatNo);
if($user["seatNo"]==$seatNo){
  $is_button_disabled8 = true;
}
  ?>
        <button id="btn1" <?php if ($is_button_disabled1) { echo 'disabled'; }?> onclick="enableBtn1()" ondblclick="disableBtn1() ">1</button>
        &nbsp;&nbsp;&nbsp;
        <button id="btn2" <?php if ($is_button_disabled2) { echo 'disabled'; }?> onclick="enableBtn2()" ondblclick="disableBtn2()">2</button>
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        <button id="btn5" <?php if ($is_button_disabled5) { echo 'disabled'; }?> onclick="enableBtn5()" ondblclick="disableBtn5()">5</button>
        &nbsp;&nbsp;&nbsp;
        <button id="btn6" <?php if ($is_button_disabled6) { echo 'disabled'; }?> onclick="enableBtn6()" ondblclick="disableBtn6()">6</button>

        <br><br>

        <button id="btn3" <?php if ($is_button_disabled3) { echo 'disabled'; }?> onclick="enableBtn3()" ondblclick="disableBtn3()">3</button>
        &nbsp;&nbsp;&nbsp;
        <button id="btn4" <?php if ($is_button_disabled4) { echo 'disabled'; }?> onclick="enableBtn4()" ondblclick="disableBtn4()">4</button>
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        <button id="btn7" <?php if ($is_button_disabled7) { echo 'disabled'; }?> onclick="enableBtn7()" ondblclick="disableBtn7()">7</button>
        &nbsp;&nbsp;&nbsp;
        <button id="btn8" <?php if ($is_button_disabled8) { echo 'disabled'; }?> onclick="enableBtn8()" ondblclick="disableBtn8()">8</button>

        <br><br><br>
        <input type="hidden" name="seatNo" id="seatNo">
        <script>
    function disableBtn1() {
    let b1 = document.getElementById("btn1");
    b1.style.backgroundColor = "white";
    document.getElementById("next").disabled=true;
  }

  function enableBtn1() {
    let b1 = document.getElementById("btn1");
    b1.style.backgroundColor = "blue";
    document.getElementById("next").disabled=false;
    document.getElementById("seatNo").value=1;
  }

   function disableBtn2() {
    let b1 = document.getElementById("btn2");
    b1.style.backgroundColor = "white";
    document.getElementById("next").disabled=true;
  }

  function enableBtn2() {
    let b1 = document.getElementById("btn2");
    b1.style.backgroundColor = "blue";
    document.getElementById("next").disabled=false;
    document.getElementById("seatNo").value=2;
  }

   function disableBtn3() {
    let b1 = document.getElementById("btn3");
    b1.style.backgroundColor = "white";
    document.getElementById("next").disabled=true;
  }

  function enableBtn3() {
    let b1 = document.getElementById("btn3");
    b1.style.backgroundColor = "blue";
    document.getElementById("next").disabled=false;
    document.getElementById("seatNo").value=3;
  }
   function disableBtn4() {
    let b1 = document.getElementById("btn4");
    b1.style.backgroundColor = "white";
    document.getElementById("next").disabled=true;
  }

  function enableBtn4() {
    let b1 = document.getElementById("btn4");
    b1.style.backgroundColor = "blue";
    document.getElementById("next").disabled=false;
    document.getElementById("seatNo").value=4;
  }
   function disableBtn5() {
    let b1 = document.getElementById("btn5");
    b1.style.backgroundColor = "white";
    document.getElementById("next").disabled=true;
  }

  function enableBtn5() {
    let b1 = document.getElementById("btn5");
    b1.style.backgroundColor = "blue";
    document.getElementById("next").disabled=false;
    document.getElementById("seatNo").value=5;
  }
   function disableBtn6() {
    let b1 = document.getElementById("btn6");
    b1.style.backgroundColor = "white";
    document.getElementById("next").disabled=true;
  }

  function enableBtn6() {
    let b1 = document.getElementById("btn6");
    b1.style.backgroundColor = "blue";
    document.getElementById("next").disabled=false;
    document.getElementById("seatNo").value=6;
  }

   function disableBtn7() {
    let b1 = document.getElementById("btn7");
    b1.style.backgroundColor = "white";
    document.getElementById("next").disabled=true;
  }

  function enableBtn7() {
    let b1 = document.getElementById("btn7");
    b1.style.backgroundColor = "blue";
    document.getElementById("next").disabled=false;
    document.getElementById("seatNo").value=7;
  }

   function disableBtn8() {
    let b1 = document.getElementById("btn8");
    b1.style.backgroundColor = "white";
    document.getElementById("next").disabled=true;
  }

  function enableBtn8() {
    let b1 = document.getElementById("btn8");
    b1.style.backgroundColor = "blue";
    document.getElementById("next").disabled=false;
    document.getElementById("seatNo").value=8;
  }
</script>


 <button type="submit" id="next" style="background:lightblue;height:30px;width:200px;"  disabled>Next</button> <br><br>
         <!-- <?php 

            echo "Departure:$departure";
         ?> -->
         
         
</div>
</form>
    </body>
</html>