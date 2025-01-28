<?php 
session_start(); 
include 'koneksi.php'; 
$resultMahasiswa = $conn->query("SELECT COUNT(*) as total FROM mahasiswa");
$dataMahasiswa = $resultMahasiswa->fetch_assoc();
$resultJurusan = $conn->query("SELECT COUNT(*) as total FROM jurusan");
$dataJurusan = $resultJurusan->fetch_assoc();
$resultFakultas = $conn->query("SELECT COUNT(*) as total FROM fakultas");
$dataFakultas = $resultFakultas->fetch_assoc();

if (!isset($_SESSION['username'])) { 
    header("Location: index.php"); 
    exit; 
} 
?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Dashboard</title>  
    <style>
            /* General Styles */
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f9f9f9;
                color: #333;
            }

            .container {
                display: flex;
                min-height: 100vh;
            }

            /* Sidebar Styles */
            .sidebar {
                background-color: #2c3e50;
                width: 250px;
                padding: 20px;
                color: #ecf0f1;
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            }

            .sidebar-header {
                text-align: center;
                margin-bottom: 20px;
            }

            .sidebar-header h2 {
                margin: 0;
                font-size: 24px;
                color: #ecf0f1;
            }

            .sidebar-header p {
                margin: 5px 0 0;
                font-size: 14px;
                color: #bdc3c7;
            }

            .search-bar {
                width: 100%;
                padding: 10px;
                border: none;
                margin-bottom: 20px;
                font-size: 14px;
            }

            .menu {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .menu-item {
                padding: 15px;
                border-bottom: 1px solid #34495e;
                color: #ecf0f1;
                text-decoration: none;
                display: block;
            }

            .menu-item:hover,
            .menu-item.active {
                background-color: #34495e;
                color: #ecdbff;
            }

            /* Main Content Styles */
            .main-content {
                flex: 1;
                padding: 20px;
                background-color: #ecf0f1;
            }

            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
                background-color:#34495e ;
                padding: 10px;
                color: white;
                border-radius: 10px;
            }

            .header span {
                font-size: 20px;
                font-weight: bold;
            }

            .user-info {
                font-size: 16px;
            }

            /* Dashboard Cards */
            .dashboard-cards {
                display: flex;
                gap: 20px;
            }

            .card {
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                flex: 1;
                text-align: center;
            }

            .card h3 {
                font-size: 20px;
                margin-bottom: 10px;
            }

            .card p {
                font-size: 16px;
                color: #7f8c8d;
            }

            .card-blue {
                border-top: 5px solid #3498db;
            }

            .card-red {
                border-top: 5px solid #e74c3c;
            }
            .card-green {
                border-top: 5px solid #5cb85c;
            }

            .on {
                color: #5cb85c;
            }

    </style>
</head> 
<body> 
    <div class="container"> 
        <!-- Sidebar --> 
        <div class="sidebar"> 
            <div class="sidebar-header"> 
                <h2>Akademik</h2> 
                <p>Admin - <span class="on">Online</span></p> 
            </div> 
            <input type="text" placeholder="Search..." class="search-bar"> 
            <ul class="menu"> 
                <li><a href="dashboard.php" class="menu-item active"> 
                    <span>🏠</span>Dashboard
                </a></li> 
                <li><a href="mahasiswa/tampilkan_mahasiswa.php" class="menu-item"> 
                    <span>🧑‍🎓</span>Mahasiswa  
                </a></li> 
                <li><a href="fakultas/tampilkan_fakultas.php" class="menu-item"> 
                    <span>📃</span>Fakultas   
                </a></li> 
                <li><a href="Jurusan/tampilkan_jurusan.php" class="menu-item"> 
                    <span>📃</span>Jurusan   
                </a></li> 
                <li><a href="logout.php" class="menu-item" onclick="return confirm('Yakin ingin Keluar?')"> 
                    <span>🔒</span>Logout 
                </a></li> 
            </ul> 
        </div> 
 
        <!-- Main Content --> 
        <div class="main-content"> 
            <!-- Header --> 
            <div class="header"> 
                <span>Dashboard - Control Panel</span> 
                <div class="user-info"> 
                    <span><?php echo $_SESSION['username']; ?></span> 
                </div> 
            </div> 
 
            <!-- Dashboard Cards --> 
            <div class="dashboard-cards"> 
                <div class="card card-blue"> 
                    <h3>Mahasiswa</h3> 
                    <p><?php echo "Total: " . $dataMahasiswa['total'];?></p> <!-- Ganti angka sesuai data dari database --> 
                </div> 
                <div class="card card-green"> 
                    <h3>Fakultas</h3> 
                    <p><?php echo "Total: " . $dataFakultas['total'];?></p> <!-- Ganti angka sesuai data dari database --> 
                </div> 
                <div class="card card-red"> 
                    <h3>Jurusan</h3> 
                    <p><?php echo "Total: " . $dataJurusan['total'];?></p> <!-- Ganti angka sesuai data dari database --> 
                </div> 
            </div> 
        </div> 
    </div> 
</body> 
</html> 