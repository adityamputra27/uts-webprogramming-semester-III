<?php

use Mahasiswa as GlobalMahasiswa;

class Mahasiswa {
    public $idMhs,
            $namaMhs,
            $Alamat;

    public function __construct($id, $nama, $alamat)
    {
        $this->idMhs = $id;
        $this->namaMhs = $nama;
        $this->Alamat = $alamat;
    }
}

class MahasiswaTeknik extends GlobalMahasiswa {
    public $jurusan;

    public function cekJurusan($jurusan) {
        $this->jurusan = $jurusan;
        return "ID mahasiswa : ".$this->idMhs."<br>".
                "Nama mahasiswa : ".$this->namaMhs."<br>".
                "Jurusan : ".$this->jurusan."<br>";
    }
}

$mhs1 = new MahasiswaTeknik("217200027", "Aditya Muhamad Putra P.", "Cianjur");
echo $mhs1->cekJurusan("Teknik Informatika");

?>