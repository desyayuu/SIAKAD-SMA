<?php
include 'koneksi.php';

//membuat jika sudah log out tampilkan anda belum login


$guru = array();
$ambil = $koneksi->query("SELECT * FROM guru");

while($tiap = $ambil->fetch_assoc()){
    $guru[]= $tiap;
}
// echo"<pre>";
// print_r($guru);
// echo"</pre>";

?>
<br>
<h4>Data Guru</h4>
<br>
        <div class="row">
            <?php foreach ($guru as $key => $value): ?>
            <div class="col-3">
                <div class="card mb-3">
                    <img src="assets/image/<?php echo $value['foto_guru']?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h6 class="card-title"><?php echo $value['nama_guru']?></h6>
                        <p>NIP: <?php echo $value['induk_guru']?></p>
                        <a href="home_admin.php?halaman=guru_edit&id=<?php echo $value['id_guru']?>" class="btn btn-outline-warning btn-sm">Edit</a>
                        <a href="home_admin.php?halaman=guru_hapus&id=<?php echo $value['id_guru']?>" class="btn btn-outline-danger btn-sm">Hapus</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    <br>
    <a href="home_admin.php?halaman=guru_tambah" class="btn btn-outline-primary btn-sm">Tambah</a>