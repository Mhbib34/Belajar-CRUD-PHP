<?php 
include 'koneksi.php'; 
$id = $_GET['id']; 
$sql = "DELETE FROM fakultas WHERE id=$id"; 
if ($conn->query($sql) === TRUE) { 
    echo "Fakultas berhasil dihapus!"; 
} else { 
    echo "Error: " . $sql . "<br>" . $conn->error; 
} 
header("Location: tampilkan_fakultas.php"); 
?> 