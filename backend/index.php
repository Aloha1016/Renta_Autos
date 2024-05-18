<?php
    require_once '../backend/controllers/UserController.php';

    $userController = new UserController();

    switch ($_SERVER["REQUEST_METHOD"]) {
        case 'POST':
            $accion = $_POST['accion'];
            if ($accion == 'registrar') {
                $userController->registrar();
            } else if ($accion == 'login') {
                $userController->login();
            } 
        break;
    }
?>