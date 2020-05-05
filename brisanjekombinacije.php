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
          <h5>BRISANJE KOMBINACIJE IZ BAZE PODATAKA</h5> 

          <!-- Kreiranje objekta kombinacija -->
          <?php
          $uspesnoobrisana=false;
          $rb=$_POST['rb'];

          /*kreiranje objekta tipa klase clskombinacija*/
          require 'class/clskombinacija.php';
          $objKombinacija = new clskombinacija();
          /*pozvi metode za brisanje*/
          $uspesnoobrisana = $objKombinacija->obrisiKombinaciju($rb);
          if ($uspesnoobrisana)
            {
                echo '<br/><b>';
                echo "Kombinacija je uspešno obrisana iz baze podataka!";
                echo '</b><br/>';
            }
            else
            {
                echo "Kombinacija nije obrisana iz baze podataka!";					
            }
          ?>
          </br>
          <a href="pretragakombinacija.php"><button type="button">Povratak na pretragu</button></a>
          </div> 
          </br>
    </div> 
  </body> 
</html> 