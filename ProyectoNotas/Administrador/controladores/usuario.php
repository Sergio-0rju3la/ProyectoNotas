<?php
include_once('../../conexion.php');
include_once('../modelos/administrador.php');

//crear el objeto;

$admin2 = new Administrador();

//definir argumentos;

$Nombre = $_POST['txtNombre'];
$Apellido = $_POST['txtApellido'];
$Usuario = $_POST['txtUsuario'];
$Passwor = MD5($_POST['txtContra']);
$Perfil = "Administrador";
$Estado = $_POST['txtEstado'];

$admin2->addadmi($Nombre,$Apellido,$Usuario,$Passwor,$Perfil,$Estado);




?>