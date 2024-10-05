<?php
require_once '../BO/conexion.php'; // Ajusta la ruta según tu estructura

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];

    // Conectar a la base de datos
    $conexion = new Conexion();
    $conn = $conexion->conectar();

    // Insertar datos
    $sql = "INSERT INTO empleados (codigo, nombre, estado) VALUES (?, ?, ?)";
    $stmt = sqlsrv_prepare($conn, $sql, array($codigo, $nombre, $estado));

    if (sqlsrv_execute($stmt)) {
        echo "Empleado guardado exitosamente.";
    } else {
        echo "Error al guardar el empleado: " . sqlsrv_errors();
    }

    // Cerrar la conexión
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}

// Mostrar tabla de empleados
$conexion = new Conexion();
$conn = $conexion->conectar();

$sql = "SELECT * FROM empleados";
$result = sqlsrv_query($conn, $sql);

if ($result) {
    echo "<h2>Lista de Empleados</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Código</th><th>Nombre</th><th>Estado</th></tr>";
    
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        echo "<tr><td>{$row['codigo']}</td><td>{$row['nombre']}</td><td>{$row['estado']}</td></tr>";
    }
    
    echo "</table>";
} else {
    echo "No hay empleados registrados.";
}

// Cerrar la conexión
sqlsrv_close($conn);
?>
