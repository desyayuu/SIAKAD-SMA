<?php
include 'koneksi.php';

//membuat jika sudah log out tampilkan anda belum login


$user = array();

$ambil = $koneksi->query("SELECT * FROM user");
while($tiap = $ambil->fetch_assoc()){
    $user[]= $tiap;
}
echo"<pre>";
print_r($user);
echo"</pre>";
?>

<br>
<h4>Data Admin</h4>

<!-- <div class="row">
                <table class="table table-striped">
                    <?php foreach ($user as$key => $value): ?>
                        <tbody>
                            <th scope="row"><?php echo $key+1; ?></th>
                            <td><?php echo $value['id']?></td>
                            <td><?php echo $value['username']?></td>
                            <td><?php echo $value['nama_user']?></td>
                            <td><?php echo $value['password']?></td>
                        </tbody>
                    <?php endforeach ?>
                    </table>
        </div> -->

<div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class = "mb3">
                        <label>Foto Lama</label><br>
                        <img src="assets/image/<?php echo $siswa['foto_siswa'] ?>" width="200">
                    </div>
                    <div class = "mb3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $user['nama_user'] ?>" required>
                    </div>
                    <div class = "mb3">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="induksiswa" value="<?php echo $siswa['noinduk_siswa'] ?>" required>
                    </div>
                    <div class = "mb3">
                        <label for="">Password</label>
                        <input type="text" class="form-control" name="password">
                        <p class="small text-primary">Kosongkan jika password tidak diubah</p>
                    </div>
                    
                    <div class = "mb3">
                        <label for="">Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                    <hr>
                    <button class="btn btn-primary btn-sm" name="simpan">Simpan</button>
                </form>
            </div>
            
        </div>

        
    </main>
  </div>