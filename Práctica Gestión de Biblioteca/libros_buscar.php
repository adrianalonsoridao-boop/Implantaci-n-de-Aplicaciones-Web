<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Libros</title>
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
        <h2>Buscar Libros</h2>
        
        <form method="post">
            <label for="busqueda">Buscar libro por ID:</label>
            <input type="text" name="busqueda" required><br><br>
            
            <input type="submit" name="submit" value="Buscar">
        </form>
        <?php
            // Configuración de la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "rootroot"; //<---- Poner contraseña de MySQL
            $dbname = "biblioteca_escolar";

            // Si se ha enviado el formulario de búsqueda
            if (isset($_POST['submit'])) {
                // Crear conexión
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                
                // Verificar la conexión
                if (!$conn) {
                    die("Conexión fallida: " . mysqli_connect_error());
                }
                
                // Recuperar término de búsqueda
                $busqueda = $_POST['busqueda'];
                
                // Preparar consulta de búsqueda
                $sql = "SELECT * FROM libros 
                        WHERE id_libro = $busqueda";
                
                $result = mysqli_query($conn, $sql);
                
                if (!$result) {
                    echo "<p style='color: red;'>Error en la búsqueda: " . mysqli_error($conn) . "</p>";
                } else {
                    echo "<h3>Resultados de la búsqueda:</h3>";
                    
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table style=' width: 100%; text-align: center; border-collapse: collapse;'>";
                        echo "<tr><th  style='border-right: 1px solid black; padding: 10px;'>ID</th><th  style='border-right: 1px solid black; padding: 10px;'>Título</th><th  style='border-right: 1px solid black; padding: 10px;'>Autor</th><th  style='border-right: 1px solid black; padding: 10px;'>Editorial</th><th  style='border-right: 1px solid black; padding: 10px;'>ISBN</th><th  style='border-right: 1px solid black; padding: 10px;'>Año Publicación</th><th  style='border-right: 1px solid black; padding: 10px;'>Disponible</th><th  style='border-right: 1px solid black; padding: 10px;'>Portada</th></tr>";
                        
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td  style='border-right: 1px solid black; padding: 5px;'>" . $row['id_libro'] . "</td>";
                            echo "<td  style='border-right: 1px solid black; padding: 5px;'>" . $row['titulo'] . "</td>";
                            echo "<td  style='border-right: 1px solid black; padding: 5px;'>" . $row['autor'] . "</td>";
                            echo "<td  style='border-right: 1px solid black; padding: 5px;'>" . $row['editorial'] . "</td>";
                            echo "<td  style='border-right: 1px solid black; padding: 5px;'>" . $row['isbn'] . "</td>";
                            echo "<td  style='border-right: 1px solid black; padding: 5px;'>" . $row['año_publicacion'] . "</td>";
                            echo "<td  style='border-right: 1px solid black; padding: 5px;'>" . $row['disponible'] . "</td>";
                            echo "<td  style='border-right: 1px solid black; padding: 5px;'>" . $row['portada'] . "</td>";
                            echo "</tr>";
                        }
                        
                        echo "</table>";
                    } else {
                        echo "<p>No se encontraron resultados.</p>";
                    }
                }
                
                // Cerrar la conexión
                mysqli_close($conn);
            }
        ?>
    </div>
</body>
</html>