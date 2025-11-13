<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $dado1=rand(1,6);
        $dado2=rand(1,6);
        $dado3=rand(1,6);
        $dado4=rand(1,6);
        $dado5=rand(1,6);

        $dado6=rand(1,6);
        $dado7=rand(1,6);
        $dado8=rand(1,6);
        $dado9=rand(1,6);
        $dado10=rand(1,6);
        
        print "<h1>Jugador 1</h1><br>";
        print "<p>";
        print "<img src='img/$dado1.jpg' height=140>";
        print "<img src='img/$dado2.jpg' height=140>";
        print "<img src='img/$dado3.jpg' height=140>";
        print "<img src='img/$dado4.jpg' height=140>";
        print "<img src='img/$dado5.jpg' height=140><br><br>";
        print "</p>";
        print "<h1>Jugador 2</h1><br>";
        print "<p>";
        print "<img src='img/$dado6.jpg' height=140>";
        print "<img src='img/$dado7.jpg' height=140>";
        print "<img src='img/$dado8.jpg' height=140>";
        print "<img src='img/$dado9.jpg' height=140>";
        print "<img src='img/$dado10.jpg' height=140><br><br>";
        print "</p>";

        print "<h1>Resultado</h1><br>";

        $jugador1 = $dado1 + $dado2 + $dado3 + $dado4 + $dado5;
        $jugador2 = $dado6 + $dado7 + $dado8 + $dado9 + $dado10;

        if($jugador1>$jugador2){
            print "<p>Ha ganado el jugador 1</p>";
        }
        elseif($jugador2>$jugador1){
            print "<p>Ha ganado el jugador 2</p>";
        }
        else{
            print "<p>Ha habido un empate</p>";
        }

    ?>
</body>
</html>