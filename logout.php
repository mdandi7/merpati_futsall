<?php
session_start();
if(session_destroy()) // Destroying All Sessions
    {
    header("Location: ind-login.php"); // Redirecting To Home Page
    }
?>