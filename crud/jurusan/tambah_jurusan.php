<?php
include 'koneksi.php';

$message = ""; // Variabel untuk pesan feedback

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_jurusan = htmlspecialchars(trim($_POST['nama_jurusan'])); // Hindari input tidak valid
    $fakultas_id = htmlspecialchars(trim($_POST['fakultas_id']));

    if (!empty($nama_jurusan) && !empty($fakultas_id)) {
        // Gunakan prepared statement untuk keamanan
        $stmt = $conn->prepare("INSERT INTO jurusan (nama_jurusan, fakultas_id) VALUES (?, ?)");
        $stmt->bind_param("si", $nama_jurusan, $fakultas_id);

        if ($stmt->execute()) {
            $message = "<p class='success'>Jurusan berhasil ditambahkan!</p>";
        } else {
            $message = "<p class='error'>Terjadi kesalahan: " . htmlspecialchars($stmt->error) . "</p>";
        }

        $stmt->close();
    } else {
        $message = "<p class='error'>Semua kolom harus diisi!</p>";
    }
}

// Ambil data fakultas
$sql_fakultas = "SELECT * FROM fakultas";
$result_fakultas = $conn->query($sql_fakultas);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jurusan</title>
    <style>
        /* Global styles for better UI */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e8f0fe;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        input[type="text"]{
            width: 94%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button.btn-submit {
            width: 100%;
            padding: 10px 15px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button.btn-submit:hover {
            background-color: #45a049;
        }

        .success {
            color: #28a745;
            background-color: #dff0d8;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .error {
            color: #dc3545;
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Jurusan</h2>
        <?= $message; ?> <!-- Pesan feedback -->
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama_jurusan">Nama Jurusan:</label>
                <input type="text" name="nama_jurusan" id="nama_jurusan" required>
            </div>
            <div class="form-group">
                <label for="fakultas_id">Fakultas:</label>
                <select name="fakultas_id" id="fakultas_id" required>
                    <option value="">-- Pilih Fakultas --</option>
                    <?php while ($row = $result_fakultas->fetch_assoc()): ?>
                        <option value="<?= htmlspecialchars($row['id']); ?>">
                            <?= htmlspecialchars($row['nama_fakultas']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button class="btn-submit" type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
