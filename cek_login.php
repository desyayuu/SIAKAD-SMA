<?php 
//panggil koneksi 
include "koneksi.php";

$pass = md5($_POST['password']);
$user = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $pass);
$level = mysqli_escape_string($koneksi, $_POST['level']);


//cek username, terdaftar atau tidak
$cek_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username ='$user'
and level='$level' ");
$user_valid = mysqli_fetch_array($cek_user);

//uji jika username terdaftar 
if($user_valid){
    //jika username ada 
    //kemudain check password sesuai apa tidak

    if($password == $user_valid['password']){
        session_start();
        $_SESSION['username']=$user_valid['username'];
        $_SESSION['nama_user']=$user_valid['nama_user'];
        $_SESSION['level']=$user_valid['level'];

        //uji level user 
        if($level == "Siswa"){
            header('location:home_siswa.php');
        }elseif($level=="Guru"){
            header('location:home_guru.php');
        }elseif($level=="Admin"){
            header('location:home_admin.php');
        }
    }else{
        echo "<script>alert('Maaf, Password anda tidak sesuai'); 
        document.location='index.php'</script>";
    }    
    
}else{
    echo "<script>alert('Maaf, Username anda tidak terdaftar'); 
    document.location='index.php'</script>";
}
?>