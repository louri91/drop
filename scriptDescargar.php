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
if($tipo=="image/gif"){
	echo '<img src="data:image/gif;base64,'.base64_encode($contenido).'">';
}

header("Content-type:". $archivo['tipo']);

if($tipo=="application/pdf"){
	print $contenido;
}

if($tipo!="image/png" && $tipo!="image/jpeg" && $tipo!="application/pdf" && $tipo!="image/gif"){
	header("Pragma: public"); // required 
	header("Expires: 0"); 
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
	header("Cache-Control: private",false); // required for certain browsers 
	header("Content-type:". $archivo['tipo']);
	header("Content-Disposition: attachment; filename=".$nombre); 
	header("Content-Transfer-Encoding: binary"); 
	header("Content-Length: ".$tamanio);  
	ob_clean(); 
	flush(); 
	echo $contenido;
}
?>