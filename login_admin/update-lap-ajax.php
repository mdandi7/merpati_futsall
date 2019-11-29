<?php

    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "merpati_futsal");
    $ind = $_POST['ind'];
    
    if($ind == 'update'){
	    $lap_id = $_POST['lap_id'];
	    $nama = $_POST['nama'];
	    $harga = $_POST['harga'];

	    //Query
	    $query = mysqli_query($connection, "UPDATE lapangan SET nama_lap = '$nama', harga_lap = '$harga' WHERE lap_id ='$lap_id'");
    }else if($ind == 'delete'){
	    $lap_id = $_POST['lap_id'];

	    //Query
	    $query = mysqli_query($connection, "DELETE FROM lapangan WHERE lap_id ='$lap_id'");
    }else if($ind == 'insert'){
		$nama = $_POST['nama'];
	    $harga = $_POST['harga'];
	    $new_row = "<tr><td><div class='div-show div-show-0'>";
	    //Query
	    $query = mysqli_query($connection, "INSERT INTO lapangan (nama_lap, harga_lap) VALUES('$nama','$harga')");

	    $select_last = mysqli_query($connection, "SELECT * FROM lapangan ORDER BY lap_id DESC LIMIT 1");
	    $result = mysqli_fetch_assoc($select_last);

	    $new_row .= "".$result['lap_id']."</div><input type='text' class='input-update input-0' readonly value='" .$result['lap_id']. "'></td>";
	    $new_row .= "<td><div class='div-show div-show-1'>" .$result['nama_lap']. "</div><input type='text' class='input-update input-1' value='" .$result['nama_lap']. "'></td>";
		$new_row .= "<td><div class='div-show div-show-2'>" .$result['harga_lap']. "</div><input type='text' class='input-update input-2' value='" .$result['harga_lap']. "'></td>";
		$new_row .= "<td><input class='button-edit btn btn-md btn-primary btn-info btn-block' type='submit' value='Edit'></input></td>";
		$new_row .= "<td><input class='button-update btn btn-md btn-primary btn-info btn-block' type='submit' value='Update' disabled></input></td>";
		$new_row .= "<td><input class='button-delete btn btn-md btn-primary btn-info btn-block' type='submit' value='Delete'></input></td></tr>";

		echo $new_row;

    }
?>