<?php
include('koneksi.php');
$db = new database();

// Panggil fungsi tampil data customer
$data_customer = $db->tampil_data_customer();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Customer</title>
</head>
<body>

    <?php include('menu.php'); ?>

    <a href="tambah_customer.php"><button>Tambah Data Customer</button></a>
    
    <form method="get" style="float: right;">
        Cari Nama Customer
        <input type="text" name="cari_customer">
        <input type="submit" value="Cari">
    </form>
    
    <br><br> 

    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Customer</th>
                <th>NIK</th>
                <th>Nama Customer</th>
                <th>Jenis Kelamin</th>
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
            if (!empty($data_customer)) {
                foreach($data_customer as $row){
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['id_customer']; ?></td>
                    <td><?php echo $row['nik_customer']; ?></td>
                    <td><?php echo $row['nama_customer']; ?></td>
                    <td><?php echo $row['jenis_kelamin']; ?></td>
                    <td><?php echo $row['alamat_customer']; ?></td>
                    <td><?php echo $row['telepon_customer']; ?></td>
                    <td><?php echo $row['email_customer']; ?></td>
                    <td>*******</td> <td>
                        <a href="edit_customer.php?id=<?php echo $row['id_customer']; ?>">Edit</a> |
                        <a href="proses_barang.php?action=delete_customer&id=<?php echo $row['id_customer']; ?>" onclick="return confirm('Yakin?')">Hapus</a>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="10" style="text-align:center;">Data tidak ditemukan.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>