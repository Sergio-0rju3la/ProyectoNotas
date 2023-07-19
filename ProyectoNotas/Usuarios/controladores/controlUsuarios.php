<?php
require_once('../../conexion.php');
require_once('../modelos/usuarios.php');

if($_SERVER['REQUEST_METHOD']==='POST'){
    $Usuario=$_POST["usuario"];
    $Passwor=$_POST["contrasena"];

    $usu =new Usuario();
    $usu->login($Usuario,$Passwor);

    //redirigir al controlador de acuerdo al rol

    if($usu->loggedIn()){
        if($usu->isAdmin()){
            header('Location:../../Administrador/pages/index.php');
        }else if($usu->isdocente()){
            header('Location:../../Docentes/pages/index.php');
        }
        exit();
    }else{
        echo"<script>alert('datos incorrectos');window.location='../../index.php';</script>";
    }
}
?>