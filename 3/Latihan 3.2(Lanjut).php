<?php
//membuat class
class Kendaraan {
    var $merek;
    var $jmlroda;
    var $harga;
    var $warna;
    var $bhnbakar;
    var $tahun;

    function setMerek($x)
    {
        $this->merek = $x;
    }

    function setHarga($x)
    {
        $this->harga = $x;
    }

    function setJmlroda($x)
    {
        $this->jmlroda = $x;
    }

    function setWarna($x)
    {
        $this->warna = $x;
    }

    function setBhnbakar($x)
    {
        $this->bhnbakar = $x;
    }

    function setTahun($x)
    {
        $this->tahun = $x;
    }
}

$kendaraan1 = new Kendaraan();
$kendaraan1->setMerek('Toyota Yaris');
$kendaraan1->setJmlroda(4);
$kendaraan1->setHarga(160000000);
$kendaraan1->setWarna("Merah");
$kendaraan1->setBhnbakar("Premium");
$kendaraan1->setTahun(2005);

$kendaraan2 = new Kendaraan();
$kendaraan2->setMerek('Honda Scoopy');
$kendaraan2->setJmlroda(2);
$kendaraan2->setHarga(13000000);
$kendaraan2->setWarna("Putih");
$kendaraan2->setBhnbakar("Premium");
$kendaraan2->setTahun(2004);

$kendaraan3 = new Kendaraan();
$kendaraan3->setMerek('Isuzu Panther');
$kendaraan3->setJmlroda(4);
$kendaraan3->setHarga(170000000);
$kendaraan3->setWarna("Hitam");
$kendaraan3->setBhnbakar("Solar");
$kendaraan3->setTahun(2003);

echo $kendaraan1->merek; echo "<br>";
echo $kendaraan1->jmlroda; echo "<br>";
echo $kendaraan1->harga; echo "<br>";
echo $kendaraan1->warna; echo "<br>";
echo $kendaraan1->bhnbakar; echo "<br>";
echo $kendaraan1->tahun; echo "<br><br>";

echo $kendaraan2->merek; echo "<br>";
echo $kendaraan2->jmlroda; echo "<br>";
echo $kendaraan2->harga; echo "<br>";
echo $kendaraan2->warna; echo "<br>";
echo $kendaraan2->bhnbakar; echo "<br>";
echo $kendaraan2->tahun; echo "<br><br>";

echo $kendaraan3->merek; echo "<br>";
echo $kendaraan3->jmlroda; echo "<br>";
echo $kendaraan3->harga; echo "<br>";
echo $kendaraan3->warna; echo "<br>";
echo $kendaraan3->bhnbakar; echo "<br>";
echo $kendaraan3->tahun; echo "<br>";
?>
