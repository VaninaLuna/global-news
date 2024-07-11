<?php

include 'conexion.php';
$idEmpresa = '';

if (isset($_GET['idEmpresa'])) {
    $idEmpresa = $_GET['idEmpresa'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $titulo = $_POST['titulo'];
    $resumen = $_POST['resumen'];
    $contenidoHTML = $_POST['contenidoHTML'];
    $publicada = isset($_POST["publicada"]) ? 'Y' : 'N';
    $fechaPublicacion = $_POST["fechaPublicacion"];

    //    $archivo_name = $_FILES['file']['tmp_name'];
    //    $archivo_size = $_FILES['file']['size'];
    //    $archivo_type = $_FILES['file']['type'];

    // Sube la imagen al servidor
    $targetDir = "uploads/";
    $fileName = basename($_FILES["imagen"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    //$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    move_uploaded_file($_FILES["imagen"]["tmp_name"], $targetFilePath);

    // Realiza la inserción en la base de datos
    $query = "INSERT INTO noticia (tituloNoticia, resumenNoticia, imagenNoticia, contenidoHTML, publicada, fechaPublicacion, idEmpresa) 
    VALUES ('$titulo', '$resumen', '$fileName', '$contenidoHTML', '$publicada', '$fechaPublicacion', '$idEmpresa')";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    } else {
        echo "Noticia insertada correctamente.";
        $_SESSION['message'] = 'Noticia guardada correctamente';
        $_SESSION['message_type'] = 'success';
        header('Location: ModificarEmpresa.php?id=' . $idEmpresa);
    }
    $conn->close();
}
