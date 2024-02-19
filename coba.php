<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <style>
    body {
      background-color: #041858;
      font-family: 'Poppins', sans-serif;
    }

    .contact_section {
      padding: 4px 0;
    }

    .contact_section form {
      background-color: #d0d0d0;
      padding: 35px;
      border-radius: 8px;
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    }

    .form-control {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    .form-control:focus {
      outline: none;
      border-color: #007bff;
      box-shadow: 0 0 5px #007bff;
    }

    .btn-primary,
    .btn-danger {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      color: #fff;
    }

    .btn-primary {
      background-color: #007bff;
    }

    .btn-danger {
      background-color: #dc3545;
    }

    .btn-primary:hover,
    .btn-danger:hover {
      opacity: 0.8;
    }

    .center-text {
      text-align: center;
    }
    .title {
    color: white;  /* Warna hitam */
  }
  
  </style>
</head>
<body>
<?php
include "koneksi.php";
   if (isset($_POST["ok"]))
   {
    $NIK=$_POST['NIK'];
    $nama=$_POST['nama'];
    $telp=$_POST['telp'];
    $tgl_pengaduan=$_POST['tgl_pengaduan'];
    $isi_laporan=$_POST['isi_laporan'];
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_path = "foto/" . $gambar; // You may need to create a folder named 'uploads' in your project directory

    move_uploaded_file($gambar_tmp, $gambar_path);
    
    $result = mysqli_query ($koneksi, "INSERT INTO pengaduan (tgl_pengaduan,NIK,isi_laporan,gambar) VALUES ('$tgl_pengaduan','$NIK','$isi_laporan','$gambar')");
    $resultmasyarakat = mysqli_query ($koneksi, "INSERT INTO masyarakat (NIK,nama,telp) VALUES ('$NIK','$nama','$telp')");
    if ($result) {
      // Jika berhasil, arahkan kembali ke halaman tabel tanggapan
      header("Location: tabelmasyarakat.php");
      exit;
    } else {
        echo "<div class='alert alert-danger'> Gagal menambah data baru!</div>";
    }
}
?>
  <!-- ... Your existing HTML content ... -->

  <section class="contact_section layout_padding" id="contactLink">
    <div class="container">
      <div class="heading_container">
        <br> 
        <center><h3><b>Portal Pengaduan Masyarakat</h3></b>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-8 mx-auto">
        <form method="post" action="" enctype="multipart/form-data">
        <div class="card-body">
    <center><h4 class="title"><b>Form Pengaduan Masyarakat</h4>
            <div class="form-group">
              <input type="number" class="form-control" placeholder="NIK" name="NIK">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Nama" name="nama">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="No Telepon" name="telp">
            </div>
            <div class="form-group">
              <input type="date" class="form-control" placeholder="Tanggal Pengaduan" name="tgl_pengaduan">
            </div>
            <div class="form-group">
  <textarea class="form-control" id="inputMessage" placeholder="Isi laporan" rows="5" name="isi_laporan" ></textarea>
</div>
<div class="center-text">
    <div class="form-group" style="display: flex; align-items: center;">
        <label for="inputImage" style="color: grey; margin-right: 10px;">Gambar</label>
        <input type="file" class="form-control-file" id="inputImage" name="gambar" style="padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
</div>



              <button type="submit" name="ok" class="btn btn-primary" >SUBMIT </button>
              <button type="reset" class="btn btn-danger">CANCEL</button>
            </div>
           
            <br>
            <center><a href="tabelmasyarakat.php">Lihat Pengaduan lainnya </a></center>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- ... Your remaining HTML content ... -->

</body>
</html>
