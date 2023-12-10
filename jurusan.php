<?php
include 'koneksi.php';

//jika sudah log out maka tidak bisa mengakses halaman lagi.
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}

$tahun = array();

$ambil = $koneksi->query("SELECT * FROM jurusan");
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
                        <th scope="col">ID</th>
                        <th scope="col">Nama Jurusan</th>
                        </tr>
                    </thead>
                    <?php foreach ($tahun as$key => $value): ?>
                        <tbody>
                            <td><?php echo $value['id_jurusan']?></td>
                            <td><?php echo $value['nama_jurusan']?></td>
                        </tbody>
                    <?php endforeach ?>
                </table>
        </div>