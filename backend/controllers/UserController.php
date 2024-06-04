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
                $correo = $_POST['correo'];
                $password = $_POST['password'];

                if (!empty($correo) && !empty($password)) {
                    $user = $this->userService->login($correo, $password);
                    if($user) {
                        // redirigir a otra pagina
                        echo json_encode(array("success" => true, "message" => "Inicio Satisfactorio", "user" => $user));
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
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $estado = $_POST['estado'];
            $municipio = $_POST['municipio'];
            $direccion = $_POST['direccion'];
            $password = $_POST['password'];
            

            $usuarioNuevo = new User($nombre, $apaterno, $amaterno, $correo, $telefono, $estado, $municipio, $direccion, $password);

            $resultado = $this->userService->registrarUsuario($usuarioNuevo);

            if ($resultado) {
                echo json_encode(array("success" => true, "message" => "Usuario Registrado Satisfactoriamente"));
            } else {
                echo json_encode(array("success" => false, "message" => "Error al registrar usuario"));
            }
        }

        public function obtenerTodosUsuarios () {
            $users = $this->userService->obtenerTodosUsuarios ();
            if($users){
                echo json_encode(array("success" => true, "users" => $users));
            }else{
                echo json_encode(array("success" => false, "message" => "Error al obtener usuarios"));
            }
        }

        public function borrarUsuario($idUser){
            $resultado=$this->userService->borrarUsuario($idUser);
            if($resultado){
                echo json_encode(array("success" => true, "message" => "usuario borrado exitosamente"));
            }else{
                echo json_encode(array("success" => false, "message" => "error al borrar el usuario"));

            }
        }

        public function obtenerUsuarioPorId($idUser){
            $resultado=$this->userService->obtenerUsuarioPorId($idUser);
            if($resultado){
                echo json_encode(array("success" => true, "user" => $resultado));
            }else{
                echo json_encode(array("success" => false, "message" => "error al borrar el usuario"));

            }
        }

        public function actualizarUsuario($idUser){

            $nombre = $_POST['nombre'];
            $apaterno = $_POST['apaterno'];
            $amaterno = $_POST['amaterno'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $estado = $_POST['estado'];
            $municipio = $_POST['municipio'];
            $direccion = $_POST['direccion'];
            $password = $_POST['password'];
            
            $usuarioNuevo = new User($nombre, $apaterno, $amaterno, $correo, $telefono, $estado, $municipio, $direccion, $password);


            $resultado = $this->userService->actualizarUsuario($idUser, $usuarioNuevo);

            if ($resultado) {
                echo json_encode(array("success" => true, "message" => "Usuario actualizado Satisfactoriamente"));
            } else {
                echo json_encode(array("success" => false, "message" => "Error al actualizar usuario"));
            }
        }
    }
?>