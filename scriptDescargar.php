<!-- 

 Script PHP que introduce un nuevo archivo en el sistema.

-->

<?php
include_once ('scriptConexionBD.php');
$conn = dbConnect();
$id = $_GET['id'];

$sql = "SELECT nombre, contenido, tipo, tamanio FROM archivos WHERE id='$id';";

$result = mysqli_query($conn, $sql);

while ($archivo = mysqli_fetch_assoc($result)) {
    $nombre = $archivo['nombre'];    
    $contenido = $archivo['contenido'];
    $tipo = $archivo['tipo'];
    $tamanio = $tamanio['tamanio'];
}

    header("Content-type: $tipo");
    //header("Content-length: $tamanio"); 
    //header("Content-Disposition: inline; filename=$nombre"); 
//header("Content-Disposition: attachment; filename='Practica1.pdf'");
print $contenido;
?>