<?php
// koneksi.php sudah menjalankan session_start()
include('koneksi.php');
$koneksi = new database();
 
// Cek apakah 'action' ada di URL, jika tidak, berikan nilai default
$action = isset($_GET['action']) ? $_GET['action'] : '';

if($action == "add")
{
    $koneksi->tambah_data($_POST['nama_barang'],$_POST['stok'],$_POST['harga_beli'],$_POST['harga_jual']);
    header('location:index.php');
}
else if($action == "edit")
{
    // Ambil id_barang dari POST (karena dikirim dari form edit)
    $koneksi->edit_data($_POST['id_barang'],$_POST['nama_barang'],$_POST['stok'],$_POST['harga_beli'],$_POST['harga_jual']);
    header('location:index.php');
}
else if($action == "delete")
{
    $id_barang = $_GET['id_barang'];
    $koneksi->hapus_data($id_barang);
    header('location:index.php');
}

// FUNGSI BARU UNTUK LOGIN
else if($action == "login")
{
    // Kode debugging sudah dihapus dari sini

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Panggil fungsi cek_login dari class database
    $login_berhasil = $koneksi->cek_login($username, $password);

    if($login_berhasil) {
        // Jika login berhasil, buat session
        $_SESSION['is_logged_in'] = true;
        $_SESSION['username'] = $username;
        
        // Arahkan ke halaman data barang (index.php)
        header('location:index.php');
    } else {
        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        header('location:login.php?status=gagal');
    }
}

// FUNGSI BARU UNTUK LOGOUT
else if($action == "logout")
{
    // Hancurkan semua data session
    session_unset();
    session_destroy();
    
    // Kembalikan ke halaman login
    header('location:login.php');
}

// Opsional: Jika action tidak dikenali
else 
{
    echo "Aksi tidak dikenal.";
    // Arahkan ke halaman utama jika bingung
    header('location:index.php');
}
?>