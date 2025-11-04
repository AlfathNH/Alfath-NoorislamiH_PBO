<?php
include('koneksi.php');
session_start(); // Pindahkan session_start() ke paling atas

// Asumsi $koneksi ada di 'koneksi.php'

$action = isset($_GET['action']) ? $_GET['action'] : '';

// ========================================
// PROSES LOGIN (AMAN DENGAN PASSWORD_VERIFY)
// ========================================
if ($action == "login") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // --- Cek Tabel 1: user (Administrator) ---
    $stmt = mysqli_prepare($koneksi, "SELECT password, username FROM user WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verifikasi password yang sudah di-hash
        if (password_verify($password, $row['password'])) { 
            $_SESSION['username'] = $row['username'];
            $_SESSION['tipe_user'] = "Administrator";
            $tipe_user = $_SESSION['tipe_user'];
            // Jalur DIPERBAIKI: '..' dihapus
            echo "<script>alert('Login Berhasil Selamat Datang - $tipe_user');window.location='backend/admin/index_admin.php';</script>";
            exit; 
        }
    }
    mysqli_stmt_close($stmt);


    // --- Cek Tabel 2: tb_customer ---
    $stmt2 = mysqli_prepare($koneksi, "SELECT pass_customer, email_customer FROM tb_customer WHERE email_customer = ?");
    mysqli_stmt_bind_param($stmt2, "s", $username);
    mysqli_stmt_execute($stmt2);
    $result2 = mysqli_stmt_get_result($stmt2);

    if ($row2 = mysqli_fetch_assoc($result2)) {
        if (password_verify($password, $row2['pass_customer'])) { 
            $_SESSION['username'] = $row2['email_customer'];
            $_SESSION['tipe_user'] = "Customer";
            $tipe_user = $_SESSION['tipe_user'];
            // Jalur DIPERBAIKI: '..' dihapus
            echo "<script>alert('Login Berhasil Selamat Datang - $tipe_user');window.location='backend/customer/index_customer.php';</script>";
            exit;
        }
    }
    mysqli_stmt_close($stmt2);


    // --- Cek Tabel 3: tb_supplier ---
    $stmt3 = mysqli_prepare($koneksi, "SELECT pass_supplier, email_supplier FROM tb_supplier WHERE email_supplier = ?");
    mysqli_stmt_bind_param($stmt3, "s", $username);
    mysqli_stmt_execute($stmt3);
    $result3 = mysqli_stmt_get_result($stmt3);

    if ($row3 = mysqli_fetch_assoc($result3)) {
        if (password_verify($password, $row3['pass_supplier'])) { 
            $_SESSION['username'] = $row3['email_supplier'];
            $_SESSION['tipe_user'] = "Supplier";
            $tipe_user = $_SESSION['tipe_user'];
            // Jalur DIPERBAIKI: '..' dihapus
            echo "<script>alert('Login Berhasil Selamat Datang - $tipe_user');window.location='backend/supplier/index_supplier.php';</script>";
            exit;
        }
    }
    mysqli_stmt_close($stmt3);

    // --- Jika semua login gagal ---
    echo "<script>alert('Login Gagal! Username atau Password Tidak Sesuai !');window.location='login.php';</script>";

} 
// ========================================
// PROSES REGISTER (DENGAN DEBUGGING)
// ========================================
else if ($action == "register") {
    $username = $_POST['username']; // Ini adalah email
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    // 1. Cek apakah password cocok
    if ($password != $repeat_password) {
        echo "<script>alert('Registrasi Gagal! Password tidak cocok.');window.location='register.php';</script>";
        exit;
    }

    // 2. Cek apakah username (email) sudah ada di tabel user
    $sql_check = "SELECT username FROM user WHERE username = ?";
    
    $stmt_check = mysqli_prepare($koneksi, $sql_check);
    
    // ==== TAMBAHAN DEBUGGING ====
    if ($stmt_check === false) {
        // Jika prepare gagal, tampilkan error SQL-nya
        die("Error pada kueri pengecekan (baris 92): " . mysqli_error($koneksi));
    }
    // ==== AKHIR DEBUGGING ====

    mysqli_stmt_bind_param($stmt_check, "s", $username); // Ini baris 93
    mysqli_stmt_execute($stmt_check);
    $result_check = mysqli_stmt_get_result($stmt_check);

    if (mysqli_fetch_assoc($result_check)) {
        mysqli_stmt_close($stmt_check);
        echo "<script>alert('Registrasi Gagal! Email sudah terdaftar.');window.location='register.php';</script>";
        exit;
    }
    mysqli_stmt_close($stmt_check);

    // 3. Hash password (SANGAT PENTING)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 4. Masukkan ke database (tabel 'user' untuk admin)
    // GANTI 'user', 'username', 'password' DI BAWAH INI JIKA BEDA
    $sql_insert = "INSERT INTO user (username, password) VALUES (?, ?)";
    
    $stmt_insert = mysqli_prepare($koneksi, $sql_insert);

    // ==== TAMBAHAN DEBUGGING ====
    if ($stmt_insert === false) {
        // Jika prepare gagal, tampilkan error SQL-nya
        die("Error pada kueri insert (baris 113): " . mysqli_error($koneksi));
    }
    // ==== AKHIR DEBUGGING ====
    
    mysqli_stmt_bind_param($stmt_insert, "ss", $username, $hashed_password);
    
    if (mysqli_stmt_execute($stmt_insert)) {
        mysqli_stmt_close($stmt_insert);
        
        // 5. Langsung loginkan dan redirect ke index admin
        $_SESSION['username'] = $username;
        $_SESSION['tipe_user'] = "Administrator";
        
        echo "<script>alert('Registrasi Berhasil! Selamat Datang.');window.location='backend/admin/index_admin.php';</script>";
        exit;
    } else {
        mysqli_stmt_close($stmt_insert);
        echo "<script>alert('Registrasi Gagal! Terjadi kesalahan pada server.');window.location='register.php';</script>";
        exit;
    }
}
// ========================================
// PROSES LOGOUT
// ========================================
else if ($action == "logout") {
    
    // Hapus session individual
    unset($_SESSION['username']);
    unset($_SESSION['tipe_user']);

    session_unset(); // Hapus semua variabel session
    session_destroy(); // Hancurkan session

    // Jalur ini sepertinya sudah benar jika ada index.php di root
    echo "<script>alert('Anda berhasil logout. Terimakasih');window.location='index.php';</script>";
    exit;
}
?>