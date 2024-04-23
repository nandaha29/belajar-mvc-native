<?php
include 'koneksiMVC.php';
session_start();

if (isset($_SESSION['username'])) {
    header("Location: v_programKerja.php");
    exit();
}

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($mysqliconn, $_POST['username']);
    $password = mysqli_real_escape_string($mysqliconn, $_POST['password']); // No hashing

    $sql = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
    $result = mysqli_query($mysqliconn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role']; // Tetapkan peran pengguna ke $_SESSION['role']
        header("Location: v_programKerja.php"); // Redirect ke halaman v_programKerja.php
        exit();
    } else {
        echo "<script>alert('Username atau password Anda salah. Silakan coba lagi!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form action="" method="post">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login" name="submit"> <!-- Tambahkan name="submit" -->
    </form>
</body>

</html>
