<?php
include('koneksi.php');
$db = new database();

// Ambil ID dari URL
$id_supplier = $_GET['id'];

// Ambil data supplier yang mau diedit
$data_supplier = $db->tampil_edit_data_supplier($id_supplier);

if (empty($data_supplier)) {
    die("Data supplier tidak ditemukan!");
}

// Ambil baris pertama
$d = $data_supplier[0];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Supplier</title>
</head>
<body>
    <?php include('menu.php'); ?>

    <h3>Form Edit Data Supplier</h3>
    <hr/>
    <form method="post" action="proses_barang.php?action=edit_supplier">
        <input type="hidden" name="id_supplier" value="<?php echo $d['id_supplier']; ?>"/>
        
        <table>
            <tr>
                <td>ID Supplier</td>
                <td>:</td>
                <td><input type="text" value="<?php echo $d['id_supplier']; ?>" readonly/></td>
            </tr>
            <tr>
                <td>Nama Supplier</td>
                <td>:</td>
                <td><input type="text" name="nama_supplier" value="<?php echo $d['nama_supplier']; ?>" required/></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat_supplier"><?php echo $d['alamat_supplier']; ?></textarea></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>:</td>
                <td><input type="text" name="telepon_supplier" value="<?php echo $d['telepon_supplier']; ?>"/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="email" name="email_supplier" value="<?php echo $d['email_supplier']; ?>"/></td>
            </tr>
             <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="pass_supplier" value="<?php echo $d['pass_supplier']; ?>" required/></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" value="Simpan Perubahan"/>
                    <a href="tampil_supplier.php"><input type="button" value="Kembali"/></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>