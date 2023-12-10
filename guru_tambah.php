<?php
include 'koneksi.php';

//membuat jika sudah log out tampilkan anda belum login
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}

$guru = array();

$ambil = $koneksi->query("SELECT * FROM guru");
while($tiap = $ambil->fetch_assoc()){
    $guru[]= $tiap;
}
// echo"<pre>";
// print_r($guru);
// echo"</pre>";

if(isset($_POST['simpan'])){
    //bagian Foto
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    
    $namafoto = date("YdHis").$namafoto;

    move_uploaded_file($lokasifoto, "assets/image/".$namafoto);

    $ps = sha1($_POST['password']);
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    
    $koneksi->query("INSERT INTO guru(induk_guru,password_guru,nama_guru,kelamin_guru,alamat_guru,foto_guru)
        VALUES('$nip', '$ps', '$nama', '$jk', '$alamat', '$namafoto') ");

    echo "<script>alert('data tersimpan')</script>";
    echo "<script>location='home_admin.php?halaman=guru'</script>";

}   

?>
<br>
        <h4>Tambah Guru</h4>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class = "mb3">
                        <label for="">NIP</label>
                        <input type="text" class="form-control" name="nip" required>
                    </div>
                    <div class = "mb3">
                        <label for="">Password</label>
                        <input type="text" class="form-control" name="password" required>
                    </div>
                    <div class = "mb3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class = "mb3">
                        <label for="">Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option value="">Pilih</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class = "mb3">
                        <label for="">Alamat</label>
                        <textarea class="form-control" name="alamat"></textarea>
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
  </div>
</div>


