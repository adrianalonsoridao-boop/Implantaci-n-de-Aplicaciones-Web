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
    $pass = $_POST['pass'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $codes = $_POST['codes'];
    $curso = $_POST['curso'];
    $telf = $_POST['telf'];

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO estudiantes (password, nombre, apellidos, codigo_estudiante, curso, telefono) 
            VALUES ('$pass', '$nombre', '$apellidos', '$codes', '$curso', '$telf')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<p style='color: green;'>Estudiante registrado con éxito.</p>";
    } else {
        echo "<p style='color: red;'>Error al refistrar estudiante: " . mysqli_error($conn) . "</p>";
    }
    
    // Cerrar la conexión
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar estudiante</title>
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
        <h2>Registrar estudiante</h2>
        
        <form method="post">
            <label for="pass">Password:</label>
            <input type="password" name="pass" required><br><br>
            
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required><br><br>
            
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" required><br><br>
            
            <label for="codes">Código estudiante:</label>
            <input type="text" name="codes" required><br><br>
            
            <label for="curso">Curso:</label>
            <input type="text" name="curso"><br><br>

            <label for="telf">Teléfono:</label>
            <input type="tel" name="telf"><br><br>
            
            <input type="submit" name="submit" value="Insertar">
        </form>
    </div>
</body>
</html>