<?php
session_start();

// $isLoggedIn = $_SESSION["isLoggedIn"] ?? false;
// if ($isLoggedIn) {
//     Header("Location: dashboard.php");
// }

$emailErr =  $_SESSION["emailErr"] ?? '';
$passErr = $_SESSION['passwordErr'] ??'';
$previousValues = $_SESSION['previousValues'] ??[];
$loginErr = $_SESSION["LoginErr"] ??"";


unset($_SESSION['previousValues']);
unset($_SESSION["LoginErr"]);

?>


<html>
<head>
    <style>
            .container {
            max-width: 800px;
            margin: 0 auto;
            /* background-color: white; */
            padding: 30px;
            border-radius: 8px;
            /* box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); */
            background-color: lightgrey;
        }
        body {
            margin-left: 20%;
            margin-right: 20%;
        }
        p{
            color:red;
        }
        </style>
  
</head>
<body>
<div class="container">
<!-- <pre><?php echo $previousValues["email"]; ?></pre> -->
<form method="post" action="..\Controller\loginValidation.php" >
    <!-- //..\Controller\loginValidation.php -->
    <fieldset>
        <legend>Login Form</legend>
   
         Email:<br><input type="text" name="email" id="email" value="<?php echo $previousValues["email"] ?? '' ?>"/>
   
     <p> <?php echo $emailErr;?></p>
    
  
       
      Password:<br> <input type="password" id="password" name="password"/> 
     <p><?php echo $passErr;?></p>
    
          <p>  <?php echo $loginErr; ?></p>
   
        <input type="submit" name="Login" value="Login"/>
     


    </fieldset>
</form>
    </div>
</body>
</html>