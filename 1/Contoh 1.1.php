<?
class Hewan {
    protected $name;

    public function __construct($nama) {
        $this->name = $nama;
    }

    public function getName() {
        return $this->name;
    }

    public function emitSound() {
        echo "Hewan itu mengeluarkan suara.";
    }
}

class Anjing extends Hewan {
    public function emitSound() {
        echo "Anjing menggonggong: Guk guk!";
    }
}

$dog = new Anjing("Firulais");
echo "Nama Anjing: " . $dog->getName();
$dog->emitSound();
?>