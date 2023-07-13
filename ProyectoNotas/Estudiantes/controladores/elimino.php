<?php
include_once('../../conexion.php');
include_once('../modelos/estudiante.php');

//crear el objeto;

$admin4 = new Estudiante();
$IDest=$_POST['ID'];

$admin4->deletead($IDest);


?>