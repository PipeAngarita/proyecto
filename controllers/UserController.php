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
            if (isset($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['estatura'], $_POST['nombre_mascota'], $_POST['peso'], $_POST['raza'])) {
           
            $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
            $estatura = isset($_POST['estatura']) ? $_POST['estatura'] : '';
            $nombre =  isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $nombre_mascota =   isset($_POST['nombre_mascota']) ? $_POST['nombre_mascota'] : '';
            $peso = isset($_POST['peso']) ? $_POST['peso'] : '';
            $raza = isset($_POST['raza']) ? $_POST['raza'] : '';
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';

            $sql = "INSERT INTO usuario (correo, estatura, nombre, nombre_mascota, peso, raza, telefono)
                    VALUES ('$correo', '$estatura', '$nombre', '$nombre_mascota', '$peso', '$raza', '$telefono')";

            if ($this->conn->query($sql) === TRUE) {
                echo "Datos insertados correctamente";
            } else {
                echo "Error al insertar datos: " . $this->conn->error;
            }

            }
        } else {
            echo "Algo pasó";
        }
    }
}
?>
