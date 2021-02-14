<?php
    session_start();
?>

<?php
//CONECTAMOS CON LA BD
require 'conexion.php';

//RECUPERAMOS LOS DATOS
$nodo = $_POST['nodo'];
$nombre = $_POST['nombre'];
$nombreAnt = $_POST['nombreAnt'];
$caracteristicas = $_POST['caracteristicas'];
$imagen = $_SESSION["imagen"];

/*
echo "Nodo:" . $nodo;
echo "<br>";
echo "Nombre: " . $nombre;
echo "<br>";
echo "Características: " . $caracteristicas;
echo "<br>";
echo "Nombre anterior: " .$nombreAnt;
*/

// NUEVOS NODOS
$numHijoI = $nodo * 2;
$numHijoD = $nodo * 2+1;

//TEXTOS
$nombreHijoI = $nombre;
$nombreHijoD = $nombreAnt;

//PREGUNTA
$pregunta = $caracteristicas;



//GUARDAMOS LA INFORMACIÓN EN LA BD
$consulta = "INSERT INTO arbol (nodo,texto,pregunta) VALUES(".$numHijoI." ,  '".$nombreHijoI."',FALSE)";
mysqli_query($enlace,$consulta);
//echo $consulta . "<br>";
$consulta = "INSERT INTO arbol (nodo,texto,pregunta,imagen) VALUES(".$numHijoD." ,  '".$nombreHijoD."',FALSE,'" . $imagen . "')";
mysqli_query($enlace,$consulta);
//echo $consulta . "<br>";
$consulta = "UPDATE arbol SET texto = '".$pregunta."', pregunta = TRUE,imagen=NULL WHERE nodo = ".$nodo;
mysqli_query($enlace,$consulta); 
//echo $consulta;


//VOLVER
header("Location:index.php")

?>
