<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Interaktif Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f1f3f6;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #6a1b9a;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar h1 {
            margin: 0;
            font-size: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #ce93d8;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        h2, h3 {
            text-align: center;
            color: #6a1b9a;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #f3e5f5;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        textarea {
            resize: vertical;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .checkbox-group, .radio-group {
            margin-top: 8px;
        }

        input[type="submit"] {
            background-color: #8e24aa;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #6a1b9a;
        }

        .success {
            color: green;
            font-weight: bold;
            text-align: center;
        }

        .error {
            color: red;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Navigasi -->
<div class="navbar">
    <h1>Profil Interaktif Mahasiswa</h1>
    <div class="nav-links">
        <a href="halaman2.php">Pengalaman Kuliah</a>
        <a href="halaman3.php">Blog</a>
    </div>
</div>

<div class="container">
    <h2>Profil Mahasiswa</h2>

    <!-- Tabel Data Diri -->
    <table>
        <tr><th>Nama</th><td>Istikhomah</td></tr>
        <tr><th>NIM</th><td>240441100069</td></tr>
        <tr><th>Tempat, Tanggal Lahir</th><td>Sidoarjo, 22 Mei 2005</td></tr>
        <tr><th>Email</th><td>istikhomah93703@gmail.com</td></tr>
        <tr><th>Nomor HP</th><td>089508085571</td></tr>
    </table>

    <!-- Form Input -->
    <form method="post">
        <div class="form-group">
            <label>Bahasa Pemrograman yang Dikuasai (pisahkan dengan koma):</label>
            <input type="text" name="bahasa" required placeholder="Contoh: C++, Java, Python">
        </div>

        <div class="form-group">
            <label>Pengalaman Proyek Pribadi:</label>
            <textarea name="pengalaman" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label>Software yang Sering Digunakan:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="software[]" value="VS Code"> VS Code</label><br>
                <label><input type="checkbox" name="software[]" value="XAMPP"> XAMPP</label><br>
                <label><input type="checkbox" name="software[]" value="Git"> Git</label><br>
                <label><input type="checkbox" name="software[]" value="Figma"> Figma</label>
            </div>
        </div>

        <div class="form-group">
            <label>Sistem Operasi yang Digunakan:</label>
            <div class="radio-group">
                <label><input type="radio" name="os" value="Windows" required> Windows</label><br>
                <label><input type="radio" name="os" value="Linux"> Linux</label><br>
                <label><input type="radio" name="os" value="Mac"> Mac</label>
            </div>
        </div>

        <div class="form-group">
            <label>Tingkat Penguasaan PHP:</label>
            <select name="tingkat_php" required>
                <option value="">-- Pilih --</option>
                <option value="Pemula">Pemula</option>
                <option value="Menengah">Menengah</option>
                <option value="Mahir">Mahir</option>
            </select>
        </div>

        <input type="submit" name="submit" value="Kirim">
    </form>

    <br>

    <?php
    if (isset($_POST['submit'])) {
    // untuk mengambil data dari form 
    $bahasa_input = $_POST['bahasa'];
    $pengalaman = $_POST['pengalaman'];
    $software = isset($_POST['software']) ? $_POST['software'] : [];
    $os = isset($_POST['os']) ? $_POST['os'] : '';
    $tingkat_php = isset($_POST['tingkat_php']) ? $_POST['tingkat_php'] : '';

    // mengubah input bahasa menjadi array jika belum dalam bentuk array 
    if (is_array($bahasa_input)) {
        $bahasa = $bahasa_input;
    } else {
        $bahasa = explode(",", $bahasa_input);
    }

    // untuk menghilangkan spasi 
    foreach ($bahasa as $i => $bhs) {
        $bahasa[$i] = trim($bhs);
    }

    // untuk ngecek biar gada input yang kosong 
    if (!empty($bahasa) && !empty($pengalaman) && !empty($software) && !empty($os) && !empty($tingkat_php)) {
        // menampilkan inputan
        echo "<h3>Hasil Input:</h3>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Bahasa Pemrograman</th><td>" . implode(", ", $bahasa) . "</td></tr>";
        echo "<tr><th>Software</th><td>" . implode(", ", $software) . "</td></tr>";
        echo "<tr><th>Sistem Operasi</th><td>$os</td></tr>";
        echo "<tr><th>Penguasaan PHP</th><td>$tingkat_php</td></tr>";
        echo "</table>";
        echo "<p><strong>Pengalaman Anda:</strong><br>$pengalaman</p>";

        if (count($bahasa) > 2) {
            echo "<p class='success'>Anda cukup berpengalaman dalam pemrograman!</p>";
        }
    } else {
        echo "<p class='error'>Semua input wajib diisi!</p>";
    }
    }
    ?>

</div>
</body>
</html>
