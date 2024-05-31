<?php
    interface RentaInterface {
        public function registrarRenta($renta);
        public function obtenerRentaPorId($id);
        public function obtenerRentaPorUsuario($usu_id);
        public function obtenerTodasRentas();
    }
?>