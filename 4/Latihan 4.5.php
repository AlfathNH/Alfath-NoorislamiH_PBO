<?php

/**
* Class Kendaraan
* Ini adalah 'cetakan' (blueprint) untuk membuat objek kendaraan.
* Class ini memiliki properti untuk menyimpan data dan method untuk mengolah data tersebut.
*/
class Kendaraan
{
// Properti untuk menyimpan data (dibuat private untuk enkapsulasi)
private $merek;
private $jmlRoda;
private $harga;
private $warna;
private $bhnBakar;
private $tahun;

// --- SETTER METHODS (untuk mengisi/mengubah nilai properti) ---
public function setMerek($merek)
{
$this->merek = $merek;
}
public function setJmlRoda($jmlRoda)
{
$this->jmlRoda = $jmlRoda;
}
public function setHarga($harga)
{
$this->harga = $harga;
}
public function setWarna($warna)
{
$this->warna = $warna;
}
public function setBhnBakar($bhnBakar)
{
$this->bhnBakar = $bhnBakar;
}
public function setTahun($tahun)
{
$this->tahun = $tahun;
}

// --- GETTER METHODS (untuk mengambil/membaca nilai properti) ---
public function getMerek()
{
return $this->merek;
}
public function getJmlRoda()
{
return $this->jmlRoda;
}
public function getHarga()
{
return "Rp " . number_format($this->harga, 0, ',', '.');
}
public function getWarna()
{
return $this->warna;
}
public function getBhnBakar()
{
return $this->bhnBakar;
}
public function getTahun()
{
return $this->tahun;
}

// --- CUSTOM METHODS (method dengan logika khusus) ---
public function statusHarga()
{
if ($this->harga > 150000000) {
return "Mahal";
} else {
return "Murah";
}
}

public function dapatSubsidi()
{
if ($this->bhnBakar == 'Premium' || $this->bhnBakar == 'Solar') {
return "Dapat Subsidi";
} else {
return "Tidak Dapat Subsidi";
}
}

public function hargaSecondKendaraan()
{
$tahunSekarang = date('Y');
$umurKendaraan = $tahunSekarang - $this->tahun;
// Asumsi penyusutan harga 15% per tahun
$penyusutan = 0.15;
$hargaSecond = $this->harga * pow((1 - $penyusutan), $umurKendaraan);

if ($hargaSecond < 0) {
$hargaSecond = 0;
}

return "Rp " . number_format($hargaSecond, 0, ',', '.');
}
}


// --- BAGIAN UTAMA PROGRAM ---

// Data mentah dalam bentuk array
$Data1 = array('Toyota Yaris', '4', '160000000', 'Merah', 'Pertamax', '2014');
$Data2 = array('Honda Scoopy', '2', '13000000', 'Putih', 'Premium', '2005');
$Data3 = array('Isuzu Panther', '4', '40000000', 'Hitam', 'Solar', '1994');


// Loop 1: Memetakan data dari array ke dalam objek
// Perulangan ini membuat 3 objek kendaraan dan mengisinya dengan data dari array.
for ($i = 1; $i <= 3; $i++) {
// Membuat objek baru, misal: $kendaraan1, $kendaraan2, dst.
${"kendaraan$i"} = new Kendaraan();

// Mengambil data dari array dinamis ($Data1, $Data2, dst.)
$dataArray = ${"Data$i"};

// Mengisi properti objek menggunakan setter method (assignment)
${"kendaraan$i"}->setMerek($dataArray[0]);
${"kendaraan$i"}->setJmlRoda($dataArray[1]);
${"kendaraan$i"}->setHarga($dataArray[2]);
${"kendaraan$i"}->setWarna($dataArray[3]);
${"kendaraan$i"}->setBhnBakar($dataArray[4]);
${"kendaraan$i"}->setTahun($dataArray[5]);
}
// Loop 2: Menampilkan data dari setiap objek yang telah dibuat
for ($i = 1; $i <= 3; $i++) {
    echo "<b>Detail Kendaraan " . $i . " :</b><br>";
    echo "Merek             : " . ${"kendaraan$i"}->getMerek() . "<br>";
    echo "Jumlah Roda       : " . ${"kendaraan$i"}->getJmlRoda() . "<br>";
    echo "Harga Baru        : " . ${"kendaraan$i"}->getHarga() . "<br>";
    echo "Warna             : " . ${"kendaraan$i"}->getWarna() . "<br>";
    echo "Bahan Bakar       : " . ${"kendaraan$i"}->getBhnBakar() . "<br>";
    echo "Tahun Produksi    : " . ${"kendaraan$i"}->getTahun() . "<br>";
    echo "Status Harga      : " . ${"kendaraan$i"}->statusHarga() . "<br>";
    echo "Subsidi BBM       : " . ${"kendaraan$i"}->dapatSubsidi() . "<br>";
    echo "Estimasi Harga Bekas : " . ${"kendaraan$i"}->hargaSecondKendaraan() . "<br><br>";
}
?>