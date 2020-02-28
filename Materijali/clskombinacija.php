<?php

//klasa za rad sa izvucenim kombinacijama, unos, izmena, brisanje, pretraga

class clskombinacija
{
    deklaracija atributa...
	+ konekcija

    function __construct() 
    {
        include "clskonekcijadb.php";
        $objkonbp = new clskonekcijadb();
        $this->konekcija = $objkonbp->otvoriKonekciju();
    } //kraj konstruktora

    public function proveriIspravnoUnetuKombinaciju(brojevi)
    {
        $uspeh=false;
        if (uslov)
            {
                $uspeh=true;
            }
        }
        return $uspeh;
    } //metoda proveriIspravnoUnetuKombinaciju

    public function daLiKombinacijaPostoji($godina,$kolo)
    {
        
        $upit = "SELECT * FROM ...";	
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
        $sqlupit ="INSERT INTO `kombinacija` VALUES ('',...);";
        $result = mysqli_query($this->konekcija, $sqlupit);
        return $result;  
    } //metoda snimiKombinaciju

    public function pronadjiKombinacije($godina)
    {
        $result = "";
        $upit = "SELECT * FROM kombinacija WHERE ...";	
        $result = mysqli_query($this->konekcija, $upit);
        return $result;
    } //metoda daLiKombinacijaPostoji

    function __destruct() 
    {
        unset($this->konekcija);
    } //kraj destruktora

} //kraj klase
?>