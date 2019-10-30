<?php
include "string.php";
include "configdb.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $nama_aplikasi ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
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

  <!-- Scripts -->
  <script type="text/javascript" src="js/JSfunction.js"></script>
  <script type="text/javascript">
    function fillOnLoad(e){
      fillDate('tgl');
      fillDate('tgl_1');
      fillDate('tgl_2');
      fillDate('tgl_3');

      var jam = [7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22];
      for (var i = 0;i < jam.length; i++){
        fillButton(jam[i]);
      }
    }
  </script>
</head>

<!-- PAGE BODY -->
<body class="text-monospace" onload="fillOnLoad();">

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
</nav>

<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid rounded-bottom mb-0 shadow" style="background-color: #333333; background: url(1.jpeg); background-repeat: no-repeat; background-size: 150%">
  <div class="container text-center">
  	<img src="4.jpeg" width="20%" class="rounded-circle img-thumbnail">
    <h1 class="display-4 text-light">Sport Center</h1>
    <p  class="lead text-light ">Solution for sport venue owner and user on booking desired sport venue with ease.</p>
  </div>
</div>

<div class="accordion container py-4" id="accordionExample">
  <div class="card" >
    <div class="card-header" style="background-color: #333333;" id="headingOne">
   		<h1 class="text-center text-light">Jadwal Lapangan
		<h2 class="mb-0 text-center">
		<button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Lapangan Futsal A</button>
		<!-- <a style="font-size: 35px;" class="text-light font-weight-light">|</a> -->
		<button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Lapangan Futsal B</button>
		<!-- <a style="font-size: 35px;" class="text-light font-weight-light">|</a> -->
		<button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Lapangan Badminton</button>
		</h2>
		</h1>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body row">
        <div class="col-sm-3">
        	<label for="tgl">Tanggal </label>
      	  <input type="date" class="form-control" id="tgl" oninput="fillButtonOnclick(this.value,'lapA');">
  		  </div>
        <div class="col p-1">
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="7lapA">07.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="8lapA">08.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="9lapA">09.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="10lapA">10.00</button>
    	  </div>
        <div class="col p-1">
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="11lapA">11.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="12lapA">12.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="13lapA">13.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="14lapA">14.00</button>
        </div>
        <div class="col p-1">
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="15lapA">15.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="16lapA">16.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="17lapA">17.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="18lapA">18.00</button>
        </div>
        <div class="col p-1">
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="19lapA">19.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="20lapA">20.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="21lapA">21.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="22lapA">22.00</button>
        </div>  
      </div>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body row">
        <div class="col-sm-3">
        	<label for="tgl_1">Tanggal </label>
          <input type="date" class="form-control" id="tgl_1">
		    </div>
        <div class="col p-1">
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="7lapB">07.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="8lapB">08.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="9lapB">09.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="10lapB">10.00</button>
        </div>
        <div class="col p-1">
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="11lapB">11.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="12lapB">12.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="13lapB">13.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="14lapB">14.00</button>
        </div>
        <div class="col p-1">
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="15lapB">15.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="16lapB">16.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="17lapB">17.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="18lapB">18.00</button>
        </div>
        <div class="col p-1">
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="19lapB">19.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="20lapB">20.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="21lapB">21.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="22lapB">22.00</button>
        </div>		 
      </div>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body row">
        <div class="col-sm-3">
        	<label for="tgl_2">Tanggal </label>
        	<input type="date" class="form-control" id="tgl_2">
  		  </div>
        <div class="col p-1">
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="7lapBat">07.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="8lapBat">08.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="9lapBat">09.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="10lapBat">10.00</button>
        </div>
        <div class="col p-1">
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="11lapBat">11.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="12lapBat">12.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="13lapBat">13.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="14lapBat">14.00</button>
        </div>
        <div class="col p-1">
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="15lapBat">15.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="16lapBat">16.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="17lapBat">17.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="18lapBat">18.00</button>
        </div>
        <div class="col p-1">
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="19lapBat">19.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="20lapBat">20.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="21lapBat">21.00</button>
          <button type="button" class="btn btn-block btn-secondary col-sm-9" id="22lapBat">22.00</button>
        </div>
        </div>
    </div>
  </div>
</div>

<!-- booking form -->
<div style="background-color: #333333;" class="col">
<h1 class="text-center text-light pt-2">Form Booking Lapangan</h1>
<form class="container text-light">
  <div class="form form-group">
    <label for="name">Nama Pemesan</label>
    <input type="name" class="form-control col-sm-5" id="name" aria-describedby="emailHelp" placeholder="Nama Pemesan">
  </div>
  <div class="form-group">
    <label for="tgl_3">Tanggal</label>
    <input type="date" class="form-control col-sm-5" id="tgl_3" placeholder="Tanggal" disabled="disabled">
  </div>
  <div class="form-group">
    <label for="jam">Jam</label>
    <input type="time" class="form-control col-sm-5" id="jam" placeholder="Jam" disabled="disabled">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Lapangan</label>
    <input type="text" class="form-control col-sm-5" id="Lapangan" placeholder="Lapangan" disabled="disabled">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<!-- footer -->
<footer class=" text-center text-light pb-2 pt-2" style="background-color: #333333;">
  <p></p>
	<p>&copy Copyright 2019 <strong>Merpati Futsal</strong></p>
  <!-- <p>Allright Reserved</p> -->
</footer>

</body>
<script src="assets/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</html>