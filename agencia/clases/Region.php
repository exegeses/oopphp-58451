<?php

    class Region
    {
        private $idRegion;
        private $regNombre;

        public function listarRegiones()
        {
            $link = Conexion::conectar();
            $sql  = "SELECT idRegion, regNombre
                        FROM regiones";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $regiones = $stmt->fetchAll();
            return $regiones;
        }


        ###### GETTERS && SETTERS
        /**
         * @return mixed
         */
        public function getIdRegion()
        {
            return $this->idRegion;
        }

        /**
         * @param mixed $idRegion
         */
        public function setIdRegion($idRegion)
        {
            $this->idRegion = $idRegion;
        }

        /**
         * @return mixed
         */
        public function getRegNombre()
        {
            return $this->regNombre;
        }

        /**
         * @param mixed $regNombre
         */
        public function setRegNombre($regNombre)
        {
            $this->regNombre = $regNombre;
        }

    }