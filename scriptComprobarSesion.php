<!-- 

 Script PHP que se usa para comprobar que el usuario y contraseña introducidos
 en el login están guardados en el sistema y son correctos. De ser datos correctos
 entra en la cuenta especificada.

-->
<?php
session_start();

include_once ('scriptConexionBD.php');
$conn = dbConnect();

$Login = $_POST['user'];
$Pass = $_POST['pass'];
$Pass = md5($Pass);
$sql = "select login, pass from usuarios where login='$Login' and pass='$Pass';";
$result = mysqli_query($conn, $sql);

//Si el resultado obtenido no tiene nada
//Muestra el error y redirige al index
if ($result->num_rows == 0) {
    mysqli_close($conn);
    ?>
    <script languaje="javascript">
        alert("Usuario o contraseña incorrecto.");
        location.href = "index.php";
    </script>
    <?php

} else {
	
    $_SESSION['usuario'] = $Login;
    
    $ahora =  date("d/m/Y H:i:s",time());
    
    $sql = "UPDATE usuarios SET ultConexion = '$ahora' WHERE login='$Login';";
    $result = mysqli_query($conn, $sql);
    
    $sql = "SELECT ultConexion FROM usuarios WHERE login='$Login';";
    $result = mysqli_query($conn, $sql);
    
    while ($usuario = mysqli_fetch_assoc($result)) {
    $conex = $usuario['ultConexion'];
    }
    $conex = date("d/m/Y H:i:s", strtotime($conex));
    
    mysqli_close($conn);
    ?>
    <script languaje="javascript">
        alert("Última conexión: <?php echo $conex ?>");
        location.href = "formulario.php";
    </script>
    <?php
	
    }
	
?>