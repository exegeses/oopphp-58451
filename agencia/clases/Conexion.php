<?php

    class Conexion
    {
        static $link;

        private function __construct()
        {} //impedimos instanciación de la clase

        static function conectar()
        {
            self::$link = new PDO(
                'mysql:host=localhost;dbname=agenciaOOP',
                'root',
                'root'
            );
        }
    }