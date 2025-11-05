<?php
include('koneksi.php');
$koneksi = new database();
 
$action = isset($_GET['action']) ? $_GET['action'] : '';

if($action == "add")
{
    $koneksi->tambah_data($_POST['kd_barang'],$_POST['nama_barang'],$_POST['stok'],$_POST['harga_beli'],$_POST['harga_jual']);
    header('location:index.php');
}
else if($action == "edit")
{
    // Menggunakan 'id_barang' (dari hidden input) sebagai referensi WHERE
    $koneksi->edit_data($_POST['id_barang'],$_POST['kd_barang'],$_POST['nama_barang'],$_POST['stok'],$_POST['harga_beli'],$_POST['harga_jual']);
    header('location:index.php');
}
else if($action == "delete")
{
    $id_barang = $_GET['id_barang'];
    $koneksi->hapus_data($id_barang); 
    header('location:index.php');
}

else if($action == "add_customer")
{
    $koneksi->tambah_data_customer(
        $_POST['id_customer'],
        $_POST['nik_customer'],
        $_POST['nama_customer'],
        $_POST['jenis_kelamin'],
        $_POST['alamat_customer'],
        $_POST['telepon_customer'],
        $_POST['email_customer'],
        $_POST['pass_customer']
    );
    header('location:tampil_customer.php');
}
else if($action == "edit_customer")
{
    $koneksi->edit_data_customer(
        $_POST['id_customer'], // Ini ID untuk klausa WHERE
        $_POST['nik_customer'],
        $_POST['nama_customer'],
        $_POST['jenis_kelamin'],
        $_POST['alamat_customer'],
        $_POST['telepon_customer'],
        $_POST['email_customer'],
        $_POST['pass_customer']
    );
    header('location:tampil_customer.php');
}
else if($action == "delete_customer") 
{
    $id = $_GET['id'];
    $koneksi->hapus_data_customer($id);
    header('location:tampil_customer.php'); 
}

else if($action == "add_supplier")
{
    $koneksi->tambah_data_supplier(
        $_POST['id_supplier'],
        $_POST['nama_supplier'],
        $_POST['alamat_supplier'],
        $_POST['telepon_supplier'],
        $_POST['email_supplier'],
        $_POST['pass_supplier']
    );
    header('location:tampil_supplier.php');
}
else if($action == "edit_supplier")
{
    $koneksi->edit_data_supplier(
        $_POST['id_supplier'], // Ini ID untuk klausa WHERE
        $_POST['nama_supplier'],
        $_POST['alamat_supplier'],
        $_POST['telepon_supplier'],
        $_POST['email_supplier'],
        $_POST['pass_supplier'] 
    );
    header('location:tampil_supplier.php');
}
else if($action == "delete_supplier") 
{
    $id = $_GET['id'];
    $koneksi->hapus_data_supplier($id);
    header('location:tampil_supplier.php'); 
}

else 
{
    echo "Aksi tidak dikenal.";
    header('location:index.php');
}
?>