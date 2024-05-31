<?php
    require_once '../backend/services/PagosService.php';

    class PagoController {
        private $pagoService;

        public function __construct() {
            $db = (new Database())->getConnection();
            $this->pagoService = new PagoService($db);
        }

        public function registrarPago() {

        
            $rentaId = $_POST['ren_id'];
            $monto = $_POST['monto'];
            $fecha = $_POST['fecha'];
            $PagoRenta = $_POST['renta'];
            $PagoRetardo = $_POST['retardo'];
            $PagoTotal = $_POST['total'];   

            $pagoNuevo = new Pago($rentaId, $monto, $fecha,$PagoRenta, $PagoRetardo, $PagoTotal);

            $resultado = $this->pagoService->registrarPago($pagoNuevo);

            if ($resultado) {
                echo json_encode(array("success" => true, "message" => "Pago Registrado Satisfactoriamente"));
            } else {
                echo json_encode(array("success" => false, "message" => "Error al registrar usuario"));
            }
        }
    }
?>