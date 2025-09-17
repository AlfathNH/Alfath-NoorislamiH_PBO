<?php
class Warung {
    private $barang;

    public function __construct($barang) {
        $this->barang = $barang;
    }

    public function menampilkanBarang() {
        foreach ($this->barang as $namaBarang => $harga) {
            echo "Nama Barang: $namaBarang, Harga: $harga <br>";
        }
    }
}

$barang = [
    "Kecap" => 3000,
    "Tepung Terigu" => 4000
];

$barang1 = new Warung($barang);
$barang1->menampilkanBarang();
?>