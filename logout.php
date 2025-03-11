<?php
session_start(); // Ensure session is started before destroying it

if (isset($_SESSION['email'])) {
    session_unset();  // Remove all session variables
    session_destroy(); // Destroy the session
}

// Redirect to login page
header("Location: index.php");
exit();
?>
