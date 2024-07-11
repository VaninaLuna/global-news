<?php
include("conexion.php");

$query = "SELECT * FROM noticia WHERE idEmpresa = '$id' ORDER BY fechaPublicacion DESC LIMIT 5";
$listado = mysqli_query($conn, $query);
$count = 1;

while ($row = mysqli_fetch_assoc($listado)) {
?>
    <div id="imagenNoticiaContainer" data-src='../uploads/<?php echo $row["imagenNoticia"] ?>'>
        <div class="camera_caption fadeIn">
            <div class="jumbotron jumbotron<?php echo $count++ ?>">
                <em>
                    <a href="detalle.php?id=<?php echo $row['id'] ?>"><?php echo $row['tituloNoticia']; ?></a>
                </em>
                <div class="wrap">
                    <p>
                        <?php echo $row['resumenNoticia']; ?>
                    </p>
                    <a href="detalle.php?id=<?php echo $row['id'] ?>" class="btn-link fa-angle-right"></a>
                </div>
            </div>
        </div>
    </div>
<?php
}
