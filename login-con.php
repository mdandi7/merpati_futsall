<?php
    ob_start();
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
        }
        else
        {
            // Define $username and $password
            $username=$_POST['username'];
            $password=$_POST['password'];
            // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            $connection = mysqli_connect("localhost", "root", "", "merpati_futsal");
            // To protect MySQL injection for Security purpose
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);

            // SQL query to fetch information of registerd users and finds user match.
            $query = mysqli_query($connection, "select * from user where password='$password' AND username='$username'");

            $rows = mysqli_num_rows($query);
            $result = mysqli_fetch_assoc($query);
            
            if ($rows == 0) {
                $error = "Username or Password is invalid";
                //header('Location:index.php');
            
            }  elseif($result['user_ind'] == '1'){
                        $_SESSION['login_admin']=$username; // Initializing Session
                        header("Location: index.php"); // Redirecting To Other Page
                    }   elseif($result['user_ind'] == '2'){
                                $_SESSION['login_admin']=$username; // Initializing Session
                                header("Location: index.php"); // Redirecting To Other Page // SEMENTARA
                            }          
            ob_end_flush();
            mysqli_close($connection); // Closing Connection
        }
    }

    if (isset($_POST['regist'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
        }
        else
        {
            // Define $username and $password
            $name=$_POST['name'];
            $username=$_POST['username'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            $connection = mysqli_connect("localhost", "root", "", "merpati_futsal");
            // To protect MySQL injection for Security purpose
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);

            // SQL query to fetch information of registerd users and finds user match.
            $query = mysqli_query($connection, "select * from user where username='$username'");

            $rows = mysqli_num_rows($query);
            $result = mysqli_fetch_assoc($query);
            
            if ($rows > 0) {
                $error = "Username already exist!";
                //header('Location:index.php');
            
            }  else{
                        $query = mysqli_query($connection, "INSERT INTO user(nama,username,password,email,user_ind) VALUES ('$name','$username','$password','$email',2)"); // Query to insert new users
                        header("Location: ind-login.php"); // Redirecting To Other Page
                    }            
            ob_end_flush();
            mysqli_close($connection); // Closing Connection
        }
    }
?>