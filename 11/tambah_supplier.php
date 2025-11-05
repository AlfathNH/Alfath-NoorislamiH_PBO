<?php
include('koneksi.php');
$db = new database();

// Logika untuk membuat Kode Supplier otomatis (SUPP001, SUPP002, dst.)
$kode_sup_data = $db->kode_supplier();
if (!empty($kode_sup_data)) {
    foreach($kode_sup_data as $row){
        $kode_max = $row['id_supplier']; // "SUPP002"
        $urutan = (int) substr($kode_max, 4, 3); // Ambil "002", jadikan 2
        $urutan++; // Jadi 3
        $awalan = 'SUPP';
        $kode_supplier_baru = $awalan . str_pad($urutan, 3, "0", STR_PAD_LEFT); // Jadi "SUPP003"
    }
} else {
    $kode_supplier_baru = "SUPP001"; // Jika tabel kosong
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Supplier</title>
</head>
<body>
    <?php include('menu.php'); ?>

    <h3>Form Tambah Data Supplier</h3>
    <hr/>
    <form method="post" action="proses_barang.php?action=add_supplier">
        <table>
            <tr>
                <td>ID Supplier</td>
                <td>:</td>
                <td><input type="text" name="id_supplier" value="<?php echo $kode_supplier_baru; ?>" readonly/></td>
            </tr>
            <tr>
                <td>Nama Supplier</td>
                <td>:</td>
                <td><input type="text" name="nama_supplier" required/></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat_supplier"></textarea></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>:</td>
                <td><input type="text" name="telepon_supplier"/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="email" name="email_supplier"/></td>
            </tr>
             <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="pass_supplier" required/></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" value="Simpan"/>
                    <a href="tampil_supplier.php"><input type="button" value="Kembali"/></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>