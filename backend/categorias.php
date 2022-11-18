<?php
include '../class/autoload.php';

if(isset($_POST['accion']) && $_POST['accion'] == 'guardar'){
    $miCategoria = new Categorias();
    $miCategoria->nombre = $_POST['categoria'];
    $miCategoria->guardar();
}else if (isset($_GET['add'])){
    include 'view/categorias.html';
    die();
}
$lista_ctg = Categorias::listar();
include 'views/lista_Categorias.html';
?>