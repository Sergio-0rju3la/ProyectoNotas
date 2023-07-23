<?php
require_once('../../Usuarios/modelos/usuarios.php');
$model =new Usuario();
$model->validarsesion();
if(!$_SESSION['validar']){
    echo"<script>alert('solo usuarios registrados');window.location='../../index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Materia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="../../css/agregarMateria.css" rel="stylesheet">
    <link href="../../css/iniadmin.css" rel="stylesheet">

</head>
<nav class="d col-12 conteiner-fluid"> 
        <div class="col-6">
            <a href="index.php"><img src="../../img/libro-abierto.png" alt=""></a>
            <a href="agregar.php" class="z">Usuarios</a>
            <a href="../../Materias/pages/agregar.php" class="z">Materias</a>
            <a href="../../Estudiantes/pages/agregar.php" class="z">Estudiantes</a>
            <a href="../../Docentes/pages/agregar.php" class="z">Docentes</a>

        </div>
        <div class=" col-6">
        <a href="../../Usuarios/modelos/salir.php"><input type="button" value="cerrar sesión" class="s btn btn-outline-danger"></a>

    </div>

    </nav>
<div class="col-12" style="display: grid;
    justify-content: start; " id="pepo"><h2 style="color: white; " ><?php echo $_SESSION["username"]?></h2></div>
<body>
    <div class="caja d-flex flex-column align-items-center justify-content-center">
        
    <form action="../controladores/controlMaterias.php" method="POST" class="d-flex flex-column align-items-center justify-content-center">
        <div class="im"><img src="../../img/libro-abierto.png"></div>
        <div class="texto"><h1>Agregar Materia</h1></div>
        <label>Nombre de la Materia</label>
        <input type="text" name="txtMateria" class="campo" placeholder="Ingresar Nombre">
        <input type="submit" class="boton btn btn-outline-warning"value="Ingresar">
    </form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>