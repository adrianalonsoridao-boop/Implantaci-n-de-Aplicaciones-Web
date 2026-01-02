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
    $id = $_POST['id_libro'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $isbn = $_POST['isbn'];
    $publ = $_POST['publ'];
    $disp = $_POST['disp'];
    $portada = $_POST['portada'];
    
    // Preparar y ejecutar la consulta de actualización
    $sql = "UPDATE libros SET 
            titulo = '$titulo', 
            autor = '$autor', 
            editorial = '$editorial', 
            isbn = '$isbn', 
            año_publicacion = '$publ',
            disponible = '$disp',
            portada = '$portada'
            WHERE id_libro = '$id'";
    
    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<p style='color: green;'>Libro modificado con éxito.</p>";
        } else {
            echo "<p style='color: orange;'>No se realizaron cambios o no se encontró el ID.</p>";
        }
    } else {
        echo "<p style='color: red;'>Error al modificar el libro: " . mysqli_error($conn) . "</p>";
    }
    
    // Cerrar la conexión
    mysqli_close($conn);
}

// Si se busca un libro para actualizar
$libro = null;
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
    
    // Preparar consulta para buscar libro
    $sql = "SELECT * FROM libros WHERE id_libro = '$id_buscar'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $libro = mysqli_fetch_assoc($result);
    } else {
        echo "<p style='color: orange;'>No se encontró ningún libro con ese ID.</p>";
    }
    
    // Cerrar la conexión
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Libro</title>
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
        <h2>Actualizar Libro</h2>
        
        <!-- Formulario para buscar libro -->
        <h3>Buscar Libro por ID</h3>
        <form method="post">
            <label for="id_buscar">ID del libro:</label>
            <input type="text" name="id_buscar" required><br><br>
            
            <input type="submit" name="submit_search" value="Buscar">
        </form>
        
        <hr>
        
        <!-- Formulario para actualizar libro -->
        <?php if ($libro): ?>
        <h3>Editar Libro</h3>
        <form method="post">
            <input type="hidden" name="id_libro" value="<?php echo $libro['id_libro']; ?>">
            
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?php echo $libro['titulo']; ?>" required><br><br>
            
            <label for="autor">Autor:</label>
        <input type="text" name="autor" value="<?php echo $libro['autor']; ?>" required><br><br>
            
            <label for="editorial">Editorial:</label>
            <input type="text" name="editorial" value="<?php echo $libro['editorial']; ?>" required><br><br>

            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" value="<?php echo $libro['isbn']; ?>" required><br><br>
            
            <label for="publ">Año Publicación:</label>
            <input type="text" name="publ" value="<?php echo $libro['año_publicacion']; ?>"><br><br>
            
            <label for="disp">Disponibilidad:</label>
            <select name="disp">
                <option value="1" <?php if ($libro['disponible'] == 1) echo 'selected'; ?>>Sí</option>
                
                <option value="0" <?php if ($libro['disponible'] == 0) echo 'selected'; ?>>No</option>
            </select>
            <br><br>

            <label for="portada">Portada:</label>
            <input type="text" name="portada" value="<?php echo $libro['portada']; ?>"><br><br>
            
            <input type="submit" name="submit_update" value="Actualizar">
        </form>
        <?php endif; ?>
    </div>
</body>
</html>