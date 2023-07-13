<?php
include_once('../../conexion.php');
include_once('../modelos/Usuarios.php');

if($_POST){
 $Usuario=$_POST['usuario'];
 $Passwor=$_POST['contrasena'];

 $modelo= new Usuario();
if($modelo->login($Usuario,$Passwor)){
    header('Location:../../Administrador/pages/index.php');
}else{
    header('Location:../../index.php');
}
}else{
    echo"<script>alert('datos incorrectos');window.location='../../index.php';</script>";
}
?>