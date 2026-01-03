<?php
session_start();
 $departure = $_POST['departure'] ?? '';
 $arrival = $_POST['arrival'] ?? '';
 $class = $_POST['class'] ?? '';
 $date = $_POST['dd'] ?? '';

if($departure){
    echo "<h2>You selected: $departure</h2>";
    $_SESSION["departure"] = $departure;
    $_SESSION["arrival"] = $arrival;
    $_SESSION["class"] = $class;
    $_SESSION["dd"] = $date;

} else {
    echo "<h2>No departure selected!</h2>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Public/css/FlightList.css">
    </head>
    <body>
        <div class="container" >
<button type="button" onclick="window.location.href='journeyDetails.php'" style="background:lightblue;text-align:left">
    Back
</button>
<div style="text-align:center">
            <h3>...Choose Your Flight...</h3>
            <input type="button" value="Flight-A &#10 Departure:8AM &#10  Arrival:10AM" style="width:200px;" onclick="style='background-color:blue;width:250px'" ondblclick="style='background-color;lightgrey;width:200px'"><br><br>
            <input type="button" value="Flight-B &#10 Departure:10AM &#10 Arrival:12PM " style="width:200px" onclick="style='background-color:blue;width:250px'" ondblclick="style='background-color;lightgrey;width:200px'"> <br><br>
            <input type="button" value="Flight-C &#10 Departure:12PM &#10 Arrival:2PM" style="width:200px" onclick="style='background-color:blue;width:250px'" ondblclick="style='background-color;lightgrey;width:200px'"> <br><br>
            <input type="button" value="Flight-D &#10 Departure:5PM &#10  Arrival:7AM" style="width:200px" onclick="style='background-color:blue;width:250px'" ondblclick="style='background-color;lightgrey;width:200px'"> <br><br>
       
         <button type="button" style="background:lightblue;height:40px;width:200px;" onclick="window.location.href='chooseSeat.php'" >Next</button> <br><br>
         </div>
    </div>
    </body>
</html>