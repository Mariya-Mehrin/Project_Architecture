<?php
session_start();

$departure=$_SESSION['departure'] ?? "";



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
            text-align:center;
        }
        body {
            margin-left: 20%;
            margin-right: 20%;
        }
        button{
            width:50px;
        }
        #b{
            margin-left:-750px;
            margin-top:0px
        }
        </style>
 </head>
    <body>
        
    <div class="container">
         <button type="button" id="b" onclick="window.location.href='flightList.php'">
    Back
</button><br>
Price:  <input type="text" value="5000" style="display:center"><br><br><br>
        <button>1</button>
        &nbsp;&nbsp;&nbsp;
        <button>2</button>
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        <button>5</button>
        &nbsp;&nbsp;&nbsp;
        <button>6</button>

        <br><br>

        <button>3</button>
        &nbsp;&nbsp;&nbsp;
        <button>4</button>
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        <button>7</button>
        &nbsp;&nbsp;&nbsp;
        <button>8</button>

        <br><br><br>
 <button type="button" style="background:lightblue;height:30px;width:200px;" onclick="window.location.href='payment.php'" >Next</button> <br><br>
         <?php 

            echo "Departure:$departure";
         ?>
         
         
</div>
    </body>
</html>