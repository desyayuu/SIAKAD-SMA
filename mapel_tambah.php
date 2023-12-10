<?php
include 'koneksi.php';

//membuat jika sudah log out tampilkan anda belum login
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}

if(isset($_POST['simpan'])){

    $id_kat = $_POST['id_kat'];
    $nama_mapel = $_POST['nama_mapel'];
    
    $koneksi->query("INSERT INTO mapel(id_kategori, nama_mapel)
        VALUES('$id_kat', '$nama_mapel') ");

    echo "<script>alert('data tersimpan')</script>";
    echo "<script>location='home_admin.php?halaman=mapel'</script>";

}   

?>
<br>
        <h4>Tambah Tahun</h4>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <br>
                    <div class = "mb3">
                        <label for="">Nama Mapel</label>
                        <input type="text" class="form-control" name="nama_mapel" required>
                    </div>
                    <div class="mb3">
                        <label for="">Katgeori</label>
                        <select class="form-control" name="id_kat">
                            <option value="">Pilih</option>
                            <option value="1">Kategori A - Umum</option>
                            <option value="2">Kategori B - Peminatan MIPA</option>
                            <option value="3">Kategori C - Lintas Minat MIPA</option>
                            <option value="4">Kategori D - Peminatan IPS</option>
                            <option value="5">Kategori E - Lintas Minat IPS</option>
                            <option value="6">Kategori F - Peminatan Bahasa</option>
                            <option value="7">Kategori G - Lintas Minat Bahasa</option>
                        </select>
                    </div>
                    <br>
                    <button class="btn btn-primary btn-sm" name="simpan">Simpan</button>
                </form>

            </div>
</div>


