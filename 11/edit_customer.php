<?php
include('koneksi.php');
$db = new database();

// Ambil ID dari URL
$id_customer = $_GET['id'];

// Ambil data customer yang mau diedit
$data_customer = $db->tampil_edit_data_customer($id_customer);

if (empty($data_customer)) {
    die("Data customer tidak ditemukan!");
}

// Ambil baris pertama
$d = $data_customer[0];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Customer</title>
</head>
<body>
    <?php include('menu.php'); ?>

    <h3>Form Edit Data Customer</h3>
    <hr/>
    <form method="post" action="proses_barang.php?action=edit_customer">
        <input type="hidden" name="id_customer" value="<?php echo $d['id_customer']; ?>"/>
        
        <table>
            <tr>
                <td>ID Customer</td>
                <td>:</td>
                <td><input type="text" value="<?php echo $d['id_customer']; ?>" readonly/></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><input type="text" name="nik_customer" value="<?php echo $d['nik_customer']; ?>"/></td>
            </tr>
            <tr>
                <td>Nama Customer</td>
                <td>:</td>
                <td><input type="text" name="nama_customer" value="<?php echo $d['nama_customer']; ?>" required/></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if($d['jenis_kelamin']=='Laki-laki') echo 'checked';?>> Laki-laki
                    <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if($d['jenis_kelamin']=='Perempuan') echo 'checked';?>> Perempuan
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat_customer"><?php echo $d['alamat_customer']; ?></textarea></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>:</td>
                <td><input type="text" name="telepon_customer" value="<?php echo $d['telepon_customer']; ?>"/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="email" name="email_customer" value="<?php echo $d['email_customer']; ?>"/></td>
            </tr>
             <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="pass_customer" value="<?php echo $d['pass_customer']; ?>" required/></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" value="Simpan Perubahan"/>
                    <a href="tampil_customer.php"><input type="button" value="Kembali"/></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>