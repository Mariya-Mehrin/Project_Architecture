<?php
session_start();

// Clear only the departure session
unset($_SESSION['departure']);

// Redirect back to journeyDetails.php
header("Location: journeyDetails.php");
exit;
?>
