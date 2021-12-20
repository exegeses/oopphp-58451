<?php

    class Region
    {
        use Validacion;
        private $idRegion;
        private $regNombre;

        public function listarRegiones()
        {
            $link = Conexion::conectar();
            $sql  = "SELECT idRegion, regNombre
                        FROM regiones";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $regiones = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $regiones;
        }

        private function cargarDesdeArray( $arr )
        {
            $this->setIdRegion($arr['idRegion']);
            $this->setRegNombre($arr['regNombre']);
        }

        public function verRegionPorId()
        {
            $idRegion = $_GET['idRegion'];
            $link = Conexion::conectar();
            $sql  = "SELECT idRegion, regNombre
                        FROM regiones
                        WHERE idRegion = :id";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':id', $idRegion, PDO::PARAM_INT);
            $stmt->execute();
            $region = $stmt->fetch(PDO::FETCH_ASSOC);
            //registramos valores de los atributos
            /*$this->setIdRegion($region['idRegion']);
            $this->setRegNombre($region['regNombre']);*/
            $this->cargarDesdeArray( $region );
            return $this;
        }

        public function agregarRegion()
        {
            $regNombre = $_POST['regNombre'];
            $this->validar(
                            [
                                'regNombre'=>[ 'required|min:3|max:30' ]
                            ]
                        );
            $link = Conexion::conectar();
            $sql = "INSERT INTO regiones
                            ( regNombre )
                        VALUE
                            ( :regNombre )";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':regNombre', $regNombre, PDO::PARAM_STR);
            try{
                $stmt->execute();
                //registramos atributos
                $this->setIdRegion( $link->lastInsertId() );
                $this->setRegNombre( $regNombre );
                return $this;
            }catch ( PDOException $e ){
                /*
                 * log de excepciones
                echo date('d/m/Y H:i:s');
                echo $e->getMessage();
                echo $e->getFile();
                echo $e->getLine();*/
                return false;
            }
        }
        
        public function modificarRegion()
        {
            $regNombre = $_POST['regNombre'];
            $idRegion  = $_POST['idRegion'];
            $link = Conexion::conectar();
            $sql  = "UPDATE regiones 
                        SET regNombre = :regNombre
                        WHERE idRegion = :id";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':regNombre', $regNombre, PDO::PARAM_STR);
            $stmt->bindParam(':id', $idRegion, PDO::PARAM_INT);
            try{
                $stmt->execute();
                $this->setRegNombre( $regNombre );
                $this->setIdRegion( $idRegion );
                return $this;
            }catch ( PDOException $e ){
                /*
                 * log de excepciones
                echo date('d/m/Y H:i:s');
                echo $e->getMessage();
                echo $e->getFile();
                echo $e->getLine();*/
                return false;
            }

        }

        private function verificarDestino()
        {
            $idRegion = $_GET['idRegion'];
            $link = Conexion::conectar();
            $sql = "SELECT 1 
                        FROM destinos 
                        WHERE idRegion = :idRegion";
            try{
                $stmt = $link->prepare($sql);
                $stmt->bindParam(':idRegion', $idRegion , PDO::PARAM_INT);
                $stmt->execute();
                $cantidad = $stmt->rowCount();
                return $cantidad;
            }catch ( PDOException $e ){
                /*
                 * log de excepciones
                */
                $fh = fopen('logs/errores.log', 'a+');
                $mensaje = "\n" . date('d/m/Y H:i:s'). "\n";
                $mensaje .= $e->getMessage(). "\n";
                $mensaje .= 'Archivo: '. $e->getFile(). "\n";
                $mensaje .= 'Línea nro: '.$e->getLine(). "\n\n\r";
                fwrite($fh, $mensaje);
                fclose($fh);
                //redirección
            }
        }

        public function confirmarBaja()
        {
            $this->verRegionPorId();
            $cantidad = $this->verificarDestino();
            return $cantidad;
        }

        public function eliminarRegion()
        {
            $idRegion = $_POST['idRegion'];
            $link = Conexion::conectar();
            $sql = "DELETE FROM regiones
                        WHERE idRegion = :idRegion";
            /*$sql = "UPDATE regiones
                        SET activo = 0
                        WHERE idRegion = :idRegion";*/
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':idRegion', $idRegion, PDO::PARAM_INT);
            try{
                $stmt->execute();
                return $this;
            }catch ( PDOException $e ){
                /*
                 * log de excepciones
                echo date('d/m/Y H:i:s');
                echo $e->getMessage();
                echo $e->getFile();
                echo $e->getLine();*/
                return false;
            }

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