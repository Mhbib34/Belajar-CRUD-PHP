<?php 
include 'koneksi.php'; // Memanggil file koneksi 
 
// Mendapatkan ID dari URL 
$id = $_GET['id']; 
 
// Query untuk menghapus data mahasiswa 
$sql = "DELETE FROM jurusan WHERE id = $id"; 
 
if ($conn->query($sql) === TRUE) { 
    echo "Data berhasil dihapus!"; 
    header("Location: tampilkan_jurusan.php"); // Redirect ke halaman data 
} else { 
    echo "Error: " . $sql . "<br>" . $conn->error; 
} 
 
$conn->close(); 
?> 