<?php require_once("banco/mostrar-alerta.php");
require_once("email/PHPMailerAutoload.php");
session_start();
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];


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
$mail->Subject = "Email de contato da Fatec Barueri";
$mail->msgHTML("<html>De: {$nome}<br/>Email: {$email}<br/>Mensagem: {$mensagem}</html>");
$mail->AltBody = "De: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

if($mail->send()) {
	$_SESSION["success"] = "Mensagem enviada com sucesso";
	header("Location: contatar-aluno.php");
} else {

	$_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
	header("Location: contatar-aluno.php");
}
die();
