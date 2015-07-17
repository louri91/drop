<html>
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
    </head>
    <body>
    <div class="bodybg">
    <div id="container" style="width: auto; position: relative; margin-right: 5%; margin-left: 5%;">
    <div class="panel panel-default" style="width: 100% ; text-align: left; position: absolute; margin-top: 5%;">
    <div class="panel-heading">Lista de Ficheros</div>
    <div class="panel-body">
    <div class="form-inline">
    <div class="panel-body">
        <?php
        session_start();
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
        echo '<tbody>';
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