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
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $isbn = $_POST['isbn'];
    $publ = $_POST['publ'];
    $disp = 1;
    $port = $_POST['port'];

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO libros (titulo, autor, editorial, isbn, año_publicacion, disponible, portada) 
            VALUES ('$titulo', '$autor', '$editorial', '$isbn', '$publ', '$disp', '$port')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<p style='color: green;'>Libro registrado con éxito.</p>";
    } else {
        echo "<p style='color: red;'>Error al registrar libro: " . mysqli_error($conn) . "</p>";
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
        <h2>Registrar libro</h2>
        
        <form method="post">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required><br><br>
            
            <label for="autor">Autor:</label>
            <input type="text" name="autor" required><br><br>
            
            <label for="editorial">Editorial:</label>
            <input type="text" name="editorial" required><br><br>
            
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" required><br><br>
            
            <label for="publ">Año Publicación:</label>
            <input type="text" name="publ"><br><br>
            
            <label for="port">Portada:</label>
            <input type="text" name="port"><br><br>

            <input type="submit" name="submit" value="Insertar">
        </form>
    </div>
</body>
</html>