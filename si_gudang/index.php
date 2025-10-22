<!DOCTYPE html>
<html>
<head>
    <title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="judul">
        <h1>Membuat CRUD Dengan PHP Dan MySQL</h1>
        <h2>Menampilkan data dari database</h2>
    </div>

<nav class="menu">
        <ul>
            <li><a href="index.php">Home</a></li>

            <li class="dropdown">
                <a href="#">Data Master</a>
                <ul class="dropdown-menu">
                    <li><a href="index.php">Data User</a></li> <li><a>Data Barang</a></li>
                    <li><a href="Customer.php">Data Customer</a></li>
                    <li><a href="Data Supplier.php">Data Supplier</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#">Data Transaksi</a>
                <ul class="dropdown-menu">
                    <li><a href="Trans Pembeian.php">Transaksi Pembelian</a></li>
                    <li><a href="Trans penjualan.php">Transaksi Penjualan</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#">Laporan</a>
                <ul class="dropdown-menu">
                    <li><a href="LaporanDataBarang.php">Laporan Data Barang</a></li>
                    <li><a href="LaporanDataCustomer.php">Laporan Data Customer</a></li>
                    <li><a href="LaporanDataSupplier.php">Laporan Data Supplier</a></li>
                    <li><a href="LaporanTransaksiPembelian.php">Laporan Transaksi Pembelian</a></li>
                    <li><a href="LaporanTransaksiPenjulaan.php">Laporan Transaksi Penjualan</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    
    <br/>

    <?php
    if(isset($_GET['pesan'])){
        $pesan = $_GET['pesan'];
        if($pesan == "input"){
            echo "Data berhasil di input.";
        }else if($pesan == "update"){
            echo "Data berhasil di update.";
        }else if($pesan == "hapus"){
            echo "Data berhasil di hapus.";
        }
    }
    ?>

    <br/>
    <a class="tombol" href="input.php">+ Tambah Data Baru</a>

    <h3>Data User</h3>
    <table border="1" class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Opsi</th>
        </tr>
        <?php
        include "koneksi.php";
        $query_mysql = mysqli_query($koneksi, "SELECT * FROM user");
        $nomor = 1;
        while($data = mysqli_fetch_array($query_mysql)){
        ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['pekerjaan']; ?></td>
                <td>
                    <a class="edit" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
                    <a class="hapus" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>