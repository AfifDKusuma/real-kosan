<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Database Realkosan</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <a class="navbar-brand" href="Home.php"><img src="img/logo.jpg" width="32" height="32" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="position:absolute;right:125px;">
    <ul class="navbar-nav mr-auto">
      
    </ul>
  </div>
  </div>
</nav>
<div class="container">
<br>
  <h1 class="text-center">Login</h1>
  <p class="text-center">Gunakan akun email pribadi!</p>
<br>
  <div class="card" style="width:40%;position:absolute;left:30%">
    <div class="card-body">
	  <div class="form-group">
	    <form action="proseslogin.php" method="post">
		    Email <input type="text" class="form-control" name="email"> <br/>
    	  Password <input type="password" class="form-control" name="password"> <br/>
        <input type="submit" class="btn btn-success" value="Login">
        <a href="Home.php" class="btn btn-secondary"> Kembali</a>
		  </form>
	  </div>
    <?php
      if(isset($_GET['pesan'])){
	      if($_GET['pesan'] == "gagal"){
	        echo "Login gagal! Email atau password salah!";
	      }
      }
    ?>
	  </div>
  </div>
<br>
<footer class="text-center light" style="position:absolute;left:41%;bottom:4%;">© Project Group 12 - RPL 2021</footer>
</div>
</body>
</html>