<?php

class Kendaraan {
    var $jumlahRoda = 4;
    var $warna;
    var $bahanBakar = "Premium";
    var $harga = 100000000;
    var $merek;
    var $tahunPembuatan = 2004;
    
    function statusHarga() {
        return $this->harga <= 1000000 ? "Murah" : "Mahal";
    }

    function dapatSubsidi() {
        return $this->bahanBakar == "Premium" ? "Mendapat Subsidi" : "Tidak Mendapat Subsidi";
    }

    function hargaSecondKendaraan() {
        return $this->harga * 0.8; 
    }
}

// Deklarasi objek dan instansiasi objek (berada di luar class)
$objekKendaraan1 = new Kendaraan();
// Setting properties
$objekKendaraan1->harga = 1000000;
$objekKendaraan1->tahunPembuatan = 1999;
// Instansiasi objek (pemanggilan method/function)
echo "Status Harga: " . $objekKendaraan1->statusHarga();

// Deklarasi objek dan instansiasi objek (berada di luar class)
$objekKendaraan2 = new Kendaraan();
// Setting properties
$objekKendaraan2->bahanBakar = "Pertamax";
$objekKendaraan2->tahunPembuatan = 1999;
// Instansiasi objek (pemanggilan method/function)
echo "<br>";
echo "Status BBM: " . $objekKendaraan2->dapatSubsidi();
echo "<br>";
echo "Harga Bekas: " . $objekKendaraan2->hargaSecondKendaraan();
?>
