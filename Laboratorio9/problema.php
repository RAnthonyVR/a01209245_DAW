<?php 
    require_once("util.php");
    encabezado(); 
    

titulo("Problema ACM");

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

regresarPagina();

footer();  

?>

