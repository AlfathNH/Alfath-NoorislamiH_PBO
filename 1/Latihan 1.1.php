<?php
Class Mobil{
    var $jumlahroda=4;
    var $warna="Merah";
    var $bahanbakar="Pertamax";
    var $harga=120000000;
    var $merek='A';

    public function getJumlahRoda()
    {
        return "$this->jumlahroda";
    }
    public function statusHarga(){

    }
}

$Object1 = new Mobil();
$object2 = new Mobil();

echo $Object1->getJumlahRoda();

?>