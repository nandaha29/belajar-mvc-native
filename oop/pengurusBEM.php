<?php
class pengurusBEM {
    public $nama;
    public $nim;
    public $angkatan;
    private $jabatan;
    private $foto;
    
    // Constructor
    public function __construct($nama, $nim, $angkatan, $jabatan, $foto) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->angkatan = $angkatan;
        $this->jabatan = $jabatan;
        $this->foto = $foto;
    }
    
    // Setter untuk jabatan
    public function setJabatan($jabatan) {
        $this->jabatan = $jabatan;
    }
    
    // Getter untuk jabatan
    public function getJabatan() {
        return $this->jabatan;
    }
    
    // Setter untuk foto
    public function setFoto($foto) {
        $this->foto = $foto;
    }
    
    // Getter untuk foto
    public function getFoto() {
        return $this->foto;
    }
}

?>
