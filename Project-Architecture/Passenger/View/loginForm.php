<?php
session_start();
$emailErr =  $_SESSION["emailErr"] ?? '';
$passErr = $_SESSION['passwordErr'] ??'';
$previousValues = $_SESSION['previousValues'] ??[];
$loginErr = $_SESSION["LoginErr"] ??"";


unset($_SESSION['previousValues']);
unset($_SESSION["LoginErr"]);

?>


<html>
<head>
        <link rel="stylesheet" href="../Public/css/Login.css">

</head>
<body>
<div class="container">
<form method="post" action="..\Controller\loginValidation.php" >
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