<?php
session_start();
$email = $_SESSION["email"] ??"";
$emailErr =  $_SESSION["emailErr"] ?? '';
$updateResult=$_SESSION["updateResult"] ?? "";
$regex=$_SESSION["regex"] ?? "";
unset($_SESSION["emailErr"]);
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Public/css/EditProfile.css">
        <script src="..\Controller\Js\checkEmail.js"> </script>
</head>
<body>
    <div class="container">
    <form method="post" action="..\Controller\editProfileValidation.php">
         <button type="button" onclick="window.location.href='dashboard.php'" style="background:lightblue">
    Back
</button>
        <fieldset>
            <legend style="text-align:center;font-weight:bold">Edit Profile</legend>
            Name:<br>
            <input type="text" id="name" name="name" placeholder="Change Name..."><br><br>
             Email:<br>
            <input type="text" id="email" name="email" onkeyup="findExistingEmail()" placeholder="Change Email Address..." ><br>
            <p id="erroremail" ></p>
            <?php echo $regex; ?><br>
            Password:<br>
            <input type="password" id="password" name="password" placeholder="**********" disabled><br><br>
            Role:<br>
           <select id="role" name="role" required>
            <option>Select</option>
            <option>Admin</option>
            <option>Passenger</option>
            <option>Employee</option>
           </select>
        <br><br>

                <button type="submit" id="change" name="change" >Done</button>
                 <p style="color:blue;"><?php echo $updateResult; ?></p>
        </fieldset>
       
    </form>
</div>
</body>
</html>
<?php
unset($_SESSION["updateResult"]);
unset($_SESSION["regex"]);
?>