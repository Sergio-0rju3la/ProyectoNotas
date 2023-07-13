<?php
include_once('../../conexion.php');
include_once('../modelos/administrador.php');

//crear el objeto;

$admin3 = new Administrador();

$ID = $_POST['ID'];

$Nombre = $_POST['txtNombre'];
$Apellido = $_POST['txtApellido'];
$Usuario = $_POST['txtUsuario'];
$Passwor = $_POST['txtContra'];
$Perfil = "Administrador";
$Estado = $_POST['txtEstado'];


$admin3->updatead($ID,$Nombre,$Apellido,$Usuario,$Passwor,$Perfil,$Estado);

?>