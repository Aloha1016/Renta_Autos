<?php
    require_once '../backend/models/Renta.php';
    require_once '../backend/db/Database.php';
    require_once '../backend/interfaces/RentaInterface.php';

    class RentaService implements RentaInterface {
        private $db;

        public function __construct ($db) {
            $this->db = $db;
        }

        public function registrarRenta($renta) {

            $usu_id = $renta->getUsuId();
            $aut_id = $renta->getAutId();
            $fecha_renta = $renta->getFechaRenta();
            $fecha_devolucion = $renta->getFechaDevolucion();
            $estado = $renta->getEstado();
    
            $sql_insertar = "INSERT INTO rentas (Ren_Usu_Id, Ren_Aut_Id, Ren_Fecha_Renta, Ren_Fecha_Devolucion, 
            Ren_Estado) 
            VALUES ('$usu_id', '$aut_id', '$fecha_renta',
            '$fecha_devolucion','$estado')";
            
            if ($this->db->query($sql_insertar) === TRUE) {
                return true;
            } else {
                return false;
            }
        }

        public function obtenerTodasRentas() {
            $sql = "SELECT * FROM rentas";
            $result = $this->db->query($sql);
            $users = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $users[] = $row;
                }
            }

            return $users;
        }


        public function obtenerRentaPorId($id) {
            $sql = "SELECT * FROM rentas WHERE Ren_Id='$id'";
            $result = $this->db->query($sql);
            if ($result->num_rows == 1) {
                return $result->fetch_assoc();
            }
            return null;
        }

        public function obtenerRentaPorUsuario($usu_id) {
            $sql = "SELECT * FROM rentas WHERE Ren_Usu_Id='$usu_id'";
            $result = $this->db->query($sql);
            if ($result->num_rows == 1) {
                return $result->fetch_assoc();
            }
            return null;
        }
        public function obtenerRentasActivas($usu_id) {
            $sql = "SELECT * FROM rentas WHERE Ren_Usu_Id='$usu_id' AND Ren_Estado='Pendiente'";
            $result = $this->db->query($sql);
            if ($result->num_rows == 1) {
                return $result->fetch_assoc();
            }
            return null;
        }
    }
?>