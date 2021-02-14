<html>

    <head>
        <title>Jamonator</title>
        <link rel='stylesheet' type='text/css' href='css/akinator.css'>
    </head>

    <body>
        <header>
            <h1>Jamonator</h1>
        </header>

        <main>
            <h2></h2>
            <?php
                //CONECTAMOS CON LA BD
                require 'conexion.php';
            
                $nodo = $_GET['n'];
                $respuesta = $_GET['r'];
                $nombre = $_GET['nom'];

                //echo "Nodo: " . $nodo;
                //echo "Respuesta: " . $respuesta;
            
                function formularioRespuesta($n,$p,$nom) {
                    echo "<div class='contenedorPregunta'>";
                    echo "<textarea id='nodo' name='nodo' form='formulario' style='display:none;'>" . $n . "</textarea>";
                    echo "<textarea id='nombreAnt' name='nombreAnt' form='formulario' style='display:none;'>" . $nom . "</textarea>";

                    echo "<h3>¿En quién habías pensado?</h3>";
                    echo "<textarea id='nombre' name='nombre' form='formulario' placeholder='Nombre'></textarea>";
                    echo "<h3>¿Qué tiene este personaje que no tenga " . $nom . "?</h3>";
                    echo "<textarea id='caracteristicas' name='caracteristicas' form='formulario' placeholder='Características'></textarea>";

                    echo "<form action='crear.php' id='formulario' method='POST'>";
                    echo "<button type='submit' name='enviar'>Enviar</button>";
                    echo "</form>";
                    echo "</div>";

                }

                formularioRespuesta($nodo,$respuesta,$nombre);
            ?>
        </main>



    </body>




</html>