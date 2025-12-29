<?php
session_start();
$passErr=$_SESSION["passErr"] ?? "";
$matchErr=$_SESSION["matchErr"] ?? "";
//  $_SESSION["matchErr"]


// if (isset($_GET['password'])) {
//     $pass = htmlspecialchars($_GET['password']);
//     echo "Received value: " . $pass;
// } else {
//     echo "No variable received.";
// }
$email = $_SESSION["email"] ??"";


?>
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
        #show{
            color:red;
        }
        </style>
    </head>
    <body>
 <div class="container">
     <button type="button" onclick="window.location.href='dashboard.php'">
    Back
</button>
<div style="height:20px"></div>
    <form method="post" action="..\Controller\changePassValidation.php">
        <fieldset>
            <legend>Change Password</legend>
             Current passsword:<br>
            <input type="text" name="old" placeholder="">
            <?php $passErr; ?><br>
            New Password:<br>
            <input type="text"  name="new" placeholder="********" >
           <p> <?php $matchErr; ?></p>
            Retype Password:<br>
            <input type="text"  name="confirm" placeholder="********"><br>
            <p><?php echo $matchErr ?? "No Error"; ?></p>
             <br>
                <input type="submit" id="Change" name="Change"/>
                
</fieldset>
</form>
</div>
</script>
</body>
</html>