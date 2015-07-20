<?php
include_once ('scriptConexionBD.php');
$conn = dbConnect();
$id = $_GET['id'];
$sql = "SELECT * FROM archivos WHERE id='$id';";
$result = mysqli_query($conn, $sql);
$archivo = mysqli_fetch_array($result);
$nombre = $archivo['nombre'];
$contenido = $archivo['contenido'];
$tipo = $archivo['tipo'];
$tamanio = $archivo['tamanio'];
echo '<title>';
echo $nombre;
echo '</title>';

if($tipo=="image/png"){
	echo '<img src="data:image/png;base64,'.base64_encode($contenido).'">';
}
if($tipo=="image/jpeg"){
	echo '<img src="data:image/jpeg;base64,'.base64_encode($contenido).'">';
}

header("Content-type:". $archivo['tipo']);

if($tipo=="application/pdf"){
	print $contenido;
}

//header("Content-type:". $archivo['tipo']);
//header("Content-length:". $tamanio);
//header("Cache-control: private");
//header("Content-Disposition: inline; filename=$nombre");
//header("Content-Disposition: attachment; filename='Practica1.pdf'");
//echo $archivo['contenido'];
//echo base64_decode($archivo['contenido']);
?>