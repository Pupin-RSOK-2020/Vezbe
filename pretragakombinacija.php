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
          <h5>PRETRAGA KOMBINACIJA</h5> 

            <!-- Forma sa dve kolone -->
            <form class="form-horizontal" role="form" method='POST' action=''> 
                <div class="form-group row">
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Godinaod">Godina od</label>
                        <input type="number" class="form-control" id="Godinaod" name="Godinaod" autofocus tabindex=1>
                    </div>
                    <div class="col-sm-6">
                        <label for="Godinado">do</label>
                        <input type="number" class="form-control" id="Godinado" name="Godinado" tabindex=2>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Kolood">Redni broj kola od</label>
                        <input type="number" class="form-control" id="Kolood" name="Kolood" tabindex=3>
                    </div>
                    <div class="col-sm-6">
                        <label for="Kolodo">do</label>
                        <input type="number" class="form-control" id="Kolodo" name="Kolodo" tabindex=4>
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10"> 
                    <button type="submit" class="btn btn-default" name="pronadji" tabindex=5>Pronađi kombinacije</button> 
                    <button type="reset" class="btn btn-default" name="ponisti" tabindex=6>Nov kriterijum pretrage</button>
                  </div>  
                </div>
              </form>
            </br>

        <!-- Pronalaženje kombinacija za kriterijum pretrage -->
        <?php 
          if(isset($_POST['pronadji'])) 
          {
          //ako je pritisnuta pretraga, tj. taster Pronađi
          $Godinaod=$_POST['Godinaod'];
          $Godinado=$_POST['Godinado'];
          $Kolood=$_POST['Kolood'];
          $Kolodo=$_POST['Kolodo'];
          
          /*kreiranje objekta tipa klase clskombinacija*/
          require 'class/clskombinacija.php';
          $objKombinacija = new clskombinacija();
          /*pretraga kombinacija*/
          $pronadjena="";
          $brojredova=0;
          $pronadjena=$objKombinacija->pretragaIzvucenihKombinacija($Godinaod,$Kolood,$Godinado,$Kolodo);
          $brojredova=mysqli_num_rows($pronadjena);
          if ($brojredova>0)
          {
          $red=0;
          echo "Pronađeno kombinacija: ".$brojredova;
          echo "<table class='table table-striped'>
                    <thead>
                      <tr>
                        <th scope='col'>Godina</th>
                        <th scope='col'>Kolo</th>
                        <th scope='col'>1.</th>
                        <th scope='col'>2.</th>
                        <th scope='col'>3.</th>
                        <th scope='col'>4.</th>
                        <th scope='col'>5.</th>
                        <th scope='col'>6.</th>
                        <th scope='col'>7.</th>
                        <th scope='col'>Akcija 1</th>
                        <th scope='col'>Akcija 2</th>
                      </tr>
                    </thead><tbody>";
            while($red = mysqli_fetch_array($pronadjena))
            {
              echo "
                      <tr>
                        <th scope='row'>".$red['Godina']."</th>
                        <td>".$red['Kolo']."</td>
                        <td>".$red['Broj1']."</td>
                        <td>".$red['Broj2']."</td>
                        <td>".$red['Broj3']."</td>
                        <td>".$red['Broj4']."</td>
                        <td>".$red['Broj5']."</td>
                        <td>".$red['Broj6']."</td>
                        <td>".$red['Broj7']."</td>";
                        $rb=$red['RBkombinacija'];
                        echo "<td> <form action='izmenakombinacije.php' method='POST'>";
                        echo "<input type='hidden' name='rb' value='$rb'>";
                        echo "<input type='submit' name='izmena' value='Izmena'>";
                        echo "</form> </td>";
                        echo "<td> <form action='brisanjekombinacije.php' method='POST'>";
                        echo "<input type='hidden' name='rb' value='$rb'>";
                        echo "<input type='submit' name='izmena' value='Brisanje'>";
                        echo "</form> </td> </tr>";        
            }
            echo "</tbody>
            </table>";
          }
          else
            {
              echo "U bazi podataka nije pronađena nijedna kombinacija!";
              echo "</br></br>";
            }
          } //kraj php-a ako je pritisnuta pretraga
          ?>
          <?php 
          if(isset($_POST['pronadji'])) 
          {
          //ako je pritisnuta pretraga, tj. taster Stampanje
            echo "<form action='izvestaj.php' method='POST'>
              <div class='form-group row'>
                <div class='col-sm-offset-2 col-sm-10'> 
                    <input type='hidden' name='Godinaod' value='";
                    echo $Godinaod;
                    echo "'>
                    <input type='hidden' name='Godinado' value='";
                    echo $Godinado;
                    echo "'>
                    <input type='hidden' name='Kolood' value='";
                    echo $Kolood;
                    echo "'>
                    <input type='hidden' name='Kolodo' value='";
                    echo $Kolodo;
                    echo "'>
                    <button type='submit' class='btn btn-default'>Štmpanje izveštaja</button> 
                  </div>  
                </div>
            </form></br>";
          }
          ?>
        </div> 
    </div> 
  </body> 
</html> 