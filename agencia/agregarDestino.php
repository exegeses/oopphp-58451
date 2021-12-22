<?php
    require 'config/config.php';
    require 'clases/Conexion.php';

    $destino = new Destino;
    $chequeo = $destino->agregarDestino();
    $css = 'danger';
    $mensaje = 'No se pudo agregar el destino.';
    if( $chequeo ){
        $css = 'success';
        $mensaje = 'Destino: '.$destino->getDestNombre().' agregad correctmente.';
    }
    
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container">

        <h1>Alta de un destino</h1>

        <div class="alert alert-<?= $css; ?> col-8 mx-auto">
            <?= $mensaje; ?>
            <a href="adminDestinos.php" class="btn btn-light">Volver a panel</a>
        </div>

    </main>

<?php
    include 'includes/footer.php';
?>