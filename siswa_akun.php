<?php
include 'koneksi.php';

//membuat jika sudah log out tampilkan anda belum login
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}

$siswa = array();

$ambil = $koneksi->query("SELECT siswa.nama_siswa, user.username, user.password, siswa.alamat_siswa, siswa.foto_siswa FROM siswa JOIN user ON siswa.nama_siswa=user.nama_user");
while($tiap = $ambil->fetch_assoc()){
    $siswa[]= $tiap;
}


echo"<pre>";
print_r($siswa);
echo"</pre>";

?>
<br>
<h4>Akun Siswa</h4>
<div class="row">
                <table class="table table-striped">
                    <?php foreach ($siswa as$key => $value): ?>
                        <tbody>
                            <th scope="row"><?php echo $key+1; ?></th>
                            <td><?php echo $value['foto_siswa']?></td>
                            <td><?php echo $value['nama_siswa']?></td>
                            <td><?php echo $value['username']?></td>
                            <td><?php echo $value['password']?></td>
                            <td><?php echo $value['alamat_siswa']?></td>
                            <td>
                                <a href="home_siswa.php?halaman=siswa_edit&id=<?php echo $value['nama_siswa']?>" class="btn btn-outline-warning btn-sm">Edit</a>
                            </td>
                        </tbody>
                    <?php endforeach ?>
                    </table>
        </div>

    