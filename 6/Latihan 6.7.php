<?php

class Karyawan
{
    // Properties
    private $nama;
    private $golongan;
    private $total_jam_lembur;

    // 6. Constructor dengan parameter
    public function __construct($nama, $golongan, $jam_lembur)
    {
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->total_jam_lembur = $jam_lembur;
        echo "-> Objek untuk karyawan '" . $this->nama . "' telah dibuat.\n";
    }

    // 1. Method set dan get
    public function setNama($nama)
    {
        $this->nama = $nama;
    }
    public function getNama()
    {
        return $this->nama;
    }
    public function setGolongan($golongan)
    {
        $this->golongan = $golongan;
    }
    public function getGolongan()
    {
        return $this->golongan;
    }
    public function setJamLembur($jam)
    {
        $this->total_jam_lembur = $jam;
    }
    public function getJamLembur()
    {
        return $this->total_jam_lembur;
    }

    // 2. Method getGaji Pokok dengan percabangan
    public function getGajiPokok()
    {
        // 4. Menggunakan percabangan (switch case)
        switch ($this->golongan) {
            case "Ib": return 1250000;
            case "Ic": return 1300000;
            case "Id": return 1350000;
            case "IIa": return 2000000;
            case "IIb": return 2100000;
            case "IIc": return 2200000;
            case "IId": return 2300000;
            case "IIIa": return 2400000;
            case "IIIb": return 2500000;
            case "IIIc": return 2600000;
            case "IIId": return 2700000;
            case "IVa": return 2800000;
            case "IVb": return 2900000;
            case "IVc": return 3000000;
            case "IVd": return 3100000;
            default: return 0;
        }
    }

    // Method untuk menghitung uang lembur
    public function getUangLembur()
    {
        // 3. Besaran lembur tiap jam adalah Rp 15000
        return $this->total_jam_lembur * 15000;
    }

    // Method untuk menghitung total gaji
    public function getTotalGaji()
    {
        return $this->getGajiPokok() + $this->getUangLembur();
    }

    // 8. Function destruct untuk meng-unset objek
    public function __destruct()
    {
        echo "-> Objek untuk karyawan '" . $this->nama . "' telah dihapus.\n";
    }
}

// --- EKSEKUSI PROGRAM DENGAN PHP CLI ---

// 9. Menggunakan PHP CLI untuk menginput
echo "=============================================\n";
echo "PROGRAM INPUT DATA GAJI KARYAWAN\n";
echo "=============================================\n";

echo "Masukkan jumlah karyawan: ";
$jumlah_karyawan = (int)trim(fgets(STDIN));

// 5. Menggunakan array untuk menampung objek
$daftar_karyawan = [];

// 4. Menggunakan perulangan untuk input data
for ($i = 1; $i <= $jumlah_karyawan; $i++) {
    echo "\n--- Data Karyawan ke-" . $i . " ---\n";
    echo "Masukkan Nama: ";
    $nama = trim(fgets(STDIN));
    echo "Masukkan Golongan (e.g., IIb, IIIc, IVb): ";
    $golongan = trim(fgets(STDIN));
    echo "Masukkan Total Jam Lembur: ";
    $jam_lembur = (int)trim(fgets(STDIN));

    // Membuat objek baru dan menyimpannya ke array
    $daftar_karyawan[] = new Karyawan($nama, $golongan, $jam_lembur);
}

$w_nama = 10;
$w_gol = 5;
$w_gaji_pokok = 12;
$w_jam_lembur = 10;
$w_upah_lembur = 12;
$w_total_gaji = 12;

// 7. Tampilkan output seperti tabel berikut
echo "\n\n=============================================\n";
echo "          DATA GAJI KARYAWAN          \n";
echo "=============================================\n";
echo str_pad("Nama", $w_nama);
echo str_pad("Gol", $w_gol);
echo str_pad("GajiPokok", $w_gaji_pokok);
echo str_pad("JamLembur", $w_jam_lembur);
echo str_pad("UpahLembur", $w_upah_lembur);
echo str_pad("TotalGaji", $w_total_gaji);
echo "\n";
// 4. Memakai perulangan untuk menampilkan output
foreach ($daftar_karyawan as $karyawan) {
    $nama = $karyawan->getNama();
    $golongan = $karyawan->getGolongan();
    $gaji_pokok = number_format($karyawan->getGajiPokok());
    $jam_lembur = $karyawan->getJamLembur();
    $upah_lembur = number_format($karyawan->getUangLembur());
    $total_gaji = number_format($karyawan->getTotalGaji());

    echo str_pad($nama, $w_nama);
    echo str_pad($golongan, $w_gol);
    echo str_pad($gaji_pokok, $w_gaji_pokok);
    echo str_pad($jam_lembur, $w_jam_lembur);
    echo str_pad($upah_lembur, $w_upah_lembur);
    echo str_pad($total_gaji, $w_total_gaji);
    echo "\n";
}
echo "\n";

//array dikosongkan untuk memicu destructor
unset($daftar_karyawan);

?>
