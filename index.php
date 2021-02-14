<?php
    session_start();
?>
<html>

    <head>
        <title>Jamonator</title>
        <link rel='stylesheet' type='text/css' href='css/akinator.css?version=4'/>
        <meta name="viewport" content="width=device-width"/>
    </head>

    <body>
        <header>
            <h1>Jamonator</h1>
        </header>

        <main>
            <!-- <h2>PREGUNTA</h2> -->



            <?php                
                //CONECTAMOS CON LA BD
                require 'conexion.php';



                //RECOGER EL NÚMERO DEL NODO DE LA URL (PARÁMETRO)
                $nodo = 1;  //valor por defecto del nodo

                if(isset($_GET['n'])) {
                    $nodo = $_GET['n'];
                }

                //CALCULAMOS LOS SIGUIENTES NODOS (SÍ-NO)
                $nodoSi = $nodo * 2;
                $nodoNo = $nodo * 2 + 1;

                //echo 'Nodo actual: '. $nodo;

                //CONSULTAMOS LA BD
                $consulta = "SELECT texto,pregunta,imagen FROM arbol WHERE nodo=" . $nodo . ";";
                $texto = '';
                $pregunta = true;
                $imagen = '';

                $resultado;

                if($resultado = mysqli_query($enlace,$consulta)){
                    if($resultado->num_rows == 0){
                        echo 'Error - el nodo no existe';
                    }


                    //RECUPERA CORRECTAMENTE LA INFORMACIÓN
                    else{
                        while($fila = mysqli_fetch_row($resultado)){
                            $texto = $fila[0];
                            $pregunta = $fila[1];
                            $imagen = $fila[2];
                        }

                        
                        //echo "Texto: " .$texto;
                        //echo "<br>";
                        //echo "Pregunta: " .$pregunta;

                        if ($pregunta == FALSE) {
                            $_SESSION["imagen"] = $imagen;
                            echo "<div class='contenedorPregunta'>";
                            echo "<h2>¿Has pensado en " . $texto . "?</h2>";
                            echo "<img src='personajes/" . $imagen . "' height=200 />";
                            echo "</div>";

                            echo "<div class='contenedorRespuestas'>";
                            echo "<a class='boton' href='index.php'>SÍ</a>";
                            echo "<a class='boton' href='respuesta.php?n=".$nodo."&r=0&nom=".$texto."'>NO</a>";
                            echo "</div>";
                        }
                        else {
                            echo "<div class='contenedorPregunta'>";
                            echo "<h2>¿Tu personaje ".$texto."?</h2>";
                            echo "</div>";
    
                            echo "<div class='contenedorRespuestas'>";
                            echo "<a class='boton' href='index.php?n=".$nodoSi."'>SÍ</a>";
                            echo "<a class='boton' href='index.php?n=".$nodoNo."'>NO</a>";
                            echo "</div>";
                        }

                    }
                }

            ?>

            
            </div>

        </main>


        <!--
        <footer>
            <a href=''>Volver a probar</a>
        </footer>
        -->


    </body>

</html>
