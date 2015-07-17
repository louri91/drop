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
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/nuestro.js"></script>

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
      <a class="navbar-brand" href="#">Drop</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="ficherosUsuario.php">Inicio <span class="sr-only">(current)</span></a></li>
        <li><a href="formulario.php">Subir Ficheros</a></li>
        <li><a href="#">Link</a></li>
      </ul>
    <div class="navbar-brand navbar-right"><span class="glyphicon glyphicon-user"></span><?php echo '  '.$_SESSION['usuario'];?></div>

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
        $sql = "SELECT id, nombre, tamanio, ultimaMod FROM archivos WHERE Usuarios_login = '$Login' ORDER BY nombre;";
        $result = mysqli_query($conn, $sql);
        
        echo '<table class="table table-hover">';
        echo '<thead>';
        echo '<th>Nombre de Archivo</th>';
        echo '<th>Tamaño</th>';
        echo '<th>Fecha de Creación</th>';
        echo '</thead>';
        echo '<tbody id="ficheros">';
        while ($archivo = mysqli_fetch_assoc($result)) {
            ?>
           
                <tr>
                    <td><a href="scriptDescargar.php?id=<?php echo $archivo['id']; ?>"><?php echo $archivo['nombre']; ?></a></td>
                    <td><?php echo $archivo['tamanio']; ?></td>
                    <td><?php echo $archivo['ultimaMod']; ?></td>
                </tr>

            <?php
        }
        mysqli_close($conn);
        ?>
        </tbody>
        </table>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>