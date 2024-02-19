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
    textarea {
      height:50%;
    }
  </style>
</head>

<body>
<?php
include "koneksi.php";

// Assuming 'id' is the parameter you are passing in the URL
$id = $_GET['id'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming you have form fields named 'tgl_tanggapan' and 'tanggapan'
    $tgl_tanggapan_new = $_POST['tgl_tanggapan'];
    $tanggapan_new = $_POST['tanggapan'];

    // Update the tanggapan data
    $updateQuery = "UPDATE tanggapan SET tgl_tanggapan='$tgl_tanggapan_new', tanggapan='$tanggapan_new' WHERE id_tanggapan=$id";

    if (mysqli_query($koneksi, $updateQuery)) {
      header('location:tabeltanggapan.php');
        echo "Tanggapan updated successfully.";
    } else {
        echo "Error updating tanggapan: " . mysqli_error($koneksi);
    }
}

// Retrieve tanggapan data
$result = mysqli_query($koneksi, "SELECT * FROM tanggapan WHERE id_tanggapan=$id");
if ($data = mysqli_fetch_array($result)) {
    $id_pengaduan = $data['id_pengaduan'];
    $tanggapan = $data['tanggapan'];
    $tgl_tanggapan = $data['tgl_tanggapan'];

    // Retrieve pengaduan data
    $result_pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan=$id_pengaduan");
    if ($data_pengaduan = mysqli_fetch_array($result_pengaduan)) {
        $tgl_pengaduan = $data_pengaduan['tgl_pengaduan'];
        $isi_laporan = $data_pengaduan['isi_laporan'];
    } else {
        // Handle the case where no data is found in pengaduan table
        echo "Error: Data not found in pengaduan table.";
    }
} else {
    // Handle the case where no data is found in tanggapan table
    echo "Error: Data not found in tanggapan table.";
}
?>


  <!-- Your existing HTML content -->

  <section class="contact_section layout_padding" id="contactLink">
    <div class="container">
      <div class="heading_container">
        <br>
        <h3><b>Form Edit Pengaduan </h3></b>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-8 mx-auto">
          <form method="post" action="">
          <div class="mb-3 input-group">
ID Pengaduan
</div>
            <div class="form-group">
              <input type="number" name="id_pengaduan" class="form-control" value="<?php echo $id_pengaduan; ?>" readonly>
            </div>
            <div class="mb-3 input-group">
              Isi Laporan
        </div>
            <div class="form-group">
            <textarea style="height: 100px;" name="isi_laporan" class="form-control" rows="5" readonly><?php echo $isi_laporan; ?></textarea>
            </div>
            <div class="mb-3 input-group">
Tanggal Tanggapan
        </div>
            <div class="form-group">
              <input type="date" name="tgl_tanggapan" class="form-control" value="<?php echo $tgl_tanggapan; ?>" >
            </div>
            <div class="mb-3 input-group">
Tanggapan
        </div>
            <div class="form-group">
              
              <input type="text" name="tanggapan" class="form-control" value="<?php echo $tanggapan; ?>">
            </div>

            <div class="center-text">
              <button type="submit" name="ok" class="btn btn-primary">SUBMIT </button>
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
