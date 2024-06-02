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
                    $resultado=$this->userService->obtenerUsuarioPorCorreo($correo);
                    if($user) {
                        // redirigir a otra pagina
                        echo json_encode(array("success" => true, "message" => "Inicio Satisfactorio",$resultado));
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
            $estado = $_POST['estado'];
            $municipio = $_POST['municipio'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $password = $_POST['password'];
            

            $usuarioNuevo = new User($nombre, $apaterno, $amaterno,$estado, $municipio, $direccion, $telefono, $correo, $password);

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

        public function borrarUsuario($id){
            $resultado=$this->userService->borrarUsuario($id);
            if($resultado){
                echo json_encode(array("success" => true, "message" => "usuario borrado exitosamente"));
            }else{
                echo json_encode(array("success" => false, "message" => "error al borrar el usuario"));

            }
        }

        public function obtenerUsuarioPorId($id){
            $resultado=$this->userService->obtenerUsuarioPorId($id);
            if($resultado){
                echo json_encode(array("success" => true, "user" => $resultado));
            }else{
                echo json_encode(array("success" => false, "message" => "error al borrar el usuario"));

            }
        }

        public function actualizarUsuario($id){

            $nombre = $_POST['nombre'];
            $apaterno = $_POST['apaterno'];
            $amaterno = $_POST['amaterno'];
            $estado = $_POST['estado'];
            $municipio = $_POST['municipio'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $password = $_POST['password'];

            $usuarioNuevo = new User($nombre, $apaterno, $amaterno,$estado, $municipio, $direccion, $telefono, $correo, $password);


            $resultado = $this->userService->actualizarUsuario($id,$usuarioNuevo);

            if ($resultado) {
                echo json_encode(array("success" => true, "message" => "Usuario actualizado Satisfactoriamente"));
            } else {
                echo json_encode(array("success" => false, "message" => "Error al actualizar usuario"));
            }
        }
    }
?>