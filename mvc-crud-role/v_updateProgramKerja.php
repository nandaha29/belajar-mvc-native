<!DOCTYPE html>
<html>

<head>
    <!-- Judul halaman -->
    <title>Update Program Kerja</title>
</head>

<body>
    <!-- Judul form untuk mengupdate program kerja -->
    <h2>Update Program Kerja</h2>
    <!-- Form untuk mengirim data ke c_programKerja.php dengan aksi update -->
    <form action="c_programKerja.php?action=update&id=<?php echo $proker['id']; ?>" method="post">
        <!-- Field untuk nomor program dengan nilai awal dari data yang akan diupdate -->
        <label for="nomorProgram">Nomor Program:</label><br>
        <input type="text" id="nomorProgram" name="nomorProgram" value="<?php echo $proker['nomorProgram']; ?>"><br>
        <!-- Field untuk nama program dengan nilai awal dari data yang akan diupdate -->
        <label for="namaProgram">Nama Program:</label><br>
        <input type="text" id="namaProgram" name="namaProgram" value="<?php echo $proker['namaProgram']; ?>"><br>
        <!-- Field untuk surat keterangan dengan nilai awal dari data yang akan diupdate -->
        <label for="suratKeterangan">Surat Keterangan:</label><br>
        <input type="text" id="suratKeterangan" name="suratKeterangan" value="<?php echo $proker['suratKeterangan']; ?>"><br><br>
        <!-- Tombol submit untuk mengirim data form -->
        <input type="submit" value="Update" name="submit">
    </form>
</body>

</html>
