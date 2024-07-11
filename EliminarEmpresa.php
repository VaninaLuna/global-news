<?php

include("conexion.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM empresa WHERE id = $id";
  echo $id;
  echo $query;
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Empresa eliminada correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: Index.php');
}
