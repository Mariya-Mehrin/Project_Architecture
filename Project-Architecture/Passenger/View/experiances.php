<?php
include "../Model/dataBaseConnection.php";
session_start();
$id=$_SESSION['user_id'];

$db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->searchReviews($connection, "reviews", $id);

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Public/css/experiances.css">
        <style>
            
        </style>

</head>
<body>
    <div class="container">
    <button type="button" onclick="window.location.href='dashBoard.php'" style="background:lightblue;text-align:left">
    Back
</button><br><br><br>
        <fieldset>
            <legend>My Responses</legend>
 <?php
    if(!$result){
        echo "Failed to Search.";
    }
    else if($result->num_rows == 0){
        echo "No Experiances!!";
    }
    else{
         $count=1;
        while($review=$result->fetch_assoc()){
           
            echo "<div style='border:1px solid #000; margin:10px; padding:10px'>";
            echo "Review No. :" .$count. "<br>";
            echo "Flight ID  :" .$review['flightId'] . "<br>";
            echo "FeedBack   :" .$review['feedback'] . "<br>";
            echo "Rating     :" .$review['rating'] . "<br>";
            echo "</div>";
            $count++;
        }
    }
?>

<button type="button" onclick="window.location.href='feedbackAndRating.php'" style="background:lightblue;text-align:left">
    Change Response
</button><br><br><br>
             </fieldset>
</div>
</body>
</html>