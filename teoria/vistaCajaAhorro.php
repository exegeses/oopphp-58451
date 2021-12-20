<?php

    require 'Cuenta.php';
    require 'Balanceo.php';
    require 'CajaAhorro.php';

    $cajaDAhorrro = new CajaAhorro(
                    'Juan García',
                    6546506,
                    80000);
    $cajaDAhorrro->comprar();