<html><?php session_start(); ?>
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
  <link rel="stylesheet" href="css/dropzone.css">
  <link rel="stylesheet" href="css/basic.css">

  <div class="bodybg">

    </head>
    <body>
  
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
              <li class="active"><a href="formulario.php">Subir Ficheros</a></li>
          </ul>
          <div class="navbar-right">
          <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" id="menu1" type="button" data-toggle="dropdown" style="margin-top: 10%; margin-left: -8%">
              <span class="glyphicon glyphicon-user"></span>
                  <?php echo '  ' . $_SESSION['usuario']; ?>
              <span class="caret"></span>
          </button>
          
          <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
              <li role="presentation"><a id="modificar" role="menuitem" tabindex="-1">Configuración</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="scriptCerrarSesion.php">Cerrar Sesión</a></li>
          </ul>
          </div>
          </div>
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

          <form action="scriptInsertar.php" class="dropzone" id="my-awesome-dropzone" method="post" enctype="multipart/form-data" style="margin-top:3%;">
            <div class="fallback"></div>
            <div class="dz-message">Arrastre hasta aquí sus ficheros</div>
          </form>

          
      </div>
    </div></div> <!-- /container -->
    </body>

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap-dialog.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/nuestro.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/dropzone.js"></script>
    <script type="text/javascript" src="js/dropzone-amd-module.js"></script>
    <script languaje="javascript">
       $(document).ready(function () { $('.dropdown-toggle').dropdown(); });
       
  </script>

</html>