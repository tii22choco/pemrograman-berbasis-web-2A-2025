<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Blog Reflektif Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background: #6a1b9a;
            color: white;
            padding: 15px 30px;
            font-size: 20px;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        h3 {
            color: #6a1b9a;
        }
        h1 {
            color: #6a1b9a;
            text-align : center;
        }

        .artikel {
            margin-bottom: 30px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
        }

        img {
            max-width: 100%;
            margin-top: 15px;
            border-radius: 10px;
        }

        .kutipan {
            margin-top: 20px;
            font-style: italic;
            background: #f8eafc;
            padding: 15px;
            border-left: 5px solid #8e24aa;
        }

        .navigasi-artikel {
            margin: 30px 0;
            display: flex;
            justify-content: space-between;
        }

        .navigasi-artikel a {
            background: #6a1b9a;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
        }

        .navigasi-artikel a:hover {
            background: #4a0072;
        }

        .tombol-bawah {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
        }

        .tombol-bawah a {
            background: #6a1b9a;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
        }

        ul {
            padding-left: 20px;
        }

        ul li {
            margin-bottom: 10px;
        }

        ul li a {
            text-decoration: none;
            color: #6a1b9a;
        }

        ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="navbar">Blog Reflektif</div>
<div class="container">
    <h1>Daftar Artikel Blog</h1>

<?php
// Data artikel dalam bentuk array
$artikel = [
    [
        'judul' => 'Cara Memotivasi Diri Agar Mahasiswa Semangat Kuliah',
        'tanggal' => '13 September 2022',
        'refleksi' => 'Sebagai mahasiswa, menjaga semangat belajar membutuhkan tekad...',
        'gambar' => 'img/gambar1.jpg',
        'kutipan' => [
            'Miliki tujuan yang jelas...',
            'Bangun rutinitas belajar yang konsisten...',
            'Ingat bahwa setiap tantangan kuliah...'
        ],
        'sumber' => 'https://ubl.ac.id/...'
    ],
    [
        'judul' => 'Tren Teknologi IT yang Akan Mendominasi di Tahun 2025',
        'tanggal' => '14 Februari 2025',
        'refleksi' => 'Perkembangan teknologi yang pesat menuntut mahasiswa...',
        'gambar' => 'img/gambar2.jpg',
        'kutipan' => [
            'Mereka yang siap dengan teknologi...',
            'Inovasi bukan pilihan...',
            'Adaptasi terhadap tren teknologi...'
        ],
        'sumber' => 'https://binus.ac.id/...'
    ],
    [
        'judul' => 'Tips Memotivasi Diri Sendiri untuk Semangat Mengejar Mimpi',
        'tanggal' => '7 Desember 2021',
        'refleksi' => 'Menjaga semangat dalam mengejar mimpi membutuhkan kesadaran...',
        'gambar' => 'img/gambar3.jpg',
        'kutipan' => [
            'Mimpi besar hanya bisa dicapai...',
            'Semangat bukan datang dari luar...',
            'Konsistensi kecil setiap hari...'
        ],
        'sumber' => 'https://buku.kompas.com/...'
    ]
];

// untuk cek ada parameter id di url ga 
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
$total = count($artikel);

// jika iya id valid dan ada di daftar artikel maka 
if ($id !== null && $id >= 0 && $id < $total) {
    $data = $artikel[$id];

    // ngambil kutipan secara acak
    $kutipanAcak = $data['kutipan'][rand(0, count($data['kutipan']) - 1)];
    ?>

    <!-- nampilin isi artikel -->
    <div class="artikel">
        <h3><?= $data['judul'] ?></h3>
        <p><strong>Tanggal:</strong> <?= $data['tanggal'] ?></p>
        <p><?= $data['refleksi'] ?></p>
        <img src="<?= $data['gambar'] ?>" alt="Gambar artikel">
        <div class="kutipan">"<?= $kutipanAcak ?>"</div>

        <!-- nampilin link sumber -->
        <p>Sumber: <a href="<?= $data['sumber'] ?>" target="_blank"><?= $data['sumber'] ?></a></p>
    </div>

    <!-- navigasi sebelumnya dan selanjutnya -->
    <div class="navigasi-artikel">
        <?php if ($id > 0): ?>
            <a href="?id=<?= $id - 1 ?>">← Sebelumnya</a>
        <?php endif; ?>

        <?php if ($id < $total - 1): ?>
            <a href="?id=<?= $id + 1 ?>">Selanjutnya →</a>
        <?php endif; ?>
    </div>

    <!-- Kembali ke daftar -->
    <p><a href="halaman3.php">← Kembali ke daftar artikel</a></p>

<?php
} else {
    // Jika tidak ada ID atau ID salah, tampilkan daftar artikel
    echo "<h3>Daftar Artikel:</h3><ul>";
    foreach ($artikel as $index => $data) {
        echo "<li><a href='?id=$index'>{$data['judul']}</a> ({$data['tanggal']})</li>";
    }
    echo "</ul>";
}
?>

    <div class="tombol-bawah">
        <a href="halaman2.php">← Kembali ke Pengalaman Kuliah</a>
        <a href="index.php">Kembali ke Profil</a>
    </div>
</div>
</body>
</html>
