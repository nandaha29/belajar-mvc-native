<?php
// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: v_login.php");
    exit(); // Menghentikan eksekusi script setelah redirect
}

// Periksa peran pengguna
$role = isset($_SESSION['role']) ? $_SESSION['role'] : ''; // Memeriksa jika $_SESSION['role'] terdefinisi

?>
<!DOCTYPE html>
<html>

<head>
    <!-- CSS untuk menata tampilan tabel -->
    <style>
        table {
            display: inline-table;
        }

        table,
        td,
        th,
        tr {
            border-collapse: collapse;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h2>Daftar Program Kerja BEM</h2>
    <form action="c_logout.php" method="POST">
        <p>Halo, username anda saat ini: <?php echo $_SESSION['username']; ?></p>
        <p>role anda: <?php echo isset($_SESSION['role']) ? $_SESSION['role'] : 'Role Tidak Tersedia'; ?></p>

        <button type="submit" class="btn">Logout</button>
    </form>
    <table>
        <tbody>
            <tr>
                <!-- Judul kolom tabel -->
                <td>ID</td>
                <td>No Program Kerja</td>
                <td>Program Kerja</td>
                <td>Surat Keterangan</td>
                <td>Action</td>
            </tr>
            <?php
            // Mengimpor kelas model m_programKerja.php
            require_once("m_programKerja.php");
            // Membuat objek model baru
            $model = new m_programKerja();
            // Memanggil method getSemuaProgramKerja dari objek model untuk mendapatkan data program kerja
            $proker = $model->getSemuaProgramKerja();

            // Memeriksa apakah ada data program kerja yang tersedia
            if (!empty($proker)) {
                // Jika pengguna adalah admin
                if ($role === 'admin') {
                    // Tampilkan data program kerja dalam tabel dan fungsi CRUD
                    foreach ($proker as $tes) { ?>
                        <tr>
                            <!-- Menampilkan data program kerja dari setiap baris -->
                            <td><?php echo $tes['id']; ?></td>
                            <td><?php echo $tes['nomorProgram']; ?></td>
                            <td><?php echo $tes['namaProgram']; ?></td>
                            <td><?php echo $tes['suratKeterangan']; ?></td>
                            <!-- Membuat tautan untuk mengedit atau menghapus program kerja -->
                            <td>
                                <a href="c_programKerja.php?action=update&id=<?php echo $tes['id']; ?>">Update</a>
                                <a href="c_programKerja.php?action=delete&id=<?php echo $tes['id']; ?>">Delete</a>
                            </td>
                        </tr>
            <?php }
                } elseif ($role === 'menteri') {
                    // Tampilkan data program kerja dalam tabel tanpa fungsi CRUD
                    foreach ($proker as $tes) { ?>
                        <tr>
                            <!-- Menampilkan data program kerja dari setiap baris -->
                            <td><?php echo $tes['id']; ?></td>
                            <td><?php echo $tes['nomorProgram']; ?></td>
                            <td><?php echo $tes['namaProgram']; ?></td>
                            <td><?php echo $tes['suratKeterangan']; ?></td>
                            <!-- Membuat tautan untuk mengedit atau menghapus program kerja -->
                            <td>Tidak tersedia</td>
                        </tr>
            <?php }
                }
            } else {
                // Jika tidak ada data program kerja, tampilkan pesan
                echo "<tr><td colspan='5'>Tidak ada data program kerja yang tersedia.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <!-- Tautan untuk menambahkan program kerja baru -->
    <?php
    // Jika pengguna adalah admin, tampilkan tombol "Tambah Program Kerja"
    if ($role === 'admin') {
        echo '<button class="btn"><a href="v_createProgramKerja.php?action=create">Tambah Program Kerja</a></button>';
    }
    ?>

</body>

</html>
