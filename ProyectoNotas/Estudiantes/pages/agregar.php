<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="../../css/agregarEstud.css" rel="stylesheet">

</head>
<body>
    <div class="x caja d-flex flex-column align-items-center justify-content-center">
        <?php
        require_once('../../conexion.php');
        require_once('../../metodos.php');

        $me= new consulta();
        $do= new consulta();
        ?>
    <form action="../controladores/controlEstudiante.php" method="POST" class="s d-flex flex-column align-items-center justify-content-center">
        <div class="im"><img src="../../img/libro-abierto.png"></div>
        <div class="texto"><h1>Agregar Estudiante</h1></div>
        <label>Nombre</label>
        <input type="text" name="txtNombre" class="campo" placeholder="Ingresar Nombre">
        <label>Apellido</label>
        <input type="text" name="txtApellido" class="campo" placeholder="Ingresar Apellido">
        <label>Documento</label>
        <input type="text" name="txtDocumento" class="campo" placeholder="Ingresar Documento">
        <label>Correo</label>
        <input type="text" name="txtCorreo" class="campo" placeholder="Ingresar Correo">
        <label>Materia</label>
        <select name="txtmateria" class="campo">
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
        <select name="txtdocente" class="campo">
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
        <input type="number" name="txtNota" class="campo" placeholder="Promedio">
        <label>Fecha de registro</label>
        <input type="datetime-local" name="txtFecha" class="campo" placeholder="Fecha">
        <input type="submit"  class="boton btn btn-outline-success"value="Ingresar">
        
    
    </form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>