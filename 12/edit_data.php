<?php
include('koneksi.php');
$db = new database();

// Wajib ada session_start()
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}

// Ambil id_barang dari URL
$id_barang = $_GET['id_barang'];

// Cek jika id_barang tidak ada, lempar kembali
if (empty($id_barang)) {
    header("location:tampil.php");
}

$data_edit_barang = $db->tampil_edit_data($id_barang);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
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
            box-sizing: border-box; 
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
    <center><h3>Form Edit Data Barang</h3></center>
    <hr/>
    
    <form method="post" action="proses_barang.php?action=edit" enctype="multipart/form-data">
        <?php
        // Pastikan data ditemukan sebelum di-loop
        if (!empty($data_edit_barang)) {
            foreach ($data_edit_barang as $d) {
        ?>
        <table width="40%">
            <tr>
                <td>Kode Barang</td>
                <td>:</td>
                <td>
                    <input type="hidden" name="id_barang" value="<?php echo $d['id_barang']; ?>">
                    <input type="text" name="kd_barang" value="<?php echo $d['kd_barang']; ?>" readonly/>
                </td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td><input type="text" name="nama_barang" value="<?php echo $d['nama_barang']; ?>" required/></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input type="text" name="stok" value="<?php echo $d['stok']; ?>" required/></td>
            </tr>
            <tr>
                <td>Harga Beli</td>
                <td>:</td>
                <td><input type="text" name="harga_beli" value="<?php echo $d['harga_beli']; ?>" required/></td>
            </tr>
            <tr>
                <td>Harga Jual</td>
                <td>:</td>
                <td><input type="text" name="harga_jual" value="<?php echo $d['harga_jual']; ?>" required/></td>
            </tr>
            <tr>
                <td>Gambar Barang</td>
                <td>:</td>
                <td>
                    <img src="gambar/<?php echo $d['gambar_produk']; ?>" style="width: 120px; float: left; margin-bottom: 5px; margin-right: 10px;">
                    <input type="file" name="gambar_produk">
                    <p style="font-size: 11px; color: red; clear: both;">Abaikan jika tidak merubah gambar produk</p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" class="tombol_login" name="tombol" value="Ubah"/>
                    <a href="tampil.php">Kembali</a>
                </td>
            </tr>
        </table>
        <?php
            } // Akhir foreach
        } else {
            echo "<center>Data tidak ditemukan.</center>";
        }
        ?>
    </form>
</body>
</html>