<?php
include("conexion.php");

$buscar = '';

if (isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];
}

$query = "SELECT * FROM noticia WHERE idEmpresa = '$id'
AND (tituloNoticia LIKE '%$buscar%' 
OR resumenNoticia LIKE '%$buscar%' 
OR imagenNoticia LIKE '%$buscar%' 
OR contenidoHTML LIKE '%$buscar%') 
ORDER BY id DESC LIMIT 20";


$listado = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($listado)) {
?>
    <tr>
        <td><a href="detalle.php?id=<?php echo $row['id'] ?>"><?php echo $row['tituloNoticia']; ?></a></td>
        <td><?php echo $row['resumenNoticia']; ?></td>
        <td><img src='http://localhost/tpEmpresa/uploads/<?php echo $row["imagenNoticia"] ?>' width='100' height='100'></td>
        <td><?php echo $row['fechaPublicacion']; ?></td>
        <td><?php echo $row['contenidoHTML']; ?></td>
    </tr>
<?php }
