<?php
include 'koneksi.php';

//membuat jika sudah log out tampilkan anda belum login
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo"<script>alert('Maaf, anda harus login terlebih dahulu untuk mengakses halaman ini');document.location='index.php'</script>";
}

if(isset($_POST['simpan'])){

    // $idkls = $_POST['id_tahun'];
    $idjrs= $_POST['id_jrs'];
    $idta = $_POST['id_tahun'];
    $namakelas = $_POST['nama_kelas'];
    $ruangkelas= $_POST['ruang_kelas'];
    $jenjangkelas = $_POST['jenjang_kelas'];
    
    $koneksi->query("INSERT INTO kelas( id_jurusan, id_tahun, nama_kelas, ruang_kelas, jenjang_kelas)
        VALUES('$idjrs', '$idta', '$namakelas', '$ruangkelas', '$jenjangkelas') ");

    echo "<script>alert('data tersimpan')</script>";
    echo "<script>location='home_admin.php?halaman=kelas'</script>";

}   

?>
<br>
        <h4>Tambah Tahun</h4>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- <div class = "mb3">
                        <label for="">ID Kelas</label>
                        <input type="text" class="form-control" name="id_tahun" required>
                    </div> -->
                    <br>
                    <div class="mb3">
                        <label for="">Tahun</label>
                        <select class="form-control" name="id_tahun">
                            <option value="">Pilih</option>
                            <option value="1">2021-2022</option>
                            <option value="2">2022-2023</option>
                            <option value="3">2023-2024</option>
                        </select>
                    </div>
                    <br>
                    <div class="mb3">
                        <label for="">Jurusan</label>
                        <select class="form-control" name="id_jrs">
                            <option value="">Pilih</option>
                            <option value="1">MIPA</option>
                            <option value="2">IPS</option>
                            <option value="3">Bahasa</option>
                        </select>
                    </div>
                    <br>
                    <div class = "mb3">
                        <label for="">Nama Kelas</label>
                        <input type="text" class="form-control" name="nama_kelas" required>
                    </div>
                    <br>
                    <div class = "mb3">
                        <label for="">Ruang Kelas</label>
                        <input type="text" class="form-control" name="ruang_kelas" required>
                    </div>
                    <div class = "mb3">
                        <label for="">Jenjang Kelas</label>
                        <input type="text" class="form-control" name="jenjang_kelas" required>
                    </div>
                    <button class="btn btn-primary btn-sm" name="simpan">Simpan</button>
                </form>

            </div>
</div>


