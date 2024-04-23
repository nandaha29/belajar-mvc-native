<?php
include "pengurusBEM.php";

class menteri extends pengurusBEM {
    // Constructor
    public function __construct($nama, $nim, $angkatan, $jabatan, $foto) {
        // Memanggil constructor dari kelas induk
        parent::__construct($nama, $nim, $angkatan, $jabatan, $foto);
    }
    
    // Override method setJabatan dari kelas induk
    public function setJabatan($jabatan) {
        // Memanggil method dari kelas induk
        parent::setJabatan($jabatan);
    }
    
    // Override method getJabatan dari kelas induk
    public function getJabatan() {
        // Memanggil method dari kelas induk
        return parent::getJabatan();
    }
    
    // Override method setFoto dari kelas induk
    public function setFoto($foto) {
        // Memanggil method dari kelas induk
        parent::setFoto($foto);
    }
    
    // Override method getFoto dari kelas induk
    public function getFoto() {
        // Memanggil method dari kelas induk
        return parent::getFoto();
    }
}

//  penggunaan
$menteri = new menteri("Nanda Hafiza", "225150207111118", "2019", "Menteri Keuangan", "foto_menteri.jpg");
$jabatan = $menteri->getJabatan();
$foto = $menteri->getFoto();
echo "Jabatan: " . $jabatan . "<br>";
echo "Foto: " . $foto . "<br>";


?>
