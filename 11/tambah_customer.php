<?php
include('koneksi.php');
$db = new database();

// Logika untuk membuat Kode Customer otomatis (CST001, CST002, dst.)
$kode_cus_data = $db->kode_customer();
if (!empty($kode_cus_data)) {
    foreach($kode_cus_data as $row){
        $kode_max = $row['id_customer']; // "CST002"
        $urutan = (int) substr($kode_max, 3, 3); // Ambil "002", jadikan 2
        $urutan++; // Jadi 3
        $awalan = 'CST';
        $kode_customer_baru = $awalan . str_pad($urutan, 3, "0", STR_PAD_LEFT); // Jadi "CST003"
    }
} else {
    $kode_customer_baru = "CST001"; // Jika tabel kosong
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Customer</title>
</head>
<body>
    <?php include('menu.php'); ?>

    <h3>Form Tambah Data Customer</h3>
    <hr/>
    <form method="post" action="proses_barang.php?action=add_customer">
        <table>
            <tr>
                <td>ID Customer</td>
                <td>:</td>
                <td><input type="text" name="id_customer" value="<?php echo $kode_customer_baru; ?>" readonly/></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><input type="text" name="nik_customer"/></td>
            </tr>
            <tr>
                <td>Nama Customer</td>
                <td>:</td>
                <td><input type="text" name="nama_customer" required/></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki
                    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat_customer"></textarea></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>:</td>
                <td><input type="text" name="telepon_customer"/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="email" name="email_customer"/></td>
            </tr>
             <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="pass_customer" required/></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" value="Simpan"/>
                    <a href="tampil_customer.php"><input type="button" value="Kembali"/></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>