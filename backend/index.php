<?php
    require_once '../backend/controllers/UserController.php';
    require_once '../backend/controllers/AutosController.php';
    require_once '../backend/controllers/PagosController.php';
    require_once '../backend/controllers/RentaController.php';

    $userController = new UserController();
    $AutoController = new AutoController();
    $PagoController = new PagoController();
    $RentaController = new RentaController();

    switch ($_SERVER["REQUEST_METHOD"]) {
        case 'POST':
            $accion = $_POST['accion'];
            //Usuarios
            if ($accion == 'registrarUsuario') {
                $userController->registrar();
            } else if ($accion == 'login') {
                $userController->login();
            }else if($accion == 'ObtenerUsuarioId'){
                $idUser = $_POST['id'];
                $userController->obtenerUsuarioPorId($idUser);
            }else if ($accion == 'borrar'){
                $idUser = $_POST['id'];
                $userController->borrarusuario($idUser);
            } else if ($accion == 'actualizarUsuario'){
                $idUser=$_POST['id'];
                $userController->actualizarUsuario($idUser);
            }
            //Autos
            else if($accion == 'ObtenerAutoId'){
                $idAuto = $_POST['id'];
                $AutoController->obtenerAutoPorId($idAuto);
            }
            //Pagos
            else if ($accion == 'registrarPago') {
                $PagoController->registrarPago();
            }
            //Rentas
            else if ($accion == 'registrarRenta') {
                $RentaController->registrarRenta();
            }
            else if ($accion == 'obtenerRentaUsuario') {
                $RentaController->obtenerRentaPorId($idUser);
            }

           
        break;
        case 'GET':
            $accion = $_GET['accion'];
            if($accion == "todosUsuarios"){
                $userController->obtenerTodosUsuarios();
            }
            //Autos
            else if($accion == 'ObtenerAutos'){
                $AutoController->obtenerTodosAutos();
            }
            break;
    }
?>