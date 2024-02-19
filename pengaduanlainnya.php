<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tabel Masyarakat</title>
    <style>
        /* Reset default margin and padding */
        .table thead {
            background-color: black; /* Warna latar belakang hitam */
            color: white; /* Warna teks putih */
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: black;
        }

        /* Gaya untuk kolom tanggal_pengaduan */
        td.tanggal-pengaduan {
            font-style: italic;
            color: #3366cc; /* Ubah warna sesuai keinginan */
        }

        /* Gaya untuk kolom isi_laporan */
        td.isi-laporan {
            max-width: 300px; /* Batasi lebar maksimum */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            background-color: #0f4ed8;
            color: #fff;
            border-radius: 5px;
        }

        label {
            font-size: 16px;
            margin-right: 10px;
            color: black;
        }

        input[type="text"] {
            padding: 8px;
            font-size: 14px;
        }

        input[type="submit"] {
            padding: 8px 12px;
            font-size: 14px;
            background-color: #d8bf36; /* Warna kuning yang telah ada sebelumnya */
            border: none;
            color: white;
            cursor: pointer;
        }

        /* Style the button */
        .btn-primary {
            padding: 8px 12px;
            font-size: 14px;
            background-color: #007bff; /* Warna biru primary */
            border: none;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <center>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Tanggal Pengaduan</th>
                    <th>Isi Laporan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";

                // Fetch all records
                $result = mysqli_query($koneksi, "SELECT * FROM pengaduan");

                // Display the table rows
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['tgl_pengaduan'] . "</td>";
                    echo "<td>" . $row['isi_laporan'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <!-- Menggunakan kelas .btn-primary untuk tombol -->
        <button type="button" class="btn btn-primary" onclick="location.href='coba.php'">Kembali</button>
    </center>
</body>

</html>
