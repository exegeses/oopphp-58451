<?php

    require 'config/config.php';
    require 'clases/Conexion.php';
    require 'clases/Validacion.php';
    require 'clases/Region.php';
    $region = new Region();
    $cantidad = $region->confirmarBaja();
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Baja de una región</h1>

<?php
    if ( $cantidad > 0 ){
?>
        <div class="alert alert-danger col-6 mx-auto">
            <i class="bi bi-exclamation-triangle"></i>
            No se puede eliminar la región <?= $region->getRegNombre() ?>
            ya que tiene destinos relacionados
            <br>
            <a href="adminRegiones.php" class="btn btn-light mt-3">
                Volver a panel de regiones
            </a>
        </div>
<?php
    }
    else{
?>
        <div class="alert bg-light p-4 col-6 mx-auto shadow text-danger">
            Se eliminará la región: <span class="lead"><?= $region->getRegNombre() ?></span>
            <form action="eliminarRegion.php" method="post">
                <input type="hidden" name="regID" value="<?= $region->getIdRegion() ?>">
                <button class="btn btn-danger my-3 px-4">Confirmar baja</button>
                <a href="adminRegiones.php" class="btn btn-outline-secondary">
                    Volver a panel de regiones
                </a>
            </form>
        </div>
<?php
    }
?>

    </main>

<?php  include 'includes/footer.php';  ?>