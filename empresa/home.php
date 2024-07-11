<?php
include("conexion.php");
$denominacion = '';
$telefono = '';
$horarioAtencion = '';
$email = '';
$quienesSomos = '';
$latitud = '';
$longitud = '';
$domicilio = '';


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM empresa WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $denominacion = $row['denominacion'];
    $telefono = $row['telefono'];
    $horarioAtencion = $row['horarioAtencion'];
    $quienesSomos = $row['quienesSomos'];
    $latitud = $row['latitud'];
    $longitud = $row['longitud'];
    $domicilio = $row['domicilio'];
    $email = $row['email'];
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="format-detection" content="telephone=no" />
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <title>HOME</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Links -->
  <link rel="stylesheet" href="css/camera.css">
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/google-map.css">


  <!--JS-->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-migrate-1.2.1.min.js"></script>
  <script src="js/rd-smoothscroll.min.js"></script>


  <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
  <script src='js/device.min.js'></script>
</head>

<body>
  <div class="page">
    <!--========================================================
                            HEADER
  =========================================================-->
    <header>
      <div class="container top-sect">
        <div class="navbar-header">
          <h1 class="navbar-brand">
            <a data-type='rd-navbar-brand' href="../Index.php"><small><?php echo $denominacion; ?></small></a>
          </h1>
          <a class="search-form_toggle" href="#"></a>
        </div>

        <div class="help-box text-right">
          <h3><span>Horario de Atencion:</span> <?php echo $horarioAtencion; ?></h3>
          <h4><span>Contacto:</span> <?php echo $email; ?></h4>
          <a href="callto:#"><?php echo $telefono; ?></a>
        </div>
      </div>

      <div id="stuck_container" class="stuck_container">
        <div class="container">
          <nav class="navbar navbar-default navbar-static-top pull-left">
            <div class="">
              <ul class="nav navbar-nav sf-menu sf-js-enabled sf-arrows" data-type="navbar">
                <li style="list-style: none;" class="active">
                  <a href="home.php?id=<?php echo $row['id'] ?>">INICIO</a>
                </li>
                <li style="list-style: none;">
                  <a href="buscador.php?id=<?php echo $row['id'] ?>">LISTA NOTICIAS</a>
                </li>
              </ul>
            </div>
          </nav>

        </div>

      </div>

    </header>

    <!--========================================================
                            CONTENT
  =========================================================-->

    <main>

      <section class="well well1 well1_ins1">
        <div class="camera_container">
          <div id="camera" class="camera_wrap">

            <?php $id;
            include('listarNoticias.php'); ?>

          </div>
        </div>

      </section>

      <section class="well well2 wow fadeIn  bg1" data-wow-duration='3s'>
        <div class="container">
          <h2 class="txt-pr">
            Quienes Somos
          </h2>
          <div class="row">
            <div class="col">
              <p style="text-align:justify">
                <?php echo $quienesSomos; ?>
              </p>
            </div>
          </div>
        </div>
      </section>

    </main>

    <!--========================================================
                            FOOTER
  =========================================================-->
    <footer class="top-border">
      <section class="well well2 wow fadeIn  bg1" data-wow-duration='3s'>
        <div class="container">
          <h2 class="txt-pr">
            Donde estamos
          </h2>
          <p style="text-align:justify">
            <?php echo $domicilio; ?>
          </p>
        </div>
      </section>
      <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11270.125646913215!2d-68.83492456656404!3d-32.88154997304907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sar!4v1615335513448!5m2!1ses-419!2sar" width="1600" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>

      <section class="well1">
        <div class="container">
          <p class="rights">
            <?php echo $denominacion; ?> &#169; <span id="copyright-year"></span>
            <a href="index-5.html">Privacy Policy</a>
            <!-- {%FOOTER_LINK} -->
          </p>
        </div>
      </section>
    </footer>
  </div>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/tm-scripts.js"></script>
  <!-- </script> -->


</body>

</html>