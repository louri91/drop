<?php
session_start();
$Login = $_SESSION['usuario'];
$Busqueda = $_GET['busqueda'];
$oldarchivo = "";
include_once 'scriptConexionBD.php';
$conn = dbConnect();
$sql = "SELECT * FROM archivos WHERE Usuarios_login = '$Login' AND nombre like '%$Busqueda%'";
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

    <td><?php echo date("d/m/Y H:i:s", strtotime($archivo['ultimaSub'])); ?></td>
    <td><?php if ($archivo['Usuarios_login'] != $Login) echo $archivo['Usuarios_login']; ?></td>

    <?php
    if ($oldarchivo == $archivo['nombre']) {
        echo '<td>';
    } else if ($archivo['Usuarios_login'] != $Login) {
        echo '<td>';
    } else {
        ?>
        <td><button class="btn btn-info" onclick="FunctionCompartir(<?php echo $archivo['id']; ?>)">Compartir</button></td>
        <?php
    }
    ?>

    <?php
    if ($archivo['Usuarios_login'] == $Login) {
        ?>
        <td><button class="btn btn-danger" onclick="FunctionEliminar(<?php echo $archivo['id']; ?>)">Eliminar</button></td>
        <?php
    } else {
        ?>
        <td><button class="btn btn-warning" onclick="FunctionAbandonar(<?php echo $archivo['id']; ?>)">Abandonar</button></td>
        <?php
    }
    ?>

    </tr>

    <?php
    $oldarchivo = $archivo['nombre'];

    }
    mysqli_close($conn);
    ?>