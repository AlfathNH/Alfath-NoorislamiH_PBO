<?php

// Interface Hewan
// Interface adalah kontrak yang mendefinisikan method-method yang harus diimplementasikan oleh kelas yang mengimplementasinya
interface Hewan {
    public function Makan(): string;
    public function Bergerak(): string;
    public function Beranak(): string;
}

class Burung implements Hewan {
    public function Makan(): string {
        return "Burung makan biji-bijian<br/>";
    }

    public function Bergerak(): string {
        return "Burung bergerak dengan berjalan, terbang dan melompat<br/>";
    }

    public function Beranak(): string {
        return "Burung beranak dengan bertelur<br/>";
    }
}

class Kambing implements Hewan {
    public function Makan(): string {
        return "Kambing makan rumput<br/>";
    }

    public function Bergerak(): string {
        return "Kambing bergerak dengan berjalan dan berlari<br/>";
    }

    public function Beranak(): string {
        return "Kambing beranak dengan melahirkan<br/>";
    }
}

$burung = new Burung();
$kambing = new Kambing();

echo "<b>Perilaku Burung : </b><br/>";
echo $burung->Makan();
echo $burung->Bergerak();
echo $burung->Beranak();

echo "<br/>";
echo "<b>Perilaku Kambing : </b><br/>";
echo $kambing->Makan();
echo $kambing->Bergerak();
echo $kambing->Beranak();

?>