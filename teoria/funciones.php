<?php

    function loguearErrores( $mensaje )
    {
        $fh = fopen('errores.log', 'a+');
        fwrite( $fh, $mensaje );
        fclose($fh);
    }