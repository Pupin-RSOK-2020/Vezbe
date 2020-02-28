<?php

//klasa za otvaranje i zatvaranje konekcije do baze podataka

class clskonekcijadb
{
    private $server = "localhost";
    private $username = "root";
    private $serverpassword ="";
    private $database = "loto2020";
    public  $konekcija;
  
    public function otvoriKonekciju()
    {
        $this->konekcija...

	mysqli_connect(server, korisnik, sifra, baza)...
        
	if (!$this->konekcija) 
        {
         	poruka...
        }
        return ...
    } 

    public function zatvoriKonekciju()
    {
        mysqli_close()...
    } 

} //kraj klase

?>