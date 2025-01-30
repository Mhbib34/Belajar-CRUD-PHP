<?php 
include 'koneksi.php'; 

// Query untuk mengambil data jurusan dan fakultas
$sql = "SELECT jurusan.id, jurusan.nama_jurusan, fakultas.nama_fakultas FROM jurusan 
        JOIN fakultas ON jurusan.fakultas_id = fakultas.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Daftar Jurusan</title> 
    <style>
            /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            margin: 20px auto;
            max-width: 1200px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #2c3e50;
        }

        /* Table Styles */
        .data-table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        .data-table th, .data-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .data-table th {
            background-color: #2c3e50;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }

        .data-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .data-table tr:hover {
            background-color: #e9e9e9;
        }

        /* Button Styles */
        .btn-update, .btn-delete, .btn-tambah {
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            display: inline-block;
            text-align: center;
        }

        .btn-update {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .btn-update:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            border: none;
        }

        .btn-delete:hover {
            background-color: #a71d2a;
        }

        .btn-tambah {
            background-color: #34495e ;
            color: #fff;
            border: none;
        }

        .btn-tambah:hover {
            opacity: 0.6;
        }

    </style>
</head> 
<body> 
    <div class="container">
        <h2>Daftar Jurusan</h2> 
        <table border="1" class="data-table"> 
            <thead> 
                <tr> 
                    <th>No</th> 
                    <th>Nama Jurusan</th> 
                    <th>Nama Fakultas</th> 
                    <th>Aksi</th> 
                </tr> 
            </thead> 
            <tbody> 
                <?php 
                $no = 1; // Inisialisasi nomor urut
                while ($row = $result->fetch_assoc()): 
                ?> 
                    <tr> 
                        <td><?= $no++; ?></td> <!-- Nomor urut -->
                        <td><?= htmlspecialchars($row['nama_jurusan']); ?></td> 
                        <td><?= htmlspecialchars($row['nama_fakultas']); ?></td> 
                        <td> 
                            <a href="update_jurusan.php?id=<?= $row['id']; ?>" class="btn-update" target="_blank">Update</a> 
                            <a href="delete_jurusan.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn-delete">Delete</a> 
                        </td> 
                    </tr> 
                <?php endwhile; ?> 
            </tbody> 
        </table> 
        <a href="tambah_jurusan.php" target="_blank" class="btn-tambah">Tambah</a>
        <a href="../dashboard.php" class="btn-tambah">Kembali</a>
    </div>
</body> 
</html>
