<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "rootroot"; //<---- Poner contraseña de MySQL
$dbname = "biblioteca_escolar";

// Si se ha enviado el formulario de actualización
if (isset($_POST['submit_update'])) {
    // Crear conexión
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    mysqli_set_charset($conn, "utf8");
    
    // Verificar la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
    
    // Recuperar datos del formulario
    $id = $_POST['id_prestamo'];
    $id_estudiante = $_POST['id_estudiante'];
    $id_libro = $_POST['id_libro'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_devolucion = $_POST['fecha_devolucion'];
    $devuelto = $_POST['devuelto'];
    
    // Preparar y ejecutar la consulta de actualización
    $sql = "UPDATE prestamos SET 
            id_estudiante = '$id_estudiante', 
            id_libro = '$id_libro', 
            fecha_prestamo = '$fecha_prestamo', 
            fecha_devolucion = '$fecha_devolucion', 
            devuelto = '$devuelto'
            WHERE id_prestamo = '$id'";
    
    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<p style='color: green;'>Prestamo modificado con éxito.</p>";
        } else {
            echo "<p style='color: orange;'>No se realizaron cambios o no se encontró el ID.</p>";
        }
    } else {
        echo "<p style='color: red;'>Error al modificar el prestamo: " . mysqli_error($conn) . "</p>";
    }
    
    // Cerrar la conexión
    mysqli_close($conn);
}

// Si se busca un prestamo para actualizar
$prestamo = null;
if (isset($_POST['submit_search'])) {
    // Crear conexión
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    mysqli_set_charset($conn, "utf8");
    
    // Verificar la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
    
    // Recuperar ID a buscar
    $id_buscar = $_POST['id_buscar'];
    
    // Preparar consulta para buscar el prestamo
    $sql = "SELECT * FROM prestamos WHERE id_prestamo = '$id_buscar'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $prestamo = mysqli_fetch_assoc($result);
    } else {
        echo "<p style='color: orange;'>No se encontró ningún prestamo con ese ID.</p>";
    }
    
    // Cerrar la conexión
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Prestamo</title>
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
        <h2>Actualizar Prestamo</h2>
        
        <!-- Formulario para buscar prestamo -->
        <h3>Buscar prestamo por ID</h3>
        <form method="post">
            <label for="id_buscar">ID del prestamo:</label>
            <input type="text" name="id_buscar" required><br><br>
            
            <input type="submit" name="submit_search" value="Buscar">
        </form>
        
        <hr>
        
        <!-- Formulario para actualizar prestamo -->
        <?php if ($prestamo): ?>
        <h3>Editar Prestamo</h3>
        <form method="post">
            <input type="hidden" name="id_prestamo" value="<?php echo $prestamo['id_prestamo']; ?>">
            
            <label for="id_estudiante">ID Estudiante:</label>
            <input type="text" name="id_estudiante" value="<?php echo $prestamo['id_estudiante']; ?>" required><br><br>
            
            <label for="id_libro">ID Libro:</label>
        <input type="text" name="id_libro" value="<?php echo $prestamo['id_libro']; ?>" required><br><br>
            
            <label for="fecha_prestamo">Fecha Inicio Prestamo:</label>
            <input type="datetime-local" name="fecha_prestamo" value="<?php echo $prestamo['fecha_prestamo']; ?>" required><br><br>

            <label for="fecha_devolucion">Fecha Fin Prestamo:</label>
            <input type="datetime-local" name="fecha_devolucion" value="<?php echo $prestamo['fecha_devolucion']; ?>" required><br><br>
            
            <label for="devuelto">Devuelto:</label>
            <select name="devuelto">
                <option value="1" <?php if ($prestamo['devuelto'] == 1) echo 'selected'; ?>>Sí</option>
                
                <option value="0" <?php if ($prestamo['devuelto'] == 0) echo 'selected'; ?>>No</option>
            </select>
            
            <input type="submit" name="submit_update" value="Actualizar">
        </form>
        <?php endif; ?>
    </div>
</body>
</html>