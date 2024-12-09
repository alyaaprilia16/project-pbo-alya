<?php
require_once 'barang.php';
require_once 'barangmanager.php';

$barangManager = new BarangManager();

// Menangani form tambah barang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $barangManager->tambahBarang($nama, $harga, $stok);
    header('Location: index.php'); // Redirect untuk mencegah resubmission
    exit;
}

// Menangani penghapusan barang
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $barangManager->hapusBarang($id);
    header('Location: index.php'); // Redirect setelah menghapus
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #8EB486;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        .btn {
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-add {
            background-color: #997C70;
        }
        .btn-delete {
            background-color: #A59D84;
        }
        .btn-back {
            background-color: #555;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Tombol Kembali ke Beranda -->
        <a href="index.php" class="btn btn-back">Kembali ke Beranda</a>
        <h1>Pencatatan Produk</h1>
        <form method="POST" action="">
            <div>
                <label for="nama">Nama Produk:</label><br>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div>
                <label for="harga">Harga Produk:</label><br>
                <input type="number" id="harga" name="harga" required>
            </div>
            <div>
                <label for="stok">Stok Produk:</label><br>
                <input type="number" id="stok" name="stok" required>
            </div><br>
            <button type="submit" name="tambah" class="btn btn-add">Tambah</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barangManager->getBarang() as $barang): ?>
                    <tr>
                        <td><?= htmlspecialchars($barang['id']) ?></td>
                        <td><?= htmlspecialchars($barang['nama']) ?></td>
                        <td><?= htmlspecialchars($barang['harga']) ?></td>
                        <td><?= htmlspecialchars($barang['stok']) ?></td>
                        <td>
                            <a href="?hapus=<?= htmlspecialchars($barang['id']) ?>" class="btn btn-delete">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
