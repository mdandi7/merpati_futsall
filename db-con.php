<?php
    include "configdb.php";
    
    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "merpati_futsal");

    //insert to booking table from booking form
    if (isset($_POST['formbooking'])){
    	$nama=$_POST['name'];
    	$tgl=$_POST['tglForm'];
    	$jam=$_POST['jam'];
    	$lap=$_POST['lapangan'];
        $time=$_POST['book_time'];
    	
        $query_check_book = mysqli_query($connection, "SELECT * FROM lapangan_book WHERE user_id ='$login_user' AND tanggal='$tgl' AND current_time < addtime(book_time,000500) AND book_ind = 0");
        $rows = mysqli_num_rows($query_check_book);

        if($rows <= 0){
            $query = mysqli_query($connection, "INSERT INTO lapangan_book(nama,tanggal,jam,lapangan,book_ind,book_time,user_id,pay_ind) VALUES('$login_name','$tgl','$jam','$lap',0,'$time','$login_user',0)");
			
			$_SESSION['tgl_book'] = $tgl;
            header("Location: confirm_booking.php");
        }else{
            header("Location: confirm_booking.php");
        }
    	
		ob_end_flush();
        mysqli_close($connection); // Closing Connection
    }

?>