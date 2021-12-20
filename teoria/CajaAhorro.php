<?php

    class CajaAhorro extends Cuenta
    {

        use Balanceo;
        private $saldo;


        public function __construct($titular, $nroCuenta, $saldo)
        {
            parent::__construct( $titular, $nroCuenta );
            $this->saldo = $saldo;
        }


        public function comprar()
        {
            echo $this->getTitular(), '<br>';
            echo 'realizar compra y descontar saldo <br>';
            echo 'Saldo actual: ', $this->saldo;
            $this->balancear();
        }

        /**
         * @return mixed
         */
        public function getSaldo()
        {
            return $this->saldo;
        }

        /**
         * @param mixed $saldo
         */
        public function setSaldo($saldo)
        {
            $this->saldo = $saldo;
        }

    }