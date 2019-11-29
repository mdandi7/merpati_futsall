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

  <script src="../js/jquery-1.12.4.min.js"></script>
  <script type="text/javascript" src="js/JSfunction.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      OnFunctionLoad();
    });

    function OnFunctionLoad(){
      $(".input-update").hide();

      $(".button-edit").click(function(e){
          $(this).parentsUntil("tr").siblings("td").find(".input-update").show();
          $(this).parentsUntil("tr").siblings("td").find(".div-show").hide();
          $(this).parentsUntil("tr").siblings("td").find(".button-update").attr("disabled", false);
          //$(".input-update").show();
      });

      $(".button-update").click(function(e){
          var but_updt = this;
          var lap_id = $(but_updt).parentsUntil("tr").siblings("td").find(".input-0").val();
          var nama = $(but_updt).parentsUntil("tr").siblings("td").find(".input-1").val();
          var harga = $(but_updt).parentsUntil("tr").siblings("td").find(".input-2").val();

          $.ajax({
            type: "POST",
            url:'update-lap-ajax.php',
            data: {
              lap_id: lap_id,
              nama: nama,
              harga: harga,
              ind: 'update'
            },
            complete: function(response) {
              $(but_updt).attr("disabled", true);
              $(but_updt).parentsUntil("tr").siblings("td").find(".input-update").hide();
              $(but_updt).parentsUntil("tr").siblings("td").find(".div-show").show();
              $(but_updt).parentsUntil("tr").siblings("td").find(".div-show-1").html(nama);
              $(but_updt).parentsUntil("tr").siblings("td").find(".div-show-2").html(harga);
            },
            error: function() {
                alert("Database bermasalah");
            },
          });
          return false;
      });

      $(".button-delete").click(function(e){
          var but_del = this;
          var lap_id = $(but_del).parentsUntil("tr").siblings("td").find(".input-0").val();

          $.ajax({
            type: "POST",
            url:'update-lap-ajax.php',
            data: {
              lap_id: lap_id,
              ind: 'delete'
            },
            complete: function(response) {
              $(but_del).closest("tr").remove();
            },
            error: function() {
                alert("Database bermasalah");
            },
          });
          return false;
      });

      $(".button-insert").click(function(e){
          var but_ins = this;
          var nama = $(but_ins).parentsUntil("tr").siblings("td").find(".input-1").val();
          var harga = $(but_ins).parentsUntil("tr").siblings("td").find(".input-2").val();
          
          $.ajax({
            type: "POST",
            url:'update-lap-ajax.php',
            data: {
              nama: nama,
              harga: harga,
              ind: 'insert'
            },
            complete: function(response) {
              $(but_ins).closest("tr").before(response.responseText);
              $(but_ins).parentsUntil("tr").siblings("td").find(".input-1").val("");
              $(but_ins).parentsUntil("tr").siblings("td").find(".input-2").val("");
              OnFunctionLoad();
            },
            error: function() {
                alert("Database bermasalah");
            },
          });
          return false;
      });

    };
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

<div class="container py-4">
  <h5>Data Lapangan</h5>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Lap Code</th>
      <th scope="col">Nama</th>
      <th scope="col">Harga</th>
      <th scope="col">Edit</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $query = mysqli_query($connection,"SELECT * FROM lapangan");

    $rows = mysqli_num_rows($query);
    for($i=0;$i<$rows;$i++){
      $result = mysqli_fetch_assoc($query);
      //$namaobat_pass = $result['nama_obat'];
      echo "<tr><td><div class='div-show div-show-0'>" .$result['lap_id']. "</div><input type='text' class='input-update input-0' readonly value='" .$result['lap_id']. "'></td>";
      echo "<td><div class='div-show div-show-1'>" .$result['nama_lap']. "</div><input type='text' class='input-update input-1' value='" .$result['nama_lap']. "'></td>";
      echo "<td><div class='div-show div-show-2'>" .$result['harga_lap']. "</div><input type='text' class='input-update input-2' value='" .$result['harga_lap']. "'></td>";
      echo "<td><input class='button-edit btn btn-md btn-primary btn-info btn-block' type='submit' value='Edit'></input></td>";
      echo "<td><input class='button-update btn btn-md btn-primary btn-info btn-block' type='submit' value='Update' disabled></input></td>";
      echo "<td><input class='button-delete btn btn-md btn-primary btn-info btn-block' type='submit' value='Delete'></input></td></tr>";
    }
  ?>
    <tr>
      <td>Tambah :</td>
      <td><input type='text'  class='input-1' placeholder="Nama Lapangan" ></td>
      <td><input type='text'  class='input-2' placeholder="Harga Sewa" ></td>
      <td></td>
      <td></td>
      <td>
      <input class='button-insert btn btn-md btn-primary btn-outline-info btn-block' type='submit' value='Tambah Lapangan'></td>
    </tr>
  </tbody>
</table>
<button class="btn btn-info">print</button>
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