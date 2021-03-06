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
</head>
<body class="text-monospace">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-dark pl-4 fixed-top sticky-top shadow" style="background-color: #333333;">
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
      <!-- <li class="nav-item">
        <a class="nav-link" href="booking.php">Booking</a>
      </li> -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-center" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid rounded-bottom mb-0 shadow" style="background-color: #333333; /*background: url(1.jpeg);*/ background-repeat: no-repeat; background-size: 150%">
  <div class="container text-center">
  	<img src="4.jpeg" width="20%" class="rounded-circle img-thumbnail">
    <h1 class="display-4 text-light">Admin Dashboard</h1>
    <p  class="lead text-light "><?php echo $login_session?></p>
  </div>
</div>


<div class="container py-5">
  <h5 class="py-2 px-2 rounded text-light" style="background-color: #333333;">Untuk melakukan pendataan, silahkan pilih menu dibawah ini</h5>
  <div class="card-group text-center py-3">
  <div class="card mr-sm-2">
    <a href="data_pesanan.php"><img src="1.jpeg"  class="card-img-top" alt="..."></a>
    <div class="card-body">
      <h5 class="card-title">Data Pesanan</h5>
    </div>
  </div>
  <div class="card mr-sm-2">
    <a href="data_lapangan.php"><img src="1.jpeg"  class="card-img-top" alt="..."></a>
    <div class="card-body">
      <h5 class="card-title">Data Lapangan</h5>
    </div>
  </div>
  <div class="card mr-sm-2">
    <a href="data_user.php"><img src="1.jpeg"  class="card-img-top" alt="..."></a>
    <div class="card-body">
      <h5 class="card-title">Data User</h5>
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
<script src="../assets/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</html>