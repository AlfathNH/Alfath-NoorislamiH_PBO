<?php
include('koneksi.php');
$db = new database();

// Wajib ada session_start() di file yang menggunakan session
session_start();

// Cek apakah user sudah login, jika belum, lempar ke index.php
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Barang</title>
    <style type="text/css">
        body { font-family: "Trebuchet MS"; }
        h2 { text-align: center; }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px;
            border: 1px solid #000; /* Border untuk tabel */
        }
        table th, table td { 
            border: 1px solid #000; /* Border untuk sel */
            padding: 8px; 
            text-align: left;
        }
        table th { 
            background-color: #f2f2f2; 
            text-align: center;
        }
    </style>
</head>
<body onload="window.print();"> <h2>LAPORAN DATA BARANG</h2>
    
    <table width="100%" border="1">
        <tr>
            <th width="5%">No</th>
            <th width="15%">Kode Barang</th>
            <th width="25%">Barang</th>
            <th width="10%">Stok</th>
            <th width="15%">Harga Beli</th>
            <th width="15%">Harga Jual</th>
            <th width="15%">Keuntungan</th>
        </tr>
        
        <?php
        $data_barang = $db->tampil_data();
        $no = 1;
        foreach ($data_barang as $row) {
            $keuntungan = $row['harga_jual'] - $row['harga_beli']; // Hitung keuntungan [cite: 1255]
        ?>
        <tr>
            <td style="text-align: center;"><?php echo $no++; ?></td>
            <td><?php echo $row['kd_barang']; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td style="text-align: center;"><?php echo $row['stok']; ?></td>
            <td>Rp <?php echo number_format($row['harga_beli'], 0, ',', '.'); ?></td>
            <td>Rp <?php echo number_format($row['harga_jual'], 0, ',', '.'); ?></td>
            <td>Rp <?php echo number_format($keuntungan, 0, ',', '.'); ?></td>
        </tr>
        <?php
        }
        ?>
    </table>

</body>
</html>