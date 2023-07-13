<?php
include_once('../../conexion.php');
include_once('../modelos/estudiante.php');

//crear el objeto;

$estu = new Estudiante();

//definir argumentos;

$NombreEst = $_POST['txtNombreEst'];
$ApellidoEst = $_POST['txtApellidoEst'];
$DocumentoEst = $_POST['txtDocumentoEst'];
$CorreoEst = $_POST['txtCorreoEst'];
$MateriaEst = $_POST['txtMateriaEst'];
$DocenteEst = $_POST['txtDocenteEst'];
$PromedioEst = $_POST['txtPromedioEst'];
$fecha = $_POST['txtFechaEst'];

$estu->addEst($NombreEst,$ApellidoEst,$DocumentoEst,$CorreoEst,$MateriaEst,$DocenteEst,$PromedioEst,$fecha);




?>