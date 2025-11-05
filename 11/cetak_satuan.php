<?php
// koneksi.php sudah TIDAK menjalankan session_start()
include('koneksi.php');

$db = new database();

// Cek apakah ada kiriman kode barang
if(isset($_POST['kd_barang_print']) && !empty($_POST['kd_barang_print'])) {
    
    $kd_barang = $_POST['kd_barang_print'];
    
    // Panggil fungsi untuk ambil 1 data saja
    $data_barang = $db->tampil_data_satuan($kd_barang);

    // Cek jika datanya ditemukan
    if (empty($data_barang)) {
        echo "Data dengan Kode Barang '$kd_barang' tidak ditemukan.";
        exit;
    }
    
    // Ambil data baris pertama
    $row = $data_barang[0];
    
    // Hitung keuntungan
    $keuntungan = $row['harga_jual'] - $row['harga_beli'];

} else {
    echo "Anda belum memasukkan Kode Barang.";
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Barang <?php echo $row['kd_barang']; ?></title>
    </head>
<body>

    <h2>Laporan Detail Data Barang : <?php echo $row['nama_barang']; ?></h2>
    
    <p>
        Kode Barang : <?php echo $row['kd_barang']; ?><br>
        Nama Barang : <?php echo $row['nama_barang']; ?><br>
        Stok : <?php echo $row['stok']; ?><br>
        Harga Beli : <?php echo $row['harga_beli']; ?><br>
        Harga Jual : <?php echo $row['harga_jual']; ?><br>
        Keuntungan : <?php echo $keuntungan; ?><br>
    </p>


    <script>
        window.print();
    </script>

</body>
</html>