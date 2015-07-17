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
    $Error = "Usuario o contraseña incorrectos";
    header('Location: index.php?error='.$Error);

} else {
	
    $_SESSION['usuario'] = $Login;
    
    $ahora =  date("Y/m/d H:i:s",time());
    
    $sql = "SELECT ultConexion FROM usuarios WHERE login='$Login';";
    $result = mysqli_query($conn, $sql);
    
    while ($usuario = mysqli_fetch_assoc($result)) {
    $conex = $usuario['ultConexion'];
    }
    $conex = date("d/m/Y H:i:s", strtotime($conex));
    
    $sql = "UPDATE usuarios SET ultConexion = '$ahora' WHERE login='$Login';";
    $result = mysqli_query($conn, $sql);
    
    mysqli_close($conn);
    
    header('Location: ficherosUsuario.php?ult='.$conex);

    }
	
?>