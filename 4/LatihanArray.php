<?php
class Mahasiswa {
    private $nama;
    private $kelas;
    private $matkul;
    private $nilai;

    // Setter
    public function setData($nama, $kelas, $matkul, $nilai) {
        $this->nama = $nama;
        $this->kelas = $kelas;
        $this->matkul = $matkul;
        $this->nilai = $nilai;
    }

    // Getter
    public function getNama() {
        return $this->nama;
    }

    public function getKelas() {
        return $this->kelas;
    }

    public function getMatkul() {
        return $this->matkul;
    }

    public function getNilai() {
        return $this->nilai;
    }

    public function getStatus() {
        if ($this->nilai >= 70) {
            return "Lulus Kuis";
        } else {
            return "Tidak Lulus Kuis";
        }
    }
}

// Data array mahasiswa
$dataMahasiswa = [
    ["Aditya", "SI 2", "Pemrograman Berorientasi Objek", 80],
    ["Shinta", "SI 2", "Pemrograman Berorientasi Objek", 75],
    ["Ineu", "SI 2", "Pemrograman Berorientasi Objek", 55],
];

// Perulangan untuk menampilkan data
foreach ($dataMahasiswa as $mhs) {
    $obj = new Mahasiswa();
    $obj->setData($mhs[0], $mhs[1], $mhs[2], $mhs[3]);

    echo "Nama : " . $obj->getNama() . "<br>";
    echo "Kelas : " . $obj->getKelas() . "<br>";
    echo "Mata Kuliah : " . $obj->getMatkul() . "<br>";
    echo "Nilai : " . $obj->getNilai() . "<br>";
    echo $obj->getStatus() . "<br><hr>";
}
?>
