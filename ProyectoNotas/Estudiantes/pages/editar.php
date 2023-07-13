<?php
include_once("../../Usuarios/modelos/validar.php")
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="../../css/agregarEstud.css" rel="stylesheet" type="text/css">
    <link href="../../css/iniadmin.css" rel="stylesheet">
</head>
<body>
<nav class="d col-12 conteiner-fluid"> 
        <div class="col-6">
            <a href="../../Administrador/pages/index.php"><img src="../../img/libro-abierto.png" alt=""></a>
            <a href="../../Administrador/pages/agregar.php" class="z">Usuarios</a>
            <a href="../../Materias/pages/agregar.php" class="z">Materias</a>
            <a href="../../Estudiantes/pages/agregar.php" class="z">Estudiantes</a>
            <a href="../../Docentes/pages/agregar.php" class="z">Docentes</a>

        </div>
        <div class=" col-6">
        <a href="../../Usuarios/modelos/salir.php"><input type="button" value="cerrar sesión" class="s btn btn-outline-danger"></a>

        </div>

    </nav>
    
    <div class="col-12" style="display: grid;
    justify-content: start; " id="pepo"><h2 style="color: white; " ><?php echo $_SESSION["usuario"]?></h2></div>
    <?php
    
    if(isset($_SESSION['alerta'])){
        echo $_SESSION['alerta'];
        unset($_SESSION['alerta']);
    }
    ?>
    <div class="x caja d-flex flex-column align-items-center justify-content-center">
        <?php
        
        require_once('../../conexion.php');
        require_once('../../metodos.php');
        require_once('../modelos/estudiante.php');

        $me= new consulta();
        $do= new consulta();

        $ID= $_GET['Id'];

        $admin1= new Estudiante();
        $row= $admin1->getidad($ID);
        if($row){
        ?>
    <form action="../controladores/actualizar.php" method="POST" class="form d-flex flex-column align-items-center justify-content-center">
        <input type="hidden" name="ID" value="<?php echo $row['id_Estudiante']?>">
        <div class="im"><img src="../../img/libro-abierto.png"></div>
        <div class="texto"><h1>Editar Estudiante</h1></div>
        <label>Nombre</label>
        <input type="text" name="txtNombreEst" class="campo" value="<?php echo $row['NombreEst']?>" placeholder="Ingresar Nombre">
        <label>Apellido</label>
        <input type="text" name="txtApellidoEst" class="campo" value="<?php echo $row['ApellidoEst']?>" placeholder="Ingresar Apellido">
        <label>Documento</label>
        <input type="text" name="txtDocumentoEst" class="campo" value="<?php echo $row['DocumentoEst']?>" placeholder="Ingresar Documento">
        <label>Correo</label>
        <input type="text" name="txtCorreoEst" class="campo" value="<?php echo $row['CorreoEst']?>" placeholder="Ingresar Correo">
        <label>Materia</label>
        <select name="txtMateriaEst" class="campo">
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
        <label>Docente</label>
        <select name="txtDocenteEst" class="campo">
            <option>Seleccionar</option>
            <?php
        $doce1= $do->getdocente();
        if($doce1!=null){
            foreach($doce1 as $dc){
                ?>
                <option value="<?php echo $dc['NombreDoc']; ?>"> <?php echo $dc['NombreDoc'];?></option>
                <?php
            }
        }
        ?>
        </select>
        
        <label>Nota final</label>
        <input type="number" name="txtPromedioEst" class="campo" value="<?php echo $row['PromedioEst']?>" placeholder="Promedio">
        <label>Fecha de registro</label>
        <input type="date" name="txtFechaEst" class="campo" value="<?php echo $row['Fecha_registro']?>" placeholder="Fecha">
        <input type="submit"  class="boton btn btn-outline-success"value="Ingresar">
        
    
    </form>
    <?php } ?>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>