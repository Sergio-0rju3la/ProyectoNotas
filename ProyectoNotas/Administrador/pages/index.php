<?php
require_once('../../Usuarios/modelos/usuarios.php');
$model =new Usuario();
$model->validarsesion();
if(!$_SESSION['validar']){
    echo"<script>alert('solo usuarios registrados');window.location='../../index.php';</script>";
}
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
<body class="adminbody">
    <nav class="d col-12 conteiner-fluid"> 
        <div class="col-6">
            <img src="../../img/libro-abierto.png" alt="">
            <a href="agregar.php" class="z">Usuarios</a>
            <a href="../../Materias/pages/agregar.php" class="z">Materias</a>
            <a href="../../Estudiantes/pages/agregar.php" class="z">Estudiantes</a>
            <a href="../../Docentes/pages/agregar.php" class="z">Docentes</a>

        </div>
        <div class=" col-6">
        <a href="../../Usuarios/modelos/salir.php"><input type="button" value="cerrar sesión" class="s btn btn-outline-danger"></a>
        </div>

    </nav>
    <h2 style="color: white;">Bienvenido: <?php echo $_SESSION["username"]?></h2>
    <!--alerta-->
    <?php
    
    if(isset($_SESSION['alerta'])){
        echo $_SESSION['alerta'];
        unset($_SESSION['alerta']);
    }
    ?>
<script>
    setTimeout(function(){
        document.getElementById('alerta').style.display='none';
    }, 3000);
</script>
    <!--tabla de usuarios-->
    <br>
    <h1 class="titu">LIsta de usuarios</h1>
    <div class="container">

    <div col-auto-mt-5>
    <table class="table table-dark table-hover">
        <tr>
            <th>ID USUASRIOS</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Perfil</th>
            <th>Estado</th>
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
            <td><a href="eliminar.php?Id=<?php 
            echo $key['id_usuario']?>" class="btn btn-primary">Eliminar</a></td>
            
        </tr>
        <?php } ?>
    </tbody>
    
    </table>

    </div>
    
    </div>
    <!--tabla de docentes-->
    <br>
    <h1 class="titu">Lista de Docentes</h1>
    <div class="container">

    <div col-auto-mt-5>
    <table class="table table-dark table-hover">
        <tr>
            <th>ID Docente</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Documento</th>
            <th>Correo</th>
            <th>Materia</th>
            <th>Perfil</th>
            <th>Estado</th>
            <th>ACTUALIZAR</th>
            <th>ELIMINAR</th>
        </tr>
    <tbody>
        <?php
        require_once('../../conexion.php');
        require_once('../../Docentes/modelos/docente.php');
        $obj1 =new Docente();
        $datos1 = $obj1->getadmin();

        foreach($datos1 as $key){

        

        
        ?>
        <tr>
            <td><?php 
            echo $key['id_docente']?></td>
            <td><?php 
            echo $key['NombreDoc']?></td>
            <td><?php 
            echo $key['ApellidoDoc']?></td>
            <td><?php 
            echo $key['DocumentoDoc']?></td>
            <td> <?php 
            echo $key['CorreoDoc']?></td>
            <td> <?php 
            echo $key['MateriaDoc']?></td>
            <td><?php 
            echo $key['PerfilDoc']?></td>
            <td><?php 
            echo $key['EstadoDoc']?></td>
            <td>
            <a href="../../Docentes/pages/editar.php?Id=<?php 
            echo $key['id_docente']?>" class="btn btn-danger">Actualizar</a></td>
            <td><a href="../../Docentes/pages/eliminar.php?Id=<?php 
            echo $key['id_docente']?>" class="btn btn-primary">Eliminar</a></td>
            
        </tr>
        <?php } ?>
    </tbody>
    
    </table>

    </div>
    
    </div>
    <!--tabla de estudiantes-->
    <br>
    <h1 class="titu">Lista de Estudiantes</h1>
    <div class="container">

    <div col-auto-mt-5>
    <table class="table table-dark table-hover">
        <tr>
            <th>ID Estudiante</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Documento</th>
            <th>Correo</th>
            <th>Materia</th>
            <th>Docente</th>
            <th>Nota Final</th>
            <th>Fecha Registro</th>
            <th>ACTUALIZAR</th>
            <th>ELIMINAR</th>
        </tr>
    <tbody>
        <?php
        require_once('../../conexion.php');
        require_once('../../Estudiantes/modelos/estudiante.php');
        $obj2 =new Estudiante();
        $datos2 = $obj2->getadmin();

        foreach($datos2 as $key){

        

        
        ?>
        <tr>
            <td><?php 
            echo $key['id_Estudiante']?></td>
            <td><?php 
            echo $key['NombreEst']?></td>
            <td><?php 
            echo $key['ApellidoEst']?></td>
            <td><?php 
            echo $key['DocumentoEst']?></td>
            <td> <?php 
            echo $key['CorreoEst']?></td>
            <td> <?php 
            echo $key['MateriaEst']?></td>
            <td> <?php 
            echo $key['DocenteEst']?></td>
            <td><?php 
            echo $key['PromedioEst']?></td>
            <td><?php 
            echo $key['Fecha_registro']?></td>
            <td>
            <a href="../../Estudiantes/pages/editar.php?Id=<?php 
            echo $key['id_Estudiante']?>" class="btn btn-danger">Actualizar</a></td>
            <td><a href="../../Estudiantes/pages/eliminar.php?Id=<?php 
            echo $key['id_Estudiante']?>" class="btn btn-primary">Eliminar</a></td>
            
        </tr>
        <?php } ?>
    </tbody>
    
    </table>

    </div>
    
    </div>
        <!--tabla de materias-->
    <br>
    <h1 class="titu">Lista de Materias</h1>
    <div class="container">

    <div col-auto-mt-5>
    <table class="table table-dark table-hover">
        <tr>
            <th>ID Materia</th>
            <th>Nombre</th>
            <th>ACTUALIZAR</th>
            <th>ELIMINAR</th>
        </tr>
    <tbody>
        <?php
        require_once('../../conexion.php');
        require_once('../../Materias/modelos/materias.php');
        $obj3 =new Materia();
        $datos3 = $obj3->getadmin();

        foreach($datos3 as $key){
        
        ?>
        <tr>
            <td><?php 
            echo $key['id_materia']?></td>
            <td><?php 
            echo $key['Materia']?></td>
            <td>
            <a href="../../Materias/pages/editar.php?Id=<?php 
            echo $key['id_materia']?>" class="btn btn-danger">Actualizar</a></td>
            <td><a href="../../Materias/pages/eliminar.php?Id=<?php 
            echo $key['id_materia']?>" class="btn btn-primary">Eliminar</a></td>
            
        </tr>
        <?php } ?>
    </tbody>
    
    </table>

    </div>
    
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>