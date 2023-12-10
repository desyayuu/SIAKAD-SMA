<?php

//membuat jika sudah log out tampilkan anda belum login
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}
?>

<html>
  <style>
    .jumbotron{
      background-color:#486294;
      color:white;
    }
  </style>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-5 mr-1 mb-3 border-bottom">
  <div class = "container">
    <div class="jumbotron">
        <h1 class="display-5">Hello,</h1>
        <h1 class="display-4"><b> <?= $_SESSION['nama_user']?></b></h1>
        <p class="lead">Anda berhasil login sebagai <b> <?= $_SESSION['level']?></b></p>
        <!-- <hr class="my-4"> -->
        <!-- <a class="btn btn-danger btn-lg" href="logout.php" role="button">Logout</a> -->
    </div>
  </div>
  </div>
</html>
   

