<!-- 

  Página desde donde se accede a las páginas principales de los usuarios.

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
        <div class="bodybg">
        <div id="container" style="width: 30%; margin-left: auto; margin-right: auto; position: relative">
            <div class="panel panel-default" style="text-align: center; position: absolute; margin-top: 40%;">
            <div class="panel-heading">Registro</div>
             <div class="panel-body">
            <div class="form-inline">
                <div class="panel-body">
                    <form action="scriptInsertarUsuario.php" method="post">

                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope"></span></span>
                            <input name="correo" type="email" class="form-control" placeholder="e-mail" aria-describedby="basic-addon1" required>
                        </div>
                        
                        <br>
                        <br>
                        
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                            <input name="login" type="text" class="form-control" placeholder="Usuario" aria-describedby="basic-addon1" required>
                        </div>
                        
                        <br>
                        <br>
                        
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
                            <input name="pass" type="password" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon1" required>
                        </div>
                        
                        <br>
                        <br>
                         <button type="submit" name="Enviar" class="btn btn-sm btn-primary" id="js-upload-submit">Registro</button>
                        
                    </form>
                            <?php 
                            /* Comprobamos si ha habido algún error y lo mostramos como una alerta*/
                            if (isset($_GET['error'])){
                                echo '<div class="alert alert-danger" role="alert">';
                                echo $_GET['error'];
                                echo '</div>';
                            }

                            ?>
                </div></div>      
                </div>
                </div>
        </div></div>
    </body>
</html>