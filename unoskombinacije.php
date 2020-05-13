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

            <!-- Forma sa dve kolone -->
            <form class="form-horizontal" role="form" method='POST' action='snimanjekombinacije.php'> 
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Godina">Godina:</label>
                        <input type="text" class="form-control" id="Godina" name="Godina" required placeholder="Upišite godinu">
                    </div>
                    <div class="col-sm-6">
                        <label for="Kolo">Kolo:</label>
                        <input type="text" class="form-control" id="Kolo" name="Kolo" required placeholder="Upišite broj kola">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Broj1">Prvi broj:</label>
                        <input type="text" class="form-control" id="Broj1" name="Broj1" required placeholder="Unesite 1. broj">
                    </div>
                    <div class="col-sm-6">
                        <label for="Broj2">Drugi broj:</label>
                        <input type="text" class="form-control" id="Broj2" name="Broj2" required placeholder="Unesite 2. broj">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Broj3">Treći broj:</label>
                        <input type="text" class="form-control" id="Broj3" name="Broj3" required placeholder="Unesite 3. broj">
                    </div>
                    <div class="col-sm-6">
                        <label for="Broj4">Četvrti broj:</label>
                        <input type="text" class="form-control" id="Broj4" name="Broj4" required placeholder="Unesite 4. broj">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Broj5">Peti broj:</label>
                        <input type="text" class="form-control" id="Broj5" name="Broj5" required placeholder="Unesite 5. broj">
                    </div>
                    <div class="col-sm-6">
                        <label for="Broj6">Šesti broj:</label>
                        <input type="text" class="form-control" id="Broj6" name="Broj6" required placeholder="Unesite 6. broj">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Broj7">Sedmi broj:</label>
                        <input type="text" class="form-control" id="Broj7" name="Broj7" required placeholder="Unesite 7. broj">
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10"> 
                    <button type="submit" class="btn btn-default">Sačuvaj kombinaciju</button> 
                  </div>  
                </div>
              </form>
            </br>
        </div> 
    </div> 
  </body> 
</html> 