<?php
include_once('../../conexion.php');
include_once('../modelos/materias.php');

//crear el objeto;

$admin5 = new Materia();
$IDmat=$_POST['ID'];

$admin5->deletead($IDmat);


?>