<!-- 

 Archivo donde se permite modificar los datos de un usuario.

-->
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" http-equiv="content-type" content="width=device-width, initial-scale=1.0"/>
        <meta content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/css.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script src="js/dropzone.js"></script>
    </head>
    <body>
        <?php
        session_start();
        include_once ('scriptConexionBD.php');
        $conn = dbConnect();
        $user = $_SESSION["usuario"];
        $sql = "SELECT correo, pass FROM usuarios WHERE login = '$user'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_row($result)) {
            $correo = $row[0];
            $passw = $row[1];
        }
        mysqli_close($conn);
        ?>

        <div class="bodybg">

            <!--  MENU  -->

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
                        <a class="navbar-brand" href="#">Drop</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Inicio <span class="sr-only">(current)</span></a></li>
                            <li><a href="formulario.php">Subir Ficheros</a></li>
                            <li class="active"><a href="modificarCuenta.php">Modificar Cuenta</a></li>
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
                        <div id="container" style="width: 30%; margin-left: auto; margin-right: auto; position: relative">
                            <div class="panel panel-default" style="text-align: center; position: absolute; margin-top: 40%;">
                                <div class="panel-heading">Modificar datos</div>
                                <div class="panel-body">
                                    <div class="form-inline">
                                        <div class="panel-body">
                                            <form action="scriptModificarCuenta.php" method="post">

                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                                    <input value="<?php echo $user; ?>" name="login" type="text" class="form-control" aria-describedby="basic-addon1" readonly>
                                                </div>

                                                <br>
                                                <br>

                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope"></span></span>
                                                    <input value="<?php echo $correo; ?>" name="correo" type="email" class="form-control" aria-describedby="basic-addon1" required>
                                                </div>

                                                <br>
                                                <br>

                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
                                                    <input value="<?php echo $passw; ?>" name="pass" type="password" class="form-control" aria-describedby="basic-addon1" required>
                                                </div>

                                                <br>
                                                <br>
                                                <button type="submit" name="Enviar" class="btn btn-sm btn-primary" id="js-upload-submit">Registro</button>

                                            </form>
                                            <?php
                                            /* Comprobamos si ha habido algún error y lo mostramos como una alerta */
                                            if (isset($_GET['error'])) {
                                                echo '<div class="alert alert-danger" role="alert">';
                                                echo $_GET['error'];
                                                echo '</div>';
                                            }
                                            ?>
                                        </div></div>      
                                </div>
                            </div>
                        </div>
                    </body>
                    </html>

