<?php
    class Auto {
        private $id;
        private $marca;
        private $modelo;
        private $anio;
        private $color;
        private $costo;

        // Creacion del Constructor de la Clase
        public function __construct ($marca, $modelo, $anio,$color, $costo) {
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->anio = $anio;
            $this->color = $color;
            $this->costo = $costo;
        }
        // Getters y Setters para cada una de las propiedades
        public function getId () {
            return $this->id;
        }

        public function setId ($id) {
            $this->id = $id;
        }

        public function getMarca () {
            return $this->marca;
        }

        public function setMarca ($marca) {
            $this->marca = $marca;
        }

        public function getModelo () {
            return $this->modelo;
        }

        public function setModelo ($modelo) {
            $this->modelo = $modelo;
        }

        public function getAnio () {
            return $this->anio;
        }

        public function setAnio ($anio) {
            $this->anio = $anio;
        }
        public function getColor () {
            return $this->color;
        }

        public function setColor ($color) {
            $this->color = $color;
        }
        public function getCosto () {
            return $this->costo;
        }

        public function setCosto ($costo) {
            $this->costo = $costo;
        }
    }
?>