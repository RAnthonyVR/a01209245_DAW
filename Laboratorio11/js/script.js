function resultados(){
    let nom = document.getElementById("nombre").value;
    let mail = document.getElementById("correo").value;
    let elect = document.getElementById("elect").value;
    let gaslp = document.getElementById("glp").value;
    let gasprop = document.getElementById("gp").value;
    let huella;
    let bandera=0;
    //primero se validan los datos
    if(!nom.match(/[a-z]/)||nom==0){
        document.getElementById("retro1").innerHTML = "Ingresa un nombre válido";
        bandera++;
    }if(!mail.match(/[@]/)||mail==0){
        document.getElementById("retro2").innerHTML = "Ingresa un correo válido";
        bandera++;
    }if(isNaN(elect)||elect==0){
        document.getElementById("retro3").innerHTML = "Ingresa número";
        bandera++;
    }if(isNaN(gaslp)||gaslp==0){
        document.getElementById("retro4").innerHTML = "Ingresa número";
        bandera++;
    }if(isNaN(gasprop)||gasprop==0){
        document.getElementById("retro5").innerHTML = "Ingresa número";
        bandera++;
    }
    
/*
            La huella media por persona en Esatdos Unidos es de 16.49 toneladas.
            
            181 g de CO2/kWh
            2,96 kg CO2/kg de GLP genérico
            2,94 kg CO2/kg de gas propano
*/

//    let text="";

    if(bandera==0){
        /*huella=(elect*181*0.12283503255128)+(gaslp*2.96)+(gasprop*2.94);
        huella=huella/1000; //Toneladas de CO2
        text+="Hola "+nom+"! ";
        text+="Tu huella de carbono es de: ";
        text+=huella;
        text+=" toneladas de CO2 al año."
        text+="La huella media por persona en Estados Unidos es de 16.49 toneladas. La huella de carbono media mundial es de unas 4 toneladas. "
        if(huella>4){
            text+="Debido a que tu huella es alta podrias usar focos ahorradores y calentadores solares"
        }
        document.getElementById("res").innerHTML = text;
*/
    }else{
        alert("Necesitas llenar todos los campos correctamente");
    }


}




