<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Empleado</title>
    <link rel="stylesheet" href="styles.css"> <!-- Asegúrate de que la ruta sea correcta -->
</head>
<body>
    <h1>Registrar Nuevo Empleado</h1>
    <form action="guardar_empleado.php" method="post">
        <label for="codigo">Código:</label>
        <input type="text" name="codigo" id="codigo" required/><br>
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required/><br>
        
        <label for="estado">Estado:</label>
        <select name="estado" id="estado" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select><br>
        
        <button type="submit">Guardar</button>
    </form>
</body>
</html>

