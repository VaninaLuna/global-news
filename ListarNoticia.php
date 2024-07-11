<?php
include("conexion.php");

$query = "SELECT * FROM noticia WHERE idEmpresa = '$idEmpresa'";
$listado = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($listado)) {
?>
    <tr>
        <td><?php echo $row['tituloNoticia']; ?></td>
        <td><?php echo $row['resumenNoticia']; ?></td>
        <td><img src='uploads/<?php echo $row["imagenNoticia"] ?>' width='100' height='100'></td>
        <td><?php echo $row['contenidoHTML']; ?></td>
        <td><?php echo ($row['publicada'] == 'Y') ? 'Sí' : 'No'; ?></td>
        <td><?php echo date('d/m/Y', strtotime($row['fechaPublicacion'])); ?></td>

        <td style="width: 100px;">
            <a href="ModificarNoticia.php?id=<?php echo $row['id'] ?>" style="margin-right: 10px;">
                <i class="fas fa-marker" style="color: grey; font-size: 20px;"></i>
            </a>

            <a href="EliminarNoticia.php?id=<?php echo $row['id'] ?>&idEmpresa=<?php echo $idEmpresa ?>">
                <i class="fas fa-trash" style="color: red; font-size: 20px;"></i>
            </a>
        </td>
    </tr>
<?php }
