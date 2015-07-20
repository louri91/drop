
<?php
session_start();
include_once ('scriptConexionBD.php');
$conn = dbConnect();

$user = $_SESSION['usuario'];

$id = $_GET['id'];
$usuario = $_POST['login'];

$sql = "SELECT correo FROM usuarios WHERE login = '$usuario' AND login <> '$user';";
$result = mysqli_query($conn, $sql);

$sql = "SELECT fecha FROM compartidos WHERE id='$id' AND login='$usuario';";
$result1 = mysqli_query($conn, $sql);



if ($result->num_rows == 0) {
    mysqli_close($conn);
    $Error = "ERROR: No puedes compartirlo contigo mismo ni con usuarios inexistentes.";
    ?>
    <script languaje="javascript">
        location.href = "ficherosUsuario.php?error=<?php echo $Error ?>";
    </script>
    <?php
} else if ($result1->num_rows == 1) {  
    $user = mysqli_fetch_array($result1);
    $fecha = date("d/m/Y H:i:s", strtotime($user['fecha']));
    
    mysqli_close($conn);
    $Error = "ERROR: Ya tienes compartido el archivo con $usuario desde el $fecha.";
    ?>
    <script languaje="javascript">
        location.href = "ficherosUsuario.php?error=<?php echo $Error ?>";
    </script>
    <?php
} else {


    $ahora = date("Y/m/d H:i:s", time());
    $sql = "INSERT INTO compartidos VALUES ($id, '$usuario', '$ahora');";

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
}