<?php
session_start();

//membuat jika sudah log out tampilkan anda belum login
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>SIAKAD SMANSA</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="/docs/4.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">


    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif; 
            background-color: whitesmoke;
          background-color: #F6F6F6;
        }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">SIAKAD</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Log out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="home_admin.php">
                <i class="bi bi-house"> </i>
                Dashboard 
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home_admin.php?halaman=siswa">
                <i class="bi bi-person-add"> </i>
              Siswa
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home_admin.php?halaman=guru">
                <i class="bi bi-person-add"> </i>
              Guru
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home_admin.php?halaman=jurusan">
                <i class="bi bi-book"> </i>
              Jurusan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home_admin.php?halaman=tahunajaran">
                <i class="bi bi-calendar"> </i>
              Tahun Ajaran
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home_admin.php?halaman=kelas">
            <i class="bi bi-bank"> </i>
              Kelas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home_admin.php?halaman=kategori">
            <i class="bi bi-tag"> </i>
              Kategori
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home_admin.php?halaman=mapel">
            <i class="bi bi-book"> </i>
              Mata Pelajaran
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home_admin.php?halaman=mengajar">
            <i class="bi bi-controller"> </i>
              Mengajar
            </a>
          </li>
      </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <?php

        //jika di url ada halaman 
        if(isset($_GET['halaman'])){
          if($_GET['halaman']=="siswa"){
            include "siswa.php";
          }elseif($_GET['halaman']=='siswa_edit'){
            include "siswa_edit.php";
          }elseif($_GET['halaman']=='siswa_hapus'){
            include "siswa_hapus.php";
          }elseif($_GET['halaman']=='siswa_tambah'){
            include "siswa_tambah.php";
          }elseif($_GET['halaman']=='guru'){
            include "guru.php";
          }elseif($_GET['halaman']=='guru_tambah'){
            include "guru_tambah.php";
          }elseif($_GET['halaman']=='guru_edit'){
            include "guru_edit.php";
          }elseif($_GET['halaman']=='guru_hapus'){
            include "guru_hapus.php";
          }elseif($_GET['halaman']=='jurusan'){
            include "jurusan.php";
          }elseif($_GET['halaman']=='tahunajaran'){
            include "tahun.php";
          }elseif($_GET['halaman']=='tahun_tambah'){
            include "tahun_tambah.php";
          }elseif($_GET['halaman']=='kelas'){
            include "kelas.php";
          }elseif($_GET['halaman']=='kelas_tambah'){
            include "kelas_tambah.php";
          }elseif($_GET['halaman']=='kategori'){
            include "kategori.php";
          }elseif($_GET['halaman']=='mapel'){
            include "mapel.php";
          }elseif($_GET['halaman']=='mapel_tambah'){
            include "mapel_tambah.php";
          }elseif($_GET['halaman']=='mengajar'){
            include "mengajar.php";
          }elseif($_GET['halaman']=='siswakelas'){
            include "siswakelas.php";
          }
      }
      else{
        include 'dashboard.php';
      }
      ?>
    </main>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>
