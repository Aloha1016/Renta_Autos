<?php
    require_once '../backend/models/Autos.php';
    require_once '../backend/db/Database.php';
    require_once '../backend/interfaces/AutosInterface.php';

    class AutosService implements AutosInterface {
        private $db;

        public function __construct ($db) {
            $this->db = $db;
        }

        public function obtenerTodosAutos() {
            $sql = "SELECT * FROM automoviles";
            $result = $this->db->query($sql);
            $autos = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $autos[] = $row;
                }
            }

            return $autos;
        }


        public function obtenerAutoPorId($id) {
            $sql = "SELECT * FROM automoviles WHERE Aut_Id='$id'";
            $result = $this->db->query($sql);
            if ($result->num_rows == 1) {
                return $result->fetch_assoc();
            }
            return null;
        }

        public function obtenerAUTOPorMarca($marca) {
            $sql = "SELECT * FROM automoviles WHERE Aut_Marca='$marca'";
            $result = $this->db->query($sql);
            if ($result->num_rows == 1) {
                return $result->fetch_assoc();
            }
            return null;
        }
    }
?>