<?php
// CLASS INDUK (jawaban poin a & b)
class Tabungan {
    private $saldo;       // encapsulation (poin d: private)
    protected $nama;      // bisa diakses anak (poin d: protected)

    public function __construct($nama, $saldoAwal) { // constructor (poin f)
        $this->nama = $nama;
        $this->saldo = $saldoAwal;
    }

    public function setor($jumlah) { // poin h: saldo bertambah
        if ($jumlah > 0) $this->saldo += $jumlah;
        else echo "Jumlah setor tidak valid!\n";
    }

    public function tarik($jumlah) { // poin h: saldo berkurang
        if ($jumlah > 0 && $jumlah <= $this->saldo) $this->saldo -= $jumlah;
        else echo "Saldo tidak cukup atau jumlah tidak valid!\n";
    }

    public function getSaldo() { return $this->saldo; }
}

// CLASS ANAK (jawaban poin c)
class Siswa extends Tabungan {
    public function infoSiswa() { // tampil saldo (poin g)
        echo "Nama: {$this->nama} | Saldo: Rp " . $this->getSaldo() . "\n";
    }
}

// MAIN PROGRAM
$siswa = []; // array (poin f)
echo "Masukkan jumlah siswa: "; 
$jumlahSiswa = intval(fgets(STDIN)); // fgets (poin i)

// Perulangan input (poin f)
for ($i=0; $i<$jumlahSiswa; $i++) {
    echo "Nama siswa ke-".($i+1).": "; 
    $nama = trim(fgets(STDIN));
    echo "Saldo awal untuk $nama: "; 
    $saldo = intval(fgets(STDIN));
    $siswa[$i] = new Siswa($nama, $saldo);
}

// Tampilkan saldo awal (poin g)
echo "\n=== Saldo Awal ===\n";
foreach ($siswa as $s) $s->infoSiswa();

// MENU TRANSAKSI
while (true) {
    echo "\n1. Setor\n2. Tarik\n3. Lihat Saldo Semua\n4. Keluar\nPilih: ";
    $pilih = intval(fgets(STDIN));

    if ($pilih==4) { 
        echo "Program selesai.\n"; 
        break; 
    }

    // hanya setor & tarik yang perlu pilih siswa
    if ($pilih==1 || $pilih==2) {
        echo "Pilih siswa (1-$jumlahSiswa): "; 
        $no = intval(fgets(STDIN))-1;
        if (!isset($siswa[$no])) {
            echo "Nomor siswa tidak valid!\n";
            continue;
        }
    }

    switch ($pilih) {
        case 1: 
            echo "Jumlah setor: "; 
            $siswa[$no]->setor(intval(fgets(STDIN))); 
            break;
        case 2: 
            echo "Jumlah tarik: "; 
            $siswa[$no]->tarik(intval(fgets(STDIN))); 
            break;
        case 3: 
            echo "\n=== Saldo Semua Siswa ===\n";
            foreach ($siswa as $s) $s->infoSiswa(); 
            break;
        default: 
            echo "Menu tidak valid, coba lagi.\n";
    }
}
?>
