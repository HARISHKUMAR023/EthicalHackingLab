<?php

// Start the session
session_start();

// Clear session data
unset($_SESSION['access_token']); // Remove access token
unset($_SESSION['user']); // Remove user details
// Optionally clear other user-related session data
// session_destroy();
// Redirect to GitLab logout (optional)
$logoutUrl = 'http://localhost/EthicalHackingLab/views/index.php'; // GitLab logout endpoint
header('Location: ' . $logoutUrl);
exit();
?>