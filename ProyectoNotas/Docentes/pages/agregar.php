<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Docente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="../../css/agregarDocen.css" rel="stylesheet">
</head>
<body>
    <div class="caja d-flex flex-column align-items-center justify-content-center">
    <?php
        require_once('../../conexion.php');
        require_once('../../metodos.php');

        $me= new consulta();
        $do= new consulta();
        ?>
    <form action="../controladores/controlDocentes.php" method="POST" class="d-flex flex-column align-items-center justify-content-center">
        <div class="im"><img src="../../img/libro-abierto.png"></div>
        <div class="texto"><h1>Agregar Docente</h1></div>
        <label>Nombre</label>
        <input type="text" class="campo" name="txtNombreDoc" placeholder="Ingresar Nombre">
        <label>Apellido</label>
        <input type="text" class="campo" name="txtApellidoDoc" placeholder="Ingresar Apellido">
        <label>Documento</label>
        <input type="text" class="campo" name="txtDocumentoDoc" placeholder="Ingresar Documento">
        <label>Correo</label>
        <input type="text" class="campo" name="txtCorreoDoc" placeholder="Ingresar Correo">
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

        

        <label for="Estado">Estado</label>
        <select id="Estado" class="campo"name="txtEstadoDoc">
        <option value="Activo">Activo</option>
        <option value="No Activo">No Activo</option>
        </select>
        <input type="submit" class="boton btn btn-outline-primary"value="Ingresar">
    </form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>