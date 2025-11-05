<?php
include('koneksi.php');
$db = new database();

if(isset($_GET['cari']) && !empty($_GET['cari'])){
    $data_barang = $db->cari_data($_GET['cari']);
} else {
    $data_barang = $db->tampil_data();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
</head>
<body>

    <?php include('menu.php'); ?> 
    <a href="tambah_data.php">
        <button>Tambah Data</button>
    </a>
    <a href="cetak.php?cari=<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>" target="_blank">
        <button>Print Data Barang</button>
    </a>

    <form method="get" style="float: right;">
        Cari Nama Barang
        <input type="text" name="cari" value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
        <input type="submit" value="Cari">
    </form>

    <br><br> 

    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Barang</th>
                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (!empty($data_barang)) {
                foreach($data_barang as $row){
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['kd_barang']; ?></td>
                    <td><?php echo $row['nama_barang']; ?></td>
                    <td><?php echo $row['stok']; ?></td>
                    <td><?php echo $row['harga_beli']; ?></td>
                    <td><?php echo $row['harga_jual']; ?></td>
                    <td>
                        <a href="edit_data.php?id_barang=<?php echo $row['id_barang']; ?>">Edit</a> |
                        <a href="proses_barang.php?action=delete&id_barang=<?php echo $row['id_barang']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="7" style="text-align:center;">Data tidak ditemukan.</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <br>
    
    <form method="post" action="cetak_satuan.php" target="_blank">
        Masukan Kode Barang
        <input type="text" name="kd_barang_print">
        <input type="submit" value="Print Satuan Barang">
    </form>

</body>
</html>