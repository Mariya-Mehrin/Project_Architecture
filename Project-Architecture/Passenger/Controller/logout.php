<?php 

session_start();

session_destroy();


Header("Location: ../../Common/View/loginForm.php");


?>