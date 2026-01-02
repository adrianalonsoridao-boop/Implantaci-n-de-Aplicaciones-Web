<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "rootroot"; //<---- Poner contraseña de MySQL
$dbname = "biblioteca_escolar";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn){
    die("Conexión fallida: " . mysqli_connect_error());
}

$sql_libros = "SELECT COUNT(*) AS total FROM libros";
$result_libros = mysqli_query($conn,$sql_libros);
$data_libros = mysqli_fetch_assoc($result_libros);
$total_libros = $data_libros['total'];

$sql_estudiantes = "SELECT COUNT(*) AS total FROM estudiantes";
$result_estudiantes = mysqli_query($conn,$sql_estudiantes);
$data_estudiantes = mysqli_fetch_assoc($result_estudiantes);
$total_estudiantes = $data_estudiantes['total'];

$sql_prestamos = "SELECT COUNT(*) AS total FROM prestamos";
$result_prestamos = mysqli_query($conn,$sql_prestamos);
$data_prestamos = mysqli_fetch_assoc($result_prestamos);
$total_prestamos = $data_prestamos['total'];

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Escolar - Inicio</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>📚 Biblioteca Escolar</h1>
            <nav class="main-menu">
                <a href="libros.html">Libros</a>
                <a href="estudiantes.html">Estudiantes</a>
                <a href="prestamos.html">Préstamos</a>
            </nav>
        </header>
        
        <main>
            <section class="welcome">
                <h2>Bienvenido al Sistema de Gestión de Biblioteca</h2>
                <p>Seleccione una categoría del menú superior para comenzar.</p>
                
                <div class="stats">
                    <div class="stat-card">
                        <h3>Libros disponibles</h3>
                        <p class="stat-number"><?php echo $total_libros; ?></p>
                    </div>
                    <div class="stat-card">
                        <h3>Estudiantes registrados</h3>
                        <p class="stat-number"><?php echo $total_estudiantes; ?></p>
                    </div>
                    <div class="stat-card">
                        <h3>Préstamos activos</h3>
                        <p class="stat-number"><?php echo $total_prestamos; ?></p>
                    </div>
                </div>
            </section>
        </main>
        
        <footer>
            <p>Sistema de Gestión de Biblioteca Escolar &copy; 2025</p>
        </footer>
    </div>
</body>
</html>