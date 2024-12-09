<?php require 'produk2.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale.0">
    <title>Stok Akhir Produk</title>
</head>
<body>

    <h1>Stok Akhir Produk</h1>

    <form method="POST" action="">
        <label for="stok">Stok Awal:</label>
        <input type="number" id="stok" name="stok" required><br></br>

        <label for="pembelian">jumlah Pembelian:</label>
        <input type="number" id="pembelian" name="pembelian" required><br></br>

<input type="submit" value="Hitung Stok Akhir">
</from>

<?php if ($Stokakhir !== null): ?>
    <h2>Stok Akhir: <?php echo $Stokakhir; ?></h2>
    <?php endif; ?>
</body>
</html>