<?php
session_start();
$emailErr =  $_SESSION["emailErr"] ?? '';
$passErr = $_SESSION['passwordErr'] ??'';
$nameErr = $_SESSION['nameErr'] ??'';
$roleErr = $_SESSION['roleErr'] ??'';
$fileErr = $_SESSION['fileErr'] ??'';
$phoneErr = $_SESSION['phoneErr'] ??'';

$previousValues = $_SESSION['previousValues'] ??[];
$loginErr = $_SESSION["LoginErr"] ??"";

unset($_SESSION["emailErr"]);
unset($_SESSION['passwordErr']);
unset($_SESSION['nameErr']);
unset($_SESSION['roleErr']);
unset($_SESSION['fileErr']);
unset($_SESSION['phoneErr']);

unset($_SESSION['previousValues']);
unset($_SESSION["LoginErr"]);

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Public/css/Registration.css">
        <style>
            
        </style>

<script src="..\Controller\Js\checkEmail.js"> </script>
<script src="..\Controller\Js\checkPassword.js"> </script>

<script src="..\Controller\Js\checkPhoneNo.js"></script>

<script src="..\Controller\Js\registerValidation.js"></script>

</head>
<body>
    <div class="container">
    <form method="post"  action="return validAll()" enctype="multipart/form-data" >
        <fieldset>
            <legend>Registration Form</legend>

            <a href="loginForm.php">Login</a><br><br>

            Name:<br>
            <input type="text" id="name" name="name" placeholder="Enter your name...">
            <?php echo "<span style='color:red;'> $nameErr </span>" ?>
            <P id="nameErr"></P>
            <br><br>
             Email:<br>
            <input type="email" id="email" name="email" value="<?php echo $previousValues['email'] ?? '' ?>" onkeyup="findExistingEmail()"  placeholder="Enter email...">
            <?php echo "<span style='color:red;'> $emailErr </span>" ?>
            <p id="erroremail" ></p>

            Password:<br>
            <input type="password" id="Password" name="Password" placeholder="Enter password..." onkeyup="findExistingPassword()" >
            <?php echo "<span style='color:red;'> $passErr </span>" ?>
            <p id="errorpass" ></p>
             <P id="passErr"></P>
            <br><br>
            Phone No:<br>
            <input type="number" id="phone" name="phone" placeholder="Enter your phone number.." onkeyup="findExistingPhoneNo()" >
            <?php echo "<span style='color:red;'> $phoneErr </span>" ?>
            <p id="errorphoneno" ></p>
            <!-- <P id="phoneErr"></P> -->
            <br><br>
            Passport Copy:<br><input type="file" id="fileupload" name="fileupload" >
            <?php echo "<span style='color:red;'> $fileErr </span>" ?>
            <!-- <P id="fileErr"></P> -->
            <br><br>
            Register as:<br>
           <select id="role" name="role">
            <option>Select</option>
            <option>Admin</option>
            <option>Passenger</option>
            <option>Employee</option>
           </select>
            <?php echo "<span style='color:red;'> $roleErr </span>" ?>
            <!-- <P id="roleErr"></P> -->
            <br><br>
             <!-- <fieldset id="input">
            <legend> Your Input....</legend>
            <p id="showName"></p>
            <p id="showEmail"></p>
          
            <p id="showPassword"></p>
              <p id="showPhone"></p>
             <p id="showPassport"></p>
            <p id="showFile"></p>
            <p id="showRole"></p>
        </fieldset> -->
        <br><br>

                <button type="submit" id="register" name="register">Submit</button><?php echo $loginErr; ?>
                <button type="reset" id="reset">Cancel</button>
        </fieldset>
       
    </form>
</div>
<!-- <script src="registerValidation.js"></script> -->
</body>
</html>