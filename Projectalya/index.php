<?php
require_once 'BarangManager.php'; // Memanggil class BarangManager

$barangManager = new BarangManager();
$barangList = $barangManager->getBarang(); // Mendapatkan semua barang dari data JSON
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <style>
        /* Reset margin dan padding default */
        body, h1, h3, p, ul, li, img {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Gaya untuk seluruh halaman */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #997C70;
            color: #333;
            margin: 0;
        }

        /* Navigasi */
        nav {
            background-color: #8EB486;
            padding: 10px 20px;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        /* Kontainer utama */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #8EB486;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #FFFFFF; /* Warna teks agar kontras */
        }

        /* Grid untuk produk */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .product-card {
            background-color: #FFFFFF; /* Warna latar produk agar berbeda */
            border: 1px solid #8EB486;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            color: #333; /* Warna teks */
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .product-info h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .product-info p {
            margin-bottom: 10px;
        }

        .product-info button {
            background-color: #FFFFFF;
            color: #8EB486;
            border: 1px solid #8EB486;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .product-info button:hover {
            background-color: #005bb5;
            color: #fff;
        }

        /* Footer */
        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #8EB486;
            color: #fff;
            border-top: 1px solid #8EB486;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="customer.php">Customer</a></li>
            <li><a href="tabel.php">Stok</a></li>
        </ul>
    </nav>

    <!-- Konten Utama -->
    <div class="container">
        <h1>Daftar Barang</h1>

        <!-- Grid untuk menampilkan produk -->
        <div class="product-grid">
            <?php foreach ($barangList as $barang): ?>
                <div class="product-card">
                    <!-- Menampilkan gambar produk -->
                    <img src="<?=$barang['gambar']?>" 
                         alt="<?= htmlspecialchars($barang['nama']) ?>">
                    <div class="product-info">
                        <h3><?= htmlspecialchars($barang['nama']) ?></h3>
                        <p>Harga: <?= htmlspecialchars($barang['harga']) ?></p>
                        <p>Stok: <?= htmlspecialchars($barang['stok']) ?></p>
                        <button>Beli Sekarang</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 alyarahmaaprilia</p>
    </footer>
</body>
</html>
