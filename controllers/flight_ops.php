<?php
require_once '../models/db.php';


if (isset($_POST['add_flight'])) {
    $name = $_POST['f_name'];
    $dest = $_POST['f_dest'];
    $price = $_POST['f_price'];

    if(!empty($name) && !empty($dest) && !empty($price)){
        $sql = "INSERT INTO flights (flight_name, destination, price) VALUES ('$name', '$dest', '$price')";
        mysqli_query($conn, $sql);
        header("location: ../views/dashboard.php?success=added");
    }
}


if (isset($_GET['q'])) {
    $search = $_GET['q'];
    $sql = "SELECT * FROM flights WHERE flight_name LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    
    $flights = [];
    while($row = mysqli_fetch_assoc($result)){
        $flights[] = $row;
    }
    echo json_encode($flights);
}
?>