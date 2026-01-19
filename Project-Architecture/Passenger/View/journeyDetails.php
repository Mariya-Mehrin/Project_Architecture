<!-- <?php
// session_start();
// $d1=date('Y-m-d');
// $d2=date('Y-m-d' , strtotime('+10days'));
// $departure=$_SESSION["departure"] ?? "";



// $departure = $_COOKIE['departure'] ?? "";
// $arrival   = $_COOKIE['arrival'] ?? "";
// $dd        = $_COOKIE['dd'] ?? "";
// $class     = $_COOKIE['class'] ?? "";

// // Save form submission into cookies (5 minutes)
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $expire = time() + 300; // 5 minutes

//     setcookie("departure", $_POST['departure'], $expire, "/");
//     setcookie("arrival", $_POST['arrival'], $expire, "/");
//     setcookie("dd", $_POST['dd'], $expire, "/");
//     setcookie("class", $_POST['class'], $expire, "/");

//     // redirect to self to make cookies available immediately
//    header("Location: flightList.php");
//     exit;
// }



// ?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Public/css/Journey.css">
        </script>
</head>
<body>
    <form  id="myForm" method="post" action="flightList.php">
    <div class="container">
    
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
           </select>
            </div>
           <div style="display:inline-block;width:100px">
           Arrival:
           <select id="arrival" name="arrival">
            <option value=""></option>
            <option value="Dhaka">Dhaka</option>
            <option value="Sylhet" >Sylhet</option>
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
           Journey Date:<input type="date" id="dd" name="dd" min="<?php echo $d1; ?>" max="<?php echo $d2; ?>" >
           <br><br>
            <p id="nextErr"></p>
            <button type="submit" id=""  onclick="nextBtn()">Next</button>
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
         //window.location.href='flightList.php';
         }
     </script>
        </fieldset>
       
    </form>
</div>
</body>
</html> -->

<!-- <?php
// session_start();

// // Date range for journey
// $d1 = date('Y-m-d');              // today
// $d2 = date('Y-m-d', strtotime('+10 days')); // max 10 days later

// // Get previously saved cookie values (if exist)
// $departure = $_COOKIE['departure'] ?? "";
// $arrival   = $_COOKIE['arrival'] ?? "";
// $dd        = $_COOKIE['dd'] ?? "";
// $class     = $_COOKIE['class'] ?? "";

// // Save form submission into cookies (5 minutes)
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $expire = time() + 300; // 5 minutes

//     setcookie("departure", $_POST['departure'], $expire, "/");
//     setcookie("arrival", $_POST['arrival'], $expire, "/");
//     setcookie("dd", $_POST['dd'], $expire, "/");
//     setcookie("class", $_POST['class'], $expire, "/");

//     // redirect to self to make cookies available immediately
//    header("Location: flightList.php");
//     exit;
// }
// ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../Public/css/Journey.css">
</head>
<body>
    <form id="myForm" method="post" action="flightList.php">
        <div class="container">
            <button type="button" onclick="window.location.href='dashboard.php'">Back</button>
            <br><br>
            <fieldset>
                <legend>Journey Details</legend>

                Departure:
                <select id="departure" name="departure">
                    <option value="" <?= $departure=="" ? "selected" : "" ?>></option>
                    <option value="Dhaka" <?= $departure=="Dhaka" ? "selected" : "" ?>>Dhaka</option>
                    <option value="Sylhet" <?= $departure=="Sylhet" ? "selected" : "" ?>>Sylhet</option>
                </select>

                Arrival:
                <select id="arrival" name="arrival">
                    <option value="" <?= $arrival=="" ? "selected" : "" ?>></option>
                    <option value="Dhaka" <?= $arrival=="Dhaka" ? "selected" : "" ?>>Dhaka</option>
                    <option value="Sylhet" <?= $arrival=="Sylhet" ? "selected" : "" ?>>Sylhet</option>
                </select>
                <br><br>

                Class:
                <select id="class" name="class">
                    <option value="" <?= $class=="" ? "selected" : "" ?>></option>
                    <option value="Economy" <?= $class=="Economy" ? "selected" : "" ?>>Economy</option>
                    <option value="Business" <?= $class=="Business" ? "selected" : "" ?>>Business</option>
                    <option value="Premium" <?= $class=="Premium" ? "selected" : "" ?>>Premium</option>
                </select>
                <br><br>

                Journey Date:
                <input type="date" id="dd" name="dd" min="<?= $d1 ?>" max="<?= $d2 ?>" value="<?= $dd ?>">
                <br><br>

                <p id="nextErr" style="color:red;"></p>
                <button type="submit">Next</button>

                <script>
                document.getElementById('myForm').addEventListener('submit', function(e){
                    let x = document.getElementById("departure").value;
                    let y = document.getElementById("arrival").value;
                    let z = document.getElementById("class").value;
                    let a = document.getElementById("dd").value;

                    if(x==="" || y==="" || z==="" || a===""){
                        document.getElementById("nextErr").innerHTML = "All fields are required!";
                        e.preventDefault();
                        return;
                    }

                    if(x===y){
                        document.getElementById("nextErr").innerHTML = "Departure and Arrival cannot be same!";
                        e.preventDefault();
                        return;
                    }

                    document.getElementById("nextErr").innerHTML = "";
                });
                </script>
            </fieldset>
        </div>
    </form>
