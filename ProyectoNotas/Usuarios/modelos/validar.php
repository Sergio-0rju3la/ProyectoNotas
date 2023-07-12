<?php
session_start();
if(!$_SESSION['validacion']){
    echo"<script>alert('solo para usuarios');window.location='../../index.php';</script>";
}
$now =time();
if ($now>$_SESSION['expire']){
    session_destroy();
    echo"<script>alert('debe ingresar nuevamente');window.location='../../index.php';</script>";
}
?>