<html>
    <head>
        <title>Inicio</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        session_start();
        $Login = $_SESSION['usuario'];
        include_once 'scriptConexionBD.php';
        $conn = dbConnect();
        $sql = "SELECT id, nombre, tamanio, ultimaMod FROM archivos WHERE Usuarios_login = '$Login' ORDER BY nombre;";
        $result = mysqli_query($conn, $sql);

        while ($archivo = mysqli_fetch_assoc($result)) {
            ?>
            <table border="1">
                <tr>
                    <td> <a href="scriptDescargar.php?id=<?php echo $archivo['id']; ?>"><?php echo $archivo['id']; ?></a></td>
                    <td><?php echo $archivo['nombre']; ?></td>
                    <td><?php echo $archivo['tamanio']; ?></td>
                    <td><?php echo $archivo['ultimaMod']; ?></td>
                </tr>
            </table>

            <?php
        }
        mysqli_close($conn);
        ?>

</body>
</html>