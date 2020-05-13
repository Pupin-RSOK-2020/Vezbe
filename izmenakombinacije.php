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
          <h5>IZMENA KOMBINACIJE U BAZI PODATAKA</h5> 

            <!-- Učitavanje brojeva u kombinaciji prema rbkombinacije preuzetog sa stranice za pretragu -->
            <?php
              $ucitana=false;
              $brojredova=0;
              $Kolo=0;
              $Godina=0;
              $Broj1=0;
              $Broj2=0;
              $Broj3=0;
              $Broj4=0;
              $Broj5=0;
              $Broj6=0;
              $Broj7=0;
              $rb=$_POST['rb'];
                           
              /*kreiranje objekta tipa klase clskombinacija*/
              require 'class/clskombinacija.php';
              $objKombinacija = new clskombinacija();
              /*učitavanje kombinacije po rbkombinacije*/
              $ucitana=$objKombinacija->ucitajKombinaciju($rb);
              $brojredova=mysqli_num_rows($ucitana);
              if ($brojredova>0)
              {
                $red=0;
                while($red = mysqli_fetch_array($ucitana))
                {
                  $Kolo=$red['Kolo'];
                  $Godina=$red['Godina'];
                  $Broj1=$red['Broj1'];
                  $Broj2=$red['Broj2'];
                  $Broj3=$red['Broj3'];
                  $Broj4=$red['Broj4'];
                  $Broj5=$red['Broj5'];
                  $Broj6=$red['Broj6'];
                  $Broj7=$red['Broj7'];
                }
              }
            ?>

            <!-- Forma sa dve kolone uz dodeljenje vrednosti poljima iz učitane kombinacije -->
            <form class="form-horizontal" role="form" method='POST' action='snimanjeizmenekombinacije.php'> 
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Godina">Godina:</label>
                        <input type="text" class="form-control" id="Godina" name="Godina" required value="<?php echo $Godina; ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="Kolo">Kolo:</label>
                        <input type="text" class="form-control" id="Kolo" name="Kolo" required value="<?php echo $Kolo; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Broj1">Prvi broj:</label>
                        <input type="text" class="form-control" id="Broj1" name="Broj1" required value="<?php echo $Broj1; ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="Broj2">Drugi broj:</label>
                        <input type="text" class="form-control" id="Broj2" name="Broj2" required value="<?php echo $Broj2; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Broj3">Treći broj:</label>
                        <input type="text" class="form-control" id="Broj3" name="Broj3" required value="<?php echo $Broj3; ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="Broj4">Četvrti broj:</label>
                        <input type="text" class="form-control" id="Broj4" name="Broj4" required value="<?php echo $Broj4; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Broj5">Peti broj:</label>
                        <input type="text" class="form-control" id="Broj5" name="Broj5" required value="<?php echo $Broj5; ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="Broj6">Šesti broj:</label>
                        <input type="text" class="form-control" id="Broj6" name="Broj6" required value="<?php echo $Broj6; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Broj7">Sedmi broj:</label>
                        <input type="text" class="form-control" id="Broj7" name="Broj7" required value="<?php echo $Broj7; ?>">
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10"> 
                    <input type='hidden' name='rb' value='<?php echo $rb; ?>'>
                    <button type="submit" class="btn btn-default">Promeni kombinaciju</button> 
                  </div>  
                </div>
              </form>
            </br>
        </div> 
    </div> 
  </body> 
</html> 