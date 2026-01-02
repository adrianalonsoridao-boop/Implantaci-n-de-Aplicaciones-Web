<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "rootroot"; //<---- Poner contraseña de MySQL
$dbname = "biblioteca_escolar";

// Si se ha enviado el formulario
if (isset($_POST['submit'])) {
    // Crear conexión
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Verificar la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
    
    // Recuperar datos del formulario
    $ides = $_POST['ides'];
    $idli = $_POST['idli'];
    $fechap = $_POST['fechap'];
    $fechad = $_POST['fechad'];
    $devu = 0;

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO prestamos (id_estudiante, id_libro, fecha_prestamo, fecha_devolucion, devuelto) 
            VALUES ('$ides', '$idli', '$fechap', '$fechad', '$devu')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<p style='color: green;'>Prestamo registrado con éxito.</p>";
    } else {
        echo "<p style='color: red;'>Error al registrar prestamo: " . mysqli_error($conn) . "</p>";
    }
    
    // Cerrar la conexión
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar libro</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>📚 Gestión de Biblioteca</h1>
            <nav class="main-menu">
                <a href="index.php">Inicio</a>
                <a href="libros.html">Libros</a>
                <a href="estudiantes.html">Estudiantes</a>
                <a href="prestamos.html">Préstamos</a>
            </nav>
        </header>
        <h2>Registrar Prestamo</h2>
        
        <form method="post">
            <label for="ides">ID del estudiante:</label>
            <input type="text" name="ides" required><br><br>
            
            <label for="idli">ID del libro:</label>
            <input type="text" name="idli" required><br><br>
            
            <label for="fechap">Fecha prestamo:</label>
            <input type="datetime-local" name="fechap" required><br><br>
            
            <label for="fechad">Fecha devolución:</label>
            <input type="datetime-local" name="fechad"><br><br>

            <input type="submit" name="submit" value="Insertar">
        </form>
    </div>
</body>
</html>