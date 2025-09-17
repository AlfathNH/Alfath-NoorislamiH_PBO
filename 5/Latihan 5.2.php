<?php

use Warung as GlobalWarung;

class warung{
    public $namabarang;
    public $harga;

    public function __construct($namabarang,$harga)
    {
     $this ->namabarang = $namabarang;
     $this ->harga = $harga;
    }
    public function informasi(){
        echo "Barang: $this->namabarang, Harga: $this->harga </br>";
    }
}

class Warung2 extends warung{
    public $exp;
    public function __construct($namabarang,$harga,$exp)
    {
        parent ::__construct($namabarang, $harga);
        $this ->exp = $exp;
    }

    //overriding
    public function informasi()
    {
        echo "Barang2: $this->namabarang, harga: Rp.$this->harga, Kadaluarsa: $this->exp" . "<br>";
    }
}

Class Warung3 {
    public function __call($NamaBarang, $x)
    {
        if ($NamaBarang == "total"){
            if (count($x)== 1)
            {return $x[0];
            }
            else if (count($x)==2) {
                return $x[0]*$x[1];
            }
            else {
                return 0;
            }

        }
    }
}

$barang1 = new warung("Susus uht", 6000);
$barang1->informasi(); 

$barang2 = new Warung2("Susus uht", 6000, "12-10-2026");
$barang2->informasi(); 

$barang3 = new Warung3();
echo "Harga Indomie setelah diskon Rp. ". $barang3->total(4000). "<br>";
echo "Harga Telur Rp. ". $barang3->total(2000, 5)."<br>";

?>