<?php
    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "merpati_futsal");
    $html="";

    //insert to booking table from booking form
    if (isset($_POST['formbooking'])){
    	$nama=$_POST['name'];
    	$tgl=$_POST['tglForm'];
    	$jam=$_POST['jam'];
    	$lap=$_POST['lapangan'];
    	
    	$query = mysqli_query($connection, "INSERT INTO lapangan_book(nama,tanggal,jam,lapangan) VALUES('$nama','$tgl','$jam','$lap')");
    	
		ob_end_flush();
        mysqli_close($connection); // Closing Connection
    }

?>