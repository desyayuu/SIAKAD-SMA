<?php
include 'koneksi.php';

//membuat jika sudah log out tampilkan anda belum login
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}

$siswa = array();

$ambil = $koneksi->query("SELECT * FROM siswa");
while($tiap = $ambil->fetch_assoc()){
    $siswa[]= $tiap;
}
// echo"<pre>";
// print_r($guru);
// echo"</pre>";

if(isset($_POST['simpan'])){
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    $namafoto = date("YdHis").$namafoto;

    move_uploaded_file($lokasifoto, "assets/image/".$namafoto);

    $ta = $_POST['id_tahun'];
    $jurusan = $_POST['jurusan'];
    $induk_siswa= $_POST['noinduk'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    
    $koneksi->query("INSERT INTO siswa(id_tahun,id_jurusan,noinduk_siswa,nama_siswa,kelamin_siswa,alamat_siswa,foto_siswa)
        VALUES('$ta', '$jurusan', '$induk_siswa', '$nama', '$jk', '$alamat', '$namafoto') ");

    echo "<script>alert('data tersimpan')</script>";
    echo "<script>location='home_admin.php?halaman=siswa'</script>";
}   

?>
<br>
        <h4>Tambah Siswa</h4>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class = "mb3">
                        <label for="">Tahun Ajaran</label>
                        <select class="form-control" name="id_tahun">
                            <option value="">Pilih</option>
                            <option value="1">2021-2022</option>
                            <option value="2">2022-2023</option>
                            
                        </select>
                    </div>
                    <br>
                    <div class = "mb3">
                        <label for="">Jurusan</label>
                        <select class="form-control" name="jurusan">
                            <option value="">Pilih</option>
                            <option value="1">MIPA</option>
                            <option value="2">IPS</option>
                            <option value="3">Bahasa</option>
                            
                        </select>
                    </div>
                    <br>
                    <div class = "mb3">
                        <label for="">No Induk</label>
                        <input type="text" class="form-control" name="noinduk" required>
                    </div>
                    <br>
                    <div class = "mb3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <br>
                    <div class = "mb3">
                        <label for="">Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option value="">Pilih</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <br>
                    <div class = "mb3">
                        <label for="">Alamat</label>
                        <textarea class="form-control" name="alamat"></textarea>
                    </div>
                    <br>
                    <div class = "mb3">
                        <label for="">Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                    <hr>
                    <button class="btn btn-primary btn-sm" name="simpan">Simpan</button>
                </form>

            </div>
</div>


