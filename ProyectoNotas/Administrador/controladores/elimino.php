<?php
include_once('../../conexion.php');
include_once('../modelos/administrador.php');

//crear el objeto;

$admin4 = new Administrador();
$ID=$_POST['ID'];

$admin4->deletead($ID);


?>