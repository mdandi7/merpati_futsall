<?php
include "string.php";
include "configdb.php";
include "db-con.php";
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
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type="text/javascript" src="js/JSfunction.js"></script>
  <script type="text/javascript">
    function fillOnLoad(e){
      fillDate('tgllapA');
      fillDate('tgllapB');
      fillDate('tgllapBat');
      fillDate('tglForm');

      var jam = [7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22];
      for (var i = 0;i < jam.length; i++){
        fillButton(jam[i]);
      }
    }

  function getButtonInfo() {
    var jam = [7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22];
    var lap = ['Lapangan A','Lapangan B','Lapangan Batminton'];
    var lapId = ['lapA','lapB','lapBat'];
    for (var j = 0; j < lap.length; j++){
      for (var i = 0;i < jam.length; i++){
        var lapIdFix = jam[i]+lapId[j];
        var lapId2 = jam[i]+lap[j];
        if(jam[i] < 10){
          var jamFix = '0'+jam[i]+':00:00'; 
        }else{
          var jamFix = jam[i]+':00:00';
        }

        $.ajax({
          type: "POST",
          url:'get-button-avail-ajax.php',
          async:false,
          data: {
            date: document.getElementById('tgllapA').value,
            time: jamFix,
            lapangan: lap[j]
          },
          complete: function (response) {
            if(response.responseText != "0"){
              document.getElementById(lapIdFix).disabled = true;
            }/*else{
              $('#output1').html('salah');
            }
            $('#output').html(response.responseText);*/
          },
          error: function () {
              alert("Database bermasalah");
          },
        });
      }
    }
    /*$.ajax({
        type: "POST",
        url:'get-button-avail-ajax.php',
        data: {
          date: document.getElementById('tgllapA').value
        },
        complete: function (response) {
          /*if(response.responseText == 'test'){
            $('#output').html(response.responseText);
          }else{
            $('#output').html('salah');
          }
          $('#output').html(response.responseText);
        },
        error: function () {
            $('#output').html('Bummer: there was an error!');
        },
    });*/
    return false;
    }
  </script>
</head>

<!-- PAGE BODY -->
<body class="text-monospace" onload="fillOnLoad(); return getButtonInfo();">

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
      <li class="nav-item">
        <a class="nav-link" href="index.php">Beranda<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="booking.php">Booking</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="confirm_booking.php">Booking History</a>
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
      	  <input type="date" class="form-control" id="tgllapA" oninput="fillButtonOnclick(this.value,'lapA');">
  		  </div>
        <?php
          $j = 7;
          for ($i=0; $i<4; $i++){
            echo "<div class='col p-1'>";
            for ($k=$j;$k<$j+4;$k++){
              if($k<10){
                echo "<button type='button' class='btn btn-block btn-secondary col-sm-9' id='",$k,"lapA' value=0",$k,":00 onclick='fillFormBooking(this.value,\"lapA\")'>0",$k,".00</button>";
              }else{
                echo "<button type='button' class='btn btn-block btn-secondary col-sm-9' id='",$k,"lapA' value=",$k,":00 onclick='fillFormBooking(this.value,\"lapA\")'>",$k,".00</button>";
              }
            }
            $j = $j+4;
            echo "</div>";
          }
        ?>
      </div>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body row">
        <div class="col-sm-3">
        	<label for="tgl_1">Tanggal </label>
          <input type="date" class="form-control" id="tgllapB" oninput="fillButtonOnclick(this.value,'lapB');">
		    </div>
        <?php
          $j = 7;
          for ($i=0; $i<4; $i++){
            echo "<div class='col p-1'>";
            for ($k=$j;$k<$j+4;$k++){
              if($k<10){
                echo "<button type='button' class='btn btn-block btn-secondary col-sm-9' id='",$k,"lapB' value=0",$k,":00 onclick='fillFormBooking(this.value,\"lapB\")'>0",$k,".00</button>";
              }else{
                echo "<button type='button' class='btn btn-block btn-secondary col-sm-9' id='",$k,"lapB' value=",$k,":00 onclick='fillFormBooking(this.value,\"lapB\")'>",$k,".00</button>";
              }
            }
            $j = $j+4;
            echo "</div>";
          }
        ?> 
      </div>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body row">
        <div class="col-sm-3">
        	<label for="tgl_2">Tanggal </label>
        	<input type="date" class="form-control" id="tgllapBat" oninput="fillButtonOnclick(this.value,'lapBat');">
  		  </div>
        <?php
          $j = 7;
          for ($i=0; $i<4; $i++){
            echo "<div class='col p-1'>";
            for ($k=$j;$k<$j+4;$k++){
              if($k<10){
                echo "<button type='button' class='btn btn-block btn-secondary col-sm-9' id='",$k,"lapBat' value=0",$k,":00 onclick='fillFormBooking(this.value,\"lapBat\")'>0",$k,".00</button>";
              }else{
                echo "<button type='button' class='btn btn-block btn-secondary col-sm-9' id='",$k,"lapBat' value=",$k,":00 onclick='fillFormBooking(this.value,\"lapBat\")'>",$k,".00</button>";
              }
            }
            $j = $j+4;
            echo "</div>";
          }
        ?> 
        </div>
    </div>
  </div>
</div>

<!-- booking form -->
<div style="background-color: #333333;" class="col">
<h1 class="text-center text-light pt-2">Form Booking Lapangan</h1>
<form class="container text-light" method="post">
  <div class="form form-group">
    <label for="name">Nama Pemesan</label>
    <input type="name" class="form-control col-sm-5" id="name" name="name" placeholder="Nama Pemesan" required="required" value="<?php echo $login_name; ?>" readonly="readonly">
  </div>
  <div class="form-group">
    <label for="tgl_3">Tanggal</label>
    <input type="date" class="form-control col-sm-5" id="tglForm" name="tglForm" placeholder="Tanggal" readonly="readonly">
  </div>
  <div class="form-group">
    <label for="jam">Jam</label>
    <input type="text" class="form-control col-sm-5" id="jam" name="jam" placeholder="Jam" readonly="readonly" required="required">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Lapangan</label>
    <input type="text" class="form-control col-sm-5" id="lapangan" name="lapangan" placeholder="Lapangan" readonly="readonly" required="required">
    <input type="text" class="invisible" id="book_time" name="book_time" placeholder="Lapangan"  required="required" readonly="readonly">
  </div>
  <button type="submit" class="btn btn-primary" id="formbooking" name="formbooking">Book!</button>
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