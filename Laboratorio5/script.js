let password;
                let password2;
                let tamanio=false;
                let caracterEspec=false;
                let num=false;
                let letras=false;
                let validadas=false;
                let flagContValidada=0;
                    
                document.getElementById("p1").addEventListener('keyup', function() {
                    validarContraseña(document.getElementById("p1").value);
                })
                
                function validarContraseña(p) {
                    if(p.length==0){
                       tamanio=false;
                        caracterEspec=false;
                        num=false;
                        letras=false;
                        validadas=false;
                        flagContValidada=0;
                        document.getElementById("validacion").value=0;
                    }
                    if(p.length>6&&tamanio==false){
                       document.getElementById("validacion").value+=30;
                        tamanio=true;
                        flagContValidada++;
                    }if(p.match(/[a-z]/)&&letras==false){
                       document.getElementById("validacion").value+=20;
                        letras=true;
                        flagContValidada++;
                    }if(p.match(/[0-9]/)&&num==false){
                       document.getElementById("validacion").value+=20;
                        num=true;
                        flagContValidada++;
                    }if(p.match(/[!#$%<>*&?¿]/)&&caracterEspec==false){
                       document.getElementById("validacion").value+=30;
                        caracterEspec=true;
                        flagContValidada++;
                    }if(flagContValidada==4){
                        validadas=true;
                    }
                }
                    
                function compararContraseñas() {
                    password1 = document.getElementById("p1").value;
                    password2 = document.getElementById("p2").value;
                    if(password1==password2&&validadas==false){
                       document.getElementById("feedback").innerHTML = "Las contraseñas coinciden pero no son seguras";
                    }else if(password1==password2&&validadas==true){
                       document.getElementById("feedback").innerHTML = "Las contraseñas coinciden y son seguras";
                    }else{
                        document.getElementById("feedback").innerHTML = "Las contraseñas no coinciden";
                    }
                }