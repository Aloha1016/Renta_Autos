<?php
    require_once '../backend/services/UserService.php';

    class UserController {
        private $userService;

        public function __construct() {
            $db = (new Database())->getConnection();
            $this->userService = new UserService($db);
        }

        public function login() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $usuario = $_POST['usuario'];
                $password = $_POST['password'];
                
                if (!empty($usuario) && !empty($password)) {
                    $user = $this->userService->login($usuario, $password);
                    if($user) {
                        // redirigir a otra pagina
                        echo json_encode(array("success" => true, "message" => "Inicio Satisfactorio"));
                    } else {
                        echo json_encode(array("success" => false, "message" => "Credenciales Incorrectas"));
                    }
                } else {
                    echo json_encode(array("success" => false, "message" => "Faltan Datos"));
                }
            } else {
                echo json_encode(array("success" => false, "message" => "Tipo de peticion incorrecta"));
            }
        }

        public function registrar() {
            $nombre = $_POST['nombre'];
            $apaterno = $_POST['apaterno'];
            $amaterno = $_POST['amaterno'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            $usuarioNuevo = new User($nombre, $apaterno, $amaterno, $direccion, $telefono, $correo, $usuario, $password);

            $resultado = $this->userService->registrarUsuario($usuarioNuevo);

            if ($resultado) {
                echo json_encode(array("success" => true, "message" => "Usuario Registrado Satisfactoriamente"));
            } else {
                echo json_encode(array("success" => false, "message" => "Error al registrar usuario"));
            }
        }
    }
?>