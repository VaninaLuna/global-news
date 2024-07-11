<?php
include("conexion.php");

$query = "SELECT * FROM empresa";
$listado = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($listado)) {
?>
    <tr>
        <td><?php echo $row['denominacion']; ?></td>
        <td><?php echo $row['telefono']; ?></td>
        <td><?php echo $row['horarioAtencion']; ?></td>
        <td><?php echo $row['quienesSomos']; ?></td>
        <td><?php echo $row['latitud']; ?></td>
        <td><?php echo $row['longitud']; ?></td>
        <td><?php echo $row['domicilio']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td style="width: 120px;">
            <a href="empresa/home.php?id=<?php echo $row['id'] ?>" style="margin-right: 10px;">
                <i class="fas fa-home" style="color: green; font-size: 20px;"></i>
            </a>

            <a href="ModificarEmpresa.php?id=<?php echo $row['id'] ?>" style="margin-right: 10px;">
                <i class="fas fa-marker" style="color: grey; font-size: 20px;"></i>
            </a>

            <a href="EliminarEmpresa.php?id=<?php echo $row['id'] ?>">
                <i class="fas fa-trash" style="color: red; font-size: 20px;"></i>
            </a>

        </td>
    </tr>
<?php }
