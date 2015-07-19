<html><?php
    session_start();
    $oldarchivo = "";
    ?>

    <head>
        <title>Inicio</title>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" http-equiv="content-type" content="width=device-width, initial-scale=1.0"/>
        <meta content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/css.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link href="css/bootstrap-dialog.css" rel="stylesheet">

    </head>
    <body>
        <div class="bodybg">

            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Drop</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php">Inicio <span class="sr-only">(current)</span></a></li>
                            <li><a href="formulario.php">Subir Ficheros</a></li>
                            <li><a id="modificar" href="#">Modificar Cuenta</a></li>
                            <li><a href="scriptCerrarSesion.php">Cerrar Sesión</a></li>
                        </ul>
                        <div class="navbar-brand navbar-right"><span class="glyphicon glyphicon-user"></span><?php echo '  ' . $_SESSION['usuario']; ?></div>

                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                                <input type="text" id="busqueda" name="busqueda" onkeyup="MostrarConsultaNombre();" class="form-control" placeholder="Buscar">
                            </div>
                        </form>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <div class="container" style="width: auto; margin-left: auto; margin-right: auto; position: relative">
                <div class="panel panel-default" style="margin-top: 5%;">
                    <div class="panel-body">
                        <div class="form-inline">
                            <div class="panel-body">
                                <?php
                                $Login = $_SESSION['usuario'];
                                include_once 'scriptConexionBD.php';
                                $conn = dbConnect();
                                $sql = "SELECT DISTINCT archivos.id, archivos.nombre, archivos.tamanio, archivos.ultimaSub, archivos.Usuarios_login FROM archivos, compartidos WHERE archivos.Usuarios_login = '$Login' OR (compartidos.login = '$Login' AND archivos.id = compartidos.id) ORDER BY nombre, ultimaSub DESC;";
                                $result = mysqli_query($conn, $sql);

                                echo '<table class="table table-hover">';
                                echo '<thead>';
                                echo '<th>Nombre de Archivo</th>';
                                echo '<th>Tamaño</th>';
                                echo '<th>Fecha de Subida</th>';
                                echo '<th>Propietario</th>';
                                echo '</thead>';
                                echo '<tbody id="ficheros">';
                                while ($archivo = mysqli_fetch_assoc($result)) {
                                    if ($oldarchivo == $archivo['nombre']) {
                                        echo '<tr class="breadcrumb">';
                                    } else {
                                        '<tr>';
                                    }
                                    ?><td><a href="scriptDescargar.php?id=<?php echo $archivo['id']; ?>"><?php echo $archivo['nombre']; ?></a></td>
                                    <td><?php
                                        if ($archivo['tamanio'] < 1024) {
                                            echo "{$archivo['tamanio']} bytes";
                                        } else if ($archivo['tamanio'] < 1048576) {
                                            $size_kb = round($archivo['tamanio'] / 1024);
                                            echo "{$size_kb} KB";
                                        } else {
                                            $size_mb = round($archivo['tamanio'] / 1048576, 1);
                                            echo "{$size_mb} MB";
                                        }
                                        ?></td>
                                    <td><?php echo date("d/m/Y H:i:s", strtotime($archivo['ultimaSub'])); ?></td>
                                    <td><?php if ($archivo['Usuarios_login'] != $Login) echo $archivo['Usuarios_login']; ?></td>

                                    <?php
                                    if ($oldarchivo == $archivo['nombre']) {
                                        echo '<td>';
                                    } else if ($archivo['Usuarios_login'] != $Login) {
                                        echo '<td>';
                                    } else {
                                        ?>
                                        <td><button class="btn btn-info" onclick="FunctionCompartir(<?php echo $archivo['id']; ?>)">Compartir</button></td>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($archivo['Usuarios_login'] == $Login) {
                                        ?>
                                        <td><button class="btn btn-danger" onclick="FunctionEliminar(<?php echo $archivo['id']; ?>)">Eliminar</button></td>
                                        <?php
                                    } else {
                                        ?>
                                        <td><button class="btn btn-warning" onclick="FunctionAbandonar(<?php echo $archivo['id']; ?>)">Abandonar</button></td>
                                        <?php
                                    }
                                    ?>

                                    </tr>

                                    <?php
                                    $oldarchivo = $archivo['nombre'];
                                }

                                mysqli_close($conn);
                                ?>
                                </tbody>
                                </table>

                            </div>
                        </div>
                        <?php
                        if (isset($_GET['ult'])) {
                            echo '<br>';
                            echo '<div class="container" style="width: auto; text-align: right">';
                            echo '<div class="alert alert-info" role="alert">';
                            echo 'Última conexión: ' . $_GET['ult'];
                            echo '</div></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>


        <?php
        /* Comprobamos si ha habido algún error y lo mostramos como una alerta */
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger" role="alert">';
            echo $_GET['error'];
            echo '</div>';
        }
        ?>

        <script src="http://code.jquery.com/jquery-2.0.3.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-dialog.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/nuestro.js"></script>

        <script languaje="javascript">
                                             function FunctionEliminar(identificador) {
                                                 location.href = ("scriptEliminarArchivo.php?id=" + identificador);
                                             }
                                             function FunctionCompartir(identificador) {
                                                 location.href = ("scriptCompartir.php?id=" + identificador);
                                             }
                                             function FunctionAbandonar(identificador) {
                                                 location.href = ("scriptAbandonar.php?id=" + identificador);
                                             }
        </script>
    </body>
</html>