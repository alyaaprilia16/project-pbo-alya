<?php
session_start();

// Inisialisasi data pelanggan jika belum ada
if (!isset($_SESSION['customers'])) {
    $_SESSION['customers'] = [];
}

// Menambahkan data pelanggan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_customer'])) {
    $name = htmlspecialchars($_POST['name']);
    $contact = htmlspecialchars($_POST['contact']);
    $email = htmlspecialchars($_POST['email']);

    if (!empty($name) && !empty($contact) && !empty($email)) {
        $_SESSION['customers'][] = [
            'name' => $name,
            'contact' => $contact,
            'email' => $email,
        ];
    } else {
        $error = "Semua bidang harus diisi!";
    }
}

// Menghapus pelanggan individu berdasarkan indeks
if (isset($_POST['delete_customer'])) {
    $index = intval($_POST['index']);
    if (isset($_SESSION['customers'][$index])) {
        unset($_SESSION['customers'][$index]);
        $_SESSION['customers'] = array_values($_SESSION['customers']); // Reindex array
    }
}

// Menghapus semua data pelanggan
if (isset($_POST['clear_customers'])) {
    $_SESSION['customers'] = [];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            max-width: 400px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        input[type="text"],
        input[type="email"],
        button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        button {
            background-color: #8EB486;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
        button[type="submit"][name="clear_customers"] {
            background-color: #e74c3c;
        }
        button[type="submit"][name="clear_customers"]:hover {
            background-color: #c0392b;
        }
        .error {
            color: #e74c3c;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #997C70;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .btn-delete {
            background-color: #8EB486;
            color: white;
            border: none;
            padding: 5px;
            border-radius: 5px;
        }
        .btn-delete:hover {
            background-color: #ff4c5b;
        }
        .btn-back {
            display: inline-block;
            text-decoration: none;
            background-color: #8EB486;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 20px;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Tombol Kembali ke Beranda -->
    <a href="index.php" class="btn-back">Kembali ke Beranda</a>

    <h1>Manajemen Pelanggan</h1>

    <!-- Form Tambahkan Pelanggan -->
    <form method="post">
        <label for="name">Nama</label>
        <input type="text" id="name" name="name" placeholder="Masukkan nama" required>

        <label for="contact">Kontak</label>
        <input type="text" id="contact" name="contact" placeholder="Masukkan kontak" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Masukkan email" required>

        <button type="submit" name="add_customer">Tambah</button>
    </form>

    <!-- Menampilkan Error -->
    <?php if (isset($error)) : ?>
        <p class="error"><?= $error; ?></p>
    <?php endif; ?>

    <h2>Daftar Pelanggan</h2>

    <!-- Tabel Pelanggan -->
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kontak</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_SESSION['customers'])): ?>
                <?php foreach ($_SESSION['customers'] as $index => $customer): ?>
                    <tr>
                        <td><?= htmlspecialchars($customer['name']); ?></td>
                        <td><?= htmlspecialchars($customer['contact']); ?></td>
                        <td><?= htmlspecialchars($customer['email']); ?></td>
                        <td>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="index" value="<?= $index ?>">
                                <button type="submit" name="delete_customer" class="btn-delete">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align:center;">Belum ada pelanggan yang ditambahkan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
