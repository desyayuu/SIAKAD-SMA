<?php
include 'koneksi.php';

//jika sudah log out maka tidak bisa mengakses halaman lagi.
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}

$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while($tiap = $ambil->fetch_assoc()){
    $kategori[]= $tiap;
}
// echo"<pre>";
// print_r($tahun);
// echo"</pre>";

?>
<br>
<h4>Data Kategori Mata Pelajaran</h4>

        <div class="row">

            
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Kategori</th>
                        </tr>
                    </thead>
                    <?php foreach ($kategori as$key => $value): ?>
                        <tbody>
                            <td><?php echo $value['id_kategori']?></td>
                            <td><?php echo $value['nama_kategori']?></td>
                        </tbody>
                    <?php endforeach ?>
                </table>
        </div>