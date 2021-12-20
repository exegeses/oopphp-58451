<?php

    /**
     * Validación
     *
     * trait sencillo de PHP para validar datos.
     *
     * @author Marcos Pinardi <exegeses@gmail.com>
     * @copyright (c) 2017, Marcos Pinardi
     * @license https://github.com/exegeses/Validacion/master/LICENSE MIT License
     * @link https://github.com/exegeses/Validacion
     */
    trait Validacion
    {
        //listado de errores
        public $errors = [];

        #método de validación
        public function validar($campos){
            //print_r( $campos );
            foreach ( $campos as $nCampo=>$valor ){
                //captura de campo
                $valorCampo = $_POST[$nCampo];
                //echo $nCampo ,'=>', $valorCampo,': <br>';
                foreach ($valor as $reglas){
                    //listado de reglas
                    $reglaArr = explode('|', $reglas);

                    //llamado a metodos de validacion de dato
                    foreach ($reglaArr as $regla){
                        //echo $valorCampo,':', $regla,'<br>';
                        $this->runReglas($valorCampo, $nCampo ,$regla);
                    }
                }
            }
            //obtener errores y saber que pasó la validaci´ón
            $this->failCheck();
                //o  redirección en caso de error

        }

        private function runReglas($valorCampo, $nCampo ,$regla)
        {
            switch ($regla){
                case 'required':
                    //llamar a obligatorio
                    $this->obligatorio($valorCampo, $nCampo);
                    break;
                case 'alpha':
                    echo 'llamar a alphanumeric para '.$nCampo.'... <br>';
                    break;
                case 'int':
                    $this->esEntero($valorCampo, $nCampo);
                    break;
                case 'float':
                    echo 'llamar a float para '.$nCampo.'... <br>';
                    break;
                case 'email':
                    echo 'llamar a email para '.$nCampo.'... <br>';
                    break;
                default:
                    if (str_starts_with( $regla, 'min:')){
                        $length = substr($regla, 4);
                        $this->min($valorCampo, $nCampo, $length);
                    }
                    elseif (str_starts_with( $regla, 'max:')){
                        $length = substr($regla, 4);
                        $this->max($valorCampo, $nCampo, $length);
                    }
                    break;
            }
        }

        private function obligatorio($valorCampo, $nCampo)
        {
           if ( $valorCampo == '' || $valorCampo == null) {
                $this->errors[] = 'Campo <b>' . $nCampo . '</b> es obligatorio.';
            }
        }

        private function esEntero($valorCampo, $nCampo)
        {
            if( !filter_var($valorCampo, FILTER_VALIDATE_INT) ){
                $this->errors[] = 'Campo <b>' . $nCampo . '</b> debe ser un entero.';
            }
        }

        private function min($valorCampo, $nCampo, $length)
        {
            //if ( is_string($valorCampo) ) {
            if ( !filter_var( $valorCampo, FILTER_VALIDATE_INT ) ) {
                if ( strlen($valorCampo) < $length ) {
                    $this->errors[] = 'El valor de campo <b>' . $nCampo . '</b> debe contener al menos ' . $length . ' caractéres.';
                }
                //else{echo 'valor min ok txt <br>';}
            } else {
                if ( (int) $valorCampo < $length) {
                    $this->errors[] = 'El valor de campo <b>' . $nCampo . '</b> debe ser al menos ' . $length . '.';
                }
                //else{echo 'valor min ok nro <br>';}
            }
        }

        private function max($valorCampo, $nCampo, $length)
        {
            //if ( is_string($valorCampo) ) {
            if ( !filter_var( $valorCampo, FILTER_VALIDATE_INT ) ) {
                if ( strlen($valorCampo) > $length ) {
                    $this->errors[] = 'El valor de campo <b>' . $nCampo . '</b> debe contener ' . $length . ' caractéres como máximo.';
                }
                //else{echo 'valor max ok txt <br>';}
            } else {
                if ( (int) $valorCampo > $length) {
                    $this->errors[] = 'El valor de campo <b>' . $nCampo . '</b> debe ser ' . $length . ' como máximo.';
                }
                //else{echo 'valor mmax ok nro <br>';}
            }
        }

        public function failCheck()
        {
            //success
            if ( empty( $this->errors ) ) return true;
            //errores
            $this->getErrors();
        }

        public function getErrors()
        {
            //return $this->errors;
            /*echo '<pre>';
            print_r($this->errors);
            echo '</pre>';*/
            $_SESSION['errors'] = $this->errors;
            header('location: '.$_SERVER['HTTP_REFERER']);
        }

    }