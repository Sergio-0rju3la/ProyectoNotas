<?php
include_once('../../conexion.php');
include_once('../modelos/materia.php');

//crear el objeto;

$mate = new Materia();

//definir argumentos;

$Materia = $_POST['txtMateria'];


$mate->addDoce($Materia);




?>