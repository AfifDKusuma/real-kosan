<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto Kosan -- Realkosan</title>
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
<h1 class="text-center">Akun</h1>
<br>
  <div class="card" style="width:50%;position:absolute;left:25%">
    <div class="card-body">
      <h5 class="card-title">AFIF, IKHSAN, VELIA </h5>
      <h6 class="card-subtitle mb-2 text-muted">dummy@dummy.com</h6>
      <p class="card-text">12345</p>
      <a href="upload.php" class="btn btn-primary" style="position:absolute;right:34%;">Tambahkan Data Kosan</a>
      <a href="Home.php" class="btn btn-secondary"> Kembali</a>
      <br>
      <br>
    </div>
  </div>
  <?php
    if(isset($_GET['pesan'])){
      if($_GET['pesan'] == "sukses"){
        echo '<p style="position:absolute;bottom:36%;left:43%;">Data berhasil ditambahkan!</p>';
      }
    }
  ?>
</div>
</body>
</html>