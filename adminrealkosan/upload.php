<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto -- Realkosan</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <a class="navbar-brand" href="Home.php"><img src="img/logo2.jpg" width="32" height="32" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="position:absolute;right:125px;">
    <ul class="navbar-nav mr-auto">
      <li><a class="nav-link" href="Home.php">Logout</a></li>
    </ul>
  </div>
  </div>
</nav>
<div class="container">
<br>
<br>
  <h1 class="text-center">Upload Foto</h1>
  <p class="text-center">Upload foto Kosan anda.</p>
<br>
  <div class="card" style="width:50%;position:absolute;left:25%">
    <div class="card-body">
      <div class="form-group">
        <form action="prosesupload.php" method="post" enctype="multipart/form-data">
          Pilih foto <input type="file" name="foto" class="form-control">
          <br>
          <input type="submit" class="btn btn-success" value="Upload" style="position:absolute;right:50%;">
          <a href="akun.php?pesan=sukses" class="btn btn-secondary" style="position:absolute;right:38%;"> Lewati</a>
          <br>
        </form>
      </div>
    </div>
  </div>
    <?php
      if(isset($_GET['pesan'])){
	      if($_GET['pesan'] == "gagal"){
	        echo '<p style="position:absolute;bottom:30%;left:45%;">Upload foto gagal!</p>';
	      }
      }
    ?>
<footer class="text-center light" style="position:absolute;left:41%;bottom:4%;">© Project Group 2 - Basdat 2020</footer>
</div>
</body>
</html>