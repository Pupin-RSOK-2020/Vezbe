<?php

class clskombinacija
{
    public $idkombinacije;
    public $godina;
    public $kolo;
    public $broj1;
    public $broj2;
    public $broj3;
    public $broj4;
    public $broj5;
    public $broj6;
    public $broj7;
    private $konekcija;

    function __construct() 
    {
        include "clskonekcijadb.php";
        $objkonbp = new clskonekcijadb();
        $this->konekcija = $objkonbp->otvoriKonekciju();
    } //kraj konstruktora

    public function proveriDaLiSuBrojeviIspravnoUneti($broj1,$broj2,$broj3,$broj4,$broj5,$broj6,$broj7,$godina)
    {
        $uspeh=false;
        if (($godina>1984) && ($broj1>0 && $broj1<40) && ($broj2>0 && $broj2<40) && ($broj3>0 && $broj3<40) && ($broj4>0 && $broj4<40) && ($broj5>0 && $broj5<40) && ($broj6>0 && $broj6<40) && ($broj7>0 && $broj7<40))
        {
            if ($broj1<$broj2 && $broj2<$broj3 && $broj3<$broj4 && $broj4<$broj5 && $broj5<$broj6 && $broj6<$broj7)
            {
                $uspeh=true;
            }
        }
        return $uspeh;
    } //metoda proveriIspravnoUnetuKombinaciju

    public function proveriDaLiKombinacijaPostoji($godina,$kolo)
    {
        $uspeh=false;
        $brredova=0;
        $upit = "SELECT * FROM `izvucena kombinacija` WHERE godina=$godina and kolo=$kolo;";	
        $result = mysqli_query($this->konekcija, $upit);
        $brredova = mysqli_num_rows($result);
        if ($brredova>0)
        {
            $uspeh=true;
        }
        return $uspeh;
    } //metoda daLiKombinacijaPostoji

    public function snimiKombinaciju()
    {
        $result = "";
        $sqlupit ="INSERT INTO `izvucena kombinacija` VALUES ('',$this->godina,$this->kolo,$this->broj1,$this->broj2,$this->broj3,$this->broj4,$this->broj5,$this->broj6,$this->broj7);";
        $result = mysqli_query($this->konekcija, $sqlupit);
        return $result;  
    } //metoda snimiKombinaciju

    function __destruct() 
    {
        /*$this->konekcija = null;*/
        unset($this->konekcija);
    } //kraj destruktora

} //kraj klase
?>