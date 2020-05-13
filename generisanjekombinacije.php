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
    <!-- Prazan, prva linija -->
  </nav>

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
      </div>
    </nav>
    <div class="col-md-6 col-lg-8" style="background-color: #89cff0; box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;"> 
        <p> </p> 
        <div class="container"> 
          <!-- Naslov --></br>
          <h5>GENERISANJE SLUČAJNE KOMBINACIJE</h5> 
          <!-- Generisanje slučajne kombinacije -->
          <p>Napomena: Ukoliko se slučajno dogodi da program generiše dva ista broja, možete im promeniti vrednosti ili generisati novu kombinaciju!</p> 
          <?php
            /*kreiranje objekta tipa klase clskombinacija*/
            require 'class/clskombinacija.php';
            $objKombinacija = new clskombinacija();
            /*generisanje slučajne kombinacije kao niza od 7 brojeva i 
            sortiranje elemenata u rastućem poretku*/
            $slucajnakomb = $objKombinacija->generisiSlucajnuKombinaciju();
          ?>

            <!-- Forma sa dve kolone -->
            <form class="form-horizontal" role="form" method='POST' action='proveraizlaznostislucajne.php'> 
                <div class="form-group row">
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Broj1">Prvi broj:</label>
                        <input type="text" class="form-control" id="Broj1" name="Broj1" value="<?php echo $slucajnakomb[0];?>" tabindex=1 required>
                    </div>
                    <div class="col-sm-6">
                        <label for="Broj2">Drugi broj:</label>
                        <input type="text" class="form-control" id="Broj2" name="Broj2" value="<?php echo $slucajnakomb[1];?>" tabindex=2 required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Broj3">Treći broj:</label>
                        <input type="text" class="form-control" id="Broj3" name="Broj3" value="<?php echo $slucajnakomb[2];?>" tabindex=3 required>
                    </div>
                    <div class="col-sm-6">
                        <label for="Broj4">Četvrti broj:</label>
                        <input type="text" class="form-control" id="Broj4" name="Broj4" value="<?php echo $slucajnakomb[3];?>" tabindex=4 required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Broj5">Peti broj:</label>
                        <input type="text" class="form-control" id="Broj5" name="Broj5" value="<?php echo $slucajnakomb[4];?>" tabindex=5 required>
                    </div>
                    <div class="col-sm-6">
                        <label for="Broj6">Šesti broj:</label>
                        <input type="text" class="form-control" id="Broj6" name="Broj6" value="<?php echo $slucajnakomb[5];?>" tabindex=6 required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Broj7">Sedmi broj:</label>
                        <input type="text" class="form-control" id="Broj7" name="Broj7" value="<?php echo $slucajnakomb[6];?>" tabindex=7 required>
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10"> 
                    <button type="submit" class="btn btn-default" tabindex=8 autofocus>Proveri izlaznost</button> 
                     </div>  
                </div>
              </form>
            </br>
        </div> 
    </div> 
  </body> 
</html> 