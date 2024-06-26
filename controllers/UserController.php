<?php

require_once 'models/Database.php';

class UserController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conn;
    }

    public function formularioBienvenida() {
        include 'views/bienvenida.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Obtener el correo y el id desde la tabla login
            $email = isset($_POST['correo']) ? $_POST['correo'] : '';

            // Consulta para obtener el id basado en el correo
            $stmt = $this->conn->prepare("SELECT id FROM login WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($id);
            $stmt->fetch();
            $stmt->close();

            if (!$id) {
                echo "Error: No se encontró el ID para el correo especificado.";
                return;
            }

            // Obtener otros datos del formulario
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
            $estatura = isset($_POST['estatura']) ? $_POST['estatura'] : '';
            $nombre_mascota = isset($_POST['nombre_mascota']) ? $_POST['nombre_mascota'] : '';
            $peso = isset($_POST['peso']) ? $_POST['peso'] : '';
            $raza = isset($_POST['raza']) ? $_POST['raza'] : '';

            // Insertar datos en la tabla usuario
            $stmtUsuario = $this->conn->prepare("INSERT INTO usuario (id, nombre, correo, telefono) VALUES (?, ?, ?, ?)");
            $stmtUsuario->bind_param("isss", $id, $nombre, $email, $telefono);
            $stmtUsuario->execute();
            $stmtUsuario->close();

            // Insertar datos en la tabla mascota
            $stmtMascota = $this->conn->prepare("INSERT INTO mascota (id, estatura, nombre_mascota, peso, raza) VALUES (?, ?, ?, ?, ?)");
            $stmtMascota->bind_param("idsss", $id, $estatura, $nombre_mascota, $peso, $raza);
            $stmtMascota->execute();
            $stmtMascota->close();

            echo "Datos insertados correctamente en las tablas usuario y mascota.";
        } else {
            echo "Algo pasó"; // Manejar la situación donde no se recibe un POST
        }
    }
}
?>