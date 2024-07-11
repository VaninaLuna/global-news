<?php
include("conexion.php");
$idEmpresa = '';


if (isset($_GET['idEmpresa'])) {
    $idEmpresa = $_GET['idEmpresa'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Noticias PH</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Archivos CSS de Quill.js -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Archivo JavaScript de Quill.js -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

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
            <a class="navbar-brand" href="ModificarEmpresa.php?id=<?php echo $_GET['idEmpresa']; ?>">Gestion de Noticias</a>
        </div>
    </nav>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card card-body">

                    <form action="GuardarNoticia.php?idEmpresa=<?php echo $_GET['idEmpresa']; ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input name="titulo" type="text" class="form-control" value="" placeholder="Titulo">
                        </div>
                        <div class="form-group">
                            <label for="resumen">Resumen:</label>
                            <input name="resumen" type="text" class="form-control" value="" placeholder="Resumen">
                        </div>
                        <div class="form-group">
                            <label for="imagenInput">Imagen:</label>
                            <input type="file" name="imagen" id="imagenInput">
                            <br>
                            <br>
                            <img id="imagenPreview" width='100' height='100'>
                        </div>
                        <div class="form-group">
                            <label for="publicada">Publicada:</label>
                            <input name="publicada" type="checkbox" style="margin-left: 10px; transform: scale(1.5);">
                        </div>
                        <div class="form-group">
                            <label for="fechaPublicacion">Fecha de Publicación:</label>
                            <input name="fechaPublicacion" type="date" class="form-control" value="" placeholder="Fecha de Publicación">
                        </div>
                        <div class="form-group">
                            <label for="contenidoHTML">Contenido HTML:</label>
                            <!-- <textarea name="contenidoHTML" id="contenidoHTML" rows="10"><?php echo $contenidoHTML; ?></textarea> -->
                            <input type="hidden" id="contenidoHTMLInput" name="contenidoHTML">
                            <div id="editor" style="height: 100px;">
                                <p></p>
                            </div>
                        </div>
                        <button class="btn btn-success" name="update">
                            Agregar Noticia
                        </button>
                    </form>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var quill = new Quill('#editor', {
            theme: 'snow' // Puedes elegir entre 'snow' o 'bubble' para el tema
        });

        var form = document.querySelector('form');
        form.onsubmit = function() {
            var contenidoHTML = document.querySelector('#editor').children[0].innerHTML;
            document.querySelector('#contenidoHTMLInput').value = contenidoHTML;
        };

        document.getElementById('imagenInput').addEventListener('change', function() {
            const file = this.files[0]; // Obtener el archivo seleccionado
            if (file) {
                const reader = new FileReader(); // Crear un objeto FileReader
                reader.onload = function(e) {
                    // Actualizar la vista previa de la imagen
                    document.getElementById('imagenPreview').src = e.target.result;
                }
                reader.readAsDataURL(file); // Leer el contenido del archivo como una URL
            }
        });
    </script>

    <!-- BOOTSTRAP 4 SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>