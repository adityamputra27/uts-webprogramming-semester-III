<?php

class Rumah {
    public $pintu = "Besi";
    public $jendela = "Kaca";
    public $lantai = "Kusen";
    public $atap = "Kayu";
    public $pagar;

    public function rumahSaya() {
        echo "Pintur rumah saya : " . $this->pintu . "<br>".
        "Jendel rumah saya : " . $this->jendela . "<br>".
        "Atap rumah saya : " . $this->atap . "<br>".
        "Lantai rumah saya : " . $this->lantai . "<br>";
    }
}

$rumah1 = new Rumah();
$rumah1->pagar = "Besi";

$rumah1->rumahSaya();
echo "Pagar rumah saya : " . $rumah1->pagar . "<br>";

?>