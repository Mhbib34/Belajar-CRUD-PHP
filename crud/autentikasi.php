<?php 
session_start(); 
include 'koneksi.php'; 
// Mengambil data dari form 
$username = $_POST['username']; 
$password = md5($_POST['password']); // Menggunakan MD5 untuk hashing sederhana 
// Cek kredensial 
$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) { 
    // Jika login berhasil 
    $_SESSION['username'] = $username; 
    header("Location: dashboard.php"); 
} else { 
    echo "Username atau password salah!"; 
} 
$conn->close(); 
?> 