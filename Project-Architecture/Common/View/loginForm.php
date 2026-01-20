<?php
session_start();
$emailErr =  $_SESSION["emailErr"] ?? '';
$passErr = $_SESSION['passwordErr'] ??'';
$previousValues = $_SESSION['previousValues'] ??[];
$loginErr = $_SESSION["LoginErr"] ??"";


unset($_SESSION['previousValues']);
unset($_SESSION["LoginErr"]);

?>

<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="../../Passenger/Public/css/Login.css">

</head>
<body>
<div class="container">
<form method="post" action="../../Passenger/Controller/loginValidation.php" >
    <fieldset>
        <legend>Login Form</legend>
   <a href="registrationForm.php">Register</a><br><br>

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