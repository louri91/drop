<!-- 

 Script PHP que introduce un nuevo usuario en el sistema, y da error si el usuario
 no se está creando correctamente.

-->
<?php
include_once ('scriptConexionBD.php');
$conn = dbConnect();
session_start();


$Correo = trim($_POST['correo']); /* Con la función trim eliminamos los espacios en blanco que se hayan podido insertar al inicio y al final de la cadena. */
$Login = trim($_POST['login']);
$Pass = $_POST['pass'];
if (strlen($Pass) > 5) { //Solamente si la contraseña tiene mínimo 5 caracteres dejamos que siga, sino no
    $Pass = md5($Pass);
    /*
     * Comprueba que el cliente no esté creado, de ser así lanza un error y vuelve al
     * cuestionario. 
     * VOLVER AL CUESTIONARIO CON LOS DATOS INSERTADOS
     */

    $sql = "select correo from usuarios where correo='$Correo'";
    $result = mysqli_query($conn, $sql);

    $sql = "select login from usuarios where login='$Login'";
    $result1 = mysqli_query($conn, $sql);

    if ($result->num_rows == 1) {
        mysqli_close($conn);
        $Error = "ERROR: Este correo ya está registrado.";
        //header('Location: nuevaCuenta.php?error='.$Error);
        ?>
        <script languaje="javascript">
            location.href = "nuevaCuenta.php?error=<?php echo $Error ?>";
        </script>
        <?php
    } else if ($result1->num_rows == 1) {
        mysqli_close($conn);
        $Error = "ERROR: Este login ya está usado.";
        ?>
        <script languaje="javascript">
            location.href = "nuevaCuenta.php?error=<?php echo $Error ?>";
        </script>
        <?php
    } else {
        $ahora = date("Y/m/d H:i:s", time());
        $sql = "INSERT INTO usuarios VALUES ('$Correo', '$Login', '$Pass', '$ahora');";

        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            $Success = "";
            //header('Location: index.php?success='.$Success);
            ?>
            <script languaje="javascript">
                location.href = "nuevaCuenta.php?error=<?php echo $Success ?>";
            </script>
            <?php
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
} else {
    $Error = "ERROR: La contraseña debe contener al menos 5 caractéres.";
    //header('Location: nuevaCuenta.php?error='.$Error);
    ?>
    <script languaje="javascript">
        location.href = "nuevaCuenta.php?error=<?php echo $Error ?>";
    </script>
    <?php
}
?>