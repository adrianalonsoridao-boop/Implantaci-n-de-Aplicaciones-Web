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
   <H1>Consulta de Libros</H1>

   <?PHP

      // Conectar con el servidor de base de datos
         $conexion = mysqli_connect ("localhost", "root", "rootroot")//<--- Poner contraseña MySQL
            or die ("No se puede conectar con el servidor");
      // Seleccionar base de datos : Use
         mysqli_select_db ($conexion,"biblioteca_escolar")
            or die ("No se puede seleccionar la base de datos");
      // Enviar consulta
         $instruccion = "select * from libros";
         $consulta = mysqli_query ($conexion,$instruccion)
            or die ("Fallo en la consulta");
      // Mostrar resultados de la consulta
         $nfilas = mysqli_num_rows ($consulta);
         if ($nfilas > 0)
         {
            print ("<TABLE style=' width: 100%; text-align: center; border-collapse: collapse;'>\n");
            print ("<TR>\n");
            print ("<TH  style='border-right: 1px solid black; padding: 10px;'>ID Libro</TH>\n");
            print ("<TH  style='border-right: 1px solid black; padding: 10px;'>Título</TH>\n");
            print ("<TH  style='border-right: 1px solid black; padding: 10px;'>Autor</TH>\n");
            print ("<TH  style='border-right: 1px solid black; padding: 10px;'>Editorial</TH>\n");
            print ("<TH  style='border-right: 1px solid black; padding: 10px;'>ISBN</TH>\n");
            print ("<TH  style='border-right: 1px solid black; padding: 10px;'>Año de Publicaicón</TH>\n");
            print ("<TH  style='border-right: 1px solid black; padding: 10px;'>Disponibilidad</TH>\n");
            print ("<TH  style='border-right: 1px solid black; padding: 10px;'>Portada</TH>\n");
         
            print ("</TR>\n");
         for ($i=0; $i<$nfilas; $i++)
            {
               $resultado = mysqli_fetch_array ($consulta);
               print ("<TR>\n");
               print ("<TD  style='border-right: 1px solid black; padding: 5px;'>" . $resultado[0] . "</TD>\n");
            print ("<TD  style='border-right: 1px solid black; padding: 5px;'>" . $resultado['titulo'] . "</TD>\n");
               print ("<TD  style='border-right: 1px solid black; padding: 5px;'>" . $resultado['autor'] . "</TD>\n");
               print ("<TD  style='border-right: 1px solid black; padding: 5px;'>" . $resultado['editorial'] . "</TD>\n");
               print ("<TD  style='border-right: 1px solid black; padding: 5px;'>" . $resultado['isbn'] . "</TD>\n");
               print ("<TD  style='border-right: 1px solid black; padding: 5px;'>" . $resultado['año_publicacion'] . "</TD>\n");
               print ("<TD  style='border-right: 1px solid black; padding: 5px;'>" . $resultado['disponible'] . "</TD>\n");
               print ("<TD  style='border-right: 1px solid black; padding: 5px;'>" . $resultado['portada'] . "</TD>\n");

               
               print ("</TR>\n");
            }
         

            print ("</TABLE>\n");
         }
         else
            print ("No hay libros disponibles");

   // Cerrar 
   mysqli_close ($conexion);

   ?>
   </div>
</BODY>
</HTML>