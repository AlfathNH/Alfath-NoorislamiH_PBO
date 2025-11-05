<?php
// koneksi.php sudah menjalankan session_start()
include('koneksi.php');

// 1. KODE PELINDUNG HALAMAN
// Cek apakah session 'is_logged_in' ada DAN bernilai true
// Jika tidak ada (artinya belum login), paksa kembali ke halaman login.
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header('location:login.php');
    exit; // Pastikan script berhenti setelah redirect
}

// --- Jika sudah login, kode di bawah ini akan berjalan ---

$db = new database();

// Logika untuk pencarian
if(isset($_GET['cari'])){
    $data_barang = $db->cari_data($_GET['cari']);
} else {
    // Jika tidak mencari, tampilkan semua data
    $data_barang = $db->tampil_data();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    </head>
<body>

    <a href="tambah_data.php">
        <button>Tambah Data</button>
    </a>

    <form method="get" style="float: right;">
        Cari Nama Barang
        <input type="text" name="cari" value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
        <input type="submit" value="Cari">
    </form>

    <br><br> <table border="1" cellpadding="5" cellspacing="0" width="100%">
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
            // Cek apakah $data_barang tidak kosong
            if (!empty($data_barang)) {
                foreach($data_barang as $row){
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['kd_barang']; ?></td> <td><?php echo $row['nama_barang']; ?></td>
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
                // Tampilkan pesan jika tidak ada data
                echo '<tr><td colspan="7" style="text-align:center;">Tidak ada data untuk ditampilkan.</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <br>
    
    <a href="proses_barang.php?action=logout">
        <button>Keluar Aplikasi</button>
    </a>

</body>
</html>