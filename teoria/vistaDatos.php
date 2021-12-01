<?php

    require 'FooConexion.php';

    $link = Conexion::conectar();
    //print_r($link);
    $sql = "SELECT regNombre FROM regiones 
                WHERE idRegion < :id ";
    $stmt = $link->prepare($sql);
    $stmt->execute( [ ':id'=>3 ] );

    //fetch()
    /*$fila = $stmt->fetch(PDO::FETCH_ASSOC);
    echo '<pre>';
    print_r($fila);
    echo '</pre>';
    */

    //fetchAll()
    $listado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';
    print_r($listado);
    echo '</pre>';