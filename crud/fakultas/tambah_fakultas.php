<?php 
include 'koneksi.php'; 
$message = ''; // Variabel untuk menampilkan pesan feedback

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $nama_fakultas = $_POST['nama_fakultas'];

    // Menggunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("INSERT INTO fakultas (nama_fakultas) VALUES (?)");
    $stmt->bind_param("s", $nama_fakultas);

    if ($stmt->execute()) { 
        $message = "<p class='success'>Fakultas berhasil ditambahkan!</p>";
    } else { 
        $message = "<p class='error'>Error: " . $stmt->error . "</p>"; 
    }
    $stmt->close();
}
$conn->close();
?> 

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Tambah Fakultas</title> 
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e8f0fe;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #4CAF50;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="text"]:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .success {
            color: #28a745;
            background-color: #dff0d8;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .error {
            color: #dc3545;
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
</head> 
<body> 
    <div class="container">
        <h2>Tambah Fakultas</h2> 
        <?= $message; ?> <!-- Menampilkan pesan sukses atau error -->
        <form action="" method="POST"> 
            <div class="form-group">
                <input type="text" name="nama_fakultas" id="nama_fakultas" required placeholder="Masukkan Nama Fakultas">
            </div>
            <button type="submit">Simpan</button> 
        </form> 
    </div>
</body> 
</html>
