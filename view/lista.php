<?php
// Simulación de datos de empleados previamente guardados
$empleados = [
    ['codigo' => 1, 'nombre' => 'Juan Pérez', 'estado' => 'Activo'],
    ['codigo' => 2, 'nombre' => 'Ana Gómez', 'estado' => 'Inactivo'],
    ['codigo' => 3, 'nombre' => 'Luis Martínez', 'estado' => 'Activo'],
    ['codigo' => 4, 'nombre' => 'Abner Poz', 'estado' => 'Activo'],
    ['codigo' => 5, 'nombre' => 'Gloria Cortez', 'estado' => 'inactivo'],
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Empleados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;  
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a, button {
            display: inline-block;
            margin: 5px;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        .edit-btn {
            background-color: #ffc107;
            color: white;
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
        }
        .back-btn {
            background-color: #6c757d;
            color: white;
        }
        .action-btns {
            display: flex;
            gap: 10px;
        }
        a:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h1>Lista de Empleados</h1>
    <table>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($empleados as $empleado): ?>
            <tr>
                <td><?php echo htmlspecialchars($empleado['codigo']); ?></td>
                <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
                <td><?php echo htmlspecialchars($empleado['estado']); ?></td>
                <td class="action-btns">
                    <!-- Botón Editar -->
                    <a href="emp_Captura.php?editar=<?php echo $empleado['codigo']; ?>" class="edit-btn">Editar</a>
                    <!-- Botón Eliminar -->
                    <a href="emp_Lista.php?eliminar=<?php echo $empleado['codigo']; ?>" class="delete-btn">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <!-- Botón Regresar a la página principal -->
    <a href="Files/index.php" class="button">Regresar</a>
</body>
</html>
