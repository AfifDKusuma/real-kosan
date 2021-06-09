<?php
$host="localhost";
$user="root";
$pass="";
$koneksi=@mysql_connect($host,$user,$pass);
if(!$koneksi){
	echo "Gagal koneksi=".mysql_error();
	exit();
}
//memilih database
$milih=@mysql_select_db($db,$koneksi);
if(!$milih){
		exit("Gagal memilih database:".mysql_error());
}
?>