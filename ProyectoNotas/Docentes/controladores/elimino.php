<?php
include_once('../../conexion.php');
include_once('../modelos/docente.php');

//crear el objeto;

$admin4 = new Docente();
$IDdoc=$_POST['ID'];

$admin4->deletead($IDdoc);


?>