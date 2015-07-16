<?php

//Esto viene de un formulario de contacto que se enviaba por email al administrador de la página
if(isset($_POST['email']) && isset($_POST['nombre']) && isset($_POST['consulta']))
{
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$consulta = $_POST['consulta'];
	$asunto = $_POST['asunto'];
	
	//Aqui rellenar con el correo de quien lo envía, en nuestro caso era un correo a nosotros mismos con la consulta del usuario	
	$from = '<websibw@gmail.com>';
	$to = $_POST['email'];
	$me = $from;
	$subject = '[Mensaje web]'.$asunto;
	$body = $consulta;

	$headers = array(
		'From' => $from,
		'To' => $to,
		'Subject' => $subject
	);
	
	$body = $consulta;

	$me_headers = array(
		'From' => $from,
		'To' => $me,
		'Subject' => $subject
	);
	//Aqui la configuración de la cuenta, mail y contraseña, lo demás funciona perfecto
	$smtp = Mail::factory('smtp', array(
			'host' => 'ssl://smtp.gmail.com',
			'port' => '465',
			'auth' => true,
			'username' => 'websibw@gmail.com',
			'password' => 'websibw1234'
		));
	//Esto envía una copia a cada parte para que se tenga constancia de la consulta.
	$mail = $smtp->send($to, $headers, $body);
	$mail2 = $smtp->send($me, $me_headers, $body);
	if (PEAR::isError($mail)) {
		echo('<p>' . $mail->getMessage() . '</p>');
	} else {
		//esto redirige a la página que quieras una vez se finalice el envío del correo
		header('Location: ../index.php?categoria=contacta');
	}
}
?>