<?php

    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "merpati_futsal");
    $tgl = $_POST['date'];
    $time = $_POST['time'];
    $lap = $_POST['lapangan'];

    //Query
    $query = mysqli_query($connection, "SELECT * FROM lapangan_book WHERE tanggal='$tgl' and jam='$time' and lapangan='$lap'");
    $rows = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);

    if($rows > 0){
        echo $data['nama'];
    }else{
        echo "0";
    }
    
?>