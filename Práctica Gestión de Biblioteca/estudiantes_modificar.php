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
    $id = $_POST['id_estudiante'];
    $password = $_POST['password'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $codigo_estudiante = $_POST['codigo_estudiante'];
    $curso = $_POST['curso'];
    $telefono = $_POST['telefono'];
    
    // Preparar y ejecutar la consulta de actualización
    $sql = "UPDATE estudiantes SET 
            password = '$password', 
            nombre = '$nombre', 
            apellidos = '$apellidos', 
            codigo_estudiante = '$codigo_estudiante', 
            curso = '$curso',
            telefono = '$telefono'
            WHERE id_estudiante = '$id'";
    
    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<p style='color: green;'>Estudiante modificado con éxito.</p>";
        } else {
            echo "<p style='color: orange;'>No se realizaron cambios o no se encontró el ID.</p>";
        }
    } else {
        echo "<p style='color: red;'>Error al modificar el estudiante: " . mysqli_error($conn) . "</p>";
    }
    
    // Cerrar la conexión
    mysqli_close($conn);
}

// Si se busca un estudiante para actualizar
$estudiante = null;
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
    
    // Preparar consulta para buscar al estudiante
    $sql = "SELECT * FROM estudiantes WHERE id_estudiante = '$id_buscar'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $estudiante = mysqli_fetch_assoc($result);
    } else {
        echo "<p style='color: orange;'>No se encontró ningún estudiante con ese ID.</p>";
    }
    
    // Cerrar la conexión
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Estudiante</title>
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
        <h2>Actualizar Estudiante</h2>
        
        <!-- Formulario para buscar estudiante -->
        <h3>Buscar estudiante por ID</h3>
        <form method="post">
            <label for="id_buscar">ID del estudiante:</label>
            <input type="text" name="id_buscar" required><br><br>
            
            <input type="submit" name="submit_search" value="Buscar">
        </form>
        
        <hr>
        
        <!-- Formulario para actualizar estudiante -->
        <?php if ($estudiante): ?>
        <h3>Editar Estudiante</h3>
        <form method="post">
            <input type="hidden" name="id_estudiante" value="<?php echo $estudiante['id_estudiante']; ?>">
            
            <label for="password">Password:</label>
            <input type="text" name="password" value="<?php echo $estudiante['password']; ?>" required><br><br>
            
            <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $estudiante['nombre']; ?>" required><br><br>
            
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" value="<?php echo $estudiante['apellidos']; ?>" required><br><br>

            <label for="codigo_estudiante">Codigo Estudiante:</label>
            <input type="text" name="codigo_estudiante" value="<?php echo $estudiante['codigo_estudiante']; ?>" required><br><br>
            
            <label for="curso">Curso:</label>
            <input type="text" name="curso" value="<?php echo $estudiante['curso']; ?>"><br><br>
            
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" value="<?php echo $estudiante['telefono']; ?>"><br><br>
            
            <input type="submit" name="submit_update" value="Actualizar">
        </form>
        <?php endif; ?>
    </div>
</body>
</html>