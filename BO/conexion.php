<?php

class Conexion {
    private $serverName = "localhost"; // Cambia según tu servidor
    private $database = "nuevo_empleado"; // Nombre de tu base de datos
    private $username = "root"; // Usuario de SQL Server
    private $password = ""; // Contraseña de SQL Server
    public $conn;

    public function conectar() {
        $this->conn = null;
        try {
            // Configuración de la conexión
            $connectionInfo = array(
                "Database" => $this->database,
                "UID" => $this->username,
                "PWD" => $this->password,
                "CharacterSet" => "UTF-8"
            );
            // Intentar conectar usando sqlsrv_connect
            $this->conn = sqlsrv_connect($this->serverName, $connectionInfo);
            if ($this->conn === false) {
                // Manejo de errores de conexión
                die(print_r(sqlsrv_errors(), true));
            }
        } catch (Exception $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>
