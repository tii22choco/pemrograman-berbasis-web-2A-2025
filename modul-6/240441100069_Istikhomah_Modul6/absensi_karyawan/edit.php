<?php
include '../includes/config.php';
include '../includes/session.php';

// Validasi ID dari URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan atau tidak valid'); window.location.href='index.php';</script>";
    exit;
}

$id = (int) $_GET['id']; // Konversi ke integer

// Ambil data berdasarkan ID
$sql = mysqli_query($conn, "SELECT * FROM karyawan_absensi WHERE id = $id");

if (!$sql || mysqli_num_rows($sql) == 0) {
    echo "<script>alert('Data tidak ditemukan'); window.location.href='index.php';</script>";
    exit;
}

$data = mysqli_fetch_assoc($sql);

// Proses update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip             = $_POST['nip'];
    $nama            = $_POST['nama'];
    $umur            = $_POST['umur'];
    $jenis_kelamin   = $_POST['jenis_kelamin'];
    $departemen      = $_POST['departemen'];
    $jabatan         = $_POST['jabatan'];
    $kota_asal       = $_POST['kota_asal'];
    $tanggal_absensi = $_POST['tanggal_absensi'];
    $jam_masuk       = $_POST['jam_masuk'];
    $jam_pulang      = $_POST['jam_pulang'];

    $query = "UPDATE karyawan_absensi SET
                nip='$nip', nama='$nama', umur='$umur', jenis_kelamin='$jenis_kelamin',
                departemen='$departemen', jabatan='$jabatan', kota_asal='$kota_asal',
                tanggal_absensi='$tanggal_absensi', jam_masuk='$jam_masuk', jam_pulang='$jam_pulang'
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil diperbarui'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Edit Employee - Bloomie Florist</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9fafb;
    }
    .sidebar {
      background: linear-gradient(180deg, #2b6e4a 0%, #1e4d3a 100%);
    }
    .floral-bg {
      background-image: url('https://www.transparenttextures.com/patterns/floral.png');
      opacity: 0.03;
    }
    .form-input {
      transition: all 0.3s;
    }
    .form-input:focus {
      border-color: #48bb78;
      box-shadow: 0 0 0 3px rgba(72, 187, 120, 0.2);
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
            class="w-full h-full object-cover">
        </div>
          <h1 class="text-xl font-bold">Bloomie</h1>
       </div>
      
      <!-- Navigation -->
      <nav class="flex-1 px-4 space-y-2">
        <a href="index.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white/10 transition">
          <i class="fas fa-users w-5 text-center"></i>
          <span>Employee Data</span>
        </a>
        <a href="absensi.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white/10 transition">
          <i class="fas fa-calendar-check w-5 text-center"></i>
          <span>Attendance</span>
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
      <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
        <div class="p-6">
          
          <form action="" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Personal Information Column -->
            <div class="space-y-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">NIP</label>
                <input type="text" name="nip" required value="<?= htmlspecialchars($data['nip']) ?>"
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="nama" required value="<?= htmlspecialchars($data['nama']) ?>"
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Umur</label>
                <input type="number" name="umur" required value="<?= htmlspecialchars($data['umur']) ?>"
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" required
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                  <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                  <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                </select>
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Asal Daerah</label>
                <input type="text" name="kota_asal" required value="<?= htmlspecialchars($data['kota_asal']) ?>"
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
            </div>
            <div class="space-y-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Departmen</label>
                <input type="text" name="departemen" required value="<?= htmlspecialchars($data['departemen']) ?>"
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Posisi</label>
                <input type="text" name="jabatan" required value="<?= htmlspecialchars($data['jabatan']) ?>"
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                <input type="date" name="tanggal_absensi" required value="<?= htmlspecialchars($data['tanggal_absensi']) ?>"
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Check In Time</label>
                <input type="time" name="jam_masuk" required value="<?= htmlspecialchars($data['jam_masuk']) ?>"
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Check Out Time</label>
                <input type="time" name="jam_pulang" required value="<?= htmlspecialchars($data['jam_pulang']) ?>"
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
            </div>
            
            <!-- button -->
            <div class="md:col-span-2 pt-4 border-t border-gray-200 flex justify-end space-x-3">
              <a href="index.php" class="px-6 py-2 border border-gray-300 rounded-lg font-medium text-gray-700 hover:bg-gray-50 transition">
                Cancel
              </a>
              <button type="submit" class="px-6 py-2 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-medium rounded-lg shadow-sm transition flex items-center">
                <i class="fas fa-save mr-2"></i> Simpan Perubahan
              </button>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>
</body>
</html>