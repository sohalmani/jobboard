<?php
echo "Logout";
// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the homepage
redirect('/');
