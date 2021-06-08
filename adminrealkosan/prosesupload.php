<?php 

$nama_file = $_FILES['foto']['name'];
$nama_sementara = $_FILES['foto']['tmp_name'];

$dir_upload = "img/kosan-";

$terupload = move_uploaded_file($nama_sementara, $dir_upload.$nama_file);

if($terupload){
	header("location:akun.php?pesan=sukses");
}else{
	header("location:upload.php?pesan=gagal");
}

?>