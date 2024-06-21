<?php
require_once 'models/User.php'; // Asegúrate de incluir la clase User

class Users {
    public function mostrarFormularioRegistro() {
        require 'views/registro.view.php';
    }

    public function mostrarFormularioLogin() {
        require 'views/login.view.php';
    }

    public function procesarRegistro() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm-password'];

            if ($password !== $confirm_password) {
                $mensaje = "Las contraseñas no coinciden.";
                require 'views/resultado.php';
                return;
            }

            $user = new User();
            $resultado = $user->crearUsuario($email, $password);

            if ($resultado) {
                header("Location: index.php?controller=Users&action=mostrarFormularioLogin");
                exit();
            } else {
                $mensaje = "Error al crear el registro.";
                require 'views/resultado.php';
            }
        }
    }

    public function procesarFormularioLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            $resultado = $user->verificarUsuario($email, $password);

            if ($resultado) {
                session_start();
                $_SESSION['email'] = $email;
                require 'views/bienvenida.php';
            } else {
                $mensaje = "Email o contraseña incorrectos.";
                require 'views/resultado.php';
            }
        }
    }

    public function mostrarLogin() {
        $this->mostrarFormularioLogin();
    }

    public function cerrarSesion() {
        session_start();
        session_destroy();
        header("Location: index.php?controller=Users&action=mostrarLogin&message=logout_success");
        // header("Location: index.php?controller=Users&action=mostrarLogin");
        exit();
    }
}
?>





