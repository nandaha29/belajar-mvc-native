<?php

include 'koneksiMVC.php';
session_start();

if (isset($_SESSION['username'])) {
    header("Location: v_programKerja.php");
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = hash('sha256', $_POST['password']); // Hash the input password using SHA-256
    // $cpassword = hash('sha256', $_POST['cpassword']); // Hash the input confirm password using SHA-256
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM pengguna WHERE username='$username'";
        $result = mysqli_query($mysqliconn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, role, password)
                    VALUES ('$username', '$role', '$password')";
            $result = mysqli_query($mysqliconn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $role = "";
                $_POST['password'] = "";
                // $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>
    <p>Note: belum selesai testing!</p>
    <form action="" method="post">
        Username: <input type="text" name="username" required><br>
        Role: <input type="text" name="role" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="register">
        <p class="login-register-text">Anda sudah punya akun? <a href="v_login.php">Login</a></p>
    </form>
</body>

</html>