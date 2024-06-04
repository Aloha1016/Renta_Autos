<?php
    class Auto {
        private $id;
        private $marca;
        private $modelo;
        private $anio;
        private $color;
        private $costo;
        private $motor;
        private $transmision;
        private $pasajeros;
        private $disponible;
        private $comentario;



        // Creacion del Constructor de la Clase
        public function __construct ($marca, $modelo, $anio,$color, $costo,$motor,$transmision,$pasajeros,$disponible,$comentario) {
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->anio = $anio;
            $this->color = $color;
            $this->costo = $costo;
            $this->costo = $motor;
            $this->costo = $transmision;
            $this->costo = $pasajeros;
            $this->costo = $disponible;
            $this->costo = $comentario;
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

        public function getMotor () {
            return $this->motor;
        }

        public function setMotor ($motor) {
            $this->motor = $motor;
        }
        public function getTransmision () {
            return $this->transmision;
        }

        public function setTransmision ($transmision) {
            $this->transmision = $transmision;
        }
        public function getPasajeros () {
            return $this->pasajeros;
        }

        public function setPasajeros ($pasajeros) {
            $this->pasajeros = $pasajeros;
        }

        public function getDisponible () {
            return $this->disponible;
        }

        public function setDisponible ($disponible) {
            $this->disponible = $disponible;
        }
        public function getComentario () {
            return $this->comentario;
        }

        public function setComentario($comentario) {
            $this->comentario = $comentario;
        }
    }
?>