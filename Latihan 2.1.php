<?php

class Guru {
    var $nama_nama = array("de", "ce", "ve", "re");
    var $nama_guru;
    var $NIK;
    var $jabatan;
    var $alamat;
}

class Murid {
    var $nama_siswa;
    var $NIS;
    var $kelas;
    var $alamat;
}

class Kurikulum {
    var $tahun_akademik;
    var $sks_matkul;
}

class Mobil {
    var $jumlahRoda = 4;
    var $warna = "Merah";
    var $bahanBakar = "Pertamax";
    var $harga = 12000000;
    var $merek = 'A';

    public function statusHarga() {
        if ($this->harga > 5000000) $status = 'Mahal';
        else $status = 'Murah';
        return $status;
    }
}

$ObjekBMW = new Mobil; //ini adalah objek BMW dari class mobil
$ObjekTesla = new Mobil; //ini adalah objek Tesla dari class mobil
$ObjekAudi = new Mobil; //ini adalah objek Audi dari class mobil

// Menampilkan status harga untuk mobil
echo "Status harga BMW: " . $ObjekBMW->statusHarga() . "<br>";
echo "Status harga Tesla: " . $ObjekTesla->statusHarga() . "<br>";
echo "Status harga Audi: " . $ObjekAudi->statusHarga() . "<br>";
echo "Warna BMW: " . $warna->warna . "<br>";
echo "Bahan Bakar BMW: " . $objekBMW->bahanBakar . "<br>";
echo "Jumlah Roda BMW: " . $objekBMW->jumlahRoda . "<br>";
echo "Merek BMW: " . $objekBMW->merek . "<br>";
echo "Harga BMW: " . $objekBMW->harga . "<br>";


?>
