<?php
include_once('../../conexion.php');
include_once('../modelos/estudiante.php');

//crear el objeto;

$Est = new Estudiante();

//definir argumentos;

$NombreEst = $_POST['txtNombre'];
$ApellidoEst = $_POST['txtApellido'];
$DocumentoEst = $_POST['txtDocumento'];
$CorreoEst = $_POST['txtCorreo'];
$MateriaEst = $_POST['txtmateria'];
$DocenteEst = $_POST['txtdocente'];
$PromedioEst = $_POST['txtNota'];
$fecha = $_POST['txtFecha'];

$Est->addEst($NombreEst,$ApellidoEst,$DocumentoEst,$CorreoEst,$MateriaEst,$DocenteEst,$PromedioEst,$fecha);




?>