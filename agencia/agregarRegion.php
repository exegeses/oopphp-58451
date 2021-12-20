<?php
    require 'config/config.php';
    require 'clases/Conexion.php';
    require 'clases/Validacion.php';
    require 'clases/Region.php';
    $region = new Region;
    $chequeo = $region->agregarRegion();
    $css = 'danger';
    $mensaje = 'No se pudo agregar la región.';
    if( $chequeo ){
        $css = 'success';
        $mensaje = 'Región: '.$region->getRegNombre().' agregada correctmente.';
    }
    
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container">

        <h1>Alta de una región</h1>

        <div class="alert alert-<?= $css; ?> col-8 mx-auto">
            <?= $mensaje; ?>
            <a href="adminRegiones.php" class="btn btn-light">Volver a panel</a>
        </div>

    </main>

<?php
    include 'includes/footer.php';
?>