<?php

    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "merpati_futsal");
    $bk_cd = $_POST['book_code'];

    //Query
    $query = mysqli_query($connection, "UPDATE lapangan_book SET book_ind = 1 WHERE booking_code='$bk_cd'");
   
?>