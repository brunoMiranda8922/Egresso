<?php
require_once("banco/mostrar-alerta.php");
require_once("email/PHPMailerAutoload.php");
session_start();

$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];
$link = 'http://www.fatecbarueri.com/projeto/Alunos/';
$data = date('Y-m-d');

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "fatecbarueri.adm@gmail.com";
$mail->Password = "MLKPIRANHA8922";

$mail->setFrom("fatecbarueri.adm@gmail.com", "FATEC BARUERI");
$mail->addAddress($email);
$mail->AddReplyTo('fatecbarueri.adm@gmail.com', 'Email');
$mail->Subject = "Email de contato da Fatec Barueri\n".$data;
$mail->msgHTML("<html><strong>De</strong>: {$nome}<br/><strong>Email</strong>: {$email}<br/><strong>Mensagem</strong>: {$mensagem}<br/><strong>Link</strong>: {$link}</html>");
$mail->CharSet ="UTF-8";
$mail->AddAttachment("http://www.fatecbarueri.com/projeto/Alunos/"); 
$mail->AltBody = "De: {$nome}\nemail:{$email}\nmensagem: {$mensagem}\nlink: {$link}";

if($mail->send()) {
	$_SESSION["success"] = "Mensagem enviada com sucesso";
	header("Location: contato.php");
} else {
	$_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
	header("Location: contato.php");
}
die();