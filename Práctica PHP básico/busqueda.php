<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nombreBuscado = $_POST['nombre_busqueda'];
        $archivo = 'contactos.txt';
        $file = fopen($archivo, 'r');
        $encontrado = false;

         while(!feof($file)){
            $linea = trim(fgets($file));
            if(!empty($linea)){
                $partes = explode(' ', $linea);
                if(strcmp($nombreBuscado, $partes[1])==0){
                    echo $linea . "<br>";
                    $encontrado = true;
                }
            }
        }
        fclose($file);
        if(!$encontrado){
            echo "No se encontró el contacto $nombreBuscado";
        }
    ?>
</body>
</html>