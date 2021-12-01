<?php
    require 'config/config.php';

    require 'clases/Conexion.php';
    require 'clases/Region.php';


    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container">

        <h1>Modificación de una región</h1>

        <div class="alert alert-success col-8 mx-auto">
            mensaje modificación exitosa
            <a href="adminRegiones.php" class="btn btn-light">Volver a panel</a>
        </div>
        <div class="alert alert-danger col-8 mx-auto">
            mensaje no se pudo modificar
            <a href="adminRegiones.php" class="btn btn-light">Volver a panel</a>
        </div>

    </main>

<?php
    include 'includes/footer.php';
?>