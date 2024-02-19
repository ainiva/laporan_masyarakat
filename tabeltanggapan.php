<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Styled Table</title>
    <style>
        /* Reset default margin and padding */
        body {
            margin: 0;
            padding: 0;
            background-color: #041858; /* Warna latar belakang biru tua */
            font-family: italic; /* Jenis font */
        }

       /* Style the table */
.styled-table {
    width: 70%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff; /* Warna latar belakang putih */
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Bayangan pada tabel*/
    border: 1px solid ##C0C0C0; 
}

/* Style table header */
.styled-table thead {
    background-color: black; /* Warna latar belakang hitam pada header */
    color: white; /* Warna teks putih pada header */
}

.styled-table thead th {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 2px solid #ddd; /* Garis bawah header */
    border: 1px solid ##C0C0C0; 
}

/* Style table data */
.styled-table tbody td {
    padding: 10px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd; /* Garis pemisah */
    border: 1px solid #C0C0C0; 
}

/* Style alternating rows */
.styled-table tbody tr:nth-child(even) {
    background-color: white; /* Warna latar belakang abu-abu muda */
}

/* Hover effect on rows */
.styled-table tbody tr:hover {
    background-color: #e9e9e9; /* Warna latar belakang abu-abu muda saat dihover */
}

        label {
            font-size: 16px;
            margin-right: 10px;
            color: white;
        }

        input[type="text"] {
            padding: 8px;
            font-size: 14px;
        }

        input[type="submit"] {
            padding: 8px 12px;
            font-size: 14px;
            background-color: #d8bf36; /* Green */
            border: none;
            color: white;
            cursor: pointer;
        }
        .logout-btn {
            float: right;
            margin-top: 20px;
            margin-right: 20px;
            padding: 10px 15px;
            font-size: 14px;
            background-color: #d8bf36; /* Red */
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease; /* Add a smooth transition effect */
        }

        .logout-btn:hover {
            background-color: #C0C0C0; /* Darker red on hover */
        }
    </style>
</head>
<body>
<button class="logout-btn" onclick="location.href='logout.php'">Logout</button>
    <form action="" method="post">
    <br>
    <center><label for="search">Search:</label>
        <input type="text" id="search" name="search" placeholder="Enter keyword">
        <input type="submit" value="Search"> <center>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID Tanggapan</th>
                    <th>ID Pengaduan</th>
                    <th>Tgl tanggapan</th>
                    <th>Tanggapan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
include "koneksi.php";
session_start();
if(!isset( $_SESSION['id_petugas'])){
  header("Location: login.php");
  exit;
}


$tampil = "";

if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($koneksi, $_POST['search']);
    $query = "SELECT * FROM tanggapan WHERE 
              id_tanggapan LIKE '%$search%' OR
              id_pengaduan LIKE '%$search%' OR
              tgl_tanggapan LIKE '%$search%' OR
              tanggapan LIKE '%$search%'";
    $tampil = mysqli_query($koneksi, $query);
} else {
    $tampil = mysqli_query($koneksi, "SELECT * FROM tanggapan");
}

while ($row = mysqli_fetch_array($tampil)) {
    echo "<tr>";
    echo "<td>" . $row['id_tanggapan'] . "</td>";
    echo "<td>" . $row['id_pengaduan'] . "</td>";
    echo "<td>" . $row['tgl_tanggapan'] . "</td>";
    echo "<td>" . $row['tanggapan'] . "</td>";
    echo "<td><a href='edit_tanggapan.php?id=" . $row['id_tanggapan'] . "'>Edit</a> | <a href='hapus_tanggapan.php?id=" . $row['id_tanggapan'] . "'>Hapus</a></td>";
    echo "</tr>";
}
?>
            </tbody>
        </table>
    </center>
</body>
</html>
