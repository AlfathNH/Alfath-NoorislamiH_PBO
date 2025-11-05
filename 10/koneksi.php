<?php
// 1. Mulai Session di baris paling atas
session_start();

class database{
 
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "belajar_oop"; // Pastikan ini nama database Anda
    var $koneksi = "";

    function __construct(){
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if(!$this->koneksi){
             echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }
 
    function tampil_data(){
        $hasil = []; // Inisialisasi $hasil sebagai array kosong
        $data = mysqli_query($this->koneksi, "select * from tb_barang");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
 
    function tambah_data($nama_barang, $stok, $harga_beli, $harga_jual){
        // ⚠️ PERINGATAN: Kode ini rentan SQL Injection!
        mysqli_query($this->koneksi, "insert into tb_barang (nama_barang, stok, harga_beli, harga_jual) values ('$nama_barang','$stok','$harga_beli','$harga_jual')");
    }

    function tampil_edit_data($id_barang){
        $hasil = []; // Inisialisasi $hasil sebagai array kosong
        // ⚠️ PERINGATAN: Kode ini rentan SQL Injection!
        $data = mysqli_query($this->koneksi, "select * from tb_barang where id_barang='$id_barang'");
        while($row=mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function edit_data($id_barang, $nama_barang, $stok, $harga_beli, $harga_jual){
        // ⚠️ PERINGATAN: Kode ini rentan SQL Injection!
        mysqli_query($this->koneksi, "update tb_barang set nama_barang='$nama_barang',stok='$stok',harga_beli='$harga_beli',harga_jual='$harga_jual' where id_barang='$id_barang'");
    }
 
    function hapus_data($id_barang){
        // ⚠️ PERINGATAN: Kode ini rentan SQL Injection!
        mysqli_query($this->koneksi, "delete from tb_barang where id_barang='$id_barang'");
    }

    function cari_data($nama_barang){
        $hasil = []; // Inisialisasi $hasil sebagai array kosong
        // ⚠️ PERINGATAN: Kode ini rentan SQL Injection!
        $data = mysqli_query($this->koneksi, "select * from tb_barang where nama_barang LIKE '%$nama_barang%'"); // Menggunakan LIKE agar pencarian lebih fleksibel
        while($row=mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    
    // 2. FUNGSI LOGIN (Versi Bersih Tanpa Debugging)
    function cek_login($username, $password)
    {
        // ⚠️ PERINGATAN KEAMANAN: Kode ini sangat tidak aman!
        // Ganti 'user' jika nama tabel Anda berbeda
        
        $query = mysqli_query($this->koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
        
        if(mysqli_num_rows($query) > 0){
            // Jika data ditemukan (1 baris), login berhasil
            return true;
        } else {
            // Jika data tidak ditemukan (0 baris), login gagal
            return false;
        }
    }
}
?>