<?php
include_once('../../conexion.php');
include_once('../modelos/materias.php');

//crear el objeto;

$mate = new Materia();

//definir argumentos;

$Materia = $_POST['txtMateria'];


$mate->addMate($Materia);




?>