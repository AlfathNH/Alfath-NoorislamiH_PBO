<?php
include('koneksi.php');
$db = new database();

// Wajib ada session_start()
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}

// Logika untuk auto-generating Kode Barang
$kode_barang_data = $db->kode_barang();
$kode_barang_baru = 'BRG001'; // Default jika tabel kosong
if($kode_barang_data){
    foreach ($kode_barang_data as $row) {
        $kode_max = $row['kd_barang'];
        if ($kode_max) {
            // Ambil angka dari kode terakhir
            $urutan = (int) substr($kode_max, 3, 3);
            $urutan++; // Tambah 1
            $huruf = "BRG";
            // Gabungkan lagi
            $kode_barang_baru = $huruf . sprintf("%03s", $urutan);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <style type="text/css">
        /* (Bisa menggunakan CSS yang sama dengan tampil.php) */
        * { font-family: "Trebuchet MS"; }
        body { background-color: #f0f0f0; }
        h3 { text-transform: uppercase; color: #47C6DB; text-align: center; }
        table { 
            width: 40%; 
            margin: 10px auto; 
            background-color: #fff; 
            padding: 20px; 
            border-radius: 5px; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        td { padding: 8px 0; }
        input[type="text"], input[type="file"] { 
            width: 100%; 
            padding: 8px; 
            box-sizing: border-box; /* Agar padding tidak merusak layout */
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[readonly] { background-color: #eee; }
        .tombol_login { 
            background: #47C6DB; 
            color: white; 
            font-size: 11pt; 
            border: none; 
            padding: 10px 20px; 
            border-radius: 3px; 
            cursor: pointer;
        }
        a { 
            background-color: #f39c12; 
            color: #fff; 
            padding: 10px 15px; 
            text-decoration: none; 
            font-size: 12px; 
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <h3>Form Tambah Data Barang</h3>
    <hr/>
    <form method="post" action="proses_barang.php?action=add" enctype="multipart/form-data">
        <table width="40%">
            <tr>
                <td width="40%">Kode Barang</td>
                <td width="2%">:</td>
                <td width="58%"><input type="text" name="kd_barang" value="<?php echo $kode_barang_baru; ?>" readonly/></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td><input type="text" name="nama_barang" placeholder="Nama Barang" required/></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input type="text" name="stok" placeholder="Stok" required/></td>
            </tr>
            <tr>
                <td>Harga Beli</td>
                <td>:</td>
                <td><input type="text" name="harga_beli" placeholder="Harga Beli" required/></td>
            </tr>
            <tr>
                <td>Harga Jual</td>
                <td>:</td>
                <td><input type="text" name="harga_jual" placeholder="Harga Jual" required/></td>
            </tr>
            <tr>
                <td>Gambar Barang</td>
                <td>:</td>
                <td>
                    <input type="file" name="gambar_produk" required="required">
                    <p style="color: red; font-size: 11px;">Ekstensi yang diperbolehkan .png .jpg .jpeg</p>
                </td>
            </tr>
            <tr>
                <td height="47"></td>
                <td></td>
                <td>
                    <input type="submit" class="tombol_login" name="tombol" value="Simpan"/>
                    <a href="tampil.php">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>