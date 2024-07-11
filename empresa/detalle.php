<?php
include("conexion.php");
$titulo = '';
$resumen = '';
$contenidoHTML = '';
$fechaPublicacion = '';
$imagenNoticia = '';
$idEmpresa = '';

$denominacion = '';
$telefono = '';
$horarioAtencion = '';
$email = '';


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM noticia WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $titulo = $row['tituloNoticia'];
    $resumen = $row['resumenNoticia'];
    $contenidoHTML = $row['contenidoHTML'];
    $fechaPublicacion = $row["fechaPublicacion"];
    $idEmpresa = $row["idEmpresa"];
    $imagenNoticia = $row["imagenNoticia"];
  }

  if (isset($idEmpresa)) {
    $queryEmpresa = "SELECT * FROM empresa WHERE id=$idEmpresa";
    $resultEmpresa = mysqli_query($conn, $queryEmpresa);
    if (mysqli_num_rows($resultEmpresa) == 1) {
      $rowEmpresa = mysqli_fetch_array($resultEmpresa);
      $denominacion = $rowEmpresa['denominacion'];
      $telefono = $rowEmpresa['telefono'];
      $horarioAtencion = $rowEmpresa['horarioAtencion'];
      $email = $rowEmpresa['email'];
    }
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
  <title>PRIVACY</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Links -->
  <link rel="stylesheet" href="css/search.css">

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
                <li style="list-style: none;">
                  <a href="home.php?id=<?php echo $idEmpresa ?>">INICIO</a>
                </li>
                <li style="list-style: none;">
                  <a href="buscador.php?id=<?php echo $idEmpresa ?>">LISTA NOTICIAS</a>
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

      <section class="well well4">
        <div class="container">
          <center>
            <div id="imagenPrincipal" style="height: 600px; width: 800px; background-image: url('http://localhost/tpEmpresa/uploads/<?php echo $imagenNoticia; ?>'); 
            background-repeat: no-repeat; background-size: contain; background-position: center;">
              <div style="text-align:center; background-color: rgba(1,1,1,0.5);color: #ffffff;font-size: 16px;line-height: 50px;">
                <?php echo $titulo; ?>
              </div>
            </div>
          </center>
          <br>
          <br>
          <h2 style="height:100px">
            <?php echo $titulo; ?>
          </h2>
          <?php echo $fechaPublicacion; ?>
          <br>
          <br>
          <hr>
          <br>
          <div class="row offs2">

            <div class="col-lg-12">
              <dl class="terms-list">
                <dt>
                  <?php echo $resumen; ?>
                </dt>
                <br>
                <hr>
                <br>
                <dd>
                  <?php echo $contenidoHTML; ?>
                </dd>
              </dl>
            </div>
          </div>
        </div>
      </section>


    </main>

    <!--========================================================
                            FOOTER
  =========================================================-->
    <footer>
      <section class="well">
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

  <!-- coded by vitlex -->

</body>

</html>