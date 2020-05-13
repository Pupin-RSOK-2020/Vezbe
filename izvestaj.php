
<html>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="reportstyles.css">
   <script src="script.js"></script>
   <title>Loto 2020</title>
</head>
<body>
<div style="font-family:arial; color:black; padding-left: 20px;">
<h3>LOTO 2020</h3>
<h4>Izvučene kombinacije - <?php echo date('d.m.Y').".";?></h4><hr>
<?php
    $Godinaod=$_POST['Godinaod'];
    $Godinado=$_POST['Godinado'];
    $Kolood=$_POST['Kolood'];
    $Kolodo=$_POST['Kolodo'];
    $result="";
    $brredova=0;
    
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
     
     echo "<table class='table table-striped'>
               <thead>
                 <tr>
                   <th scope='col'>Godina</th>
                   <th scope='col'>Kolo</th>
                   <th scope='col'>1. broj</th>
                   <th scope='col'>2. broj</th>
                   <th scope='col'>3. broj</th>
                   <th scope='col'>4. broj</th>
                   <th scope='col'>5. broj</th>
                   <th scope='col'>6. broj</th>
                   <th scope='col'>7. broj</th>
                   <th scope='col'>Parnih</th>
                   <th scope='col'>Neparnih</th>
                   <th scope='col'>V1</th>
                   <th scope='col'>V2</th>
                   <th scope='col'>V3</th>
                   
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
                   <td>".$red['Broj7']."</td>
                   <td>".$red['Par']."</td>
                   <td>".$red['Nepar']."</td>
                   <td>".$red['V1']."</td>
                   <td>".$red['V2']."</td>
                   <td>".$red['V3']."</td>
                   </tr>";        
       }
       echo "</tbody>
       </table></br>";
     }
     else
       {
         echo "U bazi podataka nije pronađena nijedna kombinacija!";
         echo "</br></br>";
       }
       echo "<hr>";
       echo "Ukupno prikazano kombinacija: ".$brojredova;
     //kraj php-a za izvestaj
     $objKombinacija=null;
     ?>
</div>
</body>
</html>