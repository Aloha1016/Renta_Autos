<?php
    interface UserInterface {
        public function registrarUsuario($usuario);
        public function login($correo, $password);
        public function actualizarUsuario($id, $usuario);
        public function borrarUsuario($id);
        public function obtenerUsuarioPorId($id);
        public function obtenerUsuarioPorCorreo($usuario);
        public function obtenerTodosUsuarios();
    }
?>