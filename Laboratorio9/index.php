<?php include("head.html"); ?>
<div>
        <h2>Laboratorio 9</h2>
        <div>
        <section id="preguntas">
                <h4>Preguntas</h4>
                <article>
                        <h6><strong>¿Qué hace la función phpinfo()? Describe y discute 3 datos que llamen tu atención.</strong></h6>
                    <p>Muestra como output una gran cantidad de informacion del estado o configuración actual del PHP.</p>
                    <ol>
                        <li>Los valores locales y maestros de la opcion de configuraciones.</li>
                        <li>La version de PHP que se maneja.</li>
                        <li>Información del servidos sus módulos y el ambiente. [1]</li>
                    </ol>
                    
                </article>
                <article>
                        <h6><strong>¿Qué cambios tendrías que hacer en la configuración del servidor para que pudiera ser apto en un ambiente de producción?</strong></h6>
                    <p>En lugar de usar php.ini-development usar php.ini-production.</p>
                    
                </article>
                <article>
                        <h6><strong>¿Cómo es que si el código está en un archivo con código html que se despliega del lado del cliente, se ejecuta del lado del servidor? Explica.</strong></h6>
                    <p>Se establece una petición del archivo HTML con el servidor, este después solamente es interpretado por nuestro navegador (desde el lado del cliente)</p>
                   
                </article>
            </section>
            </div>


        <div>
        <section id="ejercicios">
                <h4>Ejercicios con arreglos</h4>

                <form action= "ejercicio1.php" method="POST">
                    <h5 class="center">Calcular Promedio</h5>
                        <label>Ingrese el arreglo separado por comas y sin espacios</label>
                            <input name="arreglo" id="arreglo">
                            <br>
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar" name="Enviar">
                        <br>
                </form>

                <form action= "ejercicio2.php" method="POST">
                    <h5 class="center">Calcular Mediana</h5>
                        <label>Ingrese el arreglo separado por comas y sin espacios</label>
                            <input name="arreglo" id="arreglo">
                            <br>
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar" name="Enviar">
                        <br>
                </form>

                <form action= "ejercicio3.php" method="POST">
                    <h5 class="center">Enlistar en orden</h5>
                        <label>Ingrese el arreglo separado por comas y sin espacios</label>
                            <input name="arreglo" id="arreglo">
                            <br>
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar" name="Enviar">
                        <br>
                </form>

               	<h4>Cuadrados y cubos</h4>

                <form action="ejercicio4.php" method="POST">
                    <label>Ingrese un número</label>
                    <input name="potencia" id="potencia" type="number" value=0 >
                    <br>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Correr</button>
                    <br>
                </form>

               	<h4>Problema de CodeForces</h4>

                <form action="problema.php" method="POST">
                    <label>Ingrese el número de movimientos</label>
                    <input name="numMov" id="numMov">
                    <br>
                    <label>Ingrese los movimientos</label>
                        <input name="movimientos" id="movimientos">
                        <br>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Correr</button>
                    <br>
                    <p><strong>Descripción del problema 6:</strong> Para este problema decidí hacer la solución con objetos para un programa de ACM: <a href="http://codeforces.com/contest/935/problem/B">http://codeforces.com/contest/935/problem/B</a><br>Desciprción del problema: <br>Two neighboring kingdoms decided to build a wall between them with some gates to enable the citizens to go from one kingdom to another. Each time a citizen passes through a gate, he has to pay one silver coin.<br>The world can be represented by the first quadrant of a plane and the wall is built along the identity line (i.e. the line with the equation x = y). Any point below the wall belongs to the first kingdom while any point above the wall belongs to the second kingdom. There is a gate at any integer point on the line (i.e. at points (0, 0), (1, 1), (2, 2), ...). The wall and the gates do not belong to any of the kingdoms.<br>Fafa is at the gate at position (0, 0) and he wants to walk around in the two kingdoms. He knows the sequence S of moves he will do. This sequence is a string where each character represents a move. The two possible moves Fafa will do are 'U' (move one step up, from (x, y) to (x, y + 1)) and 'R' (move one step right, from (x, y) to (x + 1, y)).<br>Fafa wants to know the number of silver coins he needs to pay to walk around the two kingdoms following the sequence S. Note that if Fafa visits a gate without moving from one kingdom to another, he pays no silver coins. Also assume that he doesn't pay at the gate at point (0, 0), i. e. he is initially on the side he needs.</p>
                <p><strong>Input</strong><br>The first line of the input contains single integer n (1 ≤ n ≤ 105) — the number of moves in the walking sequence. The second line contains a string S of length n consisting of the characters 'U' and 'R' describing the required moves. Fafa will follow the sequence S in order from left to right.<br></p>
                <p><strong>Output</strong><br>On a single line, print one integer representing the number of silver coins Fafa needs to pay at the gates to follow the sequence S.</p>
                <p id="prueba6"></p>
                <p><strong>Examples:</strong></p>
                <table>
                    <tr>
                        <td><strong>input</strong></td>
                    </tr>
                    <tr>
                        <td>7<br>URRRUUU</td>
                    </tr>
                    <tr>
                        <td><strong>output</strong></td>
                    </tr>
                    <tr>
                        <td>2</td>
                    </tr>
                </table>
                <br>
                <table>
                    <tr>
                        <td><strong>input</strong></td>
                    </tr>
                    <tr>
                        <td>6<br>RURUUR</td>
                    </tr>
                    <tr>
                        <td><strong>output</strong></td>
                    </tr>
                    <tr>
                        <td>1</td>
                    </tr>
                </table>


            </section>
            </div>

            <section>
                <header>
                    <h2 id="Referencias"  >Referencias</h2>
                </header>
                    <p>[1] http://php.net/manual/en/function.phpinfo.php</p>
                    <p>[2] http://php.net/manual/en/migration53.ini.php</p>
                    <p>[3] http://www.adelat.org/media/docum/nuke_publico/lenguajes_del_lado_servidor_o_cliente.html</p>
                <header>
                    <h2  >Consultas de sintaxis para ejercicios</h2>
                </header>
                    <p>https://www.youtube.com/watch?v=8MzfG-Z1XtM</p>
                    <p>https://alvinalexander.com/php/php-charat-char_at-function-string</p>
                <hr>
        </section>

            

</div>
<?php include("footer.html"); ?>
