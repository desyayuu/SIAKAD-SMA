<?php
include 'koneksi.php';

//membuat jika sudah log out tampilkan anda belum login
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}

$kelas= array();

$ambil = $koneksi->query("SELECT * FROM kelas 
    LEFT JOIN tahun ON kelas.id_tahun = tahun.id_tahun
    LEFT JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan");
while($tiap = $ambil->fetch_assoc()){
    $kelas[]= $tiap;
}
// echo"<pre>";
// print_r($kelas);
// echo"</pre>";

?>
<br>
<h4>Data Kelas</h4>
<div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID Kelas</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">Ruang Kelas</th>
                            <th scope="col">Jenjang</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <?php foreach ($kelas as$key => $value): ?>
                        <tbody>
                            <td><?php echo $value['id_kelas']?></td>
                            <td><?php echo $value['tahun_ajaran']?></td>
                            <td><?php echo $value['nama_jurusan']?></td>
                            <td><?php echo $value['nama_kelas']?></td>
                            <td><?php echo $value['ruang_kelas']?></td>
                            <td><?php echo $value['jenjang_kelas']?></td>
                            <td>
                                <a href="home_admin.php?halaman=siswakelas&id=<?php echo $value['id_kelas']?>" class="btn btn-info btn-sm">Siswa</a>
                            </td>
                            
                        </tbody>
                    <?php endforeach ?>
                    </table>
        </div>
        <a href="home_admin.php?halaman=kelas_tambah" class="btn btn-outline-primary btn-sm">Tambah</a>