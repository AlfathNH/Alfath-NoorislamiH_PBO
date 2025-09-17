<?php
//class induk
class employee{
    public $nama;
    public $gaji_pokok;
    public $lama_kerja;

    public function __construct($nama, $gaji_pokok,$lama_kerja)
    {
        $this->nama = $nama;
        $this->gaji_pokok=$gaji_pokok;
        $this->lama_kerja=$lama_kerja;
    }
    public function Info()
    {
        echo "Nama : ". $this->nama . "<br>";
        echo "Lama kerja : ".$this->lama_kerja."<br>";
        echo "Gaji Pokok : ".$this->gaji_pokok."<br>";
    }
     public function hitungGaji()
    {
        return $this->gaji_pokok;
    }
}
//class anak 1 PROGRAMER
class Programmer extends employee{
    // Overriding
    public function hitungGaji()
    {
        $bonus = 0;
        if ($this->lama_kerja >= 1 && $this->lama_kerja <= 10) {
            $bonus = (0.01 * $this->lama_kerja) * $this->gaji_pokok;
        } elseif ($this->lama_kerja > 10) {
            $bonus = (0.02 * $this->lama_kerja) * $this->gaji_pokok;
        }

        return $this->gaji_pokok + $bonus;
    }
}
//class anak 2 DIREKTUR
class direktur extends employee{
    // Overriding
    public function hitungGaji()
    {
        $bonus = (0.5 * $this->lama_kerja) * $this->gaji_pokok;
        $tunjangan = (0.1 * $this->lama_kerja) * $this->gaji_pokok;
        
        return $this->gaji_pokok + $bonus + $tunjangan;
    }
}
// class anak 3 PEGAWAI MINGGUAN
class pegawai_mingguan extends employee
{
    private $harga_barang;
    private $stock_barang;
    private $total_penjualan;

    public function __construct($nama, $gaji_pokok, $lama_kerja, $harga, $stock, $penjualan)
    {
        parent::__construct($nama, $gaji_pokok, $lama_kerja);
        $this->harga_barang = $harga;
        $this->stock_barang = $stock;
        $this->total_penjualan = $penjualan;
    }
    
    // Overriding
    public function hitungGaji()
    {
        $bonus = 0;
        $target_penjualan = 0.7 * $this->stock_barang;

        if ($this->total_penjualan > $target_penjualan) {
            // Bonus 10% dari harga barang tiap penjualan
            $bonus = (0.10 * $this->harga_barang) * $this->total_penjualan;
        } else {
            // Bonus 3% dari harga barang tiap penjualan
            $bonus = (0.03 * $this->harga_barang) * $this->total_penjualan;
        }

        return $this->gaji_pokok + $bonus;
    }
}

echo "Studi Kasus";
echo "<BR>";

// Objek Programmer
$programmer = new Programmer("Dadang", 5000000, 5); // Lama kerja 5 tahun
echo "Info Programmer"."<BR>";
$programmer->Info();
echo "Total Gaji: Rp " . number_format($programmer->hitungGaji())."<BR>";

// Objek Direktur
$direktur = new direktur("Sari", 20000000, 8); // Lama kerja 8 tahun
echo "Info Direktur"."<BR>";
$direktur->Info();
echo "Total Gaji: Rp " . number_format($direktur->hitungGaji()) . "<br>";

// Objek Pegawai Mingguan (penjualan > 70%)
$pegawai1 = new pegawai_mingguan("Andi", 2000000, 1, 50000, 100, 80); // Jual 80 dari 100 stock (>70%)
echo "Info Pegawai Mingguan (Target Tercapai)"."<BR>";
$pegawai1->Info();
echo "Total Gaji: Rp " . number_format($pegawai1->hitungGaji()) . "<br>";

// Objek Pegawai Mingguan (penjualan < 70%)
$pegawai2 = new pegawai_mingguan("Citra", 2000000, 1, 50000, 100, 50); // Jual 50 dari 100 stock (<70%)
echo "Info Pegawai Mingguan (Target Tidak Tercapai)"."<BR>";
$pegawai2->Info();
echo "Total Gaji: Rp " . number_format($pegawai2->hitungGaji()) . "<br>";
?>