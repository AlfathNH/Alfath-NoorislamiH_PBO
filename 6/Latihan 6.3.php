<?php

class KonversiSuhu
{
    // Properti untuk menyimpan nilai suhu dalam Celsius
    public float $celsius;

    // Properti untuk menyimpan hasil konversi (memenuhi syarat "deklarasi array")
    public array $hasilKonversi = [];

    // Constructor dieksekusi saat objek baru dibuat. Menerima suhu awal dalam Celsius.
    public function __construct($suhuAwal)
    {
        // Menambahkan percabangan untuk memeriksa apakah input adalah angka
        if (is_numeric($suhuAwal)) {
            $this->celsius = (float) $suhuAwal;
        } else {
            // Jika input bukan angka, set nilai default ke 0
            $this->celsius = 0;
        }
    }

    // Method untuk melakukan kalkulasi konversi suhu.Hasilnya disimpan ke dalam array $hasilKonversi.
    public function hitungKonversi()
    {
        // Rumus konversi suhu
        $kelvin = $this->celsius + 273.15;
        $fahrenheit = ($this->celsius * 9 / 5) + 32;

        // Menyimpan hasil ke dalam array asosiatif
        $this->hasilKonversi = [
            'kelvin' => $kelvin,
            'fahrenheit' => $fahrenheit,
        ];
    }

    // Method untuk menampilkan seluruh output sesuai format yang diminta.
    public function tampilkanHasil()
    {
        echo "<h1>Konversi Suhu dari Celcius</h1>";

        echo "suhu dalam celcius = {$this->celsius} derajat<br>";

        // Menambahkan perulangan untuk menampilkan setiap hasil konversi dari array
        foreach ($this->hasilKonversi as $unit => $nilai) {
            echo "suhu dalam {$unit} = {$nilai} derajat<br>";
        }

        echo "<br>";
        echo "Sekian konfersi suhu yang bisa dilakukan";
    }
}

// 1. Tentukan nilai suhu Celsius (sesuai gambar adalah 36)
//    Jika ingin mengambil dari URL (GET), gunakan: $nilaiAwal = $_GET['suhu'] ?? 36;
$nilaiAwal = 36;

// 2. Buat objek baru dari class KonversiSuhu. Constructor akan langsung dijalankan.
$konverter = new KonversiSuhu($nilaiAwal);

// 3. Panggil method untuk menghitung konversi
$konverter->hitungKonversi();

// 4. Panggil method untuk menampilkan hasilnya ke layar
$konverter->tampilkanHasil();

?>