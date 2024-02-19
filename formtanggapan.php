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
  </style>
</head>
<body>
<?php
include "koneksi.php";

$id_pengaduan = $isi_laporan = $tgl_pengaduan = ""; // Inisialisasi variabel

if (isset($_GET['id'])) {
    $id_pengaduan = $_GET['id'];
    $result_pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan=$id_pengaduan");
    while ($data_pengaduan = mysqli_fetch_array($result_pengaduan)) {
        $tgl_pengaduan = $data_pengaduan['tgl_pengaduan'];
        $isi_laporan = $data_pengaduan['isi_laporan'];
    }
}

if (isset($_POST["submit"])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $isi_laporan = $_POST['isi_laporan'];
    $tgl_pengaduan = $_POST['tgl_pengaduan'];
    $tanggapan = $_POST['tanggapan'];
    $tgl_tanggapan = date("Y-m-d");
    

    $result = mysqli_query($koneksi, "INSERT INTO tanggapan (id_pengaduan, isi_laporan, tgl_tanggapan, tanggapan) VALUES ('$id_pengaduan', '$isi_laporan', '$tgl_tanggapan', '$tanggapan')");

    if ($result) {
        header("Location: tabeltanggapan.php");
        exit;
    } else {
        echo "Terjadi kesalahan saat menambahkan tanggapan.";
    }
    
}
?>
  <!-- ... Your existing HTML content ... -->
  <section class="contact_section layout_padding" id="contactLink">
    <div class="container">
      <div class="heading_container">
        <br>
        <h3><b>Form Tanggapan Pengaduan </h3></b>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-8 mx-auto">
        <form method="post" action="">
            <div class="form-group">
              <input type="number"  name="id_pengaduan" class="form-control" value="<?php echo $row['id_pengaduan'];?>">
            </div>
            <div class="form-group">
              <input type="text" name="isi_laporan" class="form-control" value="<?php echo $isi_laporan; ?>"readonly>
            </div>
            <div class="form-group">
            <input type="text" name="tgl_tanggapan" class="form-control" value="<?php echo $tgl_tanggapan; ?>" readonly>
            </div>
            <div class="form-group">
  <textarea class="form-control" id="inputMessage" placeholder="Tanggapan" rows="5" name="tanggapan" ></textarea>
</div>
            <div class="center-text">
              <button type="submit" name="ok" class="btn btn-primary" >SUBMIT </button>
              <button type="reset" class="btn btn-danger">CANCEL</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- ... Your remaining HTML content ... -->
</body>
</html>
