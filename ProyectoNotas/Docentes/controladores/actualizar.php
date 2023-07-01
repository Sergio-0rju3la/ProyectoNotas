<?php
include_once('../../conexion.php');
include_once('../modelos/docente.php');

//crear el objeto;

$docen = new Docente();

//definir argumentos;
$IDdoc = $_POST['ID'];
$NombreDoc = $_POST['txtNombreDoc'];
$ApellidoDoc = $_POST['txtApellidoDoc'];
$DocumentoDoc = $_POST['txtDocumentoDoc'];
$CorreoDoc = $_POST['txtCorreoDoc'];
$MateriaDoc = $_POST['txtMateriaDoc'];
$PerfilDoc = "Docente";
$EstadoDoc = $_POST['txtEstadoDoc'];

$docen->updatead($IDdoc,$NombreDoc,$ApellidoDoc,$DocumentoDoc,$CorreoDoc,$MateriaDoc,$PerfilDoc,$EstadoDoc);




?>