<?php
require_once("../model/mostrar-alerta.php");
require_once("../email/PHPMailerAutoload.php");
session_start();

$link = 'http://www.fatecbarueri.com/APP/Egresso/alunos/';
$data = date('Y-m-d');


$email = $_GET['email'];
$RA = $_GET['RA'];
$id = $_GET['id'];
$mensagem = "Olá {$email}, percebemos que você está ausente nos ultimos dias letivos da faculdade,
                gostariamos de saber se podemos lhe ajudar de alguma forma, entre na plataforma fatec alunos
                    usando seu email e cpf para fazer login, siga os primeiros passos e responda o questionario para poder nos ajudar a te ajudar! Juntos somos mais fatec.";

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
$mail->Subject = "Email de contato da Fatec Barueri\n ".$data;
$mail->msgHTML("<html><strong>De</strong>: FATEC BARUERI <br/><strong>Email</strong>:  fatecbarueri.adm@gmail.com  <br/><strong>Mensagem</strong>: {$mensagem}<br/><strong>Link</strong>: {$link}</html>");
$mail->CharSet ="UTF-8";
$mail->AddAttachment("http://www.fatecbarueri.com/projeto/Alunos/");
$mail->AltBody = "De: FATEC BARUERI\nemail: fatecbarueri.adm@gmail.com \nmensagem: {$mensagem}\nlink: {$link}";

if($mail->send()) {
    $_SESSION["success"] = "Mensagem enviada com sucesso";
	header("Location: ../view/frequencia-alunos.php?id=$id&RA=$RA&email=$email");
} else {
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
	header("Location: ../view/frequencia-alunos.php?id=$id&RA=$RA&email=$email");
}
die();
