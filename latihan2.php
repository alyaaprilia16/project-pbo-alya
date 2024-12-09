<?php
    class Kucing {
        public $warna;
        public $ekor;
        public $umur;
        public $jeniskelamin;
        public $jeniskucing;

        // konstruktor
        public function __construct($warna, $ekor, $umur, $jeniskelamin, $jeniskucing) {
            $this->warna = $warna;
            $this->ekor = $ekor;
            $this->umur = $umur;
            $this->jeniskelamin = $jeniskelamin;
            $this->jeniskucing = $jeniskucing;
        }

        // Behaviour
        public function meong(): string {
            return "meongggggg hidtrdty";
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