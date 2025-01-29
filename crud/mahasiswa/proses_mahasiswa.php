<?php
$conn = new mysqli("localhost", "root", "", "akademik"); 
if ($conn->connect_error) { 
    die("Koneksi gagal: " . $conn->connect_error); 
}

$nama = $_POST['nama']; 
$nim = $_POST['nim']; 
$jurusan = $_POST['jurusan']; 
$fakultas = $_POST['fakultas'];

if (empty($nama) || empty($nim) || empty($jurusan) || empty($fakultas)) {
    die("Semua field harus diisi!");
}

$stmt = $conn->prepare("INSERT INTO mahasiswa (nama, nim, jurusan, fakultas) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nama, $nim, $jurusan, $fakultas);

if ($stmt->execute()) { 
    echo "Data berhasil disimpan!";
    header("Location: tambah_mahasiswa.php"); 
    
} else { 
    echo "Error: " . $stmt->error; 
}

$stmt->close();
$conn->close(); 
?>
