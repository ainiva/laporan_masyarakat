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

// Inisialisasi variabel
$id_tanggapan = $id_pengaduan = $isi_laporan = "";
$tgl_tanggapan = $tanggapan = "";

// Cek jika ada parameter ID dari URL
if(isset($_GET['id_pengaduan'])) {
    $id_pengaduan = $_GET['id_pengaduan'];
    
    // Ambil data pengaduan dari database
    $result_pengaduan = mysqli_query($koneksi, "SELECT isi_laporan FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");
    
    if ($result_pengaduan && mysqli_num_rows($result_pengaduan) > 0) {
        $row = mysqli_fetch_assoc($result_pengaduan);
        $isi_laporan = $row['isi_laporan'];
    }
}

// Proses form jika tombol Submit ditekan
if (isset($_POST["submit"])) {
    $tgl_tanggapan = date("Y-m-d");
    $tanggapan = $_POST['tanggapan'];

    session_start();
    $id_petugas  = $_SESSION['id_petugas'];

    // Simpan data tanggapan ke database
    $result = mysqli_query($koneksi, "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES ('$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')");
    $hapus_tanggapan = mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan=$id_pengaduan");
    if ($result) {
        // Jika berhasil, arahkan kembali ke halaman tabel tanggapan
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
        <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $id_petugas; ?>"readonly>
          
            <div class="form-group">
            <input type="text" name="id_pengaduan" class="form-control" value="<?php echo $id_pengaduan; ?>"readonly>
            </div>
            <div class="form-group">
              <input type="text" name="isi_laporan" class="form-control" value="<?php echo $isi_laporan; ?>"readonly>
            </div>
            <div class="form-group">
            <input type="date" name="tgl_tanggapan" class="form-control" placeholder="Tanggal Tanggapan">
           
            </div>
            <div class="form-group">
  <textarea class="form-control" id="inputMessage" placeholder="Tanggapan" rows="5" name="tanggapan" ></textarea>
</div>
            <div class="center-text">
              <button type="submit" name="submit" class="btn btn-primary" >SUBMIT </button>
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
