<html> 
  <head> 
    <title>Loto 2020</title> 
    <!-- Bootstrap --> <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <!-- Skaliranje --> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Set karaktera --> <meta charset="UTF-8">
    <!-- CSS --> <link rel="stylesheet" type="text/css" href="stil.css">
  </head>
  <body>
    <!-- Stanica za snimanje kombinacije u bazu podataka -->
    <div class="container"> 
    <img src="images/loto0.png" alt="LOTO" >
     
      <div class="row"> 
        
        <!-- Meni -->
        <?php 
          include 'meni.htm';
        ?>

        <!-- Sadržaj desno -->
        <div class="col-md-6 col-lg-8" style="background-color: #89cff0; box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;"> 
        
        <p></p> 
        
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
        require 'klase/clskombinacija.php';
        $objKombinacija = new clskombinacija();
        /*provera da li su brojevi dobro uneti*/
        $dobrouneta = $objKombinacija->proveriIspravnoUnetuKombinaciju($broj1,$broj2,$broj3,$broj4,$broj5,$broj6,$broj7,$godina);
        if ($dobrouneta)
          {
            echo "Kombinacija je dobro uneta.";
            /*provera da li vec postoji to kolo i godina*/
            $postojivec = false;
            $postojivec = $objKombinacija->daLiKombinacijaPostoji($godina,$kolo);
            if ($postojivec)
            {
              echo '<b><br/><br/>';
              echo "Greška: Kombinacija sa unetom godinom i brojem kola već postoji u bazi podataka. ";
              echo '</b><br/><br/>';
              echo "Proverite unete podatke na prethodnoj stranici ili odustanite od unosa! ";
              echo '<br/>';
            }
            else /*postoji?*/
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
            
            /*snimanje objekta u bazu metodom snimiKombinaciju*/
            $result = $objKombinacija->snimiKombinaciju();
            if ($result)
            {
              echo '<br/><br/><b>';
              echo "Kombinacija je sačuvana u bazi podataka!";
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
        <p></p> 
      </div>  
    </div>
  </body> 
</html> 