<?php
try {
    $conector = new PDO("mysql:dbname=miproyecto;host=127.0.0.1","root","");
    echo "conexion exitosa";
}catch (Exception $ex){
    echo "Fallo la conexion".$ex->getMessage();
}
?>