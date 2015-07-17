<?php

session_start();
$Login = $_SESSION['usuario'];
$Busqueda = $_GET['busqueda'];
include_once 'scriptConexionBD.php';
$conn = dbConnect();
$sql = "SELECT id, nombre, tamanio, ultimaMod FROM archivos WHERE Usuarios_login = '$Login' AND nombre like '%$Busqueda%'";
$result = mysqli_query($conn, $sql);

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