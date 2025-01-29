<?php
include 'koneksi.php'; // Menghubungkan ke file koneksi

// Mendapatkan ID dari URL
$id = $_GET['id'];

// Query untuk mendapatkan data mahasiswa berdasarkan ID
$sql = "SELECT * FROM mahasiswa WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Mengecek apakah data ditemukan
if (!$row) {
    echo "Data tidak ditemukan!";
    exit;
}

// Memproses form setelah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $fakultas = $_POST['fakultas'];

    // Query untuk update data mahasiswa
    $sql = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', jurusan = '$jurusan', fakultas = '$fakultas' WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diupdate!";
        header("Location: tampilkan_mahasiswa.php"); // Redirect ke halaman tampil_data.php setelah update
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #5cb85c;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Data Mahasiswa</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama">Nama Mahasiswa:</label>
                <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
            </div>
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" value="<?php echo htmlspecialchars($row['nim']); ?>" required>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan:</label>
                <input type="text" id="jurusan" name="jurusan" value="<?php echo htmlspecialchars($row['jurusan']); ?>" required>
            </div>
            <div class="form-group">
                <label for="fakultas">Fakultas:</label>
                <input type="text" id="fakultas" name="fakultas" value="<?php echo htmlspecialchars($row['fakultas']); ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-submit">Update Data</button>
            </div>
        </form>
    </div>
</body>
</html>