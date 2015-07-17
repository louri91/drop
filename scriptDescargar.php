<!-- 

 Script PHP que introduce un nuevo archivo en el sistema.

-->

<?php
include_once ('scriptConexionBD.php');
$conn = dbConnect();
$id = $_GET['id'];

$sql = "SELECT tipo, contenido FROM archivos WHERE id='$id';";

$result = mysqli_query($conn, $sql);

while ($archivo = mysqli_fetch_assoc($result)) {
    $tipo = $archivo['tipo'];
    $contenido = $archivo['contenido'];
}

header("Content-type: $tipo");
//header("Content-Disposition: attachment; filename='Practica1.pdf'");
print $contenido;
?>