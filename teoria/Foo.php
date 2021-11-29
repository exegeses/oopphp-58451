<?php

    class Foo
    {
        private function __construct()
        {
            echo 'método constructor <br>';
        }
        public function publico()
        {
            echo 'método público <br>';
        }
        private function privado()
        {
            echo 'método privado <br>';
        }
        static function estatico()
        {
            echo 'método estático <br>';
        }

    }