<!-- 

 Script PHP que introduce un nuevo archivo en el sistema.

-->

<?php

include_once ('scriptConexionBD.php');
$conn = dbConnect();

$Nombre = $_FILES['archivo']['name'];
$Tipo = $_FILES['archivo']['type'];
$Tam = $_FILES['archivo']['size'];
$Archivo = $_FILES['archivo']['tmp_name'];

 $fp = fopen($Archivo, "rb");
 $contenido = fread($fp, $Tam);
 $contenido = addslashes($contenido);
 fclose($fp); 
    
$sql = "INSERT INTO archivos VALUES (0, '$Nombre', '$contenido', '$Tipo');";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    ?>
    <script languaje="javascript">
        alert("Todo correcto");
    </script>
    <?php

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>