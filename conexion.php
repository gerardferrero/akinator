<?php

$mysql_host = "localhost";
$mysql_usuario = "root"; 
$mysql_password = "123";
$mysql_bd = "jamonator";



$enlace = mysqli_connect($mysql_host,$mysql_usuario,$mysql_password,$mysql_bd);

/* comprobar la conexión*/
if(mysqli_connect_errno()){
    printf("Falló la conexión. Código de error: %s\n",mysqli_connect_errno());
    exit();
}

/* Para que se vea con codificación de caracteres UTF8*/
mysqli_set_charset($enlace,'utf8');

?>