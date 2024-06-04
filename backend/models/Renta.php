<?php
    class Renta {
        private $id;
        private $usu_id;
        private $aut_id;
        private $fecha_renta;
        private $fecha_devolucion;
        private $estado;
        private $total;
       

        // Creacion del Constructor de la Clase
        public function __construct ($usu_id, $aut_id, $fecha_renta,$fecha_devolucion, $estado, $total) {
            $this->usu_id = $usu_id;
            $this->aut_id = $aut_id;
            $this->fecha_renta = $fecha_renta;
            $this->fecha_devolucion = $fecha_devolucion;
            $this->estado = $estado;
            $this->total = $total;
        }

        // Getters y Setters para cada una de las propiedades
        public function getId () {
            return $this->id;
        }

        public function setId ($id) {
            $this->id = $id;
        }

        public function getUsuId () {
            return $this->usu_id;
        }

        public function setUsuId ($usu_id) {
            $this->usu_id = $usu_id;
        }

        public function getAutId () {
            return $this->aut_id;
        }

        public function setAutId ($aut_id) {
            $this->aut_id = $aut_id;
        }

        public function getFechaRenta () {
            return $this->fecha_renta;
        }

        public function setFechaRenta ($fecha_renta) {
            $this->fecha_renta = $fecha_renta;
        }
        public function getFechaDevolucion () {
            return $this->fecha_devolucion;
        }

        public function setFechaDevolucion ($fecha_devolucion) {
            $this->fecha_devolucion = $fecha_devolucion;
        }
       
        public function getEstado () {
            return $this->estado;
        }

        public function setEstado ($estado) {
            $this->estado = $estado;
        }

        public function getTotal () {
            return $this->total;
        }

        public function setTotal ($total) {
            $this->total = $total;
        }
    }
?>