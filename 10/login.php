<?php
// Mulai session
session_start();

// Jika user sudah login, lempar ke index.php
if(isset($_SESSION['is_logged_in'])){
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: sans-serif; display: grid; place-items: center; min-height: 90vh; background-color: #f4f4f4; }
        .login-form { background: #fff; border: 1px solid #ccc; padding: 25px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .login-form h3 { margin-top: 0; }
        .login-form table tr { line-height: 2.5em; }
        .login-form input[type="text"], .login-form input[type="password"] { padding: 5px; border: 1px solid #ccc; border-radius: 4px; }
        .error { color: red; font-style: italic; }
    </style>
</head>
<body>

    <div class="login-form">
        <h3>Form Login</h3>
        <hr/>
        
        <?php
        // Tampilkan pesan error jika login gagal
        if(isset($_GET['status']) && $_GET['status'] == 'gagal'){
            echo "<p class='error'>Login Gagal! Username atau Password salah.</p>";
        }
        ?>

        <form method="post" action="proses_barang.php?action=login">
            <table>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="username" placeholder="Masukkan username..." required/></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" name="password" placeholder="Masukkan password..." required/></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" value="Login"/>
                        <input type="reset" value="Reset"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>