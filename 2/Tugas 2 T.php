<?php
class Data{
    var $Pinjam = 1000000;
    var $Bunga = 0.1;
    var $LamaAngsuran = 5;
    var $Telat = 40;
    var $DendaPerHari = 0.0015;

    function TotalPinjaman(){
        return $this->Pinjam + ($this->Pinjam *$this->Bunga);
    }

    function TotalAngsuran(){
        return $this->TotalPinjaman()/$this->LamaAngsuran;
    }

    function Denda(){
        return $this->TotalAngsuran()* $this->DendaPerHari *$this->Telat;
    }

    function TotalBayar(){
        return $this->TotalAngsuran() + $this->Denda();
    }
}

$ObjectData = new Data();

Echo "TOKO PEGADAIAN SYARIAH";
Echo "<br>";
Echo "Jl Keadilan No.16";
Echo "<br>";
Echo "Telp.72353459";
Echo "<br>";
Echo "<br>";
Echo "Besar Pinjaman: Rp.". $ObjectData->Pinjam; 
Echo "<br>";
Echo "Total Pinjaman: Rp.". $ObjectData->TotalPinjaman() ;
echo "<br>";
Echo "Lama Angsuran: Rp. ". $ObjectData->LamaAngsuran;
echo "<br>";
Echo "Besar Angsuran: Rp.". $ObjectData->TotalAngsuran() ;
Echo "<br>";
Echo "Keterlambatan: ". $ObjectData->Telat ;
Echo "<br>";
Echo "Denda: Rp.". $ObjectData->Denda() ;
Echo "<br>";
Echo "Total Pembayaran: Rp.". $ObjectData->TotalBayar();
Echo "<br>";
?>