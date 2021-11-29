<?php
    ###### configuración global
    session_start();

    /**
     * función para genear un volcado en pantalla de un objeto
     */
    function mostrar($dato)
    {
        echo '<pre>';
        print_r($dato);
        echo '</pre>';
    }