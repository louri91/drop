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
            <button type="submit" name="Enviar" class="btn btn-sm btn-primary" id="js-upload-submit">Guardar</button>

        </form>
        <?php
        /* Comprobamos si ha habido algún error y lo mostramos como una alerta */
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger" role="alert">';
            echo $_GET['error'];
            echo '</div>';
        }
        ?>
    
                    </body>
                    </html>

