<?php

class PolaBintang
{
    private $ukuran;

    public function setUkuran($jumlah)
    {
        $this->ukuran = $jumlah;
    }

    public function getUkuran()
    {
        return $this->ukuran;
    }

    public function buatSegitiga1()
    {
        $pola = [];
        for ($i = 1; $i <= $this->ukuran; $i++) {
            $baris = '';
            for ($j = 1; $j <= $i; $j++) {
                $baris .= "*";
            }
            $pola[] = $baris;
        }
        return $pola;
    }

    public function buatSegitiga2()
    {
        $pola = [];
        for ($i = $this->ukuran; $i >= 1; $i--) {
            $baris = '';
            for ($j = 1; $j <= $i; $j++) {
                $baris .= "*";
            }
            $pola[] = $baris;
        }
        return $pola;
    }

    public function buatSegitiga3()
    {
        $pola = $this->buatSegitiga1();
        for ($i = $this->ukuran - 1; $i >= 1; $i--) {
            $baris = '';
            for ($j = 1; $j <= $i; $j++) {
                $baris .= "*";
            }
            $pola[] = $baris;
        }
        return $pola;
    }

    // Method baru untuk membuat pola diamond (wajik)
    public function buatDiamond()
    {
        $pola = [];
        $n = $this->ukuran;

        // Bagian atas (segitiga atas dengan spasi)
        for ($i = 1; $i <= $n; $i++) {
            $baris = str_repeat(' ', $n - $i) . str_repeat('* ', $i);
            $pola[] = rtrim($baris); // Menghilangkan spasi kosong di akhir baris
        }

        // Bagian bawah (segitiga bawah dengan spasi)
        for ($i = $n - 1; $i >= 1; $i--) {
            $baris = str_repeat(' ', $n - $i) . str_repeat('* ', $i);
            $pola[] = rtrim($baris);
        }

        return $pola;
    }
}

// ---- EKSEKUSI PROGRAM ----

$pola = new PolaBintang();
$pola->setUkuran(5);

$segitiga1 = $pola->buatSegitiga1();
$segitiga2 = $pola->buatSegitiga2();
$segitiga3 = $pola->buatSegitiga3();
$diamond = $pola->buatDiamond();

foreach ($segitiga1 as $baris) {
    echo $baris . "<br>";
}

foreach ($segitiga2 as $baris) {
    echo $baris . "<br>";
}
Echo "<br>";
foreach ($segitiga3 as $baris) {
    echo $baris . "<br>";
}
Echo "<br>";
foreach ($diamond as $baris) {
    echo $baris . "<br>";
}

?>
