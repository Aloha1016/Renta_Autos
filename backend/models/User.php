<?php
    class User {
        private $id;
        private $nombre;
        private $apaterno;
        private $amaterno;
        private $correo;
        private $telefono;
        private $estado;
        private $municipio;
        private $direccion;
        private $password;

        // Creacion del Constructor de la Clase
        public function __construct ($nombre, $apaterno, $amaterno,$correo, $telefono,$estado,$municipio, $direccion, $password) {
            $this->nombre = $nombre;
            $this->apaterno = $apaterno;
            $this->amaterno = $amaterno;
            $this->correo = $correo;
            $this->telefono = $telefono;
            $this->estado = $estado;
            $this->municipio = $municipio;
            $this->direccion = $direccion;
            $this->password = $password;
        }

        // Getters y Setters para cada una de las propiedades
        public function getId () {
            return $this->id;
        }

        public function setId ($id) {
            $this->id = $id;
        }

        public function getNombre () {
            return $this->nombre;
        }

        public function setNombre ($nombre) {
            $this->nombre = $nombre;
        }

        public function getApaterno () {
            return $this->apaterno;
        }

        public function setApaterno ($apaterno) {
            $this->apaterno = $apaterno;
        }

        public function getAmaterno () {
            return $this->amaterno;
        }

        public function setAmaterno ($amaterno) {
            $this->amaterno = $amaterno;
        }
        public function getCorreo () {
            return $this->correo;
        }

        public function setCorreo ($correo) {
            $this->correo = $correo;
        }
        public function getTelefono () {
            return $this->telefono;
        }

        public function setTelefono ($telefono) {
            $this->telefono = $telefono;
        }
        public function getEstado () {
            return $this->estado;
        }

        public function setEstado ($estado) {
            $this->direccion = $estado;
        }

        public function getMunicipio () {
            return $this->municipio;
        }

        public function setMunicipio ($municipio) {
            $this->direccion = $municipio;
        }

        public function getDireccion () {
            return $this->direccion;
        }

        public function setDireccion ($direccion) {
            $this->direccion = $direccion;
        }

        public function getPassword () {
            return $this->password;
        }

        public function setPassword ($password) {
            $this->password = $password;
        }
    }
?>