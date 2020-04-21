<html> 
  <head> 
    <title>Loto 2020</title> 
    <!-- Bootstrap --> <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <!-- Skaliranje --> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Set karaktera --> <meta charset="UTF-8">
    <!-- CSS --> <link rel="stylesheet" type="text/css" href="stil.css">
  </head>
  <body>
  <nav class="navbar navbar-dark bg-dark">
    <!-- Prazan prvi red za odvajanje menija -->
  </nav>

  <!-- Linija sa linkovima -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php"><img src="./images/loto.png" alt="LOTO"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">      
        
        <!-- Meni -->
        <?php 
          include 'meni.htm';
        ?>
        </div>
    </nav>

    <div class="col-md-6 col-lg-8" style="background-color: #89cff0; box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;"> 
        <p> </p> 
        <div class="container"> 
            <!-- Naslov --></br>
            <h5>GENERISANJE SLUČAJNE KOMBINACIJE - PROVERA IZLAZNOSTI?</h5> 

            <!-- Kreiranje objekta kombinacija -->
            <?php
            $broj1=$_POST['Broj1'];
            $broj2=$_POST['Broj2'];
            $broj3=$_POST['Broj3'];
            $broj4=$_POST['Broj4'];
            $broj5=$_POST['Broj5'];
            $broj6=$_POST['Broj6'];
            $broj7=$_POST['Broj7'];

            /*kreiranje objekta tipa klase clskombinacija*/
            require 'class/clskombinacija.php';
            $objKombinacija = new clskombinacija();
            $postojivec = false;
            $postojivec = $objKombinacija->proveriIzlaznostKombinacije($broj1,$broj2,$broj3,$broj4,$broj5,$broj6,$broj7);
            if ($postojivec)
              {
                /*prikaz poruke da kombinacija (7 brojeva) već postoji u bazi podataka*/
                echo '<b><br/>';
                echo "Rezultat pretrage baze podataka: Slučajno generisana kombinacija (";
                echo $broj1.", ".$broj2.", ".$broj3.", ".$broj4.", ".$broj5.", ".$broj6.", ".$broj7;
                echo ") je pronađena u bazi podataka. JESTE IZVUČENA!";
                echo '</b><br/>';
              }
              else /*od postoji vec*/
              {
              /*prikaz poruke da kombinacija (7 brojeva) ne postoji u bazi podataka*/
              echo '<b><br/>';
              echo "Rezultat pretrage baze podataka: Slučajno generisana kombinacija (";
              echo $broj1.", ".$broj2.", ".$broj3.", ".$broj4.", ".$broj5.", ".$broj6.", ".$broj7;
              echo ") nije pronađena u bazi podataka. NIJE IZVUČENA!";
              echo '</b><br/>';
              } /*od postoji vec*/
          ?>
          </br>
          <a href="generisanjekombinacije.php"><button type="button">Nova slučajna kombinacija</button></a>
          </div> 
          </br>
    </div> 
  </body> 
</html> 