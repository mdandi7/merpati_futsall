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
  <script src="js/jquery-1.12.4.min.js"></script>
  <script type="text/javascript" src="js/JSfunction.js"></script>
  <script type="text/javascript">
    function countDownBook(date_v,time_v){
      var countDownDate = new Date(date_v+" "+time_v).getTime();


      var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          
        document.getElementById("book-count-down").innerHTML =
        + minutes + "m " + seconds + "s ";
          
        if (distance <= 0) {
          clearInterval(x);
          document.getElementById("book-count-down").innerHTML = "EXPIRED";
          $(function(){
            $("input.button_udpate").attr("disabled", 'disabled');
          });
        }
      }, 1000);
    };

    $(document).ready(function(){
      $(".button_udpate").click(function(e){
                
        const $but_updt = $(this)
        var book_cd = $but_updt.attr('data-bkcd');
        
        $.ajax({
            type: "POST",
            url:'update-pay-ind-ajax.php',
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
      <li class="nav-item">
        <a class="nav-link" href="booking.php">Booking</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
      <h2 class="mb-0 text-center">
        <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Konfirmasi Pembayaran</button>
        <a style="font-size: 35px;" class="text-light font-weight-light">|</a>
        <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">History Booking</button>
      </h2>
    </div>
     <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body text-justify">
        <?php
			$tgl = $_SESSION['tgl_book'];
            $query = mysqli_query($connection,"SELECT *, addtime(book_time,000500) as book_time_interval FROM lapangan_book WHERE tanggal = '$tgl' AND user_id = '$login_user' AND current_time < addtime(book_time,000500) AND pay_ind = 0 order by tanggal desc");

            $rows = mysqli_num_rows($query);
            $result = mysqli_fetch_assoc($query);
            if($rows > 0){
                echo "<script>";
                echo "countDownBook('" .$result['tanggal']. "','" .$result['book_time_interval']. "');";
                echo "</script>";
                echo "<div class='row justify-content-center'>Silahkan selesaikan pembayaran pada booking anda dan lakukan konfirmasi.</div>";
                echo "<div class='row justify-content-center'>Waktu akan habis dalam &nbsp";
                echo "<p id='book-count-down' class='font-weight-bold' style=' color: red '></p></div>";
                echo "<div class='container border border-primary text-justify'>Pembayaran bisa dilakukan dengan transfer ke rekening berikut :";
                echo "<li>MANDIRI 080989898989 a/n Bastian Ajah</li><li>BRI 080989898989 a/n Bastian Ajah</li>";
                echo "<p class='font-weight-bold'>Total Pembayaran : Rp. 50.000</p></div><br>";
                echo "<table class='table'>";
                echo "<thead class='thead-light'>";
                echo "<tr>";
                echo "<th scope='col'>Booking Code</th>";
                echo "<th scope='col'>Nama</th>";
                echo "<th scope='col'>Tanggal</th>";
                echo "<th scope='col'>Jam</th>";
                echo "<th scope='col'>Lapangan</th>";
                echo "<th scope='col'>Konfirmasi</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
              for($i=0;$i<$rows;$i++){
                if($result['book_ind'] == 1){
                  $disabled = 'disabled';
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
            }else{
              echo "<div class='row justify-content-center'><h5>Anda belum melakukan booking</h5></div>";
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body text-justify">
        <?php
            $query = mysqli_query($connection,"SELECT *, addtime(book_time,000500) as book_time_interval FROM lapangan_book WHERE user_id = '$login_user' order by tanggal desc");

            $rows = mysqli_num_rows($query);
            if($rows > 0){
                echo "<table class='table'>";
                echo "<thead class='thead-light'>";
                echo "<tr>";
                echo "<th scope='col'>Booking Code</th>";
                echo "<th scope='col'>Nama</th>";
                echo "<th scope='col'>Tanggal</th>";
                echo "<th scope='col'>Jam</th>";
                echo "<th scope='col'>Lapangan</th>";
                echo "<th scope='col'>Status</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
              for($i=0;$i<$rows;$i++){
                $result = mysqli_fetch_assoc($query);
                if($result['book_ind'] == 1){
                  $status = 'Berhasil';
                }else if($result['pay_ind'] == 1 && $result['book_ind'] == 0){
                  $status = 'Menunggu konfirmasi Admin';
                }else{
                  $status = 'Tidak di konfirmasi';
                }
                //$namaobat_pass = $result['nama_obat'];
                echo "<tr><td>" .$result['booking_code']. "</td>";
                echo "<td>" .$result['nama']. "</td>";
                echo "<td>" .$result['tanggal']. "</td>";
                echo "<td>" .$result['jam']. "</td>";
                echo "<td>" .$result['lapangan']. "</td>";
                echo "<td>",$status,"</td></tr>";
              }
            }else{
              echo "<div class='row justify-content-center'><h5>Anda belum melakukan booking</h5></div>";
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="container py-4">
  
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