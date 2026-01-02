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
    
    // Recuperar ID a eliminar
    $id_libro = $_POST['id_libro'];
    
    // Preparar y ejecutar la consulta de eliminación
    $sql = "DELETE FROM libros WHERE id_libro = '$id_libro'";
    
    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<p style='color: green;'>Libro eliminado con éxito.</p>";
        } else {
            echo "<p style='color: orange;'>No se encontró ningun libro con ese ID.</p>";
        }
    } else {
        echo "<p style='color: red;'>Error al eliminar libro: " . mysqli_error($conn) . "</p>";
    }
    
    // Cerrar la conexión
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Libro por ID</title>
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
        <h2>Eliminar Libro por ID</h2>
        
        <form method="post">
            <label for="id">ID del Libro a Eliminar:</label>
            <input type="text" name="id_libro" required><br><br>
            
            <input type="submit" name="submit" value="Eliminar">
        </form>
    </div>
</body>
</html>