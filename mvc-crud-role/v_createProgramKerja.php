<!DOCTYPE html>
<html>

<head>
    <!-- Judul halaman -->
    <title>Tambah Program Kerja</title>
</head>

<body>
    <!-- Judul form untuk menambahkan program kerja -->
    <h2>Tambah Program Kerja</h2>
    <!-- Form untuk mengirim data ke c_programKerja.php dengan aksi create -->
    <form action="c_programKerja.php?action=create" method="post">
        <!-- Field untuk nomor program -->
        <label for="nomorProgram">Nomor Program:</label><br>
        <input type="text" id="nomorProgram" name="nomorProgram"><br>
        <!-- Field untuk nama program -->
        <label for="namaProgram">Nama Program:</label><br>
        <input type="text" id="namaProgram" name="namaProgram"><br>
        <!-- Field untuk surat keterangan -->
        <label for="suratKeterangan">Surat Keterangan:</label><br>
        <input type="text" id="suratKeterangan" name="suratKeterangan"><br><br>
        <!-- Tombol submit untuk mengirim data form -->
        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>
