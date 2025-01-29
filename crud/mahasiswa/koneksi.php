<?php 
// Membuat koneksi 
$conn = new mysqli("localhost", "root", "", "akademik"); 
 
// Cek koneksi 
if ($conn->connect_error) { 
    die("Koneksi gagal: " . $conn->connect_error); 
} 

?> 