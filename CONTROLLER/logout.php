<?php
session_start();

// Destroy the session
session_destroy();

// Check if the session is still active
if(session_status() === PHP_SESSION_ACTIVE) {
    echo 'Session destruction failed';
    exit; // Exit to prevent further execution
}

// Redirect to index.php
header("Location: index.php");
exit; // Make sure to exit after the header redirect
?>
