<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Timeline Pengalaman Kuliah</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #6a1b9a;
            padding: 5px 15px;
            color: white;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #6a1b9a;
        }

        .timeline {
            position: relative;
            margin: 40px 0;
            padding-left: 30px;
            border-left: 3px solid #8e24aa;
        }

        .timeline-item {
            margin-bottom: 30px;
            position: relative;
            padding-left : 10px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            top: 4px;
            left: -40px;
            background: #8e24aa;
            border-radius: 50%;
            width: 16px;
            height: 16px;
            border: 3px solid white;
        }

        .timeline-item h3 {
            margin: 0;
            color: #8e24aa;
        }

        .timeline-item p {
            margin: 5px 0 0;
            color: #444;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .buttons a {
            text-decoration: none;
            background-color: #6a1b9a;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .buttons a:hover {
            background-color: #ab47bc;
        }
    </style>
</head>
<body>

<div class="navbar">
    <h1>Timeline Pengalaman Kuliah</h1>
</div>

<div class="container">
    <h2>Perjalanan Kuliah Saya</h2>

    <div class="timeline">
        <?php
        $pengalaman = [
            [
                "tahun" => "2024",
                "judul" => "Masa Orientasi Kampus",
                "deskripsi" => "Mengikuti kegiatan ospek dan pengenalan lingkungan kampus."
            ],
            [
                "tahun" => "2024",
                "judul" => "Melakukan Praktikum pertama kali",
                "deskripsi" => "Belajar menggunakan bahasa pemrograman python."
            ],
            [
                "tahun" => "2025",
                "judul" => "Kuliah semester 2",
                "deskripsi" => "praktikum ada 2 woww meledak."
            ],
            [
                "tahun" => "2025",
                "judul" => "Masih semester 2",
                "deskripsi" => "Semangat mau UAS habis ini liburan."
            ]
        ];

        foreach ($pengalaman as $item) {
            echo "<div class='timeline-item'>";
            echo "<h3>{$item['tahun']} - {$item['judul']}</h3>";
            echo "<p>{$item['deskripsi']}</p>";
            echo "</div>";
        }
        ?>
    </div>

    <div class="buttons">
        <a href="index.php">← Kembali ke Profil</a>
        <a href="halaman3.php">Menuju Blog →</a>
    </div>
</div>

</body>
</html>
