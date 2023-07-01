<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar materia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="../../css/eliminarusu.css" rel="stylesheet">
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
        <input type="button" value="cerrar sesión" class="s btn btn-outline-danger">
        </div>

    </nav>
<?php
        require_once('../../conexion.php');
        require_once('../modelos/materias.php');
        $IDmat= $_GET['Id'];

        $mate= new Materia();
        $row= $mate->getidad($IDmat);
        if($row){
?>

    <div class="caja d-flex flex-column align-items-center justify-content-center">
        
    <form action="../controladores/elimino.php" method="POST" class="d-flex flex-column align-items-center justify-content-center">
        <input type="hidden" name="ID" value="<?php echo $row['id_materia']?>">
        <div class="im"><img src="../../img/libro-abierto.png"></div>
        <div class="texto"><h1>Eliminar Materia</h1></div>
        <label>Seguro que quieres eliminar la materia de: <?php echo $row['Materia']?></label>
        <input type="submit" class="boton btn btn-danger"value="Eliminar">
    </form>
    <?php } ?>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>