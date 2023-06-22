<?php
include_once('../../conexion.php');
include_once('../modelos/administrador.php');

//crear el objeto;

$admin = new Administrador();

//definir argumentos;

$Nombre = $_POST['txtNombre'];
$Apellido = $_POST['txtApellido'];
$Usuario = $_POST['txtUsuario'];
$Paswor = $_POST['txtContra'];
$Perfil = $_POST['txtPerfil'];
$Estado = $_POST['txtEStado'];

$admin->addadmi($Nombre,$Apellido,$Usuario,$Paswor,$Estado,$Perfil);




?>