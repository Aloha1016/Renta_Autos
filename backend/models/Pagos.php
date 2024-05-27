<?php
    class User {
        private $id;
        private $rentaId;
        private $monto;
        private $fecha;
        private $PagoRenta;
        private $PagoRetardo;
        private $PagoTotal;

        // Creacion del Constructor de la Clase
        public function __construct ($rentaId, $monto, $fecha,$PagoRenta, $PagoRetardo,$PagoTotal) {
            $this->rentaId = $rentaId;
            $this->monto = $monto;
            $this->fecha = $fecha;
            $this->pagoRenta = $pagoRenta;
            $this->pagoRetardo = $pagoRetardo;
            $this->pagoTotal = $pagoTotal;
        }

        // Getters y Setters para cada una de las propiedades
        public function getId () {
            return $this->id;
        }

        public function setId ($id) {
            $this->id = $id;
        }

        public function getRentaId () {
            return $this->rentaId;
        }

        public function setRentaId ($rentaId) {
            $this->rentaId = $rentaId;
        }

        public function getMonto () {
            return $this->monto;
        }

        public function setMonto ($monto) {
            $this->monto = $monto;
        }

        public function getFecha () {
            return $this->fecha;
        }

        public function setFecha ($fecha) {
            $this->fecha = $fecha;
        }
        public function getPagoRenta () {
            return $this->pagoRenta;
        }

        public function setPagoRenta ($pagoRenta) {
            $this->pagoRenta = $pagoRenta;
        }
        public function getPagoRetardo () {
            return $this->pagoRetardo;
        }

        public function setPagoRetardo ($pagoRetardo) {
            $this->pagoRetardo = $pagoRetardo;   
        }

        public function getPagoTotal () {
            return $this->pagoTotal;
        }

        public function setPagoTotal ($pagoTotal) {
            $this->pagoTotal = $pagoTotal;
        }

    }
?>