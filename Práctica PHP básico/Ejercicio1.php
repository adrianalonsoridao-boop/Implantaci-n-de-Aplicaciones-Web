<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>
<body>
    <?php
        $alto = $_POST['alto'];
        $ancho = $_POST['ancho'];

        print "Alto: $alto <br>";
        print "Ancho: $ancho <br>";
            for($i=1;$i<=$alto;$i++){
                for($j=1;$j<=$ancho;$j++){
                    print "*";
                    }
                print "<br>";
            }
    ?>
</body>
</html>