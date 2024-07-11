<?php
$servername = "localhost:3307"; // Puedes utilizar "localhost" si la base de datos está en la misma máquina
$username = "root";
$password = "";
$database = "phpnoticia";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
