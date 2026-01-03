<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Public/css/Payment.css">
    </head>
    <body>
        <div class="container">
             <button type="button" id="b" onclick="window.location.href='chooseSeat.php'">
    Back
</button><br>


<button type="button" id="btn1" style="background-color:pink;margin-left:120px;width:200px"
onclick="disableBtn1()" ondblclick="enableBtn1()"
>   bKash
</button><br><br>
<button type="button" id="btn2" style="background-color:orange;margin-left:120px;width:200px"
onclick="style='background-color:blue;width:210px;margin-left:120px'" ondblclick="style='background-color:orange;width:200px;margin-left:120px'">
    Nagad
</button><br><br>
<button type="button" id="btn3" style="background-color:yellow;margin-left:120px;width:200px"
onclick="style='background-color:blue;width:210px;margin-left:120px'" ondblclick="style='background-color:yellow;width:200px;margin-left:120px'">
    Upay
</button><br>

<script>
    function disableBtn1() {
    document.getElementById("btn2").disabled = true;
    document.getElementById("btn3").disabled = true;

    let b1 = document.getElementById("btn1");
    b1.style.backgroundColor = "blue";
    b1.style.width = "210px";
  }

  function enableBtn1() {
    document.getElementById("btn2").disabled = false;
    document.getElementById("btn3").disabled = false;

    let b1 = document.getElementById("btn1");
    b1.style.backgroundColor = "pink";
    b1.style.width = "200px";
  }

  function disableBtn2() {
    document.getElementById("btn2").disabled = true;
    document.getElementById("btn3").disabled = true;

    let b1 = document.getElementById("btn1");
    b1.style.backgroundColor = "blue";
    b1.style.width = "210px";
  }

  function enableBtn2() {
    document.getElementById("btn2").disabled = false;
    document.getElementById("btn3").disabled = false;

    let b1 = document.getElementById("btn1");
    b1.style.backgroundColor = "blue";
    b1.style.width = "200px";
  }
</script>

<p id="err" style="color:red;text-align:center"></p>
<button type="button" style="background:lightblue;height:30px;width:200px;margin-left:120px" onclick="checkBlue()" >Next</button> <br><br>

<script>
function checkBlue() {
    if(document.getElementById("btn1").style.backgroundColor==="blue" ||
      document.getElementById("btn2").style.backgroundColor==="blue" ||
      document.getElementById("btn3").style.backgroundColor==="blue"){
        document.getElementById("err").innerHTML=" ";
        window.location.href='./bookedTicketCopy.php';
      }
      else{
        document.getElementById("err").innerHTML="Please select a payment method first!"
      }
}
</script>

        </div>
    </body>
</html>