<?php
// Mengimpor kelas model m_programKerja.php
include_once("m_programKerja.php");

// Deklarasi kelas controller c_programKerja
class c_programKerja
{
    // Properti untuk menyimpan instance model
    private $model;

    // Konstruktor untuk membuat instance model saat kelas controller dibuat
    public function __construct()
    {
        $this->model = new m_programKerja();
    }

    // Method untuk menentukan tindakan yang akan dijalankan berdasarkan permintaan (action)
    public function invoke()
    {

        // Mengambil nilai 'action' dari URL jika ada, jika tidak maka diisi dengan string kosong
        $action = isset($_GET['action']) ? $_GET['action'] : '';

        switch ($action) {
            case 'create':
                $this->create();
                break;
            case 'update':
                $this->update();
                break;
            case 'delete':
                $this->delete();
                break;
            default:
                $this->read();
                break;
        }
    }

    // Method untuk menampilkan daftar program kerja
    public function read()
    {
        // Mengambil semua data program kerja dari model
        $proker = $this->model->getSemuaProgramKerja();
        // Menampilkan daftar program kerja menggunakan view v_programKerja.php
        include 'v_programKerja.php';
    }

    // Method untuk menambahkan program kerja baru
    public function create()
    {
        // Memeriksa apakah form telah disubmit
        if (isset($_POST['submit'])) {
            // Mengambil data program kerja dari form
            $nomorProgram = $_POST['nomorProgram'];
            $namaProgram = $_POST['namaProgram'];
            $suratKeterangan = $_POST['suratKeterangan'];
            // Menyimpan program kerja baru ke dalam database menggunakan model
            $result = $this->model->setProgramKerja($nomorProgram, $namaProgram, $suratKeterangan);
            // Jika penyimpanan berhasil, redirect ke halaman daftar program kerja
            if ($result) {
                header("Location: c_programKerja.php");
                exit;
            } else {
                // Jika penyimpanan gagal, tampilkan pesan error
                echo "Gagal menambahkan program kerja.";
            }
        } else {
            // Jika form belum disubmit, tampilkan form untuk menambahkan program kerja baru
            include 'v_createProgramKerja.php';
        }
    }

    // Method untuk memperbarui program kerja yang ada
    public function update()
    {
        // Memeriksa apakah form telah disubmit
        if (isset($_POST['submit'])) {
            // Jika form telah disubmit, ambil data program kerja dari form
            $id = $_GET['id'];
            $nomorProgram = $_POST['nomorProgram'];
            $namaProgram = $_POST['namaProgram'];
            $suratKeterangan = $_POST['suratKeterangan'];
            // Memperbarui program kerja menggunakan model
            $this->model->updateProgramKerja($id, $nomorProgram, $namaProgram, $suratKeterangan);
            // Redirect ke halaman daftar program kerja setelah pembaruan berhasil
            header("Location: c_programKerja.php");
        } elseif (isset($_GET['id'])) {
            // Jika belum ada form yang disubmit, tetapi terdapat parameter 'id' pada URL
            // Ambil data program kerja yang akan diperbarui berdasarkan 'id' dari model
            $id = $_GET['id'];
            $proker = $this->model->getProgramKerjaById($id);
            // Tampilkan form untuk memperbarui program kerja menggunakan view v_updateProgramKerja.php
            include 'v_updateProgramKerja.php';
        } else {
            // Jika tidak ada parameter 'id' pada URL, redirect ke halaman daftar program kerja
            header("Location: c_programKerja.php");
        }
    }

    // Method untuk menghapus program kerja
    public function delete()
    {
        // Memeriksa apakah parameter 'id' ada pada URL
        if (isset($_GET['id'])) {
            // Jika ada, ambil 'id' dari URL
            $id = $_GET['id'];
            // Hapus program kerja berdasarkan 'id' menggunakan model
            $this->model->deleteProgramKerja($id);
            // Redirect ke halaman daftar program kerja setelah penghapusan berhasil
            header("Location: c_programKerja.php");
        } else {
            // Jika tidak ada parameter 'id' pada URL, redirect ke halaman daftar program kerja
            header("Location: c_programKerja.php");
        }
    }
}

// Membuat instance dari kelas controller dan menjalankan method invoke() untuk menangani permintaan
$controller = new c_programKerja();
$controller->invoke();
?>
