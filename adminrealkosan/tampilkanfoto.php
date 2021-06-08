<?php
include('prosesupload.php');
$perintah="SELECT * FROM namasiswa order by id desc";
$query=@mysql_query($perintah,$koneksi);
?>
<html>
<head>
<title> Halaman Tampil Foto</title>
</head>
<body>
<table width="500" border="1">
<tr>
<th colspan="4">MENAMPILKAN FOTO / <a href="upload.php">TAMBAH DATA</a><th>
</tr>
<tr>
<td>NO</td>
<td>NAMA</td>
<td>DELETE</td>
</tr>
<?php
while($data=mysql_fetch_array(@query)){
?>
<tr>
<td><?php echo $data['id'];?></td>
<td><?php echo $data['nama'];?></td>
<td align="center"><img src="img/<?php echo $data['foto'];?>" width="60" height= "80"><?td>
<td colspan="2"><a href="delete.php?del=<?php echo $data['id']?>">DELETE</a><td>

<!--path gambarnya sertakan-->
</tr>
<?php }?>
</table>

<body>
</html>