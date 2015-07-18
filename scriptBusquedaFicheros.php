<?php
session_start();
$Login = $_SESSION['usuario'];
$Busqueda = $_GET['busqueda'];
include_once 'scriptConexionBD.php';
$conn = dbConnect();
$sql = "SELECT id, nombre, tamanio, ultimaSub FROM archivos WHERE Usuarios_login = '$Login' AND nombre like '%$Busqueda%'";
$result = mysqli_query($conn, $sql);

while ($archivo = mysqli_fetch_assoc($result)) {
    ?>

    <tr>
        <td><a href="scriptDescargar.php?id=<?php echo $archivo['id']; ?>"><?php echo $archivo['nombre']; ?></a></td>
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
        <td><?php echo $archivo['ultimaSub']; ?></td>
    </tr>

    <?php
}
mysqli_close($conn);
?>