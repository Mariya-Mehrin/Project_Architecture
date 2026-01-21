<!DOCTYPE html>
<html>
<head>
    <title>Login - Airline Management System</title>
    <link rel="stylesheet" href="../assets/style.css">
    <script src="../assets/script.js"></script>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-box">
            <h2>Employee Login</h2>
            <form action="../controllers/login_core.php" method="POST" onsubmit="return validateLogin()">
                <input type="text" name="username" id="username" placeholder="Username (admin)">
                <input type="password" name="password" id="password" placeholder="Password (1234)">
                <button type="submit" name="login">Login</button>
                <p id="error-msg" style="color:red; margin-top:10px;"></p>
                <?php if(isset($_GET['error'])) { echo "<p style='color:red'>Invalid Credentials</p>"; } ?>
            </form>
        </div>
    </div>
</body>
</html>