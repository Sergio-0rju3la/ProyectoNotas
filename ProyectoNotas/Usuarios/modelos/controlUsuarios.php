<?php 

if($_POST['usuario']=="Sergio" && $_POST['contrasena']=="zapato"){
session_start();
//definir variables de sesion
$_SESSION['usuario']=$_POST['usuario'];
$_SESSION['validacion']=true;
$_SESSION['start']=time();
$_SESSION['expire']=$_SESSION['start']+(10*60);
header("location: ../../Administrador/pages/index.php");
}else{
    echo"<script>alert('datos incorrectos');window.location='../../index.php';</script>";
}
?>