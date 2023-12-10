<?php 
require 'koneksi.php';
$id_guru=$_GET['id'];

$koneksi->query("DELETE FROM guru WHERE id_guru= '$id_guru'");

echo "<script>alert('Data berhasil dihapus')</script>";
echo "<script>location='home_admin.php?halaman=guru'</script>";

?>