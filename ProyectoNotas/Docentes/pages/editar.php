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
    <title>Editar docente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="../../css/agregarAdmin.css" rel="stylesheet">
    <link href="../../css/iniadmin.css" rel="stylesheet">
</head>
<body>
    
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
    <?php
    
    if(isset($_SESSION['alerta'])){
        echo $_SESSION['alerta'];
        unset($_SESSION['alerta']);
    }
    ?>
    <div class="caja d-flex flex-column align-items-center justify-content-center">
   
       <?php

       require_once('../../metodos.php');

        
        require_once('../../conexion.php');
        require_once('../modelos/docente.php');
        $me= new consulta();
        $do= new consulta();

        $ID= $_GET['Id'];

        $admin1= new Docente();
        $row= $admin1->getidad($ID);
        if($row){

        ?>
    <form action="../controladores/actualizar.php" method="POST" class="d-flex flex-column align-items-center justify-content-center">
        <input type="hidden" name="ID" value="<?php echo $row['id_docente']?>">
        <div class="im"><img src="../../img/libro-abierto.png"></div>
        <div class="texto"><h1>Editar Docente</h1></div>
        <label>Nombre</label>
        <input type="text" class="campo" placeholder="Ingresar Nombre" name="txtNombreDoc" value="<?php echo $row['NombreDoc']?>">
        <label>Apellido</label>
        <input type="text" class="campo" placeholder="Ingresar Apellido" name="txtApellidoDoc" value="<?php echo $row['ApellidoDoc']?>">
        <label>Documento</label>
        <input type="text" class="campo" placeholder="Ingresar Documento" name="txtDocumentoDoc" value="<?php echo $row['DocumentoDoc']?>">
        <label>correo</label>
        <input type="text" class="campo" placeholder="Ingresar correo" name="txtCorreoDoc" value="<?php echo $row['CorreoDoc']?>">
        <label>Materias</label>
        <select name="txtMateriaDoc" class="campo">
            <option>Seleccionar</option>
            <?php
        $mate= $me->getmaterias();
        if($mate!=null){
            foreach($mate as $ma){
                ?>
                <option value="<?php echo$ma['Materia']; ?>"> <?php echo$ma['Materia'];?></option>
                <?php
            }
        }
        ?>
        </select>
        <label>Estado</label>
        <select id="Estado" class="campo" name="txtEstadoDoc">
        <option value="Activo">Activo</option>
        <option value="No Activo">No Activo</option>
        </select>
        
        <input type="submit" class="boton btn btn-outline-danger"value="Ingresar">
    </form>
    <?php } ?>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>
