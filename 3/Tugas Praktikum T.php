<?php

class Bayar
{
    var $KartuMember;
    var $totalBelanja;

    function setKartuMember($status)
    {
        $this->KartuMember = $status;
    }

    function getKartuMember()
    {
        return $this->KartuMember;
    }

    function setTotalBelanja($jumlah)
    {
        $this->totalBelanja = $jumlah;
    }

    function getTotalBelanja()
    {
        return $this->totalBelanja;
    }

    function hitungDiskon()
    {
        $diskon = 0;

        if ($this->KartuMember) { 
            if ($this->totalBelanja > 100000) {
                $diskon = 15000;
            } else {
                if ($this->totalBelanja > 500000) {
                    $diskon = 50000;
                }
            }
        } else { 
            if ($this->totalBelanja > 100000) {
                $diskon = 5000;
            }
        }

        return $this->totalBelanja - $diskon;
    }
}

$transaksi = new Bayar();
$transaksi->setKartuMember(true);
$transaksi->setTotalBelanja(200000);

echo "Apakah ada kartu member: " . ($transaksi->getKartuMember() ? "ya" : "tidak") . "<br>";
echo "Total belanjaan: " . $transaksi->getTotalBelanja() . "<br>";
echo "Total Bayar: Rp " . $transaksi->hitungDiskon() . "<br>";

?>