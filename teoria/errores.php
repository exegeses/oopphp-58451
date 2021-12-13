<?php

    require 'funciones.php';

    $a = 5;
    $b = 0;

    try{
        $r = $a/$b;
        echo $r;
    } catch ( Error $e ){
        $mensaje = "\n";
        $mensaje .= date('d/m/Y H:m:s')."\n";
        $mensaje .= 'Mensaje: '. $e->getMessage()."\n";
        $mensaje .= 'Archivo: '. $e->getFile()."\n";
        $mensaje .= 'Línea #:'.$e->getLine()."\n\n";
        //echo $e->getCode(), '<br>';
        loguearErrores($mensaje);
        //redirección $_SERVER['HTTP_REFERER'];
    }
