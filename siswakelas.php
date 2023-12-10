<?php
include 'koneksi.php';

//membuat jika sudah log out tampilkan anda belum login
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}

$id= $_GET['id'];


$ambil = $koneksi->query("SELECT * FROM kelas
    LEFT JOIN tahun ON kelas.id_tahun=tahun.id_tahun
    LEFT JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan
    WHERE kelas.id_kelas = '$id'
");

$kelas = $ambil->fetch_assoc();

// echo"<pre>";
// print_r($kelas);
// echo"</pre>";

$siswakelas = array();
$ambil = $koneksi->query("SELECT * FROM siswakelas 
LEFT JOIN siswa ON siswakelas.id_siswa=siswa.id_siswa
LEFT JOIN tahun ON siswa.id_tahun=tahun.id_tahun
WHERE siswakelas.id_kelas='$id'");

while($tiap = $ambil->fetch_assoc()){
    $siswakelas[]=$tiap;
}
// echo"<pre>";
// print_r($siswakelas);
// echo"</pre>";

?>
<br>
<h4>Data Siswa Kelas</h4>
<div class="row">
    <div class="col-5">
            <table class="table">
                <tr>
                    <td>Tahun Ajaran</td>
                    <td><?php echo $kelas['tahun_ajaran']?></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td><?php echo $kelas['nama_jurusan']?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td><?php echo $kelas['nama_kelas']?> - <?php echo $kelas['ruang_kelas']?></td>
                </tr>
            </table>
    </div>
</div>
    <table class="table table-striped">
        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID Siswa</th>
                                <th scope="col">Tahun Masuk</th>
                                <th scope="col">No Induk</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>

                            </tr>
                        </thead>
                        <?php foreach ($siswakelas as$key => $value): ?>
                            <tbody>
                                <th scope="row"><?php echo $key+1; ?></th>
                                <td><?php echo $value['id_siswa']?></td>
                                <td><?php echo $value['tahun_ajaran']?></td>
                                <td><?php echo $value['noinduk_siswa']?></td>
                                <td><?php echo $value['nama_siswa']?></td>
                                <td><?php echo $value['kelamin_siswa']?></td>

                            </tbody>
                        <?php endforeach ?>
                        </table>                
