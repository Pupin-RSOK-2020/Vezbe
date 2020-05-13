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
          <h5>UNOS NOVE IZVUČENE KOMBINACIJE U BAZU PODATAKA</h5> 

          <!-- Provera da li kombinacija dobro uneta? -->
          <!-- Kreiranje objekta kombinacija -->
          <?php
          $dobrouneta=false;
          $godina=$_POST['Godina'];
          $kolo=$_POST['Kolo'];
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
              $postojivec = "";
              $postojivec = $objKombinacija->proveriDaLiKombinacijaPostoji($godina,$kolo);
              if ($postojivec)
              {
                echo '<b><br/><br/>';
                echo "Greška: Kombinacija sa unetom godinom i brojem kola već postoji u bazi podataka. ";
                echo '</b><br/><br/>';
                echo "Proverite unete podatke na prethodnoj stranici ili odustanite od unosa! ";
                echo '<br/>';
              }
              if (!$postojivec)
              {
              /*dodela vrednosti atributima objekta*/
              $objKombinacija->godina = $godina;
              $objKombinacija->kolo = $kolo;
              $objKombinacija->broj1 = $broj1;
              $objKombinacija->broj2 = $broj2;
              $objKombinacija->broj3 = $broj3;
              $objKombinacija->broj4 = $broj4;
              $objKombinacija->broj5 = $broj5;
              $objKombinacija->broj6 = $broj6;
              $objKombinacija->broj7 = $broj7;
              $result="";
              $resultstat="";
              /*snimanje objekta u bazu metodom snimiKombinaciju*/
              /*snimanje statistickih parametara + citanje snimljenog rbkombinacije*/
              $result = $objKombinacija->snimiKombinaciju();
              $rbres = "";
              $rbres = $objKombinacija->odrediRB();
              $redrb = 0;
              $redrb = mysqli_fetch_array($rbres);
              $rb = $redrb['novirb'];
              require 'class/clsstatistika.php';
              $objStatistika = new clsstatistika();
              $resultstat = $objStatistika->snimiStatistiku($broj1,$broj2,$broj3,$broj4,$broj5,$broj6,$broj7,$rb);
              if ($result && $resultstat)
              //if ($result)
              {
                echo '<br/><br/><b>';
                echo "Kombinacija sa statističkim parametrima je uspešno sačuvana u bazi podataka!";
                echo '</b><br/>';
              }
              else
              {
                echo "Kombinacija nije snimljena u bazu podataka!";					
              }
            }
            }
            else /*$dobrouneta*/
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
            } /*$dobrouneta*/
          ?>
          </br>
          <a href="unoskombinacije.php"><button type="button">Povratak na unos</button></a>
          </div> 
          </br>
    </div> 
  </body> 
</html> 