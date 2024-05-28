<?php
require_once 'controllers/UserController.php';
require_once 'controllers/AutosController.php';

$userController = new UserController();
$autoController = new AutoController();

switch ($_SERVER["REQUEST_METHOD"]) {
    case 'POST':
        $accion = htmlspecialchars($_POST['accion'], ENT_QUOTES, 'UTF-8');
        switch ($accion) {
            case 'registrar':
                $userController->registrar();
                break;
            case 'login':
                $userController->login();
                break;
            case 'actualizar':
                $idUser = filter_input(INPUT_POST, 'idUpdate', FILTER_VALIDATE_INT);
                if ($idUser) {
                    $userController->obtenerUsuarioPorId($idUser);
                } 
                break;
            case 'borrar':
                $idUser = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
                if ($idUser) {
                    $userController->borrarusuario($idUser);
                } 
                break;
            case 'actualizarUsuario':
                $idUser = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
                if ($idUser) {
                    $userController->actualizarUsuario($idUser);
                } 
                break;
        }
        break;

    case 'GET':
        $accion = htmlspecialchars($_GET['accion'], ENT_QUOTES, 'UTF-8');
        switch ($accion) {
            case 'todos':
                $userController->obtenerTodosUsuarios();
                break;
            case 'getAllAutos':
                $autoController->obtenerTodosAutos();
                break;
            case 'getAutoById':
                $idAuto = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
                if ($idAuto) {
                    $autoController->obtenerAutoPorId($idAuto);
                } 
                break;
        }
}
?>
