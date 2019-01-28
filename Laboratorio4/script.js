/*Hecho por Ricardo Antonio Vázquez Rodríguez A01209245*/

/*1:
Entrada: un número pedido con un prompt. Salida: Una tabla con los números del
1 al número dado con sus cuadrados y cubos. Utiliza document.write para
producir la salida */

function programa1(){
    var text="<table border="3" cellspacing="8"> ";
    document.write("Programa 1 <br><br>");
    var numerText = prompt("Enter a Value","5");
    var n = parseInt(numerText);
    text=text+"<tr><th> Numero </th>"+"<th>Cuadrado</th>"+"<th>Cubo</th></tr>";

    for (var i = 1; i <= n; i++) {
        text=text+"<tr><td>"+i+"</td>";
        text=text+"<td>" + i*i + "</td>";
        text=text+"<td>" + i*i*i + "</td></tr>";
    }   
    text+="</table>"
    document.getElementById("prueba1").innerHTML=text;
}

function tony(){
    document.getElementById("ok").innerHTML=text;
}

/* 2:
Entrada: Usando un prompt se pide el resultado de la suma de 2 números
generados de manera aleatoria. Salida: La página debe indicar si el
resultado fue correcto o incorrecto, y el tiempo que tardó el usuario
en escribir la respuesta. */

function suma(){
    var num1=Math.floor(Math.random() * 100);
    var num2=Math.floor(Math.random() * 100);

    var ans=num1+num2;
    var time1 = performance.now();
    var answer = prompt(num1+" + "+num2,"5");
    var time2 = performance.now();
    var n = parseInt(answer);
    if(n==ans){
      //document.write("Correcto");
      //document.write("El usuaro tardó"+(time2-time1)+" milisegundos");
      document.getElementById("prueba2").innerHTML ="Correcto"+"El usuaro tardó"+(time2-time1)+" milisegundos.";
    }else{
      //document.write("Incorrecto");
      //document.write("El usuaro tardó"+(time2-time1)+" milisegundos");
      document.getElementById("prueba2").innerHTML ="Incorrecto"+"El usuaro tardó"+(time2-time1)+" milisegundos.";
    }
}


/* 3:
Función: contador. Parámetros: Un arreglo de números. Regresa: La cantidad
de números negativos en el arreglo, la cantidad de 0's, y la cantidad de
valores mayores a 0 en el arreglo */

function programa3(){
    var arrayNumbers = crearArreglo();
    var arrayAnswer = contador(arrayNumbers);
    alert(""+ arrayNumbers);
    alert("Cantidad de números negativos en el arreglo:  " + arrayAnswer[0]);
    alert("La cantidad de 0's:  " + arrayAnswer[1]);
    alert("Cantidad de valores mayores a 0 en el arreglo:  "+ arrayAnswer[2]);
}

function crearArreglo(){
    var array=new Array(10);
    var a;
    for(var i=0;i<10;i++){
        a= Math.floor(Math.random() * 200)-100;
        array[i]=a;
    }
    return array;
}

function contador(array) {
    var i;

    var arrayAnswer = [0,0,0];
    for(i in array){
        if(array[i]<0){
            arrayAnswer[0]++;
        }
        if(array[i]==0){
            arrayAnswer[1]++;
        }
        if(array[i]>0){
            arrayAnswer[2]++;
        }
    }
    return arrayAnswer;
}


/* 4:
Función: promedios. Parámetros: Un arreglo de arreglos de números. Regresa:
Un arreglo con los promedios de cada uno de los renglones de la matriz. */

function programa4(){
    var matrix = crearMatriz();
    var proms = promedios(matrix);
}

function crearMatriz(){
    var matrix = [];
    for(var i=0;i<3;i++){
        matrix[i]=crearArreglo();

    }
    return matrix;
}

function crearArreglo(){
    var array=new Array(3);
    var a;
    for(var i=0;i<3;i++){
        a= Math.floor(Math.random() * 100);
        array[i]=a;
    }
    return array;
}

function promedios(matriz) {
    var l=3;//matriz.length;
    var prom=Array(3);
    var acum=0;
    var text="";
    var promedioAux=0;

    for(var i=0;i<3;i++){

        for(var j=0;j<3;j++){
            acum=acum+parseInt(matriz[i][j]);
        }
        promedioAux=acum/3;
        prom[i]=promedioAux;
        text=text+"\nEn el renglon numero "+i+" el promedio es: "+ prom[i] + ", de los datos: "+ matriz[i]+"\n";
    }
    alert(text);
    return prom;
}




/* 5:
Función: inverso. Parámetros: Un número. Regresa: El número con sus
dígitos en orden inverso. */

function inverso(n) {
    var i=0;
    var digito;

    while(n>0){
        digito = n % 10; //obtiene ultimo digito
        i = (i * 10) + digito ;//Se recorren las unidades y se agrega el ditio
        n=parseInt(n/10); //Se elimina el ultimo digito
    }
    return i;
}

function programa5(){
    alert("Numbero invertido: " + inverso( +prompt("Ingresa un numero a invertir")));
}
/* 6:
Crea una solución para un problema de tu elección (puede ser algo relacionado
con tus intereses, alguna problemática que hayas identificado en algún ámbito,
un problema de programación que hayas resuelto en otro lenguaje, un problema
de la ACM, entre otros). El problema debe estar descrito en un documento HTML,
 y la solución implementada en JavaScript, utilizando al menos la creación de
 un objeto, el objeto además de su constructor deben tener al menos 2 métodos.
Muestra los resultados en el documento HTML. */

class Person{
    constructor(coins, xPosition, yPosition){
        this.xPosition=xPosition;
        this.yPosition=yPosition;
        this.coins=coins;
    }
    moveUp(){
        this.xPosition+=1;
    }
    moveRight(){
        this.yPosition+=1;
    }
    pay(){
        this.coins+=1;
    }
}

function programa6(){
    var numerOfMoves;
    numerOfMoves=prompt("Ingresa un numero de movimientos");
    var move=new Array(numerOfMoves);
    move=prompt("Ingresa el array");
    const fafa= new Person(0,0,0);

    for(var i=0;i<numerOfMoves;i++){
        if(move.charAt(i)=="R"){
           fafa.moveRight();
        }
        if(move.charAt(i)=="U"){
           fafa.moveUp();
        }
        var x=fafa.xPosition;
        var y=fafa.yPosition;
        if(x!=0&&y!=0&&x==y){
           if(move.charAt(i)==move.charAt(i+1)){
              fafa.pay();
           }
        }
    }
    alert(""+fafa.coins);
}

