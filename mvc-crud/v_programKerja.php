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
                // Jika ada, tampilkan data program kerja dalam tabel
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
            } else {
                // Jika tidak ada data program kerja, tampilkan pesan
                echo "<tr><td colspan='5'>Tidak ada data program kerja yang tersedia.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <!-- Tautan untuk menambahkan program kerja baru -->
    <a href="v_createProgramKerja.php?action=create">Tambah Program Kerja</a>
</body>

</html>
