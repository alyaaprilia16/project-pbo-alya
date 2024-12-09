<?php
class Produk{
 public $nama = "sabun";
 public $harga = 3000;
 public $merk = "lifebuoy";
 public $stock = 20;

 public function pemesanan () {
        return "pemesanan sudah diterima...";
 }
}
 $tv = new Produk ();
 echo $tv->pemesanan ();
 echo "<br>";
echo $tv->nama;
echo "<br>";
echo $tv->harga;
echo "<br>";
echo $tv->merk;
echo "<br>";
echo $tv->stock;
