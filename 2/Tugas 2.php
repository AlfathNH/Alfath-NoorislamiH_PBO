<?php

$pinjaman = 1000000;      
$bunga = 10;               
$lama_angsuran = 5;         
$telat_hari = 40;           
$denda_per_hari = 0.0015;   

$total_pinjaman = $pinjaman + ($pinjaman * $bunga / 100);

$angsuran = $total_pinjaman / $lama_angsuran;

$denda = $angsuran * $denda_per_hari * $telat_hari;

$total_bayar = $angsuran + $denda;

echo "Toko Pegadaian Syariah <br>";
echo "Jl Keadilan No 16 <br>";
echo "Telp. 72353459 <br><br>";

echo "Besaran Pinjaman : Rp " . number_format($pinjaman, 0, ',', '.') . "<br>";
echo "Bunga : " . $bunga . "%<br>";
echo "Total Pinjaman : Rp " . number_format($total_pinjaman, 0, ',', '.') . "<br>";
echo "Lama Angsuran : " . $lama_angsuran . " bulan<br>";
echo "Besaran Angsuran : Rp " . number_format($angsuran, 0, ',', '.') . "<br><br>";

echo "Keterlambatan Angsuran (Hari): " . $telat_hari . "<br>";
echo "Denda Keterlambatan : Rp " . number_format($denda, 0, ',', '.') . "<br>";
echo "Besaran Pembayaran : Rp " . number_format($total_bayar, 0, ',', '.') . "<br>";
?>
