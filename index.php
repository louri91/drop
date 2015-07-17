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
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script src="js/dropzone.js"></script>
    </head>
    <body>
        <div id="container" style="width: 30%; margin-left: auto; margin-right: auto; position: relative">
			<div class="panel panel-primary" style="text-align: center; position: absolute; margin-top: 40%; transform: translate(0, -50%);">
			<div class="panel-heading">Iniciar sesión</div>
 			 <div class="panel-body">
            <div class="form-inline">
                <div class="panel-body">
                    <form action="scriptComprobarSesion.php" method="post">

                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                            <input name="user" type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
                            <input name="pass" type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <br>
                         <button type="submit" name="Enviar" class="btn btn-sm btn-primary" id="js-upload-submit">Iniciar sesión</button>
                    </form>
                    <a id="newCuenta" href="nuevaCuenta.php">Registrarse</a>

                </div></div>
                </div>
                </div>      
                </div>
        </div>
    </body>
</html>