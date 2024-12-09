<?php
class Produk {
    public $jenis;
    public $merek;
    public $stok;

    public function pesanProduk() {
        return $this->stok = $this->stok - 1;
    }
}

$barang = new Produk;
$barang->stok = 55;

// Check if form is submitted to update product information
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $barang->jenis = $_POST['jenis'];
    $barang->merek = $_POST['merek'];
    $barang->stok = $_POST['stok'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Produk</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Data Produk</h1>
    <table>
        <tr>
            <th>Jenis</th>
            <th>Merek</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($barang->jenis); ?></td>
            <td><?php echo htmlspecialchars($barang->merek); ?></td>
            <td><?php echo htmlspecialchars($barang->stok); ?></td>
            <td>
                <button onclick="document.getElementById('editForm').style.display='block'">Edit</button>
            </td>
        </tr>
    </table>

    <div id="editForm" style="display:none;">
        <h2>Edit Produk</h2>
        <form method="post">
            <label for="jenis">Jenis:</label>
            <input type="text" name="jenis" value="<?php echo htmlspecialchars($barang->jenis); ?>" required><br>
            <label for="merek">Merek:</label>
            <input type="text" name="merek" value="<?php echo htmlspecialchars($barang->merek); ?>" required><br>
            <label for="stok">Stok:</label>
            <input type="number" name="stok" value="<?php echo htmlspecialchars($barang->stok); ?>" required><br>
            <button type="submit">Simpan</button>
            <button type="button" onclick="document.getElementById('editForm').style.display='none'">Batal</button>
        </form>
    </div>
</body>
</html>