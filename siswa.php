<?php
include 'koneksi.php';

//membuat jika sudah log out tidak dapat mengakses halaman lagi
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}


$siswa = array();
$ambil = $koneksi->query("SELECT * FROM siswa 
LEFT JOIN tahun ON siswa.id_tahun = tahun.id_tahun
LEFT JOIN jurusan ON siswa.id_jurusan = jurusan.id_jurusan");

while($tiap = $ambil->fetch_assoc()){
    $siswa[]= $tiap;
}


// echo"<pre>";
// print_r($siswa);
// echo"</pre>";


?>
<br>
<h4>Data Siswa</h4>

        <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Siswa</th>
                            <th scope="col">Tahun Masuk</th>
                            <th scope="col">No Induk</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <?php foreach ($siswa as$key => $value): ?>
                        <tbody>
                            <th scope="row"><?php echo $key+1; ?></th>
                            <td><?php echo $value['id_siswa']?></td>
                            <td><?php echo $value['tahun_ajaran']?></td>
                            <td><?php echo $value['noinduk_siswa']?></td>
                            <td><?php echo $value['nama_siswa']?></td>
                            <td><?php echo $value['kelamin_siswa']?></td>
                            <td><?php echo $value['nama_jurusan']?></td>
                            <td>
                                <a href="home_admin.php?halaman=siswa_edit&id=<?php echo $value['id_siswa']?>" class="btn btn-outline-warning btn-sm">Edit</a>
                                <a href="home_admin.php?halaman=siswa_hapus&id=<?php echo $value['id_siswa']?>" class="btn btn-outline-danger btn-sm">Hapus</a>
                            </td>
                        </tbody>
                    <?php endforeach ?>
                    </table>
        </div>
        <a href="home_admin.php?halaman=siswa_tambah" class="btn btn-outline-primary btn-sm">Tambah</a>