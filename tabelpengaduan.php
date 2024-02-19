
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tabel Pengaduan</title>
    <style>
/* Reset default margin and padding */
body {
    margin: 0;
    padding: 0;
    background-color: #041858; /* Warna latar belakang biru tua */
    /* Jenis font */
}

/* Style the table */
.styled-table {
    width: 80%;
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
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
}

input[type="submit"] {
    padding: 10px 15px;
    font-size: 14px;
    background-color: #d8bf36; /* Green */
    border: none;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease; /* Add a smooth transition effect */
}

input[type="submit"]:hover {
    background-color: #c0a530; /* Darker green on hover */
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
        <input type="submit" value="Search">
    <center></div>
    </form>
    <table class="styled-table">
            <thead>
                <tr>
                    <th>ID Pengaduan</th>
                    <th>NIK</th>
                    <th>Tgl Pengaduan</th>
                    <th>Isi Laporan</th>
                    <th>Gambar</th> <!-- Added column for the image -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
include "koneksi.php";

$tampil = "";

if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($koneksi, $_POST['search']);
    $query = "SELECT * FROM pengaduan WHERE 
              id_pengaduan LIKE '%$search%' OR
              NIK LIKE '%$search%' OR
              tgl_pengaduan LIKE '%$search%' OR
              isi_laporan LIKE '%$search%'";
    $tampil = mysqli_query($koneksi, $query);
} else {
    $tampil = mysqli_query($koneksi, "SELECT * FROM pengaduan");
}

while ($row = mysqli_fetch_array($tampil)) {
    echo "<tr>";
    echo "<td>" . $row['id_pengaduan'] . "</td>";
    echo "<td>" . $row['NIK'] . "</td>";
    echo "<td>" . $row['tgl_pengaduan'] . "</td>";
    echo "<td>" . $row['isi_laporan'] . "</td>";
    echo "<td><img src='foto/" . $row['gambar'] . "' width='100' height='100'></td>"; // Display image
    echo "<td><a href='formtanggapan1.php?id_pengaduan=" . $row['id_pengaduan'] . "'>Tanggapi</a></td>";
    echo "</tr>";
}
?>

            </tbody>
        </table>
    </center>

</body>
</html>

