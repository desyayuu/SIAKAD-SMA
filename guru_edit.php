<?php
require 'koneksi.php';

//membuat jika sudah log out tampilkan anda belum login
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}


$id_guru = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM guru WHERE id_guru = '$id_guru' ");
$guru = $ambil->fetch_assoc();
// echo"<pre>";
// print_r($guru);
// echo"</pre>";

if(isset($_POST['simpan'])){
    
    $ps = sha1($_POST['password']);
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    //bagian foto
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    

    //jika update foto
    if(!empty($lokasifoto)){
      $namafoto = date("YdHis").$namafoto;
      move_uploaded_file($lokasifoto, "assets/image/".$namafoto);


      //cek ubah password juga atau tidak 
      //jika ubah pass
      if(!empty($_POST['password'])){
        $koneksi->query("UPDATE guru SET 
        induk_guru='$nip',
        password_guru='$ps',
        nama_guru='$nama',
        kelamin_guru='$jk',
        alamat_guru='$alamat',
        foto_guru='$namafoto' WHERE id_guru='$id_guru' 
        ");
      //jika tidak ubah pass
      }else{
        $koneksi->query("UPDATE guru SET 
        induk_guru='$nip',
        nama_guru='$nama',
        kelamin_guru='$jk',
        alamat_guru='$alamat',
        foto_guru='$namafoto' WHERE id_guru='$id_guru' 
        ");
      }
      $koneksi->query("");

      //jika tidak update foto
    }else{
      //jika update pass
      if(!empty($_POST['password'])){
        $koneksi->query("UPDATE guru SET 
        induk_guru='$nip',
        password_guru='$ps',
        nama_guru='$nama',
        kelamin_guru='$jk',
        alamat_guru='$alamat' WHERE id_guru='$id_guru'
        ");
      //jika tidak update pass
      }else{
        $koneksi->query("UPDATE guru SET 
        induk_guru='$nip',
        nama_guru='$nama',
        kelamin_guru='$jk',
        alamat_guru='$alamat' WHERE id_guru='$id_guru'
        ");
      }
    }

    echo "<script>alert('data tersimpan')</script>";
    echo "<script>location='home_admin.php?halaman=guru'</script>";
}   
?>
<br>
        <h4>Edit Guru</h4>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class = "mb3">
                        <label for="">NIP</label>
                        <input type="text" class="form-control" name="nip" value="<?php echo $guru['induk_guru'] ?>" required>
                    </div>
                    <div class = "mb3">
                        <label for="">Password</label>
                        <input type="text" class="form-control" name="password">
                        <p class="small text-primary">Kosongkan jika password tidak diubah</p>
                    </div>
                    <div class = "mb3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $guru['nama_guru'] ?>" required>
                    </div>
                    <div class = "mb3">
                        <label for="">Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option value="">Pilih</option>
                            <option value="Laki-Laki" <?php echo $guru['kelamin_guru']=='Laki-Laki' ? 'selected':''; ?> >Laki-Laki</option>
                            <option value="Perempuan" <?php echo $guru['kelamin_guru']=='Perempuan' ? 'selected':''; ?> >Perempuan</option>
                        </select>
                    </div>
                    <div class = "mb3">
                        <label for="">Alamat</label>
                        <textarea class="form-control" name="alamat" ><?php echo $guru['alamat_guru'] ?></textarea>
                    </div>
                    <div class = "mb3">
                        <label>Foto Lama</label><br>
                        <img src="assets/image/<?php echo $guru['foto_guru'] ?>" width="200">
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

