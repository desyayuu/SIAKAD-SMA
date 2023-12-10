<?php
include 'koneksi.php';

// function cari($keyword)
// {
//     $sql = "SELECT * FROM siswa
//         WHERE
//         nama_siswa LIKE '%$keyword%' OR
//         jenis_kelamin LIKE '%$keyword%' OR
//         Email LIKE '%$keyword%' OR
//         Jurusan LIKE '%$keyword%'";

//     return query($sql);
// }

$carisiswa = array();
function cari($keyword){
    $ambil = $koneksi->query("SELECT * FROM siswa 
    LEFT JOIN tahun ON siswa.id_tahun = tahun.id_tahun
    LEFT JOIN jurusan ON siswa.id_jurusan = jurusan.id_jurusan WHERE 
    nama_siswa LIKE '%$keyword%' OR
    id_siswa LIKE '%$keyword%' OR
    noinduk_siswa LIKE '%$keyword%' OR
    nama_jurusan LIKE '%$keyword%'");

    while($tiap = $ambil->fetch_assoc()){
        $siswa[]= $tiap;
    }
} 


?>

<br>
<h4>Data Siswa</h4>
<form href="home_admin.php?halaman=siswacari=<?php echo $value['id_siswa']?> method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari" href="home_admin.php?halaman=siswacari=<?php echo $value['keyword']?>">cari </button>
</form>
<br>

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
                            <!-- <th scope="col">Alamat</th> -->
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