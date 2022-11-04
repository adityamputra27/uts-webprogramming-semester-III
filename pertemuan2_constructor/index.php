<?php

class Mahasiswa {
    public $idMhs;
    public $NimMhs;
    public $Alamat;

    public function __construct($a, $b, $c)
    {
        $this->idMhs = $a;
        $this->NimMhs = $b;
        $this->Alamat = $c;
    }

    public function mahasiswaTeknik()
    {
        echo "Nama saya adalah Aditya Muhamad Putra mahasiwa teknik UNPI <br>";
    }

    public function __destruct()
    {
        echo "Saya tinggal di Cianjur, Jawa Barat";
    }
}

$Mhs1 = new Mahasiswa("217200027", "NIM", "Aditya Muhamad Putra P.");
print_r($Mhs1);
echo "<br>";

$Mhs1->mahasiswaTeknik();

?>