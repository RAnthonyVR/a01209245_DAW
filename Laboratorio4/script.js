/*Hecho por Ricardo Antonio Vázquez Rodríguez A01209245*/

/*1:
Entrada: un número pedido con un prompt. Salida: Una tabla con los números del
1 al número dado con sus cuadrados y cubos. Utiliza document.write para
producir la salida */

function tablaCuadradosCubos(){
    var numerText = prompt("Ingrese la cantidad de respuestas deseadas: ","5");
    var n = parseInt(numerText);
    var text="";
    text=text+"<tr>"+"<th> Número </th>"+"<th>Cuadrado</th>"+"<th>Cubo</th></tr>"+"</tr>";

    for (var i = 0; i < n; i++) {
        text=text+"<tr><td>"+i+"</td>"+"<td>" + i*i + "</td>"+"<td>" + i*i*i + "</td></tr>";
    }
    text=text+"<table border=1>"+text+"</table>";
    document.write(""+text);
    document.write('<br><br><a href="index.html"> Regresar a la página principal</a>');
}

function sumaConContador(){
    var num1=Math.floor(Math.random() * 100);
    var num2=Math.floor(Math.random() * 100);
    var ans=num1+num2;
    var time1 = performance.now();
    var answer = prompt(num1+" + "+num2,"5");
    var time2 = performance.now();
    var n = parseInt(answer);
    if(n==ans){
        document.write("Correcto! "+"El usuaro tardó: "+(time2-time1)/1000+" segundos.");
    }else{
        document.write("Incorrecto! "+"El usuaro tardó: "+(time2-time1)/1000+" segundos.");
    }document.write('<br><br><a href="index.html"> Regresar a la página principal</a>');

}

function cantidadesEnArray(){
    var arrayNumbers = crearArreglo();
    var arrayAnswer = contador(arrayNumbers);
    document.write(""+ arrayNumbers+"<br>");
    document.write("Cantidad de números negativos en el arreglo:  " + arrayAnswer[0]+"<br>");
    document.write("La cantidad de 0's:  " + arrayAnswer[1]+"<br>");
    document.write("Cantidad de valores mayores a 0 en el arreglo:  "+ arrayAnswer[2]+"<br>");
    document.write('<br><br><a href="index.html"> Regresar a la página principal</a>');

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

function promediosMatriz(){
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
        text=text+"<br>"+"En el renglon numero "+i+" el promedio es: "+ prom[i] + ", de los datos: "+ matriz[i]+"<br>";
    }
        document.write(text);
        document.write('<br><br><a href="index.html"> Regresar a la página principal</a>');
        return prom;
}

/* 5: Función: inverso. Parámetros: Un número. Regresa: El número con sus dígitos en orden inverso. */

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
function invertirNumero(){
    document.write("Numbero invertido: " + inverso( +prompt("Ingresa un numero a invertir")));
    document.write('<br><br><a href="index.html"> Regresar a la página principal</a>');
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

function problemaACM(){
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
    document.write(""+fafa.coins);
    document.write('<br><br><a href="index.html"> Regresar a la página principal</a>');

}
