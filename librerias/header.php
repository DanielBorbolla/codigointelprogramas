<body>
    <?php
    $id_compania = $_SESSION['id_compania'];
    $nombre_compania = $_SESSION['nombre_compania'];
    $logo_compania = $_SESSION['logo_compania'];
    $nombre_usuario = $_SESSION['nombre_usuario'];
    $imagen_usuario = $_SESSION['imagen_usuario'];
    $input_sucursal = '<label class= "label_matriz">Matriz</label>
        <select class="form-control input_matriz" id="id_matriz">
        <option value="">-- SELECCIONE --</option>
        </select>';
    ?>
    <header id="header">
        <div class="logo pull-md-right pull-xl-right pull-lg-right pull-sm-right pull-xs-right">


            <img src="http://localhost/codigograncompu/img/<?php echo $logo_compania; ?>" height="60" width="60" alt="<?php echo $nombre_compania; ?>">

            <span class="titulo_logo"><?php echo $nombre_compania; ?></span>
        </div>

        <div class="wide_header">
            <strong class="header-date"><?php
                                        date_default_timezone_set('America/Mexico_City');

                                        $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

                                        echo $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . '   '; ?> <span id="contenedor_reloj"> </span> </strong>


            <div class="drop_matriz">
                <?php echo $input_sucursal; ?>
            </div>

            <div>
                <ul class="info-menu list-inline list-unstyled">

                    <li class="profile">
                        <a href="#" data-toggle="dropdown" class="toggle menu_user" aria-expanded="false">
                            <picture>
                                <img src="http://localhost/codigograncompu/img/<?php echo $imagen_usuario; ?>" alt="imagen_usuario" class="img-circle img-inline">
                            </picture>
                            <span>
                                <font color="White">---</font>
                                <?php echo $nombre_usuario; ?>
                                <font color="White">---</font> <i class="bi bi-caret-down-fill caret"></i>
                            </span>
                        </a>


                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">
                                    <img src="http://localhost/codigograncompu/img/gear-solid.svg" alt="Configuración" class="icon glyphicon">
                                    Configuración
                                </a>
                            </li>
                            <li class="last">
                                <a href="http://localhost/codigograncompu">
                                    <img src="http://localhost/codigograncompu/img/power-off-solid.svg" alt="salir" class="icon glyphicon">
                                    Salir
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </header>
    <div class="main_body">
        <div class="contenedor_sidebar">

            <div class="sidebar">
                <?php require_once 'usuario_menu.php'; ?>
            </div>
        </div>

        <div class="page">

            <div class="contenedor_principal">