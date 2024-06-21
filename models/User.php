<?php
require_once 'database.php';

class User {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->conn;
    }

    public function crearUsuario($email, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO login (email, password) VALUES (?, ?)";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ss", $email, $hashed_password);
            $stmt->execute();

            // Verificar si se insertó correctamente
            if ($stmt->affected_rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Manejo de errores
            echo "Error al crear usuario: " . $e->getMessage();
            return false;
        } finally {
            // Siempre cerrar el statement después de usarlo
            $stmt->close();
        }
    }

    public function verificarUsuario($email, $password) {
        $sql = "SELECT password FROM login WHERE email = ?";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($hashed_password);
            $stmt->fetch();
            
            // Verificar si la contraseña coincide
            if (password_verify($password, $hashed_password)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Manejo de errores
            echo "Error al verificar usuario: " . $e->getMessage();
            return false;
        } finally {
            // Siempre cerrar el statement después de usarlo
            $stmt->close();
        }
    }
}
?>



