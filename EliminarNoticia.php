<?php

include("conexion.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $idEmpresa = $_GET['idEmpresa'];
  $query = "DELETE FROM noticia WHERE id = $id";
  echo $id;
  echo $query;
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Noticia eliminada correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: ModificarEmpresa.php?id=' . $idEmpresa);
}
