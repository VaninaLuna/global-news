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

    <script>
        tinymce.init({
            selector: 'textarea#contenidoHTML',
            plugins: 'link image code',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code',
        });
    </script>

</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="Index.php">Gestionar Empresas</a>
            <a class="btn btn-success" href="AgregarEmpresa.php">Agregar Empresa</a>


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
            </div>
            <div style="text-align: center;">
                <div class="col-md-12" style="display: inline-block; text-align: left;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Denominacion</th>
                                <th>Telefono</th>
                                <th>Horario de Atencion</th>
                                <th>Quienes somos</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>Domicilio</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include('ListarEmpresa.php'); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- BOOTSTRAP 4 SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>