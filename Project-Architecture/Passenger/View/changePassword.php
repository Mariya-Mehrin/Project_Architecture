 <?php
 include "../Model/dataBaseConnection.php";
 error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$passErr=$_SESSION["passErr"] ?? "";
$matchErr=$_SESSION["matchErr"] ?? "";
$email = $_SESSION["email"] ??"";
$db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->checkExistingUser($connection, "users", $email);
if(!$result || $result->num_rows ==0){
    echo "User not found";
    exit;
 }
?>
 <html>
    <head>
        <link rel="stylesheet" href="../Public/css/ChangePassword.css">
    </head>
    <body>
        <form method="post" >
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
           <p id="matchErr"> <?php $matchErr; ?></p>
            Retype Password:<br>
            <input type="text"  id="confirm" name="confirm" placeholder="********"><br>
            <p><?php echo $matchErr  ?></p>
             <br>
                <input type="submit" id="Change" name="Change"/>
                
</fieldset>
</form>
</div>
</script>
</body>
</html> 


