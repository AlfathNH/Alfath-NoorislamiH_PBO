<?php

class BarangHarian{
    var $NamaBarang = "Mie Instan";
    var $harga;
    var $Total;
    var $JumlahBarang;

    function HitungTotalPembayaran(){
        $Total = $this->harga * $this->JumlahBarang;
        return $Total;
    }

        function StatusPembayaran(){
        $total = $this->HitungTotalPembayaran();
        if ($total > 50000) {
            return "Mahal";
        } else {
            return "Murah";
    }
    }
}

$barang1 = new BarangHarian();
$barang1 -> harga = 15000;
$barang1 -> JumlahBarang = 5;

$barang2 = new BarangHarian();
$barang2 -> NamaBarang = "Kopi";
$barang2 -> harga = 3000;
$barang2 -> JumlahBarang = 5;

$barang3 = new BarangHarian();
$barang3 -> NamaBarang = "Air Mineral";
$barang3 -> harga = 5000;
$barang3 -> JumlahBarang = 5;

echo $barang1 -> NamaBarang;
echo "<br>";
echo $barang1 -> harga;
echo "<br>";
echo "Total yang harus dibayar Rp. " . $barang1 -> HitungTotalPembayaran()."<br>";
echo "Status: " . $barang1->StatusPembayaran();
echo "<br>";
echo $barang2 -> NamaBarang;
echo "<br>";
echo $barang2 -> harga;
echo "<br>";
echo "Total yang harus dibayar Rp. " . $barang2 -> HitungTotalPembayaran()."<br>";
echo "Status: " . $barang1->StatusPembayaran() . "<br>";
echo $barang3 -> NamaBarang;
echo "<br>";
echo $barang3 -> harga;
echo "<br>";
echo "Total yang harus dibayar Rp. " . $barang3 -> HitungTotalPembayaran(). "<br>";
echo "Status: " . $barang1->StatusPembayaran();
?>