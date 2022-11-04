<?php

abstract class InformatikaUNPI {
    public $idMhs;
    public $namaMhs;
    public $alamat;
    public $kodeMK;
    public $matkul;

    public function setMhs($id, $nama, $alamat)
    {
        $this->idMhs = $id;
        $this->namaMhs = $nama;
        $this->alamat = $alamat;
    }

    public function setMatkul($kode, $matkul)
    {
        $this->kodeMK = $kode;
        $this->matkul = $matkul;
    }
}

trait MahasiswaUNPI {
    public function getMhsDetail()
    {
        return "ID mahasiswa : " . $this->idMhs . "<br>".
        "Nama mahasiswa : " . $this->namaMhs . "<br>".
        "Alamat mahasiswa : " . $this->alamat . "<br>";
    }

    public function getMatkulDetail()
    {
        return "Kode : " . $this->kodeMK . "<br>".
        "Matkul : " . $this->matkul . "<br>";
    }
}

class MhsReguler extends InformatikaUNPI {
    use MahasiswaUNPI;
    public $waktu;
    
    public function cekMhs($id, $nama, $alamat, $kode, $matkul, $waktu)
    {
        $this->setMhs($id, $nama, $alamat);
        $this->setMatkul($kode, $matkul);
        $this->waktu = $waktu;

        return $this->getMhsDetail()
            .$this->getMatkulDetail()
            ."Jam masuk : ".$this->waktu;
    }
}

class MhsKaryawan extends InformatikaUNPI {
    use MahasiswaUNPI;
    public $waktu;
    
    public function cekMhs($id, $nama, $alamat, $kode, $matkul, $waktu)
    {
        $this->setMhs($id, $nama, $alamat);
        $this->setMatkul($kode, $matkul);
        $this->waktu = $waktu;

        return $this->getMhsDetail()
            .$this->getMatkulDetail()
            ."Jam masuk : ".$this->waktu;
    }
}

$mhs1 = new MhsReguler();
echo $mhs1->cekMhs("217200027", "Aditya Muhamad Putra P.", "Cianjur", "011", "OOP", "16.00 - 18.00");

echo "<br />";
echo "<br />";

$mhs2 = new MhsKaryawan();
echo $mhs2->cekMhs("2172000221", "Muhammad Naufal Adli", "Jakarta", "011", "OOP", "16.00 - 18.00");

?>