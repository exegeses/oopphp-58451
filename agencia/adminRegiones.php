<?php
    require 'config/config.php';
    require 'clases/Conexion.php';
    require 'clases/Region.php';
    $region = new Region;
    $regiones = $region->listarRegiones();
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container py-3">
        <h1>Panel de administración de regiones</h1>

        <table class="table table-borderless table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Región</th>
                <th colspan="2">
                    <a href="formAgregarRegion.php" class="btn btn-outline-secondary">
                        Agregar <i class="far fa-plus-square ml-1"></i>
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
<?php
            foreach ( $regiones as $row ) {
?>
            <tr>
                <td><?= $row['idRegion'] ?></td>
                <td><?= $row['regNombre'] ?></td>
                <td>
                    <a href="formModificarRegion.php" class="btn btn-outline-secondary">
                        Modificar <i class="far fa-edit ml-1"></i>
                    </a>
                </td>
                <td>
                    <a href="formEliminarRegion.php" class="btn btn-outline-secondary">
                        Eliminar <i class="far fa-minus-square ml-1"></i>
                    </a>
                </td>
            </tr>
<?php
            }
?>
            </tbody>
        </table>
    
    </main>
<?php
    include 'includes/footer.php';
?>