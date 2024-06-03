<?php
    require_once '../backend/controllers/UserController.php';
    require_once '../backend/controllers/AutosController.php';
    require_once '../backend/controllers/PagosController.php';
    require_once '../backend/controllers/RentaController.php';

    $userController = new UserController();
    $autoController = new AutoController();
    $pagoController = new PagoController();
    $rentaController = new RentaController();

    switch ($_SERVER["REQUEST_METHOD"]) {
        case 'POST':
            $accion = $_POST['accion'];
            // Usuarios
            if ($accion == 'registrarUsuario') {
                $userController->registrar();
            } else if ($accion == 'login') {
                $userController->login();
            } else if ($accion == 'ObtenerUsuarioId') {
                $idUser = $_POST['id'];
                $userController->obtenerUsuarioPorId($idUser);
            } else if ($accion == 'borrar') {
                $idUser = $_POST['id'];
                $userController->borrarUsuario($idUser);
            } else if ($accion == 'actualizarUsuario') {
                $idUser = $_POST['id'];
                $userController->actualizarUsuario($idUser);
            }
            // Autos
            else if ($accion == 'ObtenerAutoId') {
                $idAuto = $_POST['id'];
                $autoController->obtenerAutoPorId($idAuto);
            }
            // Pagos
            else if ($accion == 'registrarPago') {
                $pagoController->registrarPago();
            }
            // Rentas
            else if ($accion == 'registrarRenta') {
                $rentaController->registrarRenta();
            } else if ($accion == 'obtenerRentaUsuario') {
                $idUser = $_POST['id'];
                $rentaController->obtenerRentaPorId($idUser);
            } else if ($accion == 'obtenerRentasActivas') {
                $idUser = $_POST['id'];
                $rentaController->obtenerRentasActivas($idUser);
            }
            break;

        case 'GET':
                $accion = htmlspecialchars($_GET['accion'], ENT_QUOTES, 'UTF-8');
                switch ($accion) {
                    case 'todos':
                        $userController->obtenerTodosUsuarios();
                        break;
                    case 'ObtenerAutos':
                        $autoController->obtenerTodosAutos();
                        break;
                    case 'ObtenerAutoId':
                        $idAuto = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
                        if ($idAuto) {
                            $autoController->obtenerAutoPorId($idAuto);
                        } 
                        break;
        }
    }
?>
