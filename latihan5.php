<?php
class PersegiPanjang {
    // Atribut
    public $panjang;
    public $lebar;

    // Constructor untuk mengisi nilai atribut
    public function __construct($panjang, $lebar) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    // Metode untuk menghitung luas persegi panjang
    public function hitungLuas() {
        return $this->panjang + $this->lebar;
    }

    // Metode untuk menampilkan luas
    public function tampilkanLuas() {
        echo "Luas persegi panjang adalah: " . $this->hitungLuas() . " satuan persegi";
    }
}

// Contoh penggunaan
$persegiPanjang = new PersegiPanjang(20, 5);
$persegiPanjang->tampilkanLuas();

?>