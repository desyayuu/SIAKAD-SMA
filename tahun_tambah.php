<?php
include 'koneksi.php';

//membuat jika sudah log out tampilkan anda belum login
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}

if(isset($_POST['simpan'])){
    $ta = $_POST['tahun_ajaran'];
    
    $koneksi->query("INSERT INTO tahun(tahun_ajaran)
        VALUES('$ta') ");

    echo "<script>alert('data tersimpan')</script>";
    echo "<script>location='home_admin.php?halaman=tahunajaran'</script>";

}   

?>
<br>
        <h4>Tambah Tahun</h4>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <br>
                    <div class = "mb3">
                        <label for="">TahunAjaran</label>
                        <input type="text" class="form-control" name="tahun_ajaran" required>
                    </div>
                    <br>
                    <button class="btn btn-primary btn-sm" name="simpan">Simpan</button>
                </form>
            </div>
</div>


