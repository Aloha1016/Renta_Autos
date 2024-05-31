<?php
    require_once '../backend/services/AutosService.php';

    class AutoController {
        private $autoService;

        public function __construct() {
            $db = (new Database())->getConnection();
            $this->autoService = new AutosService($db);
        }

        public function obtenerTodosAutos () {
            $autos = $this->autoService->obtenerTodosAutos ();
            if($autos){
                echo json_encode(array("success" => true, "Autos" => $autos));
            }else{
                echo json_encode(array("success" => false, "message" => "Error al obtener usuarios"));
            }
        }

        public function obtenerAutoPorId($id){
            $resultado=$this->autoService->obtenerAutoPorId($id);
            if($resultado){
                echo json_encode(array("success" => true, "Auto" => $resultado));
            }else{
                echo json_encode(array("success" => false, "message" => "error al obtener el auto"));

            }
        }

    }
?>