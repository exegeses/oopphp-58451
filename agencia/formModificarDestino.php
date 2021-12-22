<?php
    require 'config/config.php';
    require 'clases/Conexion.php';
    require 'clases/Validacion.php';
    require 'clases/Region.php';
    require 'clases/Destino.php';
    $region = new Region;
    $regiones = $region->listarRegiones();
    $destino = new Destino;
    $destino->verDestinoPorID();
    include 'includes/header.html';
    include 'includes/nav.php';
?>
    
    <main class="container">
            <h1>Modificación de un destino</h1>

            <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

                <form action="modificarDestino.php" method="post">

                    <div class="form-group mb-2">
                    <label for="destNombre">Nombre del Destino:</label>
                    <input type="text" name="destNombre" 
                           value="<?= $destino->getDestNombre() ?>"
                           id="destNombre" class="form-control"
                           required>
                    </div>

                    <div class="form-group mb-2">
                    <label for="idRegion">Región</label>
                    <select name="idRegion" id="idRegion"
                            class="form-control" required>
                        <option value="">Seleccione una región</option>
<?php
            foreach ( $regiones as $row ){
?>
                        <option <?= ( $row['idRegion']==$destino->getIdRegion() )?'selected':'' ?> value="<?= $row['idRegion'] ?>"><?= $row['regNombre'] ?></option>
<?php
            }
?>
                    </select>
                    </div>

                    <div class="form-group  mb-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="number" name="destPrecio"
                                   value="<?= $destino->getDestPrecio() ?>"
                                   class="form-control" placeholder="Ingrese el precio" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">#</div>
                            </div>
                            <input type="number" name="destAsientos"
                                   value="<?= $destino->getDestAsientos() ?>"
                                   class="form-control" placeholder="Ingrese cantidad de Asientos Totales" required>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">#</div>
                            </div>
                            <input type="number" name="destDisponibles"
                                   value="<?= $destino->getDestDisponibles() ?>"
                                   class="form-control" placeholder="Ingrese cantidad de Asientos Disponibles" required>
                        </div>
                    </div>

                    <input type="hidden" name="idDestino"
                           value="<?= $destino->getIdDestino() ?>">
                    <button class="btn btn-dark">Modificar destino</button>
                    <a href="adminDestinos.php" class="btn btn-outline-secondary">
                        Volver a panel de destinos
                    </a>

                </form>

            </div>


    </main>
<?php
    include 'includes/footer.php';
?>