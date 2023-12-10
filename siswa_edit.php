<?php
require 'koneksi.php';

//membuat jika sudah log out tampilkan anda belum login
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}


$id_siswa = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM siswa WHERE id_siswa = '$id_siswa' ");
$siswa = $ambil->fetch_assoc();
// echo"<pre>";
// print_r($siswa);
// echo"</pre>";

if(isset($_POST['simpan'])){
    
    // $ps = sha1($_POST['password']);
    $induk_siswa = $_POST['induksiswa'];
    $jurusan = $_POST['jurusan'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    //bagian foto
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    

    if(!empty($lokasifoto)){
      $namafoto = date("YdHis").$namafoto;
      move_uploaded_file($lokasifoto, "assets/image/".$namafoto);

        $koneksi->query("UPDATE siswa SET 
        noinduk_siswa='$induk_siswa',
        id_jurusan='$jurusan',
        nama_siswa='$nama',
        kelamin_siswa='$jk',
        alamat_siswa='$alamat',
        foto_siswa='$namafoto' WHERE id_siswa='$id_siswa' 
        ");

    }else{
        $koneksi->query("UPDATE siswa SET 
        noinduk_siswa='$induk_siswa',
        id_jurusan='$jurusan',
        nama_siswa='$nama',
        kelamin_siswa='$jk',
        alamat_siswa='$alamat' WHERE id_siswa='$id_siswa'
        ");
    
    }

    echo "<script>alert('data tersimpan')</script>";
    echo "<script>location='home_admin.php?halaman=siswa'</script>";
}
?>
<br>
        <h4>Edit Siswa</h4>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class = "mb3">
                        <label for="">No Induk</label>
                        <input type="text" class="form-control" name="induksiswa" value="<?php echo $siswa['noinduk_siswa'] ?>" required>
                    </div>
                    <div class = "mb3">
                        <label for="">Jurusan</label>
                        <select class="form-control" name="jurusan">
                            <option value="">Pilih</option>
                            <option value="1" <?php echo $siswa['id_jurusan']=='1' ? 'selected':''; ?> >MIPA</option>
                            <option value="2" <?php echo $siswa['id_jurusan']=='2' ? 'selected':''; ?> >IPS</option>
                            <option value="3" <?php echo $siswa['id_jurusan']=='3' ? 'selected':''; ?> >Bahasa</option>
                        </select>
                    </div>
                    <div class = "mb3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $siswa['nama_siswa'] ?>" required>
                    </div>
                    <div class = "mb3">
                        <label for="">Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option value="">Pilih</option>
                            <option value="Laki-Laki" <?php echo $siswa['kelamin_siswa']=='Laki-Laki' ? 'selected':''; ?> >Laki-Laki</option>
                            <option value="Perempuan" <?php echo $siswa['kelamin_siswa']=='Perempuan' ? 'selected':''; ?> >Perempuan</option>
                        </select>
                    </div>
                    <div class = "mb3">
                        <label for="">Alamat</label>
                        <textarea class="form-control" name="alamat" ><?php echo $siswa['alamat_siswa'] ?></textarea>
                    </div>
                    <div class = "mb3">
                        <label>Foto Lama</label><br>
                        <img src="assets/image/<?php echo $siswa['foto_siswa'] ?>" width="200">
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
</div>

