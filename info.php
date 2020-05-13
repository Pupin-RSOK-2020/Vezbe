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
          <h5>LOTO v2020 - Program za igrače loto igre na sreću</h5> 
          <p>Univerzitet u Novom Sadu</p> 
          <p>Tehnički fakultet "Mihajlo Pupin"</p> 
          <p>Autor: Kazi Zoltan</p> 
          <p>Nastavni predmet: RAZVOJ SOFTVERA OTVORENOG KODA</p> 
          <p>Školska godina: 2019/2020. </p> 
          <p>Mesto: Zrenjanin </p> 
          </br> 
        </div> 
    </div> 
  </body> 
</html> 