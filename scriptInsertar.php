<!-- 

 Script PHP que introduce un nuevo archivo en el sistema.

-->

<?php
include_once ('scriptConexionBD.php');
$conn = dbConnect();
if (!empty($_FILES)) {
    $Nombre = $_FILES['archivo']['name'];
    $Tipo = $_FILES['archivo']['type'];
    $Tam = $_FILES['archivo']['size'];
    $Archivo = $_FILES['archivo']['tmp_name'];
    $Error = $_FILES['archivo']['error'];
    $fechaHoy = date("Y-m-d H:i:s");

    $fp = fopen($Archivo, "rb");
    $contenido = fread($fp, $Tam);
    $contenido = addslashes($contenido);
    fclose($fp);

    $sql = "INSERT INTO archivos VALUES (0, '$Nombre', '$contenido', '$Tipo', '$fechaHoy', '$Tam', 'admin', 'admin');";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        ?>
        <script type="text/javascript">
            alert("Todo correcto");
        </script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>