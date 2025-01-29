 <?php 
 include 'koneksi.php';
 $sql_fakultas = "SELECT * FROM fakultas";
 $result_fakultas = $conn->query($sql_fakultas);
 
 $sql_jurusan = "SELECT * FROM jurusan";
 $result_jurusan = $conn->query($sql_jurusan);
 ?>


<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Form Input Data Mahasiswa</title> 
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
        <h2>Form Input Data Mahasiswa</h2> 
        <form action="proses_mahasiswa.php" method="POST"> 
    <div class="form-group"> 
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required> 
    </div> 
    <div class="form-group">
        <label for="nim">Nim:</label>
        <input type="text" id="nim" name="nim" required> 
    </div> 
    <div class="form-group">
        <label for="jurusan">Jurusan:</label>
        <select name="jurusan" id="jurusan" required>
            <option value="">-- Pilih Jurusan --</option>
            <?php while ($row = $result_jurusan->fetch_assoc()): ?>
                <option value=" <?= htmlspecialchars($row['nama_jurusan']); ?>">
                    <?= htmlspecialchars($row['nama_jurusan']); ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div> 
    <div class="form-group">
        <label for="fakultas">Fakultas:</label>
        <select name="fakultas" id="fakultas" required>
            <option value="">-- Pilih Fakultas --</option>
            <?php while ($row = $result_fakultas->fetch_assoc()): ?>
                <option value="<?= htmlspecialchars($row['nama_fakultas']); ?>">
                    <?= htmlspecialchars($row['nama_fakultas']); ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="form-group"> 
        <button type="submit" class="btn-submit">Simpan Data</button> 
    </div> 
</form> 

    </div> 
</body> 
</html>