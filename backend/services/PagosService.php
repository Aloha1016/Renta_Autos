<?php
    require_once '../backend/models/pago.php';
    require_once '../backend/db/Database.php';
    require_once '../backend/interfaces/PagoInterface.php';

    class PagoService implements PagoInterface {
        private $db;

        public function __construct ($db) {
            $this->db = $db;
        }

        public function registrarPago($pago) {
            $this->rentaId = $rentaId;
            $this->monto = $monto;
            $this->fecha = $fecha;
            $this->pagoRenta = $pagoRenta;
            $this->pagoRetardo = $pagoRetardo;
            $this->pagoTotal = $pagoTotal;

            $sql_insertar = "INSERT INTO pagos ( Pago_Ren_Id, Pago_Monto, Pago_Fecha, 
            Pago_Renta, Pago_Retardo, Pago_Total) 
            VALUES ('$rentaId', '$monto', '$fecha',
            '$pagoRenta','$pagoRetardo','$pagoTotal')";
            
            if ($this->db->query($sql_insertar) === TRUE) {
                return true;
            } else {
                return false;
            }
        }
    }
?>