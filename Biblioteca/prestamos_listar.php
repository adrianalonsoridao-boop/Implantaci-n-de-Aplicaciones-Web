<HTML LANG="es">
<HEAD>
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
    <div class="content">
<H1>Consulta de Prestamos</H1>

<?PHP

   // Conectar con el servidor de base de datos
      $conexion = mysqli_connect ("localhost", "root", "rootroot")//<--- Poner contraseña MySQL
	      or die ("No se puede conectar con el servidor");
   // Seleccionar base de datos : Use
      mysqli_select_db ($conexion,"biblioteca_escolar")
         or die ("No se puede seleccionar la base de datos");
   // Enviar consulta
      $instruccion = "select * from prestamos";
      $consulta = mysqli_query ($conexion,$instruccion)
         or die ("Fallo en la consulta");
   // Mostrar resultados de la consulta
      $nfilas = mysqli_num_rows ($consulta);
      if ($nfilas > 0)
      {
         print ("<TABLE style='width: 100%; text-align: center; border-collapse: collapse;'>\n");
         print ("<TR>\n");
         print ("<TH  style='border-right: 1px solid black;'>ID Prestamo</TH>\n");
         print ("<TH  style='border-right: 1px solid black;'>ID Estudiante</TH>\n");
         print ("<TH  style='border-right: 1px solid black;'>ID Libro</TH>\n");
         print ("<TH  style='border-right: 1px solid black;'>Fecha Inicio Prestamo</TH>\n");
         print ("<TH  style='border-right: 1px solid black;'>Fecha Fin Prestamo</TH>\n");
         print ("<TH  style='border-right: 1px solid black;'>Devuelto</TH>\n");
        
         print ("</TR>\n");
		 for ($i=0; $i<$nfilas; $i++)
         {
            $resultado = mysqli_fetch_array ($consulta);
            print ("<TR>\n");
            print ("<TD  style='border-right: 1px solid black;'>" . $resultado[0] . "</TD>\n");
			print ("<TD  style='border-right: 1px solid black;'>" . $resultado['id_estudiante'] . "</TD>\n");
            print ("<TD  style='border-right: 1px solid black;'>" . $resultado['id_libro'] . "</TD>\n");
            print ("<TD  style='border-right: 1px solid black;'>" . $resultado['fecha_prestamo'] . "</TD>\n");
            print ("<TD  style='border-right: 1px solid black;'>" . $resultado['fecha_devolucion'] . "</TD>\n");
            print ("<TD  style='border-right: 1px solid black;'>" . $resultado['devuelto'] . "</TD>\n");

            
            print ("</TR>\n");
         }
        

         print ("</TABLE>\n");
      }
      else
         print ("No hay prestamos disponibles");

// Cerrar 
mysqli_close ($conexion);

?>
</div>
</div>

</BODY>
</HTML>