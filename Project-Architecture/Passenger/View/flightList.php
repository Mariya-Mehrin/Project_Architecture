<?php
session_start();
$departure = $_POST['departure'] ?? '';
 $arrival = $_POST['arrival'] ?? '';
 $class = $_POST['class'] ?? '';
 $date = $_POST['dd'] ?? '';
 // $flightId=$_POST["flight_id"] ?? "";
$expire = time() + 300; 
$departure = $_POST['departure'] ?? $_COOKIE['departure'] ?? "";
$arrival   = $_POST['arrival'] ?? $_COOKIE['arrival'] ?? "";
$dd        = $_POST['dd'] ?? $_COOKIE['dd'] ?? "";
$class     = $_POST['class'] ?? $_COOKIE['class'] ?? "";
if (!empty($_POST)) {
    setcookie("departure", $departure, $expire, "/");
    setcookie("arrival", $arrival, $expire, "/");
    setcookie("dd", $dd, $expire, "/");
    setcookie("class", $class, $expire, "/");
}


if (isset($_POST['next'])) {
    $flightId=$_POST["flight_id"];
        // header("Location: chooseSeat.php");       
        // exit();
       $_SESSION["flight_id"]=$_POST["flight_id"];
    }

 
if($departure){
    echo "<h2>You selected: $departure</h2>";
    $_SESSION["departure"] = $departure;
    $_SESSION["arrival"] = $arrival;
    $_SESSION["class"] = $class;
    $_SESSION["dd"] = $date;

 }
//  else {
//     echo "<h2>No departure selected!</h2>";
// }

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Public/css/FlightList.css">
    </head>
    <body>
        <form method="post" action="chooseSeat.php">
        <div class="container" >
<button type="button" onclick="window.location.href='back.php'" style="background:lightblue;text-align:left">
    Back
</button>
<div style="text-align:center">
            <h3>...Choose Your Flight...</h3>

            <?php
if ($departure == "Dhaka") {
 $departure="Dhaka";
    echo '
    <input type="button" id="btn1"
        value="Flight-A &#10 Departure:8AM &#10 Arrival:9AM"
        style="width:200px;"
        onclick="enableBtn1()"
        ondblclick="disableBtn1()">
    <br><br>

    <input type="button" id="btn2"
        value="Flight-B &#10 Departure:10AM &#10 Arrival:12PM"
        style="width:200px;"
        onclick="enableBtn2()"
        ondblclick="disableBtn2()">
    <br><br>
    ';

} if($departure == "Sylhet") {
 $departure="Sylhet";
    echo '
    <input type="button" id="btn3"
        value="Flight-C &#10 Departure:12PM &#10 Arrival:2PM"
        style="width:200px;"
        onclick="enableBtn3()"
        ondblclick="disableBtn3()">
    <br><br>

    <input type="button" id="btn4"
        value="Flight-D &#10 Departure:5PM &#10 Arrival:7PM"
        style="width:200px;"
        onclick="enableBtn4()"
        ondblclick="disableBtn4()">
    <br><br>
    ';
}
?>
<input type="hidden" name="flight_id" id="flight_id">

<script>
    function disableBtn1() {
    document.getElementById("btn2").disabled = false;
    let b1 = document.getElementById("btn1");
    b1.style.backgroundColor = "white";
    b1.style.width = "210px";
    document.getElementById("next").disabled=true;
    document.getElementById("flight_id").value="";
  }

  function enableBtn1() {
    document.getElementById("btn2").disabled = true;
    let b1 = document.getElementById("btn1");
    b1.style.backgroundColor = "blue";
    b1.style.width = "200px";
    document.getElementById("next").disabled=false;
    document.getElementById("flight_id").value=1;
  }

  function disableBtn2() {
    document.getElementById("btn1").disabled = false;
    document.getElementById("next").disabled=true;
    let b1 = document.getElementById("btn2");
    b1.style.backgroundColor = "white";
    b1.style.width = "210px";
    document.getElementById("flight_id").value="";
  }

  function enableBtn2() {
    document.getElementById("btn1").disabled = true;
    document.getElementById("next").disabled=false;
    let b1 = document.getElementById("btn2");
    b1.style.backgroundColor = "blue";
    b1.style.width = "200px";
     document.getElementById("flight_id").value=2;
  }

  function disableBtn3() {
    document.getElementById("btn4").disabled = false;
    document.getElementById("next").disabled=true;
    let b1 = document.getElementById("btn3");
    b1.style.backgroundColor = "white";
    b1.style.width = "210px";
    document.getElementById("flight_id").value="";
  }

  function enableBtn3() {
    document.getElementById("btn4").disabled = true;
    document.getElementById("next").disabled=false;
    let b1 = document.getElementById("btn3");
    b1.style.backgroundColor = "blue";
    b1.style.width = "200px";
    document.getElementById("flight_id").value=3;
  }

  function disableBtn4() {
    document.getElementById("btn3").disabled = false;
    document.getElementById("next").disabled=true;
    let b1 = document.getElementById("btn4");
    b1.style.backgroundColor = "white";
    b1.style.width = "210px";
    document.getElementById("flight_id").value="";
  }

  function enableBtn4() {
    document.getElementById("btn3").disabled = true;
    document.getElementById("next").disabled=false;
    let b1 = document.getElementById("btn4");
    b1.style.backgroundColor = "blue";
    b1.style.width = "200px";
    document.getElementById("flight_id").value=4;
  }
</script>


         <button type="submit" id="next" style="background:lightblue;height:40px;width:200px;"  disabled>Next</button> <br><br>
         </div>
    </div>
</form>
    </body>
</html>