<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "", "merpati_futsal");
// Selecting Database
//$db = mysqli_select_db("test", $connection);
if (version_compare(phpversion(), '5.4.0', '<')) {
     if(session_id() == '') {
        session_start();
     }
 }
 else
 {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
 }
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql = mysqli_query($connection, "select * from user where username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];
$login_name = $row['nama'];
$login_user = $row['user_id'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location:ind-login.php'); // Redirecting To Home Page
}
?>