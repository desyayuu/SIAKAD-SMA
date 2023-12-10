<?php
include 'koneksi.php';

//membuat jika sudah log out tampilkan anda belum login
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}

$tahun = array();

$ambil = $koneksi->query("SELECT * FROM tahun");
while($tiap = $ambil->fetch_assoc()){
    $tahun[]= $tiap;
}
// echo"<pre>";
// print_r($tahun);
// echo"</pre>";

?>
<br>
<h4>Data Tahun</h4>

        <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">ID</th>
                        <th scope="col">Tahun Ajaran</th>
                        </tr>
                    </thead>
                    <?php foreach ($tahun as$key => $value): ?>
                        <tbody>
                            <!-- <th scope="row"><?php echo $key+1; ?></th> -->
                            <td><?php echo $value['id_tahun']?></td>
                            <td><?php echo $value['tahun_ajaran']?></td>
                        </tbody>
                    <?php endforeach ?>
                </table>
        </div>
        <a href="home_admin.php?halaman=tahun_tambah" class="btn btn-outline-primary btn-sm">Tambah</a>
