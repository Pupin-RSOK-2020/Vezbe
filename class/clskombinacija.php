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
        include_once "clskonekcijadb.php";
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
        //echo $upit;
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

    public function odrediRB()
    {
        $result = "";
        $sqlupit ="SELECT max(RBkombinacija) as novirb from `Izvucena kombinacija`;";
        $result = mysqli_query($this->konekcija, $sqlupit);
        return $result;  
    } //metoda snimiKombinaciju

    public function proveriIzlaznostKombinacije($broj1,$broj2,$broj3,$broj4,$broj5,$broj6,$broj7)
    {
        $uspeh=false;
        $brredova=0;
        $upit = "SELECT * FROM `izvucena kombinacija` WHERE broj1=$broj1 and broj2=$broj2 and broj3=$broj3 and broj4=$broj4 and broj5=$broj5 and broj6=$broj6 and broj7=$broj7;";	
        $result = mysqli_query($this->konekcija, $upit);
        $brredova = mysqli_num_rows($result);
        if ($brredova>0)
        {
            $uspeh=true;
        }
        return $uspeh;
    } //metoda proveriIzlaznostKombinacije

    public function generisiSlucajnuKombinaciju()
    {
        $niz[0]=rand(1,39);
        $niz[1]=rand(1,39);
        if ($niz[1]==$niz[0])
                {$niz[1]=rand(1,39);}
        $niz[2]=rand(1,39);
        if ($niz[2]==$niz[0]||$niz[2]==$niz[1])
                {$niz[2]=rand(1,39);} 
        $niz[3]=rand(1,39);
        if ($niz[3]==$niz[2]||$niz[3]==$niz[2]||$niz[3]==$niz[0])
                {$niz[3]=rand(1,39);}   
        $niz[4]=rand(1,39);
        if ($niz[4]==$niz[3]||$niz[4]==$niz[2]||$niz[4]==$niz[2]||$niz[4]==$niz[0])
                {$niz[4]=rand(1,39);}    
        $niz[5]=rand(1,39);
        if ($niz[5]==$niz[4]||$niz[5]==$niz[3]||$niz[5]==$niz[2]||$niz[5]==$niz[2]||$niz[5]==$niz[0])
                {$niz[5]=rand(1,39);}    
        $niz[6]=rand(1,39);
        if ($niz[6]==$niz[5]||$niz[6]==$niz[4]||$niz[6]==$niz[3]||$niz[6]==$niz[2]||$niz[6]==$niz[2]||$niz[6]==$niz[0])
                {$niz[6]=rand(1,39);}    
        sort($niz);
        return $niz;
    } //metoda generisiSlucajnuKombinaciju

    public function pretragaIzvucenihKombinacija($godinaod,$kolood,$godinado,$kolodo)
    {
        $result = "";
        $sqlupit = "SELECT * FROM `izvucena kombinacija`, Statistika WHERE `izvucena kombinacija`.RBkombinacija=Statistika.RBkombinacija;";
        if (($godinaod=="") && ($godinado=="") && ($kolood=="") && ($kolodo==""))
            {$sqlupit ="SELECT * FROM `izvucena kombinacija`, Statistika WHERE `izvucena kombinacija`.RBkombinacija=Statistika.RBkombinacija ORDER BY Godina, Kolo;";}
        if (($godinaod!="") && ($godinado!="") && ($kolood=="") && ($kolodo==""))
            {$sqlupit ="SELECT * FROM `izvucena kombinacija`, Statistika WHERE `izvucena kombinacija`.RBkombinacija=Statistika.RBkombinacija AND Godina>=$godinaod AND Godina<=$godinado ORDER BY Godina, Kolo;";}
        if (($godinaod!="") && ($godinado=="") && ($kolood=="") && ($kolodo==""))
            {$sqlupit ="SELECT * FROM `izvucena kombinacija`, Statistika WHERE `izvucena kombinacija`.RBkombinacija=Statistika.RBkombinacija AND Godina>=$godinaod ORDER BY Godina, Kolo;";}
        if (($godinaod=="") && ($godinado!="") && ($kolood=="") && ($kolodo==""))
            {$sqlupit ="SELECT * FROM `izvucena kombinacija`, Statistika WHERE `izvucena kombinacija`.RBkombinacija=Statistika.RBkombinacija AND Godina<=$godinado ORDER BY Godina, Kolo;";}
        if (($godinaod!="") && ($godinado!="") && ($kolood!="") && ($kolodo!=""))
            {$sqlupit ="SELECT * FROM `izvucena kombinacija`, Statistika WHERE `izvucena kombinacija`.RBkombinacija=Statistika.RBkombinacija AND Godina>=$godinaod AND Godina<=$godinado AND Kolo>=$kolood AND Kolo<=$kolodo ORDER BY Godina, Kolo;";}
        if (($godinaod=="") && ($godinado=="") && ($kolood!="") && ($kolodo!=""))
            {$sqlupit ="SELECT * FROM `izvucena kombinacija`, Statistika WHERE `izvucena kombinacija`.RBkombinacija=Statistika.RBkombinacija AND Kolo>=$kolood AND Kolo<=$kolodo ORDER BY Godina, Kolo;";}
        $result = mysqli_query($this->konekcija, $sqlupit);
        //echo $sqlupit;
        return $result;  
    } //metoda pretragaIzvucenihKombinacija

    public function obrisiKombinaciju($rbkomb)
    {
        $result = false;
        $sqlupit ="DELETE FROM `izvucena kombinacija` WHERE RBkombinacija=$rbkomb;";
        $result = mysqli_query($this->konekcija, $sqlupit);
        return $result;  
    } //metoda obrisiKombinaciju

    public function promeniKombinaciju($rb)
    {
        $result = "";
        $sqlupit ="UPDATE `izvucena kombinacija` SET Godina='$this->godina', Kolo='$this->kolo', Broj1='$this->broj1', Broj2=' $this->broj2', Broj3='$this->broj3', Broj4='$this->broj4', Broj5='$this->broj5', Broj6='$this->broj6', Broj7='$this->broj7' WHERE RBkombinacija='$rb';";
        $result = mysqli_query($this->konekcija, $sqlupit);
        return $result;  
    } //metoda promeniKombinaciju

    public function ucitajKombinaciju($rbkomb)
    {
        $result = "";
        $sqlupit = "SELECT * FROM `izvucena kombinacija` WHERE RBkombinacija='$rbkomb';";
        $result = mysqli_query($this->konekcija, $sqlupit);
        return $result;  
    } //metoda ucitajKombinaciju

    public function prebrojIzlaznostBroja($broj)
    {
        $result = "";
        $sqlupit = "SELECT Count(*) as IzasaoPuta FROM `izvucena kombinacija` WHERE Broj1=$broj Or Broj2=$broj Or Broj3=$broj Or Broj4=$broj Or Broj5=$broj Or Broj6=$broj Or Broj7=$broj;";
        $result = mysqli_query($this->konekcija, $sqlupit);
        return $result;  
    } //metoda prebrojIzlaznostBroja

    function __destruct() 
    {
        /*$this->konekcija = null;*/
        unset($this->konekcija);
    } //kraj destruktora

} //kraj klase
?>