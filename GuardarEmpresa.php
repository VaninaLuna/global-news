<?php

include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $denominacion = $_POST['denominacion'];
    $telefono = $_POST['telefono'];
    $horarioAtencion = $_POST['horarioAtencion'];
    $quienesSomos = $_POST['quienesSomos'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $domicilio = $_POST['domicilio'];
    $email = $_POST['email'];
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
    $query = "INSERT INTO empresa (denominacion, telefono, horarioAtencion, quienesSomos, latitud, longitud, domicilio, email )
     VALUES ('$denominacion', '$telefono', '$horarioAtencion', '$quienesSomos', 
    '$latitud', '$longitud','$domicilio', '$email')";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Empresa guardada correctamente';
    $_SESSION['message_type'] = 'success';

    header('Location: Index.php');

    $conn->close();
}
