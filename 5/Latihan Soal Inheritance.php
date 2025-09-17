<?php

// Parent Class
class kendaraan {
    public $merek;
    public $harga;

    // Menghilangkan 'public', secara default akan dianggap public
    function setMerek($merek) {
        $this->merek = $merek;
    }

    function setHarga($harga) {
        $this->harga = $harga;
    }
}

// Child Class
class pesawat extends kendaraan {
    
    // Sesuai soal, property ini tetap private
    private $tinggiMaks;
    private $kecepatanMaks;

    function setTinggiMaks($tinggi) {
        $this->tinggiMaks = $tinggi;
    }

    function setKecepatanMaks($kecepatan) {
        $this->kecepatanMaks = $kecepatan;
    }

    function bacaTinggiMaks() {
        return $this->tinggiMaks;
    }

    function bacaKecepatanMaks() {
        return $this->kecepatanMaks;
    }

    function biayaOperasional() {
        $biaya = 0;
        
        // Logika perhitungan tetap sama
        if ($this->tinggiMaks > 5000 && $this->kecepatanMaks > 800) {
            $biaya = 0.30 * $this->harga;
        } elseif (($this->tinggiMaks >= 3000 && $this->tinggiMaks <= 5000) && ($this->kecepatanMaks >= 500 && $this->kecepatanMaks <= 800)) {
            $biaya = 0.20 * $this->harga;
        } elseif ($this->tinggiMaks < 3000 && $this->kecepatanMaks < 500) {
            $biaya = 0.10 * $this->harga;
        } else {
            $biaya = 0.05 * $this->harga;
        }
        
        return $biaya;
    }
}

// --- Bagian instansiasi dan output (tidak ada perubahan) ---

echo "<h2>Hasil Perhitungan Biaya Operasional Pesawat</h2>";
echo "<hr>";

// 1. Pesawat Boeing 737
$boeing737 = new pesawat();
$boeing737->setMerek('Boeing 737');
$boeing737->setHarga(2000000000);
$boeing737->setTinggiMaks(7500);
$boeing737->setKecepatanMaks(650);
$biaya_boeing737 = $boeing737->biayaOperasional();

echo "Biaya operasional pesawat '" . $boeing737->merek . "' dengan harga Rp " . number_format($boeing737->harga, 0, ',', '.') . 
     " yang memiliki tinggi maksimum " . $boeing737->bacaTinggiMaks() . " feet dan kecepatan maksimum " . $boeing737->bacaKecepatanMaks() . 
     " km/jam adalah <strong>Rp " . number_format($biaya_boeing737, 0, ',', '.') . "</strong>.<br><br>";

// 2. Pesawat Boeing 747
$boeing747 = new pesawat();
$boeing747->setMerek('Boeing 747');
$boeing747->setHarga(3500000000);
$boeing747->setTinggiMaks(5800);
$boeing747->setKecepatanMaks(750);
$biaya_boeing747 = $boeing747->biayaOperasional();

echo "Biaya operasional pesawat '" . $boeing747->merek . "' dengan harga Rp " . number_format($boeing747->harga, 0, ',', '.') . 
     " yang memiliki tinggi maksimum " . $boeing747->bacaTinggiMaks() . " feet dan kecepatan maksimum " . $boeing747->bacaKecepatanMaks() . 
     " km/jam adalah <strong>Rp " . number_format($biaya_boeing747, 0, ',', '.') . "</strong>.<br><br>";

// 3. Pesawat Cassa
$cassa = new pesawat();
$cassa->setMerek('Cassa');
$cassa->setHarga(750000000);
$cassa->setTinggiMaks(3500);
$cassa->setKecepatanMaks(500);
$biaya_cassa = $cassa->biayaOperasional();

echo "Biaya operasional pesawat '" . $cassa->merek . "' dengan harga Rp " . number_format($cassa->harga, 0, ',', '.') . 
     " yang memiliki tinggi maksimum " . $cassa->bacaTinggiMaks() . " feet dan kecepatan maksimum " . $cassa->bacaKecepatanMaks() . 
     " km/jam adalah <strong>Rp " . number_format($biaya_cassa, 0, ',', '.') . "</strong>.<br>";

?>