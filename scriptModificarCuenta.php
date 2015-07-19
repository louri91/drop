<!-- 

 Script PHP que permite modificar una cuenta.

-->
<?php
session_start();
include_once ('scriptConexionBD.php');
$conn = dbConnect();

$Login = $_SESSION['usuario'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];

$sql = "SELECT correo, pass FROM usuarios WHERE login = '$Login';";
$result = mysqli_query($conn, $sql);

while ($usuario = mysqli_fetch_assoc($result)) {
    $oldcorreo = $usuario['correo'];
    $oldpass = $usuario['pass'];
}

$sql = "SELECT correo FROM usuarios WHERE correo = '$correo';";
$result = mysqli_query($conn, $sql);

if ($result->num_rows == 1 && $oldcorreo != $correo) {
    mysqli_close($conn);
    $Error = "ERROR: Este correo ya está registrado.";
    ?>
    <script languaje="javascript">
        location.href = "modificarCuenta.php?error=<?php echo $Error ?>";
    </script>
    <?php
} else {
    if (strlen($pass) > 5) {

        if ($oldpass == $pass) {
            $sql = "UPDATE usuarios SET correo='$correo' WHERE  login='$Login';";
        } else {
            $pass = md5($pass);
            $sql = "UPDATE usuarios SET correo='$correo', pass='$pass' WHERE  login='$Login';";
        }
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        $Success = "";
            ?>
            <script languaje="javascript">
                location.href = "ficherosUsuario.php?success=<?php echo $Success ?>";
            </script>
            <?php
        
    } else {
        $Error = "ERROR: La contraseña debe contener al menos 5 caractéres.";
    //header('Location: nuevaCuenta.php?error='.$Error);
    ?>
    <script languaje="javascript">
        location.href = "ficherosUsuario.php?error=<?php echo $Error ?>";
    </script>
    <?php
    }
}
?>