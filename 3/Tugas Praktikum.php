<?php

class Bayar
{
    var $KartuMember;
    var $totalBelanja;

    function hitungDiskon()
    {
        $diskon = 0;

        switch (true) {
            case ($this->KartuMember && $this->totalBelanja > 500000):
                $diskon = 50000;
                break;

            case ($this->KartuMember && $this->totalBelanja > 100000):
                $diskon = 15000;
                break;

            case (!$this->KartuMember && $this->totalBelanja > 100000):
                $diskon = 5000;
                break;

            default:
                $diskon = 0;
                break;
        }

        return $this->totalBelanja - $diskon;
    }
}

$transaksi = new Bayar();
$transaksi->KartuMember = false;
$transaksi->totalBelanja = 90000;

$totalBayar = $transaksi->hitungDiskon();

echo "Apakah ada kartu member: " . ($transaksi->KartuMember ? "ya" : "tidak") . "<br>";
echo "Total belanjaan: " . $transaksi->totalBelanja . "<br>";
echo "Total Bayar: Rp " . $totalBayar . "<br>";

?>