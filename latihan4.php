<?php
    class Customer {
        public $nama
        public $gender;
        public $umur;
        public $totalSpend;

        // konstruktor
        public function __construct($nama, $gender, $umur, $totalSpend) {
            $this->nama = $nama;
            $this->gender = $gender;
            $this->umur = $umur;
            $this->totalSpend = $totalSpend;
        }

        // Behaviour
        public function nama(): string {
            return "arumi";
        }

        public function goyangekor(): string{
            return "pelan";
        }

        public function loncat(): string{
            return "sangat cepat";
        }
    }


    // inisialisasi
    $kucing1 = new Kucing(warna: "Oren", ekor: "panjang", umur: "2 bulan", jeniskelamin: "betina", jeniskucing: "persia");
    $kucing2 = new Kucing(warna: "Hitam", ekor: "panjang", umur: "2 bulan", jeniskelamin: "betina", jeniskucing: "persia");
    echo $kucing1->meong() . "<br>";
    echo $kucing1->goyangekor() . "<br>";
    echo $kucing1->loncat() . "<br>";
    echo $kucing2->meong() . "<br>";