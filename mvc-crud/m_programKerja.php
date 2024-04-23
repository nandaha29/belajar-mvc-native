<?php
// Mengimpor file koneksiMVC.php untuk menggunakan koneksi database
require_once("koneksiMVC.php");

// Deklarasi kelas model m_programKerja
class m_programKerja
{
    // Properti untuk menyimpan koneksi database
    private $conn;

    // Konstruktor untuk membuat koneksi database saat objek model dibuat
    public function __construct()
    {
        // Mengambil koneksi database dari file koneksiMVC.php
        global $mysqli;
        $this->conn = $mysqli;
    }

    // Method untuk mengambil semua program kerja dari database
    public function getSemuaProgramKerja()
    {
        // Query SQL untuk mengambil semua data program kerja dari tabel proker
        $query = "SELECT * FROM proker";
        // Menjalankan query dan menyimpan hasilnya dalam variabel result
        $result = $this->conn->query($query);
        // Membuat array kosong untuk menyimpan semua baris data program kerja
        $rows = array();
        // Mengambil setiap baris data program kerja dari hasil query dan menyimpannya dalam array rows
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        // Mengembalikan array yang berisi semua program kerja
        return $rows;
    }

    // Method untuk menambahkan program kerja baru ke dalam database
    public function setProgramKerja($nomorProgram, $namaProgram, $suratKeterangan)
    {
        // Query SQL untuk menyisipkan data program kerja baru ke dalam tabel proker
        $query = "INSERT INTO proker (nomorProgram, namaProgram, suratKeterangan) VALUES ('$nomorProgram','$namaProgram', '$suratKeterangan')";
        // Menjalankan query untuk menyisipkan data baru
        $result = $this->conn->query($query);
        // Memeriksa apakah penyisipan berhasil
        if ($result) {
            // Jika berhasil, kembalikan true
            return true;
        } else {
            // Jika gagal, tampilkan pesan kesalahan
            echo "Terjadi kesalahan saat menyimpan data: " . $this->conn->error;
            return false;
        }
    }

    // Method untuk mengambil program kerja berdasarkan ID dari database
    public function getProgramKerjaById($id)
    {
        // Query SQL untuk mengambil data program kerja berdasarkan ID
        $query = "SELECT * FROM proker WHERE id='$id'";
        // Menjalankan query dan mengambil hasilnya
        $result = $this->conn->query($query);
        // Mengambil satu baris data program kerja dan mengembalikannya
        return $result->fetch_assoc();
    }

    // Method untuk memperbarui program kerja yang ada di database
    public function updateProgramKerja($id, $nomorProgram, $namaProgram, $suratKeterangan)
    {
        // Query SQL untuk memperbarui data program kerja berdasarkan ID
        $query = "UPDATE proker SET nomorProgram='$nomorProgram', namaProgram='$namaProgram', suratKeterangan='$suratKeterangan' WHERE id='$id'";
        // Menjalankan query untuk memperbarui data
        $result = $this->conn->query($query);
        // Memeriksa apakah pembaruan berhasil
        if ($result) {
            // Jika berhasil, kembalikan true
            return true;
        } else {
            // Jika gagal, tampilkan pesan kesalahan
            echo "Terjadi kesalahan saat memperbarui data: " . $this->conn->error;
            return false;
        }
    }

    // Method untuk menghapus program kerja dari database berdasarkan ID
    public function deleteProgramKerja($id)
    {
        // Query SQL untuk menghapus data program kerja berdasarkan ID
        $query = "DELETE FROM proker WHERE id='$id'";
        // Menjalankan query untuk menghapus data
        $result = $this->conn->query($query);
        // Memeriksa apakah penghapusan berhasil
        if ($result) {
            // Jika berhasil, kembalikan true
            return true;
        } else {
            // Jika gagal, tampilkan pesan kesalahan
            echo "Terjadi kesalahan saat menghapus data: " . $this->conn->error;
            return false;
        }
    }
}
?>
