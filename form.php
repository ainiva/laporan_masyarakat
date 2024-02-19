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

  <title>Seotech</title>

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

    $query = mysqli_query($koneksi,"INSERT INTO masyarakat (NIK,nama,telp,) VALUES ('$NIK','$nama','$telp'')"); or die(mysqli_error());

if($query){
$simpan = myesqli_query($koneksi, "INSERT INTO pengaduan (tgl_pengaduan,isi_laporan,)VALUES('$tgl_pengaduan','$isi_laporan')"); or die(mysqli_error());
        if($simpan)
        {
            echo "<div class='alert alert-success'> Sukses menambah data baru!</div>";
        } else {
            echo "<div class='alert alert-danger'> Gagal menambah data baru!</div>";
        }
   }
  }
?>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              Seotech
            </span>
          </a>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="s-1"> </span>
            <span class="s-2"> </span>
            <span class="s-3"> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.html"> Services </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#contactLink">Contact Us</a>
                </li>
              </ul>
            </div>
            <div class="quote_btn-container ">
              <a href="">
                <img src="images/call.png" alt="">
                <span>
                  Call : + 01 1234567890
                </span>
              </a>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <section class="contact_section layout_padding" id="contactLink">
        <div class="container">
          <div class="heading_container">
            <h2>
              Form Pengaduan Masyarakat
            </h2>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
              <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    
                    <input type="text" class="form-control" placeholder="NIK" name="NIK">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="Nama" name="nama" >
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="No Telepon" name="telp">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="date" class="form-control" placeholder="Tanggal Pengaduan" name="tgl_pengaduan">
                  </div>
                </div>
                
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Isi Laporan"  name="isi_laporan">
                </div>
                <div class="d-flex justify-content-center">
                <button type="submit" name="ok" class="btn btn-primary">SUBMIT </button>
                <button type="reset" class=" btn btn-danger">CANCEL</button>                
                </div>
                <br>
                <br>
<center><a href="tambahbarang.php">Lihat Pengaduan lainnya </a></center>
              </form>
            </div>
          </div>
        </div>
      </section>
  </div>

  <!-- about section -->
  <div class="footer_bg">

    <!-- contact section -->
    <section class="contact_section layout_padding" id="contactLink">
      <div class="container">
        <div class="heading_container">
          <h2>
            Form Pengaduan Masyarakat
          </h2>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-8 mx-auto">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="inputName4" placeholder="Name ">
                </div>
                <div class="form-group col-md-6">
                  <input type="email" class="form-control" id="inputEmail4" placeholder="Email id">
                </div>

              </div>
              <div class="form-row">
                <div class="form-group col">
                  <input type="text" class="form-control" id="inputSubject4" placeholder="Subject">
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="inputMessage" placeholder="Message">
              </div>
              <div class="d-flex justify-content-center">
                <button type="submit" class="">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


    <!-- end contact section -->



    <!-- info section -->
    
    <!-- end info_section -->


    <!-- footer section -->
    <section class="container-fluid footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a>
        </p>
      </div>
    </section>
    <!-- footer section -->

  </div>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>

</body>

</html>