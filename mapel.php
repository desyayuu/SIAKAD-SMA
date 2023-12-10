<?php
include 'koneksi.php';

//membuat jika sudah log out tampilkan anda belum login
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}

$mapel = array();

$ambil = $koneksi->query("SELECT * FROM mapel 
    LEFT JOIN kategori ON mapel.id_kategori = kategori.id_kategori");
while($tiap = $ambil->fetch_assoc()){
    $mapel[]= $tiap;
}
// echo"<pre>";
// print_r($mapel);
// echo"</pre>";

?>
<br>
<h4>Data Kategori Mata Pelajaran</h4>

        <div class="row">

            
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">ID</th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Kategori</th>
                        </tr>
                    </thead>
                    <?php foreach ($mapel as$key => $value): ?>
                        <tbody>
                            <!-- <th scope="row"><?php echo $key+1; ?></th> -->
                            <td><?php echo $value['id_mapel']?></td>
                            <td><?php echo $value['nama_mapel']?></td>
                            <td><?php echo $value['nama_kategori']?></td>

                        </tbody>
                    <?php endforeach ?>
                </table>
            

        </div>
        <a href="home_admin.php?halaman=mapel_tambah" class="btn btn-outline-primary btn-sm">Tambah</a>