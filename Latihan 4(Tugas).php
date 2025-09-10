<?php
// Membuat class BangunRuang
class BangunRuang
{
    private $jenis;
    private $sisi;
    private $jari;
    private $tinggi;
    private $volume;

    // Setter dan getter
    public function setJenis($jenis)
    {
        $this->jenis = $jenis;
    }

    public function getJenis()
    {
        return $this->jenis;
    }

    public function setSisi($sisi)
    {
        $this->sisi = $sisi;
    }

    public function getSisi()
    {
        return $this->sisi;
    }

    public function setJari($jari)
    {
        $this->jari = $jari;
    }

    public function getJari()
    {
        return $this->jari;
    }

    public function setTinggi($tinggi)
    {
        $this->tinggi = $tinggi;
    }

    public function getTinggi()
    {
        return $this->tinggi;
    }

    public function getVolume()
    {
        return $this->volume;
    }

    public function hitungVolume()
    {
        switch ($this->jenis) {
            case "Bola":
                $this->volume = (4 / 3) * 3.14 * pow($this->jari, 3);
                break;
            case "Kerucut":
                $this->volume = (1 / 3) * 3.14 * pow($this->jari, 2) * $this->tinggi;
                break;
            case "Limas Segi Empat":
                $this->volume = pow($this->sisi, 2) * $this->tinggi / 3;
                break;
            case "Kubus":
                $this->volume = pow($this->sisi, 3);
                break;
            case "Tabung":
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
    $new = new BangunRuang();
    $new->setJenis($data['jenis']);
    $new->setSisi($data['sisi']);
    $new->setJari($data['jari']);
    $new->setTinggi($data['tinggi']);
    $new->hitungVolume();

    echo "<tr>";
    echo "<td>" . $new->getJenis() . "</td>";
    echo "<td>" . $new->getSisi() . "</td>";
    echo "<td>" . $new->getJari() . "</td>";
    echo "<td>" . $new->getTinggi() . "</td>";
    echo "<td>" . $new->getVolume() . "</td>";
    echo "</tr>";
}
?>