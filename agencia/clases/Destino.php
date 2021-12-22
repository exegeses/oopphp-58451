<?php

    class Destino
    {
        private $idDestino;
        private $destNombre;
        private $idRegion;
        static  $regNombre;
        private $destPrecio;
        private $destAsientos;
        private $destDisponibles;
        private $destActivo;

        ##################################################
        #### CRUD de destinos
        public function listarDestinos()
        {
            $link = Conexion::conectar();
            $sql  =  "SELECT idDestino,
                            destNombre,
                            d.idRegion,
                            regNombre,
                            destPrecio,
                            destAsientos,
                            destDisponibles
                        FROM destinos d, regiones r
                        WHERE d.idRegion = r.idRegion";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $destinos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $destinos;
        }

        public function agregarDestino()
        {
            $destNombre = $_POST['destNombre'];
            $idRegion = $_POST['idRegion'];
            $destPrecio = $_POST['destPrecio'];
            $destAsientos = $_POST['destAsientos'];
            $destDisponibles = $_POST['destDisponibles'];
            $link = Conexion::conectar();
            $sql = "INSERT INTO destinos
                          ( destNombre, idRegion, destPrecio, destAsientos, destDisponibles )
                        VALUE 
                          ( :destNombre, :idRegion, :destPrecio, :destAsientos, :destDisponibles )";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':destNombre', $destNombre, PDO::PARAM_STR);
            $stmt->bindParam(':idRegion', $idRegion, PDO::PARAM_INT);
            $stmt->bindParam(':destPrecio', $destPrecio, PDO::PARAM_INT);
            $stmt->bindParam(':destAsientos', $destAsientos, PDO::PARAM_INT);
            $stmt->bindParam(':destDisponibles', $destDisponibles, PDO::PARAM_INT);
            if( $stmt->execute() ){
                //registramos atributos
                $this->setIdDestino( $link->lastInsertId() );
                $this->setDestNombre( $destNombre );
                $this->setIdRegion( $idRegion );
                $this->setDestPrecio( $destPrecio );
                $this->setDestAsientos( $destAsientos );
                $this->setDestDisponibles( $destDisponibles );
                $this->setDestActivo(1);//default
                return $this;
            }
            return false;
        }

        private function cargarDatosDesdeArray( $arr )
        {
            $this->setIdDestino( $arr['idDestino'] );
            $this->setDestNombre( $arr['destNombre'] );
            $this->setIdRegion( $arr['idRegion'] );
            self::setRegNombre( $arr['regNombre'] );
            $this->setDestPrecio( $arr['destPrecio'] );
            $this->setDestAsientos( $arr['destAsientos'] );
            $this->setDestDisponibles( $arr['destDisponibles'] );
            $this->setDestActivo( 1 );
        }

        public function verDestinoPorID()
        {
            $idDestino = $_GET['idDestino'];
            $link = Conexion::conectar();
            $sql  =  "SELECT idDestino,
                            destNombre,
                            d.idRegion,
                            regNombre,
                            destPrecio,
                            destAsientos,
                            destDisponibles
                        FROM destinos d, regiones r
                        WHERE d.idRegion = r.idRegion
                          AND idDestino = :idDestino";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':idDestino', $idDestino, PDO::PARAM_INT);
            $stmt->execute();
            $destino = $stmt->fetch(PDO::FETCH_ASSOC);
            //registrar todos los atributos del objeto
            $this->cargarDatosDesdeArray( $destino );
            return $this;
        }
        
        /**
         * @return mixed
         */
        public function getIdDestino()
        {
            return $this->idDestino;
        }

        /**
         * @param mixed $idDestino
         */
        public function setIdDestino($idDestino): void
        {
            $this->idDestino = $idDestino;
        }

        /**
         * @return mixed
         */
        public function getDestNombre()
        {
            return $this->destNombre;
        }

        /**
         * @param mixed $destNombre
         */
        public function setDestNombre($destNombre): void
        {
            $this->destNombre = $destNombre;
        }

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
        public function setIdRegion($idRegion): void
        {
            $this->idRegion = $idRegion;
        }

        /**
         * @return mixed
         */
        public static function getRegNombre()
        {
            return self::$regNombre;
        }

        /**
         * @param mixed $regNombre
         */
        public static function setRegNombre($regNombre): void
        {
            self::$regNombre = $regNombre;
        }

        /**
         * @return mixed
         */
        public function getDestPrecio()
        {
            return $this->destPrecio;
        }

        /**
         * @param mixed $destPrecio
         */
        public function setDestPrecio($destPrecio): void
        {
            $this->destPrecio = $destPrecio;
        }

        /**
         * @return mixed
         */
        public function getDestAsientos()
        {
            return $this->destAsientos;
        }

        /**
         * @param mixed $destAsientos
         */
        public function setDestAsientos($destAsientos): void
        {
            $this->destAsientos = $destAsientos;
        }

        /**
         * @return mixed
         */
        public function getDestDisponibles()
        {
            return $this->destDisponibles;
        }

        /**
         * @param mixed $destDisponibles
         */
        public function setDestDisponibles($destDisponibles): void
        {
            $this->destDisponibles = $destDisponibles;
        }

        /**
         * @return mixed
         */
        public function getDestActivo()
        {
            return $this->destActivo;
        }

        /**
         * @param mixed $destActivo
         */
        public function setDestActivo($destActivo): void
        {
            $this->destActivo = $destActivo;
        }
    }