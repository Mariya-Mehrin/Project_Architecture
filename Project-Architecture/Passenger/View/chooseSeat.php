<?php
session_start();

 $departure=$_SESSION['departure'] ?? "";

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
Price:  <input type="text" value="5000" style="display:center"><br><br><br>
        <button id="btn1" onclick="enableBtn1()" ondblclick="disableBtn1() ">1</button>
        &nbsp;&nbsp;&nbsp;
        <button id="btn2" onclick="enableBtn2()" ondblclick="disableBtn2()">2</button>
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        <button id="btn5" onclick="enableBtn5()" ondblclick="disableBtn5()">5</button>
        &nbsp;&nbsp;&nbsp;
        <button id="btn6" onclick="enableBtn6()" ondblclick="disableBtn6()">6</button>

        <br><br>

        <button id="btn3" onclick="enableBtn3()" ondblclick="disableBtn3()">3</button>
        &nbsp;&nbsp;&nbsp;
        <button id="btn4" onclick="enableBtn4()" ondblclick="disableBtn4()">4</button>
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        <button id="btn7" onclick="enableBtn7()" ondblclick="disableBtn7()">7</button>
        &nbsp;&nbsp;&nbsp;
        <button id="btn8" onclick="enableBtn8()" ondblclick="disableBtn8()">8</button>

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