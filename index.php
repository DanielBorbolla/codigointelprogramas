<?php include('Main_app/conexion.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IntelProgramas</title>
    <link rel="stylesheet" href="./Styles/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="index_body">
    <h1 class="index_title">Selecciona la compañía</h1>
    <div class="contenedor_empresas" id="seleccionar_empresa">
        <?php
        $consulta_companias = "SELECT id, nombre, logo FROM compania";
        $listado_companias = $conexion->query($consulta_companias);

        $contador = 0;

        // Mostrar los botones para cada compañía
        if ($listado_companias->rowCount() > 0) {
            while ($fila = $listado_companias->fetch(PDO::FETCH_ASSOC)) {
                $id_empresa = $fila['id'];
                $nombre = $fila['nombre'];
                $logo = $fila['logo'];

                // Generar el botón para la compañía con su respectiva imagen
                echo "<a href='inicio.php?id=$id_empresa'>
                <div class='compania-btn'>
                            <img src='img/$logo' alt='$nombre'>
                            </div>
                            </a>";

                // Incrementar el contador
                $contador++;

                // Si se han mostrado 5 compañías, crear una nueva fila
                if ($contador % 5 == 0) {
                    echo "<div class='clear'></div>"; // Agrega un div con clear para limpiar el flotado
                }
            }
        } else {
            echo "No se encontraron compañías.";
        }

        // Cerrar la conexión a la base de datos
        $conexion = null;
        echo    "<div class=' compania-btn'>
        <a href='agregar_compania/index.html'>
        <img src='img/square-plus-solid.svg' alt='Agregar Compañía'></img>
        </a>
        </div>"











        ?>
    </div>
</body>

</html>