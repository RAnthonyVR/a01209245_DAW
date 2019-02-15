<?php include("head.html");

?>

<h1>Problema ACM</h1>
<?php

$numerOfMoves=$_POST["numMov"];
$move=$_POST["movimientos"];
$xPosition=0;
$yPosition=0;
$coins=0;

for($i=0;$i<$numerOfMoves;$i++){
        if($move{$i}=="R"){
            $yPosition+=1;
        }
        if($move{$i}=="U"){
            $xPosition+=1;
        }
        $x=$xPosition;
        $y=$yPosition;
        if($x!=0&&$y!=0&&$x==$y){
            if($move{$i}==$move{$i+1}){
                $coins+=1;
            }
        }
    }

    echo "El resultado es: " . $coins . "";
    echo '<br><br><a href="index.html"> Regresar a la página principal</a>';

?>
<a href="index.php">Volver al index</a>

<?php include("footer.html"); ?>

