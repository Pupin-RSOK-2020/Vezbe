<?php

class clskonekcijadb
{
    private $server = "localhost";
    private $username = "root";
    private $serverpassword ="";
    private $database = "loto2020rsok";
    public  $konekcija;
  
    public function otvoriKonekciju()
    {
        $this->konekcija = '';
        $this->konekcija = mysqli_connect($this->server, $this->username, $this->serverpassword, $this->database);
        if (!$this->konekcija) 
        {
            echo('Nije uspostavljena veza sa serverom baze podataka!');
            echo "<br/>";
        }
        return $this->konekcija;
    } 

    public function zatvoriKonekciju($pkonekcija)
    {
        mysqli_close($pkonekcija);
    } 

} //kraj klase
?>