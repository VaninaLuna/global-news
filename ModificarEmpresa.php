<?php
include("conexion.php");
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

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $denominacion = $_POST['denominacion'];
    $telefono = $_POST['telefono'];
    $horarioAtencion = $_POST['horarioAtencion'];
    $quienesSomos = $_POST['quienesSomos'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $domicilio = $_POST['domicilio'];
    $email = $_POST['email'];

    $query = "UPDATE empresa set denominacion = '$denominacion', telefono = '$telefono', horarioAtencion = '$horarioAtencion', quienesSomos = '$quienesSomos'
    , latitud = '$latitud', longitud = '$longitud', domicilio = '$domicilio', email = '$email' WHERE id=$id";

    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Empresa modificada';
    $_SESSION['message_type'] = 'warning';
    header('Location: Index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gestionar Empresas</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- <script>
        tinymce.init({
            selector: 'textarea#contenidoHTML',
            plugins: 'link image code',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code',
        });
    </script> -->

</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="Index.php">Modificar Empresa</a>
            <a class="btn btn-success" href="AgregarNoticia.php?idEmpresa=<?php echo $_GET['id']; ?>">Agregar Noticia</a>


        </div>
    </nav>

    <main class="container p-4">
        <div class="row">
            <div class="col-md-6">
                <!-- MESSAGES -->

                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php session_unset();
                } ?>

                <!-- FORM -->
                <div class="card card-body">
                    <!-- <form action="GuardarEmpresa.php" method="POST" enctype="multipart/form-data"> -->

                    <form action="ModificarEmpresa.php?id=<?php echo $_GET['id']; ?>" method="POST">

                        <div class="form-group">
                            <label for="denominacion">Denominacion:</label>
                            <input type="text" name="denominacion" class="form-control" value="<?php echo $denominacion; ?>" placeholder="Denominacion" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono:</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $telefono; ?>" placeholder="Telefono" maxlength="1024" required><br>

                            <label for="horarioAtencion">Horario de Atencion:</label>
                            <input type="text" name="horarioAtencion" id="horarioAtencion" class="form-control" value="<?php echo $horarioAtencion; ?>" placeholder="Horario de Atencion" maxlength="1024" required><br>

                            <label for="quienesSomos">Quienes somos:</label>
                            <input type="text" name="quienesSomos" id="quienesSomos" class="form-control" value="<?php echo $quienesSomos; ?>" placeholder="Quienes somos" maxlength="1024" required><br>

                            <label for="latitud">Latitud:</label>
                            <input type="text" name="latitud" id="latitud" class="form-control" value="<?php echo $latitud; ?>" placeholder="Latitud" maxlength="1024" required><br>

                            <label for="longitud">Longitud:</label>
                            <input type="text" name="longitud" id="longitud" class="form-control" value="<?php echo $longitud; ?>" placeholder="Longitud" maxlength="1024" required><br>

                            <label for="domicilio">Domicilio:</label>
                            <input type="text" name="domicilio" id="domicilio" class="form-control" value="<?php echo $domicilio; ?>" placeholder="Domicilio" maxlength="1024" required><br>

                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email" maxlength="1024" required><br>

                        </div>
                        <input type="submit" name="update" class="btn btn-success btn-block" value="Modificar Empresa">
                    </form>
                </div>
            </div>

            <div class="col-md-6" style="display: inline-block; text-align: left;">
                <h2>Noticias de la Empresa</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Resumen</th>
                            <th>Imagen Noticia</th>
                            <th>Contenido HTML</th>
                            <th>Publicada</th>
                            <th>Fecha Publicacion</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $idEmpresa = $id;
                        include('ListarNoticia.php');
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- BOOTSTRAP 4 SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>