<!-- 

 Script PHP que introduce un nuevo archivo en el sistema.

-->

<?php
session_start();
include_once ('scriptConexionBD.php');

if(isset($_POST['archivo'])){
    $Nombre = $_POST['archivo']['name'];
    $Tipo = $_POST['archivo']['type'];
    $Tam = $_POST['archivo']['size'];
    $Archivo = $_POST['archivo']['tmp_name'];
    $Error = $_POST['archivo']['error'];

    $fechaHoy = date("Y-m-d H:i:s");



    $fp = fopen($Archivo, "rb");
    $contenido = fread($fp, $Tam);
    $contenido = addslashes($contenido);
    fclose($fp);

    $sql = "INSERT INTO archivos VALUES (0, '$Nombre', '$contenido', '$Tipo', '$fechaHoy', '$Tam', 'correo', '$Login', '$IP');";

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

if (!empty($_FILES)) {
    
    $conn = dbConnect();
    $Login = $_SESSION['usuario'];
    
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        $IP = $_SERVER['HTTP_CLIENT_IP'];
       
    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        $IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    else $IP = $_SERVER['REMOTE_ADDR'];

    
    $Nombre = $_FILES['file']['name'];
    $Tipo = $_FILES['file']['type'];
    $Tam = $_FILES['file']['size'];
    $Archivo = $_FILES['file']['tmp_name'];
    $Error = $_FILES['file']['error'];
    $fechaHoy = date("Y-m-d H:i:s");



    $fp = fopen($Archivo, "rb");
    $contenido = fread($fp, $Tam);
    $contenido = addslashes($contenido);
    fclose($fp);

    $sql = "INSERT INTO archivos VALUES (0, '$Nombre', '$contenido', '$Tipo', '$fechaHoy', '$Tam', 'correo', '$Login', '$IP');";

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
?>