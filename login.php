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
    session_start();

    if (isset($_POST["submit"])) {
        $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
        $password = mysqli_real_escape_string($koneksi, $_POST["password"]);

        $login_query = "SELECT * FROM petugas WHERE username='$username' AND password='$password'";
        $login_result = mysqli_query($koneksi, $login_query);
        $row = mysqli_fetch_assoc($login_result);

        $cek = mysqli_num_rows($login_result);

        if ($cek == 1) {
            $_SESSION["id_petugas"] = $row['id_petugas'];
            header('location: menu.php');
            exit;
        } else {
            echo "<div class='alert alert-danger'> Anda bukan Admin !</div>";
        }
    }
?>

  <!-- ... Your existing HTML content ... -->

  <section class="contact_section layout_padding" id="contactLink">
    <div class="container">
      <div class="heading_container">
        <br>
        <h3><b>Login Petugas</h3></b>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-8 mx-auto">
        <form method="post" action="">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Username" name="username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <div class="center-text">
              <button type="submit" name="submit" value="submit" class="btn btn-primary" >SUBMIT </button>
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
