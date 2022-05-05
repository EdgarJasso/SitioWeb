<?php 
//datos db
$host = "localhost";
$db = "sitio";
$usuario = "root";
$contrasenia = "";
try {
    $conexion = new PDO("mysql:host=$host;dbname=$db", $usuario, $contrasenia);
    if ($conexion) {
        echo "conextado... al sistema.<br>";
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>
