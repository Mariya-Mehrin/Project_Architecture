<?php 

session_start();

session_destroy();


Header("Location: ..\View\loginForm.php");


?>