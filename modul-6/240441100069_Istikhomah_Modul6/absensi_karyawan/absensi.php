<?php
include '../includes/config.php';
include '../includes/session.php';
$result = mysqli_query($conn, "SELECT * FROM karyawan_absensi");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Data Absensi - Bloomie Florist</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }
    .sidebar {
      background: linear-gradient(180deg, #2b6e4a 0%, #1e4d3a 100%);
    }
    .floral-bg {
      background-image: url('https://www.transparenttextures.com/patterns/floral.png');
      opacity: 0.03;
    }
  </style>
</head>
<body class="flex h-screen overflow-hidden">
  <!-- Sidebar -->
  <div class="sidebar w-64 flex-shrink-0 text-white hidden md:block">
    <div class="h-full flex flex-col">
      <!-- Brand Logo -->
      <div class="p-6 flex items-center space-x-3">
        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center overflow-hidden">
          <img 
            src="https://images.unsplash.com/photo-1689954847700-f5e7223fff69?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
            alt="Bloomie Logo"
            class="w-full h-full object-cover"
          >
        </div>
          <h1 class="text-xl font-bold">Bloomie</h1>
      </div>
      
      <!-- Navigation -->
      <nav class="flex-1 px-4 space-y-2">
        <a href="index.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white/10 transition">
          <i class="fas fa-users w-5 text-center"></i>
          <span>Data Karyawan</span>
        </a>
        <a href="absensi.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg bg-white/10 font-medium">
          <i class="fas fa-calendar-check w-5 text-center"></i>
          <span>Data Absensi</span>
        </a>
        <a href="tambah.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white/10 transition">
          <i class="fa-solid fa-user-plus"></i>
          <span>Tambah data</span>
        </a>
      </nav>
      
      <!-- User Profile -->
      <div class="p-4 border-t border-white/10">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 rounded-full bg-green-200 flex items-center justify-center">
            <i class="fas fa-user text-green-700"></i>
          </div>
          <div>
            <div class="font-medium"><?= $_SESSION['username'] ?></div>
            <a href="../auth/logout.php" class="text-xs text-white/70 hover:text-white">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Main Content -->
  <div class="flex-1 flex flex-col overflow-hidden relative">
    <!-- Floral background pattern -->
    <div class="absolute inset-0 floral-bg z-0"></div>
    
    <!-- Topbar -->
    <header class="bg-gradient-to-r from-green-600 to-green-800 shadow-sm z-10">
      <div class="flex items-center justify-between px-6 py-4">
        <div class="flex items-center space-x-4">
          <!-- Mobile menu button -->
          <button class="md:hidden text-white hover:text-gray-200">
            <i class="fas fa-bars"></i>
          </button>
          <h1 class="text-xl font-bold text-white ">Data Karyawan Bloomie</h1>
        </div>
      </div>
    </header>
    
    <!-- Content -->
    <main class="flex-1 overflow-y-auto p-6 z-10">
      <!-- Stats Cards -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-md p-6 flex items-center space-x-4 border-l-4 border-green-600">
          <div class="bg-green-100 text-green-600 p-3 rounded-full">
            <i class="fas fa-users text-lg"></i>
          </div>
          <div>
            <div class="text-gray-500 text-sm">Total Data Absensi</div>
            <div class="text-2xl font-bold"><?= mysqli_num_rows($result) ?></div>
          </div>
        </div>
      </div>
      
      <!-- Attendance Table -->
      <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-green-200 flex justify-between items-center bg-green-800">
          <h2 class="text-lg font-semibold text-white">Data Absensi</h2>
        </div>
        
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-green-200">
            <thead class="bg-green-700">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">NIP</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Tanggal</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Check In</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Check Out</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Edit dan Hapus</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-green-200">
              <?php while($row = mysqli_fetch_assoc($result)) { ?>
              <tr class="hover:bg-green-50 transition">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= htmlspecialchars($row['id']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= htmlspecialchars($row['nip']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= htmlspecialchars($row['nama']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= htmlspecialchars($row['tanggal_absensi']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= htmlspecialchars($row['jam_masuk']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= htmlspecialchars($row['jam_pulang']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                  <div class="flex space-x-2">
                    <a href="edit.php?id=<?= $row['id'] ?>" class="text-green-700 hover:text-green-900">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data absensi?')" class="text-red-600 hover:text-red-900">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </div>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
    </main>
  </div>
</body>
</html>