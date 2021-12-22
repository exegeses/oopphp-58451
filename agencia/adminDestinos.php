<?php
    require 'config/config.php';
    require 'clases/Conexion.php';
    require 'clases/Destino.php';
    $destino = new Destino();
    $destinos = $destino->listarDestinos();
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Panel de administración de destinos</h1>

        <table class="table table-borderless table-striped table-hover">
            <thead>
            <tr>
                <th>Destino</th>
                <th>Región</th>
                <th>Precio</th>
                <th>Asientos</th>
                <th>Disponibles</th>
                <th colspan="2">
                    <a href="formAgregarDestino.php" class="btn btn-outline-secondary">
                        Agregar <i class="far fa-plus-square ml-1"></i>
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
<?php
        foreach ( $destinos as $row ){
?>  
            <tr>
                <td><?= $row['destNombre'] ?></td>
                <td><?= $row['regNombre'] ?></td>
                <td>$<?= $row['destPrecio'] ?></td>
                <td><?= $row['destAsientos'] ?></td>
                <td><?= $row['destDisponibles'] ?></td>
                <td>
                    <a href="formModificarDestino.php?idDestino=<?= $row['idDestino'] ?>" class="btn btn-outline-secondary">
                        Modificar <i class="far fa-edit ml-1"></i>
                    </a>
                </td>
                <td>
                    <a href="formEliminarDestino.php?idDestino=<?= $row['idDestino'] ?>" class="btn btn-outline-secondary">
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