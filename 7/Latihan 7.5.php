<?php

// Abstract Class Hewan (Induk)
abstract class Hewan {
    // Properti untuk menyimpan nama
    protected string $nama;

    // Constructor yang akan menerima nama saat objek dibuat
    public function __construct(string $nama) {
        $this->nama = $nama;
    }

    // Method abstract yang WAJIB ada di setiap class anak
    abstract public function getName(): string;
    abstract public function emitSound(): string;
}

// Class anak yang mewarisi Hewan
// Perbaikan: Menggunakan 'extends'
class Burung extends Hewan {

    // Perbaikan: Implementasi method yang wajib ada
    public function getName(): string {
        return $this->nama;
    }

    public function emitSound(): string {
        return "Suaranya: Cuit cuit!<br/>";
    }
}

// Class anak lain yang mewarisi Hewan
// Perbaikan: Menggunakan 'extends'
class Kambing extends Hewan {

    // Perbaikan: Implementasi method yang wajib ada
    public function getName(): string {
        return $this->nama;
    }

    public function emitSound(): string {
        return "Suaranya: Mbeee!<br/>";
    }
}

// Instansiasi atau pembuatan objek
// Perbaikan: Memberikan argumen nama pada constructor
$burung = new Burung("Pipit");
$kambing = new Kambing("Etawa");

// Menjalankan method
echo "<b>Informasi Burung:</b><br/>";
echo "Nama: " . $burung->getName() . "<br/>";
echo $burung->emitSound();

echo "<br/>";
echo "<b>Informasi Kambing:</b><br/>";
echo "Nama: " . $kambing->getName() . "<br/>";
echo $kambing->emitSound();

?>