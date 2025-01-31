<?php 
include 'koneksi.php'; 
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $id = $_POST['id']; 
    $nama_fakultas = $_POST['nama_fakultas']; 
    $sql = "UPDATE fakultas SET nama_fakultas='$nama_fakultas' WHERE id=$id"; 
    if ($conn->query($sql) === TRUE) { 
        echo "Fakultas berhasil diupdate!"; 
        header("Location: tampilkan_fakultas.php"); // Redirect ke halaman tampil_data.php setelah update
        exit;
    } else { 
        echo "Error: " . $sql . "<br>" . $conn->error; 
    } 
} 
 
$id = $_GET['id']; 
$sql = "SELECT * FROM fakultas WHERE id=$id"; 
$result = $conn->query($sql); 
$data = $result->fetch_assoc(); 
?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Update Fakultas</title> 
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
    <h2>Update Fakultas</h2> 
    <form action="" method="POST"> 
        <input type="hidden" name="id" value="<?= $data['id']; ?>"> 
        <label for="nama_fakultas">Nama Fakultas:</label> 
        <input type="text" name="nama_fakultas" id="nama_fakultas" value="<?= $data['nama_fakultas']; ?>" required> 
        <button type="submit">Update</button> 
    </form> 
    </div>
</body> 
</html>