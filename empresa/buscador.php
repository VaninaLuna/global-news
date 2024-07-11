<?php
include("conexion.php");
$id = '';
$denominacion = '';
$telefono = '';
$horarioAtencion = '';
$quienesSomos = '';
$latitud = '';
$longitud = '';
$domicilio = '';
$email = '';


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
						<a data-type='rd-navbar-brand' href="home.php?id=<?php echo $id ?>"><small><?php echo $denominacion; ?></small></a>
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
									<a href="home.php?id=<?php echo $id ?>">INICIO</a>
								</li>
								<li style="list-style: none;" class="active">
									<a href="buscador.php?id=<?php echo $id ?>">LISTA NOTICIAS</a>
								</li>
							</ul>
						</div>
					</nav>
					<form class="search-form" action="buscador.php" method="GET" accept-charset="utf-8">
						<input type="hidden" name="id" value="<?php echo $id ?>">
						<label class="search-form_label">
							<input class="search-form_input" type="text" name="buscar" autocomplete="off" placeholder="Ingrese Texto" />
						</label>
						<button class="search-form_submit fa-search" type="submit"></button>
					</form>

				</div>

			</div>

		</header>

		<!--========================================================
                            CONTENT
  =========================================================-->

		<main>

			<section class="well well4">

				<div class="container">
					<h2>
						<?php $buscar = 'Todas las Noticias';
						if (isset($_GET['buscar'])) {
							$buscar = $_GET['buscar'];
						}

						echo $buscar
						?>
					</h2>
					<div class="row offs2">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Titulo</th>
									<th>Resumen</th>
									<th>Imagen</th>
									<th>Fecha Publicacion</th>
									<th>Contenido HTML</th>
								</tr>
							</thead>
							<tbody>
								<?php $id;
								include('noticiasBuscadas.php'); ?>
							</tbody>
						</table>
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
						Denominación Empresa &#169; <span id="copyright-year"></span>
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