<?php
include 'koneksi.php';

//membuat jika sudah log out tampilkan anda belum login
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}

$mengajar = array();

$ambil = $koneksi->query("SELECT * FROM mengajar
    LEFT JOIN guru ON mengajar.id_guru = guru.id_guru
    LEFT JOIN mapel ON mengajar.id_mapel = mapel.id_mapel
    LEFT JOIN kategori ON mengajar.id_kategori = kategori.id_kategori
    LEFT JOIN kelas ON mengajar.id_kelas = kelas.id_kelas
    LEFT JOIN jurusan ON mengajar.id_jurusan = jurusan.id_jurusan
    LEFT JOIN tahun ON mengajar.id_tahun = tahun.id_tahun
    ");
while($tiap = $ambil->fetch_assoc()){
    $mengajar[]= $tiap;
}
// echo"<pre>";
// print_r($mengajar);
// echo"</pre>";

?>
<br>
<h4>Data Mengajar</h4>
        <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Guru</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Semester</th>
                            <th scope="col">KKM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mengajar as$key => $value): ?>
                            <tr>
                                <th scope="row"><?php echo $key+1; ?></th>
                                <td>
                                    <?php echo $value['nama_guru']?><br>
                                    <i class="small"><?php echo $value['induk_guru']?></i>
                                </td>
                                <td>
                                    <?php echo $value['nama_mapel']?><br>
                                    <i class="small"><?php echo $value['nama_kategori']?></i>
                                </td>
                                <td>
                                    <?php echo $value['nama_kelas']?><br>
                                    <i class="small"><?php echo $value['nama_jurusan']?></i>
                                    <?php echo $value['ruang_kelas']?><br>
                                    <i class="small"><?php echo $value['tahun_ajaran']?></i>
                                </td>
                                
                                <td><?php echo $value['semester']?></td>
                                <td><?php echo $value['kkm']?></td>
                        </tr>
                        
                    <?php endforeach ?>
                </tbody>
                </table>
            

        </div>