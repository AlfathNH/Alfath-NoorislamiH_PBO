<?php
// Membuat class BangunRuang
class BangunRuang {
    private $jenis;
    private $sisi;
    private $jari;
    private $tinggi;
    private $volume;

    // Setter dan getter
    public function setJenis($jenis) {
        $this->jenis = $jenis;
    }

    public function getJenis() {
        return $this->jenis;
    }

    public function setSisi($sisi) {
        $this->sisi = $sisi;
    }

    public function getSisi() {
        return $this->sisi;
    }

    public function setJari($jari) {
        $this->jari = $jari;
    }

    public function getJari() {
        return $this->jari;
    }

    public function setTinggi($tinggi) {
        $this->tinggi = $tinggi;
    }

    public function getTinggi() {
        return $this->tinggi;
    }

    public function getVolume() {
        return $this->volume;
    }

public function hitungVolume() {
        switch($this->jenis) {
            case "Bola":
                // Mengganti pi() dengan 3.14 agar sesuai soal
                $this->volume = (4/3) * 3.14 * pow($this->jari, 3);
                break;
            case "Kerucut":
                // Mengganti pi() dengan 3.14 agar sesuai soal
                $this->volume = (1/3) * 3.14 * pow($this->jari, 2) * $this->tinggi;
                break;
            case "Limas Segi Empat":
                $this->volume = pow($this->sisi, 2) * $this->tinggi / 3;
                break;
            case "Kubus":
                $this->volume = pow($this->sisi, 3);
                break;
            case "Tabung":
                // Mengganti pi() dengan 3.14 agar sesuai soal
                $this->volume = 3.14 * pow($this->jari, 2) * $this->tinggi;
                break;
            default:
                $this->volume = 0;
                break;
        }
    }
}

// Membuat array objek bangun ruang sesuai data pada soal
$bangunRuang = [
    ["jenis" => "Bola", "sisi" => 0, "jari" => 7, "tinggi" => 0],
    ["jenis" => "Kerucut", "sisi" => 0, "jari" => 14, "tinggi" => 10],
    ["jenis" => "Limas Segi Empat", "sisi" => 8, "jari" => 0, "tinggi" => 24],
    ["jenis" => "Kubus", "sisi" => 30, "jari" => 0, "tinggi" => 0],
    ["jenis" => "Tabung", "sisi" => 0, "jari" => 7, "tinggi" => 10]
];

// Tampilkan tabel 
echo "<table border='1'>";
echo "<tr style='background-color: blue; color: white;'>
        <th>Jenis Bangun Ruang</th>
        <th>Sisi</th>
        <th>Jari-jari</th>
        <th>Tinggi</th>
        <th>Volume</th>
      </tr>";

// Perulangan untuk setiap data bangun ruang
foreach ($bangunRuang as $data) {
    $br = new BangunRuang();
    $br->setJenis($data['jenis']);
    $br->setSisi($data['sisi']);
    $br->setJari($data['jari']);
    $br->setTinggi($data['tinggi']);
    $br->hitungVolume();

    echo "<tr>";
    echo "<td>" . $br->getJenis() . "</td>";
    echo "<td>" . $br->getSisi() . "</td>";
    echo "<td>" . $br->getJari() . "</td>";
    echo "<td>" . $br->getTinggi() . "</td>";
    echo "<td>" . $br->getVolume() . "</td>";
    echo "</tr>";
}
?>
