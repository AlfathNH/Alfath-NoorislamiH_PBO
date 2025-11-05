<?php
// session_start(); // Hapus/beri komentar jika tidak ada login

class database{
 
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "belajar_oop"; // Pastikan ini database Anda
    var $koneksi = "";

    function __construct(){
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if(!$this->koneksi){
             echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    // ==========================================
    // --- FUNGSI-FUNGSI BARANG (SUDAH ADA) ---
    // ==========================================
 
    function tampil_data(){
        $hasil = []; 
        $data = mysqli_query($this->koneksi, "select * from tb_barang");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
 
    function tambah_data($kd_barang, $nama_barang, $stok, $harga_beli, $harga_jual){
        mysqli_query($this->koneksi, "INSERT INTO tb_barang (kd_barang, nama_barang, stok, harga_beli, harga_jual) VALUES ('$kd_barang','$nama_barang','$stok','$harga_beli','$harga_jual')");
    }

    function tampil_edit_data($id_barang){
        $hasil = []; 
        $data = mysqli_query($this->koneksi, "select * from tb_barang where id_barang='$id_barang'");
        while($row=mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function edit_data($id_barang, $kd_barang, $nama_barang, $stok, $harga_beli, $harga_jual){
        // Menambahkan update untuk kd_barang juga
        mysqli_query($this->koneksi, "UPDATE tb_barang SET 
            kd_barang='$kd_barang',
            nama_barang='$nama_barang',
            stok='$stok',
            harga_beli='$harga_beli',
            harga_jual='$harga_jual' 
            WHERE id_barang='$id_barang'");
    }
 
    function hapus_data($id_barang){
        mysqli_query($this->koneksi, "delete from tb_barang where id_barang='$id_barang'");
    }

    function kode_barang(){
        $hasil = [];
        $data = mysqli_query($this->koneksi, "SELECT MAX(kd_barang) as kd_barang FROM tb_barang");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function cari_data($nama_barang){
        $hasil = []; 
        $data = mysqli_query($this->koneksi, "select * from tb_barang where nama_barang LIKE '%$nama_barang%'");
        while($row=mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function tampil_data_satuan($kd_barang){
        $hasil = []; 
        $data = mysqli_query($this->koneksi, "select * from tb_barang where kd_barang='$kd_barang'");
        while($row=mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    // ============================================
    // --- FUNGSI-FUNGSI CUSTOMER (BARU) ---
    // ============================================

    function tampil_data_customer(){
        $hasil = []; 
        $data = mysqli_query($this->koneksi, "select * from tb_customer");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    // Fungsi untuk membuat ID Customer otomatis (misal: CST003)
    function kode_customer(){
        $hasil = [];
        $data = mysqli_query($this->koneksi, "SELECT MAX(id_customer) as id_customer FROM tb_customer");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    
    function tambah_data_customer($id, $nik, $nama, $jk, $alamat, $telp, $email, $pass){
        // ⚠️ Peringatan: $pass harusnya di-hash
        mysqli_query($this->koneksi, "INSERT INTO tb_customer 
            (id_customer, nik_customer, nama_customer, jenis_kelamin, alamat_customer, telepon_customer, email_customer, pass_customer) 
            VALUES ('$id','$nik','$nama','$jk','$alamat','$telp','$email','$pass')");
    }
    
    function hapus_data_customer($id){
        mysqli_query($this->koneksi, "delete from tb_customer where id_customer='$id'");
    }
    
    function tampil_edit_data_customer($id){
        $hasil = [];
        $data = mysqli_query($this->koneksi, "select * from tb_customer where id_customer='$id'");
        while($row=mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    
    function edit_data_customer($id, $nik, $nama, $jk, $alamat, $telp, $email, $pass){
        mysqli_query($this->koneksi, "UPDATE tb_customer SET 
            nik_customer='$nik', 
            nama_customer='$nama', 
            jenis_kelamin='$jk', 
            alamat_customer='$alamat', 
            telepon_customer='$telp', 
            email_customer='$email', 
            pass_customer='$pass' 
            WHERE id_customer='$id'");
    }

    // ============================================
    // --- FUNGSI-FUNGSI SUPPLIER (BARU) ---
    // ============================================

    function tampil_data_supplier(){
        $hasil = []; 
        $data = mysqli_query($this->koneksi, "select * from tb_supplier");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    // Fungsi untuk membuat ID Supplier otomatis (misal: SUPP003)
    function kode_supplier(){
        $hasil = [];
        $data = mysqli_query($this->koneksi, "SELECT MAX(id_supplier) as id_supplier FROM tb_supplier");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    
    function tambah_data_supplier($id, $nama, $alamat, $telp, $email, $pass){
        // ⚠️ Peringatan: $pass harusnya di-hash
        mysqli_query($this->koneksi, "INSERT INTO tb_supplier 
            (id_supplier, nama_supplier, alamat_supplier, telepon_supplier, email_supplier, pass_supplier) 
            VALUES ('$id','$nama','$alamat','$telp','$email','$pass')");
    }
    
    function hapus_data_supplier($id){
        mysqli_query($this->koneksi, "delete from tb_supplier where id_supplier='$id'");
    }
    
    function tampil_edit_data_supplier($id){
        $hasil = [];
        $data = mysqli_query($this->koneksi, "select * from tb_supplier where id_supplier='$id'");
        while($row=mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    
    function edit_data_supplier($id, $nama, $alamat, $telp, $email, $pass){
        mysqli_query($this->koneksi, "UPDATE tb_supplier SET 
            nama_supplier='$nama', 
            alamat_supplier='$alamat', 
            telepon_supplier='$telp', 
            email_supplier='$email', 
            pass_supplier='$pass' 
            WHERE id_supplier='$id'");
    }
}
?>