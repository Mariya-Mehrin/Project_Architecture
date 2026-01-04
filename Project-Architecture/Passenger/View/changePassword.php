 <?php
 include "../Model/dataBaseConnection.php";
 error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$passErr=$_SESSION["passErr"] ?? "";
$matchErr=$_SESSION["matchErr"] ?? "";
$email = $_SESSION["email"] ??"";
$oldPass=$_SESSION["oldPass"] ?? "";
$confirmPass=$_SESSION["confirmPass"] ?? "";
$updateResult=$_SESSION["updateResult"] ?? "";
unset($_SESSION["matchErr"]);
unset($_SESSION["oldPass"]);
$db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->checkExistingUser($connection, "users", $email);
if(!$result || $result->num_rows ==0){
     Header("Location: ..\View\LoginForm.php");
 }

 $user = $result->fetch_assoc();



?>
 <html>
    <head>
        <link rel="stylesheet" href="../Public/css/ChangePassword.css">
        <script src="..\Controller\Js\checkPassword.js">
</script>
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
             <p><?php $oldPass; ?></p>
             Current passsword:<br>
            <input type="text" name="old" id="old" placeholder="">
             <p > <?php $user['password'];
             if($oldPass != $user['password'] && $oldPass !=null){
                echo "Wrong password";
             }
             ?> </p>
            <br>
            New Password:<br>
            <input type="text"  name="new" onkeyup="findExistingPassword()" >
           <?php $matchErr; ?>
           <br> Confirm Password:<br>
            <input type="text"  id="confirm" name="confirm" onkeyup="findExistingPassword()"><br>
            <p><?php echo $matchErr  ?></p>
             <br>
                <input type="submit" id="Change" name="Change"/>
                <p><?php echo $updateResult; ?></p>
                
</fieldset>
</form>
</div>
</script>
</body>
</html> 


