<?php
include '../includes/config.php';
include '../includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jk = $_POST['jenis_kelamin'];
    $departemen = $_POST['departemen'];
    $jabatan = $_POST['jabatan'];
    $kota_asal = $_POST['kota_asal'];
    $tanggal_absensi = $_POST['tanggal_absensi'];
    $masuk = $_POST['jam_masuk'];
    $pulang = $_POST['jam_pulang'];

    $insert = mysqli_query($conn, "INSERT INTO karyawan_absensi 
        (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal, tanggal_absensi, jam_masuk, jam_pulang) 
        VALUES 
        ('$nip','$nama','$umur','$jk','$departemen','$jabatan','$kota_asal','$tanggal_absensi','$masuk','$pulang')");

    if ($insert) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Tambah Karyawan - Bloomie Florist</title>
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
    .form-input {
      transition: all 0.3s;
    }
    .form-input:focus {
      border-color: #4ade80;
      box-shadow: 0 0 0 3px rgba(74, 222, 128, 0.2);
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
        <a href="absensi.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white/10 transition">
          <i class="fas fa-calendar-check w-5 text-center"></i>
          <span>Data Absensi</span>
        </a>
        <a href="tambah.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg bg-white/10 font-medium">
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
                <input type="text" name="nip" required 
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="nama" required 
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Umur</label>
                <input type="number" name="umur" required 
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" required 
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Asal Daerah</label>
                <input type="text" name="kota_asal" required 
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
            </div>
            
            <!-- Work Information Column -->
            <div class="space-y-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Departmen</label>
                <input type="text" name="departemen" required 
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Posisi</label>
                <input type="text" name="jabatan" required 
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                <input type="date" name="tanggal_absensi" required 
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Check In Time</label>
                <input type="time" name="jam_masuk" required 
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Check Out Time</label>
                <input type="time" name="jam_pulang" required 
                  class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
              </div>
            </div>
            
            <!-- Form Actions -->
            <div class="md:col-span-2 pt-4 border-t border-gray-200 flex justify-end space-x-3">
              <a href="index.php" class="px-6 py-2 border border-gray-300 rounded-lg font-medium text-gray-700 hover:bg-gray-50 transition">
                Batal
              </a>
              <button type="submit" class="px-6 py-2 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-medium rounded-lg shadow-sm transition flex items-center">
                <i class="fas fa-save mr-2"></i> Simpan Data
              </button>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
      // Get form elements
      const form = document.querySelector('form');
      const nip = document.querySelector('input[name="nip"]');
      const nama = document.querySelector('input[name="nama"]');
      const umur = document.querySelector('input[name="umur"]');
      const jenisKelamin = document.querySelector('select[name="jenis_kelamin"]');
      const kotaAsal = document.querySelector('input[name="kota_asal"]');
      const departemen = document.querySelector('input[name="departemen"]');
      const jabatan = document.querySelector('input[name="jabatan"]');
      const tanggalAbsensi = document.querySelector('input[name="tanggal_absensi"]');
      const jamMasuk = document.querySelector('input[name="jam_masuk"]');
      const jamPulang = document.querySelector('input[name="jam_pulang"]');

      // Create error message elements
      const createErrorElement = (input) => {
          const errorElement = document.createElement('p');
          errorElement.className = 'error-message text-red-500 text-xs mt-1';
          input.parentNode.appendChild(errorElement);
          return errorElement;
      };

      const nipErr = createErrorElement(nip);
      const namaErr = createErrorElement(nama);
      const umurErr = createErrorElement(umur);
      const jenisKelaminErr = createErrorElement(jenisKelamin);
      const kotaAsalErr = createErrorElement(kotaAsal);
      const departemenErr = createErrorElement(departemen);
      const jabatanErr = createErrorElement(jabatan);
      const tanggalAbsensiErr = createErrorElement(tanggalAbsensi);
      const jamMasukErr = createErrorElement(jamMasuk);
      const jamPulangErr = createErrorElement(jamPulang);

      // Validation functions
      function validateNip() {
          const value = nip.value.trim();
          nipErr.textContent = value === "" ? "NIP wajib diisi." : "";
          return !nipErr.textContent;
      }

      function validateNama() {
          const value = nama.value.trim();
          namaErr.textContent = value === "" ? "Nama wajib diisi." : "";
          return !namaErr.textContent;
      }

      function validateUmur() {
          const value = umur.value.trim();
          if (value === "") {
              umurErr.textContent = "Umur wajib diisi.";
          } else if (isNaN(value)) {
              umurErr.textContent = "Umur harus berupa angka.";
          } else if (parseInt(value) < 18 || parseInt(value) > 65) {
              umurErr.textContent = "Umur harus antara 18-65 tahun.";
          } else {
              umurErr.textContent = "";
          }
          return !umurErr.textContent;
      }

      function validateJenisKelamin() {
          jenisKelaminErr.textContent = jenisKelamin.value === "" ? "Jenis kelamin wajib dipilih." : "";
          return !jenisKelaminErr.textContent;
      }

      function validateKotaAsal() {
          kotaAsalErr.textContent = kotaAsal.value.trim() === "" ? "Kota asal wajib diisi." : "";
          return !kotaAsalErr.textContent;
      }

      function validateDepartemen() {
          departemenErr.textContent = departemen.value.trim() === "" ? "Departemen wajib diisi." : "";
          return !departemenErr.textContent;
      }

      function validateJabatan() {
          jabatanErr.textContent = jabatan.value.trim() === "" ? "Jabatan wajib diisi." : "";
          return !jabatanErr.textContent;
      }

      function validateTanggalAbsensi() {
          tanggalAbsensiErr.textContent = tanggalAbsensi.value === "" ? "Tanggal absensi wajib diisi." : "";
          return !tanggalAbsensiErr.textContent;
      }

      function validateJamMasuk() {
          jamMasukErr.textContent = jamMasuk.value === "" ? "Jam masuk wajib diisi." : "";
          return !jamMasukErr.textContent;
      }

      function validateJamPulang() {
          jamPulangErr.textContent = jamPulang.value === "" ? "Jam pulang wajib diisi." : "";
          return !jamPulangErr.textContent;
      }

      // Add event listeners for real-time validation
      nip.addEventListener('input', validateNip);
      nama.addEventListener('input', validateNama);
      umur.addEventListener('input', validateUmur);
      jenisKelamin.addEventListener('change', validateJenisKelamin);
      kotaAsal.addEventListener('input', validateKotaAsal);
      departemen.addEventListener('input', validateDepartemen);
      jabatan.addEventListener('input', validateJabatan);
      tanggalAbsensi.addEventListener('input', validateTanggalAbsensi);
      jamMasuk.addEventListener('input', validateJamMasuk);
      jamPulang.addEventListener('input', validateJamPulang);

      // Form submission handler
      form.addEventListener('submit', function(e) {
          e.preventDefault();
          
          // Run all validations
          const isNipValid = validateNip();
          const isNamaValid = validateNama();
          const isUmurValid = validateUmur();
          const isJenisKelaminValid = validateJenisKelamin();
          const isKotaAsalValid = validateKotaAsal();
          const isDepartemenValid = validateDepartemen();
          const isJabatanValid = validateJabatan();
          const isTanggalAbsensiValid = validateTanggalAbsensi();
          const isJamMasukValid = validateJamMasuk();
          const isJamPulangValid = validateJamPulang();

          // If all validations pass
          if (isNipValid && isNamaValid && isUmurValid && isJenisKelaminValid && 
              isKotaAsalValid && isDepartemenValid && isJabatanValid && 
              isTanggalAbsensiValid && isJamMasukValid && isJamPulangValid) {
              
              form.submit();
          } else {
              // Scroll to the first error
              const firstError = document.querySelector('.error-message:not(:empty)');
              if (firstError) {
                  firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
              }
          }
      });
  });
</script>
</body>
</html>