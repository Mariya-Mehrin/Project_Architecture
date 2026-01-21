<?php 
 include "../Model/dataBaseConnection.php";
session_start();
 $id=$_SESSION['user_id'];

$db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->checkBookingHistory($connection, "tickets", $id);
    $ticket = $result->fetch_assoc();
    //echo $ticket['flightId'];
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        foreach($_POST as $key => $value){
            if(!empty($key) && strpos($key, "feedback_") !==false){
                $flightId= explode("feedback_" ,$key)[1]; //take the flightId value from name
                $feedback=$_POST["feedback_$flightId"] ?? "";
                $rating=$_POST["rating_$flightId"] ?? 0;
                 $db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result3 = $db-> InsertData($connection, "reviews", $id,$flightId,$feedback,$rating);
    
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="../Public/css/rating.css">

</head>
<body>
<div class="container">
     <button type="button" onclick="window.location.href='dashBoard.php'" style="background:lightblue;text-align:left">
    Back to Home
</button><br><br><br>
<?php 

 if($_SERVER["REQUEST_METHOD"]=="POST"){
        echo "FeedBack:" .$feedback. "<br>";
        echo "Rating:" .$rating. "<br>";
}

if($result->num_rows == 0){
        echo "No Flight Experinace!!";
    }
    else{
     $trackFlights=[];
       while($ticket = $result->fetch_assoc()){
$flightId = $ticket['flightId'];

if(in_array($flightId,$trackFlights)){
    continue;
}
$trackFlights[]=$flightId;

$db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result2 = $db->searchFlight($connection, "flights", $ticket['flightId']);

   // $result2 = $db->searchFlight($connection, "flights", $ticket['flightId']);

// if ($result2 && $result2->num_rows > 0) {
//     $flight = $result2->fetch_assoc();
//     $name = $flight['name'];

//    // echo "<div style='border:1px solid #000; margin:10px; padding:10px'>";
//     echo "<h4>FLIGHT NAME: $name</h4>";
//    // echo "<h6>FLIGHT ID: $flightId</h6>";
    
// }


    $flight=$result2->fetch_assoc();
    $name=$flight['name'];

    if($result2->num_rows > 0){
        echo "<div style='border:1px solid #000; margin:10px; padding:10px'>";
        echo "<h4>FLIGHT NAME: $name</h4>";
        echo "<h6>FLIGHT ID: $flightId</h6>";

        echo "<form method='post' action=''>";
        echo "<p>How Was Your Experience?</p>";
        echo "<input type='radio' name='feedback_$flightId' value='Too Good'> Too Good<br>";
        echo "<input type='radio' name='feedback_$flightId' value='Average'> Average<br>";
        echo "<input type='radio' name='feedback_$flightId' value='Poor'> Poor<br>";
        echo "<p>Rating:</p>";
        echo "<div class='stars' data-flight='$flightId'>";
        for($i=1;$i<=5;$i++){
            echo "<input type='checkbox' id='star{$flightId}_$i' class='star'> ";
            echo "<label for='star{$flightId}_$i'>★</label>";
        }
        echo "</div>";
        echo "<p> Selected Stars:<span class='count' data-flight='$flightId'>0</span></p>";
        echo "<input type='hidden' name='rating_$flightId' class='ratingInput'>";

        echo "<button type='submit'>Submit</button>";
        echo "</form>";
        echo "</div>";
    }
 }
    }
    ?>
</div>
<script src="..\Controller\Js\rating.js"></script>
</body>
</html>
