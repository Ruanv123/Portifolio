<?php
date_default_timezone_set('America/Sao_Paulo');
 
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nome = isset($_POST['name']) ? trim($_POST['name']) : 'Nao informado';
$nome = isset($_POST['email-input']) ? trim($_POST['email-input']) : 'Nao informado';
$nome = isset($_POST['mensagem']) ? trim($_POST['mensagem']) : 'Nao informado';
$data = date('d/m/Y H:i:s');

 
if((isset($_POST['email-input']) && !empty(trim($_POST['email-input']))) && (isset($_POST['mensagem']) && !empty(trim($_POST['mensagem'])))) {
 
	$nome = !empty($_POST['name']) ? $_POST['name'] : 'Não informado';
	$email = $_POST['email_input']; ? $_POST['email-input'] : 'Não informado';
	$mensagem = $_POST['mensagem']; ? $_POST['mensagem'] : 'Não informado';
	$data = date('d/m/Y H:i:s');
 
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;i
	$mail->Username = '';
	$mail->Password = '';
	$mail->Port = 587;
 
	$mail->setFrom('ruanvictorfake22@gmail.com');
	$mail->addAddress('ruanvictormr@gmail.com');
 
	$mail->isHTML(true);
	$mail->Subject = $assunto;
	$mail->Body = "Nome: {$name}<br>
				   Email: {$email_input}<br>
				   Mensagem: {$mensagem}<br>
				   Data/hora: {$data}";
 
	if($mail->send()) {
		echo 'Email enviado com sucesso.';
	} else {
		echo 'Email não enviado.';
	}
} else {
	echo 'Não enviado: informar o email e a mensagem.';
}