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
          <h5>PROVERA: DA LI JE KOMBINACIJA VEĆ IZLAZILA (VEĆ IZVUČENI BROJEVI)?</h5> 

          <!-- Provera da li kombinacija dobro uneta? -->
          <!-- Kreiranje objekta kombinacija -->
          <?php
          $dobrouneta=false;
          $godina=2000; 
          /*godina se ne proverava da li je dobro uneta, pošto nije bitna za proveru izlaznosti brojeva*/
          /*ali je vrednost potrebna da bi se mogla pozvati postojeća metoda za proveru da li je 7*/
          /*izabranih brojeva uneto na pravilan način: 1<2<3<4<5<6<7 1..39*/
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
          /*provera da li su brojevi dobro uneti*/
          $dobrouneta = $objKombinacija->proveriDaLiSuBrojeviIspravnoUneti($broj1,$broj2,$broj3,$broj4,$broj5,$broj6,$broj7,$godina);
          if ($dobrouneta)
            {
              echo "Kombinacija je dobro uneta.";
              /*provera da li vec postoji to kolo i godina*/
              $postojivec = false;
              $postojivec = $objKombinacija->proveriIzlaznostKombinacije($broj1,$broj2,$broj3,$broj4,$broj5,$broj6,$broj7);
              if ($postojivec)
              {
                /*prikaz poruke da kombinacija (7 brojeva) već postoji u bazi podataka*/
                echo '<b><br/><br/>';
                echo "Rezultat pretrage baze podataka: Kombinacija (";
                echo $broj1.", ".$broj2.", ".$broj3.", ".$broj4.", ".$broj5.", ".$broj6.", ".$broj7;
                echo ") je pronađena u bazi podataka. JESTE IZVUČENA!";
                echo '</b><br/>';
              }
              else /*od postoji vec*/
              {
              /*prikaz poruke da kombinacija (7 brojeva) ne postoji u bazi podataka*/
              echo '<b><br/><br/>';
              echo "Rezultat pretrage baze podataka: Kombinacija (";
              echo $broj1.", ".$broj2.", ".$broj3.", ".$broj4.", ".$broj5.", ".$broj6.", ".$broj7;
              echo ") nije pronađena u bazi podataka. NIJE IZVUČENA!";
              echo '</b><br/>';
              } /*od postoji vec*/
            }
            else /*dobrouneta*/
            {
              echo '<b>';
              echo "Greška: Kombinacija nije dobro uneta. ";
              echo '</b><br/><br/>';
              echo "Svaki naredni broj mora biti veći od prethodnog! ";
              echo '<br/>';
              echo "Svi brojevi moraju biti u opsegu od 1 do 39! ";
              echo '<br/><br/>';
              echo "Proverite unete podatke na prethodnoj strani...";
              echo '<br/>';
            } /*dobrouneta*/
          ?>
          </br>
          <a href="proveraizlaznosti.php"><button type="button">Nova provera izlaznosti</button></a>
          </div> 
          </br>
    </div> 
  </body> 
</html> 