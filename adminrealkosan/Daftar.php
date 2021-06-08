<?php
    //Koneksi Database
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "dbkosan";

    $koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));
  
    //jika tombol simpan diklik
    if(isset($_POST['bsimpan']))
    {
            //Pengujian apakah data akan diedit atau disimpan baru
            if($_GET['hal'] == "edit")
            {
                //Data akan diedit
                $edit = mysqli_query($koneksi, " UPDATE tpenyewa set
                                                        nama = '$_POST[tnama]',
                                                        notelepon = '$_POST[tnotelepon]',
                                                        alamatkosan = '$_POST[talamatkosan]',
                                                        jarakkekampus = '$_POST[tjarakkekampus]',
                                                        fasilitas = '$_POST[tfasilitas]'
                                                 WHERE noktp = '$_GET[id]'


                                               ");
                if($edit) //Jika edit sukses
                {
                    echo "<script>
                            alert('Edit data suksess!');
                            document.location='index.php';
                        </script>";
                }
                else
                {
                    echo "<script>
                            alert('Edit data GAGAL!!');
                            document.location='index.php';
                        </script>";

                }
            }
            else
            {
                //Data akan disimpan baru
                $simpan = mysqli_query($koneksi, "INSERT INTO tpenyewa (nama, notelepon, alamatkosan, jarakkekampus, fasilitas) 
                    VALUES     ('$_POST[tnama]',
                                '$_POST[tnotelepon]',
                                '$_POST[talamatkosan]',
                                '$_POST[tjarakkekampus]',
                                '$_POST[tfasilitas]')
                              ");
                if($simpan) //Jika simpan sukses
                {
                    echo "<script>
                            alert('Simpan data suksess!');
                            document.location='index.php';
                        </script>";
                }
                else
                {
                    echo "<script>
                            alert('Simpan data GAGAL!!');
                            document.location='index.php';
                        </script>";

                }
            }
        
                
      }

      //Pengujian jika tombol Edit / Hapus di klik
      if(isset($_GET['hal']))
       {
            //Pengujian jika edit data
            if($_GET['hal'] == "edit")
            {

                //Tampilkan Data yang akan diedit
                $tampil = mysqli_query($koneksi, "SELECT * FROM tpenyewa WHERE noktp = '$_GET[id]' ");
                $data = mysqli_fetch_array($tampil);
                if($data)
                {
            
                    //jika data ditemukan, maka data ditampung ke dalam variabel
                    $vnama = $data['nama'];
                    $vnotelepon = $data['notelepon'];
                    $valamatkosan = $data['alamatkosan'];
                    $vjarakkekampus = $data['jarakkekampus'];
                    $vfasilitas = $data['fasilitas'];
                }

            }
            else if ($_GET['hal'] == "hapus")
            {
                //Persiapan hapus data
                $hapus = mysqli_query($koneksi, "DELETE FROM tpenyewa WHERE noktp = '$_GET[id]' ");
                if($hapus){    
                    echo "<script>
                            alert('Hapus Data Suksess!!');
                            document.location='Daftar.php';
                        </script>"; 
                }
            }
       }
       
    if(isset($_POST['bsimpan'])){

$direktori = "berkas/";
$file_name=$_FILES['NamaFile']['name'];
move_upload_file($_FILES['NamaFile']['tmp_name'],$direktori.$file_name);
mysqli_query($koneksi, "insert into dokumen set file='$file_name'");

echo "<b>File berhasil diupload";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Real Kosan</title>  
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

        <h1 class="text-center">Real Kosan.com</h1>
            <div class="card-header">
        <h2 class="text-center">Authorized by Mahasiswa IPB University</h2>
            <div class="card-header">
        <h3 class="text-center">Kelompok 12 RPL</h3>
        <a href="Home.php" class="btn btn-secondary"> Kembali</a>

        <!-- Awal Card Form-->
        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                Form Pendaftaran Kos-Kosan
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Input nama anda disni!" required>
            </div>
            <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="tnotelepon" value="<?=@$vnotelepon?>"class="form-control" placeholder="Input No Telepon anda disni!" required>
            </div>
            <div class="form-group">
                        <label>No KTP</label>
                        <input type="text" name="tnoktp" class="form-control" placeholder="Input No KTP anda disni!" required>
            </div>
            <div class="form-group">
                        <label>Alamat Kos-Kosan</label>
                        <textarea class="form-control"name="talamatkosan" class="form-control" placeholder="Input alamat Kos-kosan anda disni!"><?=@$valamatkosan?></textarea>
            </div>
            <div class="form-group">
                        <label>Jarak Ke Kampus</label>
                        <select class="form-control"name="tjarakkekampus">
                            <option value="<?=$vjarakkekampus?>"><?=@$vjarakkemapus?></option>
                            <option value="500 m - 1 Km">500 m - 1 Km</option>
                            <option value="1 Km - 3 Km">1 Km - 3 Km</option>
                            <option value="3 Km - 5 Km">3 Km - 5 Km</option>
                            <option value="Lebih dari 5 Km">Lebih dari 5 Km</option>
                        </select>
            </div>
            <div class="form-group">
                        <label>Fasilitas</label>
                        <textarea class="form-control"name="tfasilitas" value="<?=@$vfasilitas?>"class="form-control" placeholder="Input Fasilitas Kos-kosan anda disni!"><?=@$valamatkosan?></textarea>
            
            </div>
                <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

        </div>
        <!-- Akhir Card Form-->

        <!-- Awal Card Table-->
        <div class="card mt-3">
            <div class="card-header bg-success text-white">
                Daftar Penyewa Kos-Kosan
            </div>
            <div class="card-body">
               
               <table class="table table-bordered table-striped">
                    <tr>
                        <th>No.<th>
                        <th>NoTelepon</th>
                        <th>NoKTP_Penyewa</th>
                        <th>Alamat Kos-kosan</th>
                        <th>Jarak Ke Kampus </th>
                        <th>Fasilitas</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM tpenyewa order by noktp desc");
                        while($data = mysqli_fetch_array($tampil)) :

                    ?>
                    <tr>
                        <td><?=$no++;?></td>

                        <td><?=$data['nama']?></td>
                        <td><?=$data['notelepon']?></td>
                        <td><?=$data['noktp']?></td>
                        <td><?=$data['alamatkosan']?></td>
                        <td><?=$data['jarakkekampus']?></td>
                        <td><?=$data['fasilitas']?></td>
                        <td>
                            <a href="Daftar.php?hal=edit&id=<?=$data['noktp']?>" class="btn btn-warning"> Edit </a>
                            <a href="Daftar.php?hal=hapus&id=<?=$data['noktp']?>"
                            onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
                    </tr>
                <?php endwhile; //penutup perulangan while   ?>
                </table>
    </div>
</div>
        <!-- Akhir Card Table-->
    </div>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body>
    </html> 