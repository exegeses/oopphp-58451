<?php

     class Cuenta
     {
         private $titular;
         private $nroCuenta;

         /**
          * @param $titular
          * @param $nroCuenta
          */
         public function __construct($titular, $nroCuenta)
         {
             $this->titular = $titular;
             $this->nroCuenta = $nroCuenta;
         }


         /**
          * @return mixed
          */
         public function getTitular()
         {
             return $this->titular;
         }

         /**
          * @param mixed $titular
          */
         public function setTitular($titular)
         {
             $this->titular = $titular;
         }

         /**
          * @return mixed
          */
         public function getNroCuenta()
         {
             return $this->nroCuenta;
         }

         /**
          * @param mixed $nroCuenta
          */
         public function setNroCuenta($nroCuenta)
         {
             $this->nroCuenta = $nroCuenta;
         }

     }