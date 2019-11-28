<?php
include "string.php";
include "configdb.php";

// $con = OpenCon();
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $nama_aplikasi ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">

	<style type="text/css">
		.navbar {
			padding: .8rem;
		}
		.navbar-nav li {
			padding-right: 20px;
		}
		.carousel-inner img {
			width: 100%;
			height: 100%;
		}
	</style>

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(".button_udpate").click(function(e){
                
        const $but_updt = $(this)
        var book_cd = $but_updt.attr('data-bkcd');
        
        $.ajax({
            type: "POST",
            url:'update-book-ind-ajax.php',
            data: {
              book_code: book_cd
            },
            complete: function (response) {
              $but_updt.attr("disabled", 'disabled');
            },
            error: function () {
                alert("Database bermasalah");
            },
          });
        return false;
      });
    });

  </script>
</head>
<body class="text-monospace">

<!-- Navbar -->
<!-- <nav class="navbar navbar-expand-lg navbar-dark navbar-dark pl-4 fixed-top sticky-top shadow" style="background-color: #333333;">
<a class="navbar-brand" href="#"><img src="4.jpeg" width="30" height="30" class="d-inline-block align-top rounded-circle">
Merpati Futsal
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-sm-2">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Beranda<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="booking.php">Booking</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav> -->

<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid rounded-bottom mb-0 shadow" style="background-color: #333333; /*background: url(1.jpeg);*/ background-repeat: no-repeat; background-size: 150%">
  <div class="container text-center">
    <img src="4.jpeg" width="20%" class="rounded-circle img-thumbnail">
    <h1 class="display-4 text-light">Admin Dashboard</h1>
    <p  class="lead text-light "><?php echo $login_session?></p>
  </div>
</div>

<div class="container-fluid  py-4">
  <button onclick="goBack()" class="btn btn-info"><-- Kembali ke Menu Utama</button>
</div>


<!-- option -->
<div class="accordion container py-4" id="accordionExample">
  <div class="card" >
    <div class="card-header" style="background-color: #333333;" id="headingOne">
      <h2 class="mb-0 text-center">
        <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Menunggu Konfirmasi</button>
        <a style="font-size: 35px;" class="text-light font-weight-light">|</a>
        <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Berhasil</button>
        <a style="font-size: 35px;" class="text-light font-weight-light">|</a>
        <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Tidak Dikonfirmasi</button>
      </h2>
    </div>
     <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body text-justify">
      <div class="container py-4">
        <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Booking Code</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Jam</th>
            <th scope="col">Lapangan</th>
            <th scope="col">Konfirmasi</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $query = mysqli_query($connection,"SELECT * FROM lapangan_book WHERE pay_ind = 1 AND book_ind = 0 order by tanggal desc");

          $rows = mysqli_num_rows($query);
          for($i=0;$i<$rows;$i++){
            $result = mysqli_fetch_assoc($query);
            if($result['book_ind'] == 1){
              $disabled = 'disabled';
              $button = 'btn-outline-info';
              $button = 'btn-outline-info';
            }else{
              $disabled = '';
            }
            //$namaobat_pass = $result['nama_obat'];
            echo "<tr><td>" .$result['booking_code']. "</td>";
            echo "<td>" .$result['nama']. "</td>";
            echo "<td>" .$result['tanggal']. "</td>";
            echo "<td>" .$result['jam']. "</td>";
            echo "<td>" .$result['lapangan']. "</td>";
            echo "<td><input class='button_udpate btn btn-md btn-primary btn-info btn-block' type='submit' value='Konfirm!' data-bkcd = '" .$result['booking_code']. "' " ,$disabled, "></input></td></tr>";
          }
        ?>
        </tbody>
      </table>
      <button class="btn btn-info">print</button>
      </div>
      </div>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body text-justify">
        <div class="container py-4">
        <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Booking Code</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Jam</th>
            <th scope="col">Lapangan</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $query = mysqli_query($connection,"SELECT * FROM lapangan_book WHERE pay_ind = 1 AND book_ind = 1 order by tanggal desc");

          $rows = mysqli_num_rows($query);
          for($i=0;$i<$rows;$i++){
            $result = mysqli_fetch_assoc($query);
            echo "<tr><td>" .$result['booking_code']. "</td>";
            echo "<td>" .$result['nama']. "</td>";
            echo "<td>" .$result['tanggal']. "</td>";
            echo "<td>" .$result['jam']. "</td>";
            echo "<td>" .$result['lapangan']. "</td>";
            echo "<td>Berhasil</td></tr>";
          }
        ?>
        </tbody>
      </table>
      <button class="btn btn-info">print</button>
      </div>
      </div>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body text-justify">
        <div class="container py-4">
          <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Booking Code</th>
              <th scope="col">Nama</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Jam</th>
              <th scope="col">Lapangan</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $query = mysqli_query($connection,"SELECT * FROM lapangan_book WHERE book_ind = 0 AND (tanggal <= current_date AND current_time > addtime(book_time,000500)) order by tanggal desc");

            $rows = mysqli_num_rows($query);
            for($i=0;$i<$rows;$i++){
              $result = mysqli_fetch_assoc($query);
              echo "<tr><td>" .$result['booking_code']. "</td>";
              echo "<td>" .$result['nama']. "</td>";
              echo "<td>" .$result['tanggal']. "</td>";
              echo "<td>" .$result['jam']. "</td>";
              echo "<td>" .$result['lapangan']. "</td>";
              echo "<td>Gagal Di Konfirmasi</td></tr>";
            }
          ?>
          </tbody>
        </table>
        <button class="btn btn-info">print</button>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- footer -->
<footer class=" text-center text-light pb-2 pt-2" style="background-color: #333333;">
  <p></p>
	<p>&copy Copyright 2019 <strong>Merpati Futsal</strong>, allright Reserved.</p>
</footer>


</body>

<script>
function goBack() {
  window.history.back()
}
</script>

<script src="../assets/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</html>