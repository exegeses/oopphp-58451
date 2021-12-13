<?php
    require 'config/config.php';

    require 'clases/Conexion.php';
    require 'clases/Region.php';
    $region = new Region;
    $region->verRegionPorId();
    include 'includes/header.html';
    include 'includes/nav.php';
?>
    
    <main class="container">
            <h1>Modificación de una región</h1>

            <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

                <form action="modificarRegion.php" method="post">

                    <div class="form-group mb-3">
                    <label for="regNombre">Nombre de la región:</label>
                    <input type="text" name="regNombre"
                           value="<?= $region->getRegNombre() ?>"
                           id="regNombre" class="form-control">
                    </div>
                    <input type="hidden" name="idRegion"
                           value="<?= $region->getIdRegion() ?>">
                    <button class="btn btn-dark">Modificar región</button>
                    <a href="adminRegiones.php" class="btn btn-outline-secondary">
                        Volver a panel de regiones
                    </a>
                </form>

            </div>


    </main>
<?php
    include 'includes/footer.php';
?>