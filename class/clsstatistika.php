<?php

class clsstatistika
{
    public $rbkombinacije;
    public $p;
    public $n;
    public $v1;
    public $v2;
    public $v3;
    private $konekcijas;

    function __construct() 
    {
        include_once "clskonekcijadb.php";
        $objkonbps = new clskonekcijadb();
        $this->konekcijas = $objkonbps->otvoriKonekciju();
    } //kraj konstruktora
    
    public function snimiStatistiku($broj1,$broj2,$broj3,$broj4,$broj5,$broj6,$broj7,$rbkomb)
    {
        $v1=0;
        $v2=0;
        $v3=0;
        $p=0;
        $n=0;
        $y = 2;
        //rezultat ostatka pri deljenju brojem 2 ako je 1 znači da je broj neparan:
        $rdbr1 = fmod($broj1,$y);
        $rdbr2 = fmod($broj2,$y);
        $rdbr3 = fmod($broj3,$y);
        $rdbr4 = fmod($broj4,$y);
        $rdbr5 = fmod($broj5,$y);
        $rdbr6 = fmod($broj6,$y);
        $rdbr7 = fmod($broj7,$y);
        //koliko ima neparnih:
        $n=$rdbr1+$rdbr2+$rdbr3+$rdbr4+$rdbr5+$rdbr6+$rdbr7;
        //parnih=7-neparnih:
        $p=7-$n;
        //prebrojavanje vertikala v1
        if ($broj1==1 || $broj1==4 || $broj1==7 || $broj1==10 || $broj1==13 || $broj1==16 || $broj1==19 || $broj1==22 || $broj1==25 || $broj1==28 || $broj1==31 || $broj1==34 || $broj1==37)
        {
            $v1++;
        }
        if ($broj2==1 || $broj2==4 || $broj2==7 || $broj2==10 || $broj2==13 || $broj2==16 || $broj2==19 || $broj2==22 || $broj2==25 || $broj2==28 || $broj2==31 || $broj2==34 || $broj2==37)
        {
            $v1++;
        }
        if ($broj3==1 || $broj3==4 || $broj3==7 || $broj3==10 || $broj3==13 || $broj3==16 || $broj3==19 || $broj3==22 || $broj3==25 || $broj3==28 || $broj3==31 || $broj3==34 || $broj3==37)
        {
            $v1++;
        }
        if ($broj4==1 || $broj4==4 || $broj4==7 || $broj4==10 || $broj4==13 || $broj4==16 || $broj4==19 || $broj4==22 || $broj4==25 || $broj4==28 || $broj4==31 || $broj4==34 || $broj4==37)
        {
            $v1++;
        }
        if ($broj5==1 || $broj5==4 || $broj5==7 || $broj5==10 || $broj5==13 || $broj5==16 || $broj5==19 || $broj5==22 || $broj5==25 || $broj5==28 || $broj5==31 || $broj5==34 || $broj5==37)
        {
            $v1++;
        }
        if ($broj6==1 || $broj6==4 || $broj6==7 || $broj6==10 || $broj6==13 || $broj6==16 || $broj6==19 || $broj6==22 || $broj6==25 || $broj6==28 || $broj6==31 || $broj6==34 || $broj6==37)
        {
            $v1++;
        }
        if ($broj7==1 || $broj7==4 || $broj7==7 || $broj7==10 || $broj7==13 || $broj7==16 || $broj7==19 || $broj7==22 || $broj7==25 || $broj7==28 || $broj7==31 || $broj7==34 || $broj7==37)
        {
            $v1++;
        }
        //koliko ima u v3, ostatak pri deljenju sa 3 je 0:
        $y = 3;
        $v1br1 = fmod($broj1,$y);
        $v1br2 = fmod($broj2,$y);
        $v1br3 = fmod($broj3,$y);
        $v1br4 = fmod($broj4,$y);
        $v1br5 = fmod($broj5,$y);
        $v1br6 = fmod($broj6,$y);
        $v1br7 = fmod($broj7,$y);
        if ($v1br1==0)
        {
            $v3++;
        }
        if ($v1br2==0)
        {
            $v3++;
        }
        if ($v1br3==0)
        {
            $v3++;
        }
        if ($v1br4==0)
        {
            $v3++;
        }
        if ($v1br5==0)
        {
            $v3++;
        }
        if ($v1br6==0)
        {
            $v3++;
        }
        if ($v1br7==0)
        {
            $v3++;
        }
        //v2=7-v1-v3:
        $v2=7-$v1-$v3;
        //snimanje statistickih parametara kombinacije u bazu podataka
        $results = "";
        $sqlupits = "INSERT INTO `Statistika` VALUES ('$rbkomb','$p','$n','$v1','$v2','$v3');";
        //echo $sqlupits;
        $results = mysqli_query($this->konekcijas, $sqlupits);
        return $results;  
    } //metoda snimiStatistiku
    

    function __destruct() 
    {
        /*$this->konekcija = null;*/
        unset($this->konekcijas);
    } //kraj destruktora

} //kraj klase
?>