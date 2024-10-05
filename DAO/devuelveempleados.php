<?php
require_once 'conexion.php'; // Asegúrate de que la ruta sea correcta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];

    // Conectar a la base de datos
    $conexion = new Conexion();
    $conn = $conexion->conectar();

    // Insertar datos
    $sql = "INSERT INTO empleados (codigo, nombre, estado) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $codigo, $nombre, $estado);

    if ($stmt->execute()) {
        echo "Empleado guardado exitosamente.";
    } else {
        echo "Error al guardar el empleado: " . $conn->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}

// Mostrar tabla de empleados
$conexion = new Conexion();
$conn = $conexion->conectar();

$sql = "SELECT * FROM empleados";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de Empleados</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Código</th><th>Nombre</th><th>Estado</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['codigo']}</td><td>{$row['nombre']}</td><td>{$row['estado']}</td></tr>";
    }
    
    echo "</table>";
} else {
    echo "No hay empleados registrados.";
}

// Cerrar la conexión
$conn->close();
?>
