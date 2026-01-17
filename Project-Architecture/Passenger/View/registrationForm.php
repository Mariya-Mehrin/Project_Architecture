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
<!-- <script src="..\Controller\Js\checkPassword.js"> </script>

<script src="..\Controller\Js\checkPhoneNo.js"></script> -->

<script src="..\Controller\Js\registerValidation.js"></script>

</head>
<body>
    <div class="container">
    <form method="post"  action="..\Controller\registerValidation.php" enctype="multipart/form-data" >
        <fieldset>
            <legend>Registration Form</legend>

            <a href="loginForm.php">Login</a><br><br>

            Name:<br>
            <input type="text" id="name" name="name" placeholder="Enter your name..." required>
            <?php echo "<span style='color:red;'> $nameErr </span>" ?>
            <P id="nameErr"></P>
            <br><br>
             Email:<br>
            <input type="text" id="email" name="email"  onkeyup="findExistingEmail()"  placeholder="Enter email..." required>
            <?php echo "<span style='color:red;'> $emailErr </span>" ?>
            <p id="erroremail" ></p>

            Password:<br>
            <input type="password" id="Password" name="Password" placeholder="Enter password..." onkeyup="findExistingPassword()" required>
            <?php echo "<span style='color:red;'> $passErr </span>" ?>
            <p id="errorpass" ></p>
             <P id="passErr"></P>
            <br><br>
            Phone No:<br>
            <input type="text" id="phone" name="phone" placeholder="Enter your phone number.." onkeyup="findExistingPhoneNo()" required>
            <?php echo "<span style='color:red;'> $phoneErr </span>" ?>
            <p id="errorphoneno" ></p>
            <!-- <P id="phoneErr"></P> -->
            <br><br>
            Passport Copy:<br><input type="file" id="fileupload" name="fileupload" required>
            <?php echo "<span style='color:red;'> $fileErr </span>" ?>
            <!-- <P id="fileErr"></P> -->
            <br><br>
            Register as:<br>
           <select id="role" name="role" required>
            <option></option>
            <option>Admin</option>
            <option>Passenger</option>
            <option>Employee</option>
           </select>
            <?php echo "<span style='color:red;'> $roleErr </span>" ?>
            <!-- <P id="roleErr"></P> -->
            <br><br>
        <br><br>

                <button type="submit" id="register" name="register">Submit</button><?php echo $loginErr; ?>
                <button type="reset" id="reset">Cancel</button>
        </fieldset>
       
    </form>
</div>
</body>
</html>