<?php 
require 'koneksi.php';
$id_siswa=$_GET['id'];

$koneksi->query("DELETE FROM siswa WHERE id_siswa= '$id_siswa'");

echo "<script>alert('Data berhasil dihapus')</script>";
echo "<script>location='home_admin.php?halaman=siswa'</script>";

?>