</body>
</html> -->


<?php
//session_start();
$d1 = date('Y-m-d');
$d2 = date('Y-m-d', strtotime('+10 days'));

// Get cookies if exist
$departure = $_COOKIE['departure'] ?? "";
$arrival   = $_COOKIE['arrival'] ?? "";
$dd        = $_COOKIE['dd'] ?? "";
$class     = $_COOKIE['class'] ?? "";

// Save form submission into cookies (5 minutes)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expire = time() + 600; // 5 minutes
    setcookie("departure", $_POST['departure'], $expire, "/");
    setcookie("arrival", $_POST['arrival'], $expire, "/");
    setcookie("dd", $_POST['dd'], $expire, "/");
    setcookie("class", $_POST['class'], $expire, "/");

    // Redirect to flightList.php
    header("Location: flightList.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../Public/css/Journey.css">
</head>
<body>
<form id="myForm" method="post" action="flightList.php" onsubmit="return nextBtn();">
    <div class="container">
        <button type="button" onclick="window.location.href='dashboard.php'">Back</button>
        <br><br>
        <fieldset>
            <legend>Journey Details</legend>
            
            Departure:
            <select id="departure" name="departure">
                <option value="" <?= $departure==""?"selected":"" ?>></option>
                <option value="Dhaka" <?= $departure=="Dhaka"?"selected":"" ?>>Dhaka</option>
                <option value="Sylhet" <?= $departure=="Sylhet"?"selected":"" ?>>Sylhet</option>
            </select>

            Arrival:
            <select id="arrival" name="arrival">
                <option value="" <?= $arrival==""?"selected":"" ?>></option>
                <option value="Dhaka" <?= $arrival=="Dhaka"?"selected":"" ?>>Dhaka</option>
                <option value="Sylhet" <?= $arrival=="Sylhet"?"selected":"" ?>>Sylhet</option>
            </select>
            <br><br>

            Class:<br>
            <select id="class" name="class">
                <option value="" <?= $class==""?"selected":"" ?>></option>
                <option value="Economy" <?= $class=="Economy"?"selected":"" ?>>Economy</option>
                <option value="Business" <?= $class=="Business"?"selected":"" ?>>Business</option>
                <option value="Premium" <?= $class=="Premium"?"selected":"" ?>>Premium</option>
            </select>
            <br><br>

            Journey Date:
            <input type="date" id="dd" name="dd" min="<?= $d1 ?>" max="<?= $d2 ?>" value="<?= $dd ?>">
            <br><br>

            <p id="nextErr" style="color:red;"></p>
            <button type="submit">Next</button>
        </fieldset>
    </div>
</form>

<script>
function nextBtn(){
    let x = document.getElementById("departure").value;
    let y = document.getElementById("arrival").value;
    let z = document.getElementById("class").value;
    let a = document.getElementById("dd").value;

    if(a==="" || x==="" || y==="" || z===""){
        document.getElementById("nextErr").innerHTML = "All fields are required !!";
        return false; // prevent form submission
    }

    if(x===y){
        document.getElementById("nextErr").innerHTML = "Departure and arrival cannot be same !!";
        return false; // prevent form submission
    }

    document.getElementById("nextErr").innerHTML = "";
    return true; // allow form submission
}
</script>
</body>
</html>

