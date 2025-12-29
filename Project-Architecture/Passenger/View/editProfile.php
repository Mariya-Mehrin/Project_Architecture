<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 8px;
            background-color: lightgrey;
        }
        body {
            margin-left: 20%;
            margin-right: 20%;
        }
        p{
            color:red;
        }
        #input{
            color:blue;
        }
        </style>
        </script>
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