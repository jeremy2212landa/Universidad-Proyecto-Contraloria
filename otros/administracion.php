<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Coordinacion de capacitacion</title>
    <link rel="stylesheet" href="../css/administracion.css">
</head>
<body>
    <div class="contenedor-form">
        <div class="toggle">
            <span> Salir</span>
        </div>

        <div class="formulario">
            <h2>Administracion y Ayuda</h2>
            <form action="administracion.php">
                <input type="text" placeholder="Nombre" required>
                <input type="text" placeholder="Apellido" required>

                <input type="password" placeholder="Contraseña" required>

                <input type="email" placeholder="Correo Electronico" required>

                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>
