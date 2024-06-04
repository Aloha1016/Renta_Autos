<?php
    require_once '../backend/models/pagos.php';
    require_once '../backend/db/Database.php';
    require_once '../backend/interfaces/PagosInterface.php';

    class PagoService implements PagoInterface {
        private $db;

        public function __construct ($db) {
            $this->db = $db;
        }

        public function registrarPago($pago) {

            $rentaId = $pago->getRentaId();
            $monto = $pago->getMonto();
            $fecha = $pago->getFecha();
            $PagoRenta = $pago->getPagoRenta();
            $PagoRetardo = $pago->getPagoRetardo();
            $PagoTotal = $pago->getPagoTotal();

            $sql_insertar = "INSERT INTO pagos ( Pago_Ren_Id, Pago_Monto, Pago_Fecha, 
            Pago_Renta, Pago_Retardo, Pago_Total) 
            VALUES ('$rentaId', '$monto', '$fecha',
            '$PagoRenta','$PagoRetardo','$PagoTotal')";
            
            if ($this->db->query($sql_insertar) === TRUE) {
                return true;
            } else {
                return false;
            }
        }
    }
?>