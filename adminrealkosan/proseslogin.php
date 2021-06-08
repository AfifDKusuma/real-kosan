<?php 
include 'config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	header("location:akun.php");
}else{
	header("location:login.php?pesan=gagal");	
}
?>