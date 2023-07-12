<?php
//pagina principal para entrar al sistema

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/ini.css">
    <title>Inicio de secion || </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="claudio row">
    <div class="f col-4">
            <h2>iniciar secion</h2>
    <form action="Usuarios/modelos/controlUsuarios.php" class="d" method="POST" >
            <label for="usuario">usuario</label>
            <input type="text" placeholder="usuario" name="usuario">
            <label for="contraseña">Contraseña</label>
            <input type="text" placeholder="Contraseña" name="contrasena">
            <input type="submit" class="btn btn-outline-danger" value="INICIAR">
        </form>
        <div class="w">
            <div>
                <a class="r" href="">registrar</a>
            </div>
            <div>
                <a class="r"href="">cambiar contraseña</a>
            </div>
        </div>
        </div>

    </div>
    
    


    


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>