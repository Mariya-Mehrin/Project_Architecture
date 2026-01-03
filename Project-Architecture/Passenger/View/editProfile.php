<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Public/css/EditProfile.css">
</head>
<body>
    <div class="container">
    <form method="post" >
         <button type="button" onclick="window.location.href='dashboard.php'" style="background:lightblue">
    Back
</button>
        <fieldset>
            <legend style="text-align:center;font-weight:bold">Edit Info</legend>
            Name:<br>
            <input type="text" id="name" name="name" placeholder="Enter your name..."><br><br>
             Email:<br>
            <input type="email" id="email" name="email" placeholder="Enter your email address..." disabled ><br><br>
            Password:<br>
            <input type="password" id="password" name="password" placeholder="Enter password..." disabled><br><br>
             Gender:<br>
            <input type="radio" id="gender" name="gender" value="Male" disabled>Male<br>
            <input type="radio" id="gender" name="gender" value="Female" readonly>Female<br><br>
            Role:<br>
           <select id="role">
            <option>Select</option>
            <option>Admin</option>
            <option>Passenger</option>
            <option>Employee</option>
           </select>
        <br><br>

                <button type="submit" id="" >Done</button>
        </fieldset>
       
    </form>
</div>
</body>
</html>