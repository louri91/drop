
<?php

session_start();
include_once ('scriptConexionBD.php');
$conn = dbConnect();

$id = $_GET['id'];
$usuario = $_POST['correo'];

$ahora =  date("Y/m/d H:i:s",time());

$sql2 = "SELECT usuarios.login FROM usuarios WHERE usuarios.correo='$usuario';";
$result = mysqli_query($conn, $sql2);

while ($usuario1 = mysqli_fetch_assoc($result)) {
    $login = $usuario1['login'];
}

$sql = "INSERT INTO compartidos VALUES ($id, '$login', '$ahora');";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    ?>
    <script type="text/javascript">
        location.href = "index.php";
    </script>
    <?php

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
