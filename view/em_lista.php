<?php
require_once '../dao/devuelveempleados.php';
$empleadoDAO = new EmpleadoDAO();

// Si se ha enviado el formulario para agregar un empleado
if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];
    $empleadoDAO->insertarEmpleado($nombre, $estado);
}

$empleados = $empleadoDAO->obtenerEmpleados();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Empleados</title>
</head>
<body>
    <h1>Lista de Empleados</h1>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Estado</th>
        </tr>
        <?php foreach ($empleados as $empleado): ?>
            <tr>
                <td><?php echo $empleado['codigo']; ?></td>
                <td><?php echo $empleado['nombre']; ?></td>
                <td><?php echo $empleado['estado']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="emp_Captura.php">Agregar Nuevo Empleado</a>
</body>
</html>
