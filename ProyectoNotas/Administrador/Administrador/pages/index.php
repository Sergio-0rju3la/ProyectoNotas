<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina principal ||</title>
    <link rel="stylesheet" href="../../css/iniadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <nav class="d col-12 conteiner-fluid"> 
        <div class="col-6">
            <img src="../../img/libro-abierto.png" alt="">
            <a href="agregar.php" class="z">Usuarios</a>
            <a href="../../Materias/pages/agregar.php" class="z">Materias</a>
            <a href="../../Estudiantes/pages/agregar.php" class="z">Estudiantes</a>
            <a href="../../Docentes/pages/agregar.php" class="z">Docentes</a>

        </div>
        <div class=" col-6">
        <input type="button" value="cerrar sesión" class="s btn btn-outline-danger">
        </div>

    </nav>
    <br>
    <h1>LIsta de usuarios</h1>
    <div class="container">

    <div col-auto-mt-5>
    <table class="table table-dark table-hover">
        <tr>
            <th>ID USUASRIOS</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>PErfil</th>
            <th>EStado</th>
            <th>ACTUALIZAR</th>
            <th>ELIMINAR</th>
        </tr>
    <tbody>
        <?php
        require_once('../../conexion.php');
        require_once('../modelos/administrador.php');
        $obj =new Administrador();
        $datos = $obj->getadmin();

        foreach($datos as $key){

        

        
        ?>
        <tr>
            <td><?php 
            echo $key['id_usuario']?></td>
            <td><?php 
            echo $key['Nombre']?></td>
            <td><?php 
            echo $key['Apellido']?></td>
            <td><?php 
            echo $key['Usuario']?></td>
            <td><?php 
            echo $key['Perfil']?></td>
            <td><?php 
            echo $key['Estado']?></td>
            <td><a href="editar.php?Id=<?php 
            echo $key['id_usuario']?>" class="btn btn-danger">Actualizar</a></td>
            <td><a href="eliminar.php?=<?php 
            echo $key['id_usuario']?>" class="btn btn-primary">Eliminar</a></td>
            
        </tr>
        <?php } ?>
    </tbody>
    
    </table>

    </div>
    
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>