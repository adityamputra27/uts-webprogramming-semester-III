<?php

use Mahasiswa as GlobalMahasiswa;

abstract class Mahasiswa {

    public $idMhs,
            $namaMhs,
            $jurusan;

    abstract protected function cekMhs($id, $nama);

    public function cekJurusan($jurusan) {
        $this->jurusan = $jurusan;
        return "ID mahasiswa : ".$this->idMhs."<br>".
                "Nama mahasiswa : ".$this->namaMhs."<br>".
                "Jurusan : ".$this->jurusan."<br>";
    }
}

class MhsTeknik extends GlobalMahasiswa {
    public function cekMhs($id, $nama)
    {
        $this->idMhs = $id;
        $this->namaMhs = $nama;
    }
}

class MhsEkonomi extends GlobalMahasiswa {
    public function cekMhs($id, $nama)
    {
        $this->idMhs = $id;
        $this->namaMhs = $nama;
    }
}

$mhs1 = new MhsTeknik();
$mhs1->cekMhs("217200027", "Aditya Muhamad Putra P.");
echo $mhs1->cekJurusan("Teknik Informatika");

$mhs2 = new MhsEkonomi();
$mhs2->cekMhs("217200030", "Opang");
echo $mhs2->cekJurusan("Ekonomi Syariah");

?>