<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Public/css/Journey.css">
        </script>
</head>
<body>
    <div class="container">
    <form  id="myForm" method="post" action="flightList.php">
         <button type="button" onclick="window.location.href='dashboard.php'">
    Back
</button>
<br><br>
        <fieldset>
            <legend></legend>
            <div style="display:inline-block;width:100px">
                 Departure:
           <select id="departure" name="departure">
            <option value=""></option>
            <option value="Dhaka">Dhaka</option>
            <option value="Sylhet">Sylhet</option>
            <!-- <option value="Jessore">Jessore</option>
            <option value="Saidpur">Saidpur</option>
            <option value="Barishal">Barishal</option> -->

           </select>
            </div>
           <div style="display:inline-block;width:100px">
           Arrival:
           <select id="arrival" name="arrival">
            <option value=""></option>
            <option value="Dhaka">Dhaka</option>
            <option value="Sylhet" >Sylhet</option>
            <!-- <option  value="Jessore">Jessore</option>
            <option value="Saidpur">Saidpur</option>
            <option value="Barishal">Barishal</option> -->

           </select>
    </div>
        <br><br>
        Class:<br>
           <select id="class" name="class">
            <option value=""></option>
            <option value="Economy">Economy</option>
            <option value="Business" >Business</option>
            <option value="Premium" >Premium</option>
           </select>
           <br><br>
           Journey Date:<input type="date" id="dd" name="dd">
           <br><br>
            <p id="nextErr"></p>
            <button type="submit" id="" onclick="nextBtn()">Next</button>
           <script>

         function nextBtn(){
            let x=document.getElementById("departure").value;
         let y=document.getElementById("arrival").value;
         let z=document.getElementById("class").value;
         let a=document.getElementById("dd").value;
         if( a==="" ||  x==="" || y==="" || z===""){
            document.getElementById("nextErr").innerHTML="Input required !!";
            return;
         }
        
         if(x===y){
            document.getElementById("nextErr").innerHTML="Departure and arrival cannot be same!!";
            return;
         }
        
          document.getElementById("nextErr").innerHTML=" ";
         window.location.href='flightList.php';
         }
     </script>
        </fieldset>
       
    </form>
</div>
</body>
</html>