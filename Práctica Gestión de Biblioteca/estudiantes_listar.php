<HTML LANG="es">
<HEAD>
</HEAD>
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
   <H1>Consulta de Estudiantes</H1>

   <?PHP

      // Conectar con el servidor de base de datos
         $conexion = mysqli_connect ("localhost", "root", "rootroot") //<---- poner contraseña MySQL
            or die ("No se puede conectar con el servidor");
      // Seleccionar base de datos : Use
         mysqli_select_db ($conexion,"biblioteca_escolar")
            or die ("No se puede seleccionar la base de datos");
      // Enviar consulta
         $instruccion = "select * from estudiantes";
         $consulta = mysqli_query ($conexion,$instruccion)
            or die ("Fallo en la consulta");
      // Mostrar resultados de la consulta
         $nfilas = mysqli_num_rows ($consulta);
         if ($nfilas > 0)
         {
            print ("<TABLE style=' width: 100%; text-align: center; border-collapse: collapse;'>\n");
            print ("<TR>\n");
            print ("<TH  style='border-right: 1px solid black; padding: 10px;'>ID Estudiante</TH>\n");
            print ("<TH  style='border-right: 1px solid black; padding: 10px;'>Password</TH>\n");
            print ("<TH  style='border-right: 1px solid black; padding: 10px;'>Nombre</TH>\n");
            print ("<TH  style='border-right: 1px solid black; padding: 10px;'>Apellidos</TH>\n");
            print ("<TH  style='border-right: 1px solid black; padding: 10px;'>Código Estudiante</TH>\n");
            print ("<TH  style='border-right: 1px solid black; padding: 10px;'>Curso</TH>\n");
            print ("<TH  style='border-right: 1px solid black; padding: 10px;'>Teléfono</TH>\n");
         
            print ("</TR>\n");
         for ($i=0; $i<$nfilas; $i++)
            {
               $resultado = mysqli_fetch_array ($consulta);
               print ("<TR>\n");
               print ("<TD  style='border-right: 1px solid black; padding: 5px;'>" . $resultado[0] . "</TD>\n");
            print ("<TD  style='border-right: 1px solid black; padding: 5px;'>" . $resultado['password'] . "</TD>\n");
               print ("<TD  style='border-right: 1px solid black; padding: 5px;'>" . $resultado['nombre'] . "</TD>\n");
               print ("<TD  style='border-right: 1px solid black; padding: 5px;'>" . $resultado['apellidos'] . "</TD>\n");
               print ("<TD  style='border-right: 1px solid black; padding: 5px;'>" . $resultado['codigo_estudiante'] . "</TD>\n");
               print ("<TD  style='border-right: 1px solid black; padding: 5px;'>" . $resultado['curso'] . "</TD>\n");
               print ("<TD  style='border-right: 1px solid black; padding: 5px;'>" . $resultado['telefono'] . "</TD>\n");

               
               print ("</TR>\n");
            }
         

            print ("</TABLE>\n");
         }
         else
            print ("No hay estudiantes disponibles");

   // Cerrar 
   mysqli_close ($conexion);

   ?>
   </div>
</BODY>
</HTML>
