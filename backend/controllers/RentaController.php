<?php
    require_once '../backend/services/RentaService.php';

    class RentaController {
        private $rentaService;

        public function __construct() {
            $db = (new Database())->getConnection();
            $this->rentaService = new RentaService($db);
        }

        public function registrarRenta() {

            $usu_id = $_POST['usu_id'];
            $aut_id = $_POST['aut_id'];
            $fecha_renta = $_POST['fecha_renta'];
            $estado = $_POST['estado'];
            $fecha_devolucion = $_POST['fecha_devolucion'];
            

            $rentaNueva = new Renta($usu_id, $aut_id, $fecha_renta, $fecha_devolucion, $estado);

            $resultado = $this->rentaService->registrarRenta($rentaNueva);

            if ($resultado) {
                echo json_encode(array("success" => true, "message" => "Renta Registrada Satisfactoriamente"));
            } else {
                echo json_encode(array("success" => false, "message" => "Error al registrar renta"));
            }
        }

        public function obtenerTodasRentas () {
            $renta = $this->rentaService->obtenerTodasRentas ();
            if($renta){
                echo json_encode(array("success" => true, "users" => $renta));
            }else{
                echo json_encode(array("success" => false, "message" => "Error al obtener usuarios"));
            }
        }


        public function obtenerRentaPorId($idUser){
            $resultado=$this->rentaService->obtenerRentaPorId($idUser);
            if($resultado){
                echo json_encode(array("success" => true, "user" => $resultado));
            }else{
                echo json_encode(array("success" => false, "message" => "error al obtener rentas del usuario"));

            }
        }

        public function obtenerRentasActivas($idUser){
            $resultado=$this->rentaService->obtenerRentasActivas($idUser);
            if($resultado){
                echo json_encode(array("success" => true, "user" => $resultado));
            }else{
                echo json_encode(array("success" => false, "message" => "error al obtener rentas activas"));

            }
        }
    }
?>