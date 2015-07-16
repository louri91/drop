<!-- 

 Script PHP que introduce un nuevo usuario en el sistema, y da error si el usuario
 no se está creando correctamente.

-->
<?php

include_once ('scriptConexionBD.php');
$conn = dbConnect();
session_start();

$Correo = $_POST['correo'];
$Login = $_POST['login'];
$Pass = md5($_POST['pass']);

/*
 * Comprueba que el cliente no esté creado, de ser así lanza un error y vuelve al
 * cuestionario. 
 * VOLVER AL CUESTIONARIO CON LOS DATOS INSERTADOS
 */
$sql = "select correo from usuarios where correo='$Correo'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows == 1) {
    mysqli_close($conn);
    ?>
    <script languaje="javascript">
        alert("ERROR: Este correo ya está registrado.");
        window.history.back();
    </script>
    <?php

} else {

    $sql = "INSERT INTO usuarios VALUES ('$Correo', '$Login', '$Pass', '2015/07/16');";

    if (mysqli_query($conn, $sql)) {
        ?>
        <script languaje="javascript">
            alert("La cuenta ha sido creada correctamente.");
            location.href = "index.php";
        </script>
        <?php
       
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>