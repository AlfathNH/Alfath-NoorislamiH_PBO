<?php

class Belanja
{
    public $namaBarang;
    public $harga;
    public $jumlah;
    public $total;

    public function __construct($namaBarang, $harga, $jumlah)
    {
        $this->namaBarang = $namaBarang;
        $this->harga = $harga;
        $this->jumlah = $jumlah;
        $this->total = $harga * $jumlah;
    }

    public function getInfo()
    {
        $hargaFormatted = number_format($this->harga, 0, ',', '.');
        $totalFormatted = number_format($this->total, 0, ',', '.');
        return "- {$this->namaBarang} ({$this->jumlah} x Rp {$hargaFormatted}) = Rp {$totalFormatted}";
    }

    public function __destruct()
    {
    }
}

echo "Masukkan Jumlah Jenis Barang yang di Beli: ";
$jml = (int)trim(fgets(STDIN));

$barang = [];
$totalBelanja = 0;

for ($i = 1; $i <= $jml; $i++) {
    echo "\n--- Barang ke-$i ---\n";
    echo "Nama Barang: ";
    $namaBarang = trim(fgets(STDIN));
    echo "Harga Satuan: ";
    $harga = (int)trim(fgets(STDIN));
    echo "Jumlah: ";
    $jumlah = (int)trim(fgets(STDIN));

    $itemBelanja = new Belanja($namaBarang, $harga, $jumlah);

    $barang[] = $itemBelanja;

    $totalBelanja += $itemBelanja->total;
}

echo "\n------------------ Struk Belanja ------------------\n";

foreach ($barang as $item) {
    echo $item->getInfo() . "\n";
}

echo "---------------------------------------------------\n";
echo "Total Belanja Anda Adalah: Rp " . number_format($totalBelanja, 0, ',', '.') . "\n";
echo "---------------------------------------------------\n";

?>