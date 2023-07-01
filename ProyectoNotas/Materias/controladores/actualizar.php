<?php
include_once('../../conexion.php');
include_once('../modelos/materias.php');

//crear el objeto;

$admin3 = new Materia();

$IDmat = $_POST['ID'];

$Materia = $_POST['txtMateria'];


$admin3->updatead($IDmat,$Materia);

?>