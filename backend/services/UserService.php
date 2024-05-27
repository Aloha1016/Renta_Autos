<?php
    require_once '../backend/models/User.php';
    require_once '../backend/db/Database.php';
    require_once '../backend/interfaces/UserInterface.php';

    class UserService implements UserInterface {
        private $db;

        public function __construct ($db) {
            $this->db = $db;
        }

        public function registrarUsuario($usuario) {
            $nombre = $usuario->getNombre();
            $apaterno = $usuario->getApaterno();
            $amaterno = $usuario->getAmaterno();
            $estado = $usuario->getEstado();
            $municipio = $usuario->getMunicipio();
            $correo = $usuario->getCorreo();
            $telefono = $usuario->getTelefono();
            $direccion = $usuario->getDireccion();
            $password = password_hash($usuario->getPassword(), PASSWORD_DEFAULT);

            $sql_insertar = "INSERT INTO usuarios (Usu_Id, Usu_Nombre, Usu_Apellido_Paterno, Usu_Apellido_Materno, 
            Usu_Correo, Usu_Telefono, Usu_Estado, Usu_Municipio, Usu_Direccion, Usu_Password) 
            VALUES (null, '$nombre', '$apaterno', '$amaterno',
            '$correo','$telefono','$estado','$municipio','$direccion','$password')";
            
            if ($this->db->query($sql_insertar) === TRUE) {
                return true;
            } else {
                return false;
            }
        }

        public function login($correo, $password) {
            $sql_usuario = "SELECT * FROM usuarios WHERE
                Usu_Correo = '$correo'";

            $result = $this->db->query($sql_usuario);
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    return $user;
                }
            }
            return false;
        }

        public function obtenerTodosUsuarios() {
            $sql = "SELECT * FROM usuarios";
            $result = $this->db->query($sql);
            $users = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $users[] = $row;
                }
            }

            return $users;
        }

        public function actualizarUsuario ($id, $usuario) {

            $nombre = $usuario->getNombre();
            $apaterno = $usuario->getApaterno();
            $amaterno = $usuario->getAmaterno();
            $estado = $usuario->getEstado();
            $municipio = $usuario->getMunicipio();
            $correo = $usuario->getCorreo();
            $telefono = $usuario->getTelefono();
            $direccion = $usuario->getDireccion();
            
            $sql_update = "UPDATE usuarios 
                SET Usu_Nombre='$nombre',
                Usu_Apellido_Paterno='$apaterno',
                Usu_Apellido_Materno='$amaterno',
                Usu_Correo='$correo',
                Usu_Telefono='$telefono',
                Usu_Estado='$estado',
                Usu_Municipio='$municipio',
                direccion='$direccion',
                WHERE Usu_Id='$id'";

            if ($this->db->query($sql_update) === TRUE){
                return true;
            } else {
                return false;
            }
        }

        public function borrarUsuario ($id) {
            $sql_borrar = "DELETE FROM usuarios WHERE Usu_Id='$id'";
            if ($this->db->query($sql_borrar) === TRUE){
                return true;
            } else {
                return false;
            }
        }

        public function obtenerUsuarioPorId($id) {
            $sql = "SELECT * FROM usuarios WHERE Usu_Id='$id'";
            $result = $this->db->query($sql);
            if ($result->num_rows == 1) {
                return $result->fetch_assoc();
            }
            return null;
        }

        public function obtenerUsuarioPorCorreo($correo) {
            $sql = "SELECT * FROM usuarios WHERE Usu_Correo='$correo'";
            $result = $this->db->query($sql);
            if ($result->num_rows == 1) {
                return $result->fetch_assoc();
            }
            return null;
        }
    }
?>