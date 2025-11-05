<?php
include('koneksi.php');
$db = new database();

// Panggil fungsi tampil data supplier
$data_supplier = $db->tampil_data_supplier();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>
</head>
<body>

    <?php include('menu.php'); ?>

    <a href="tambah_supplier.php"><button>Tambah Data Supplier</button></a>
    
    <form method="get" style="float: right;">
        Cari Nama Supplier
        <input type="text" name="cari_supplier">
        <input type="submit" value="Cari">
    </form>
    
    <br><br> 

    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (!empty($data_supplier)) {
                foreach($data_supplier as $row){
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['id_supplier']; ?></td>
                    <td><?php echo $row['nama_supplier']; ?></td>
                    <td><?php echo $row['alamat_supplier']; ?></td>
                    <td><?php echo $row['telepon_supplier']; ?></td>
                    <td><?php echo $row['email_supplier']; ?></td>
                    <td>*******</td> <td>
                        <a href="edit_supplier.php?id=<?php echo $row['id_supplier']; ?>">Edit</a> |
                        <a href="proses_barang.php?action=delete_supplier&id=<?php echo $row['id_supplier']; ?>" onclick="return confirm('Yakin?')">Hapus</a>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="8" style="text-align:center;">Data tidak ditemukan.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>