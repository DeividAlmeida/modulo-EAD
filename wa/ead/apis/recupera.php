<?php
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');
$email = $_POST['email'];
$valida = DBRead('ead_usuario','*',"WHERE email = '{$email}'", "LIMIT 1")[0];
if(empty($valida)){
   echo 'E-mail inválido!';
}else{
    echo 1;

 $readm = DBRead('ead_config_email','*',"WHERE id = '1'")[0];
// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php 
include "../../../ead/PHPMailer-master/PHPMailerAutoload.php";
include "../../../ead/PHPMailer-master/class.phpmailer.php"; 
 
// Inicia a classe PHPMailer 
$mail = new PHPMailer(); 
 
// Método de envio 
$mail->IsSMTP(); 
 
// Enviar por SMTP 
$mail->Host = $readm['email_servidor'] ; 
 
// Você pode alterar este parametro para o endereço de SMTP do seu provedor 
$mail->Port = $readm['email_porta']; 
 
 
// Usar autenticação SMTP (obrigatório) 
$mail->SMTPAuth = true; 
 
// Usuário do servidor SMTP (endereço de email) 
// obs: Use a mesma senha da sua conta de email 
$mail->Username = $readm['email_usuario']; 
$mail->Password = $readm['email_senha'] ; 
 
// Configurações de compatibilidade para autenticação em TLS 
$mail->SMTPOptions = array( $readm['email_protocolo_seguranca'] => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 
 
// Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro. 
//$mail->SMTPDebug = 2; 
 
// Define o remetente 
// Seu e-mail 
$mail->From = $readm['remetente']; 
 
// Seu nome 
$mail->FromName = $readm['nome']; 
 
// Define o(s) destinatário(s) 
$mail->AddAddress($email, $valida['nome']); 
 
// Opcional: mais de um destinatário
// $mail->AddAddress('fernando@email.com'); 
 
// Opcionais: CC e BCC
// $mail->AddCC('joana@provedor.com', 'Joana'); 
// $mail->AddBCC('roberto@gmail.com', 'Roberto'); 
 
// Definir se o e-mail é em formato HTML ou texto plano 
// Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
$mail->IsHTML(true); 
 
// Charset (opcional) 
$mail->CharSet = 'UTF-8'; 
 
// Assunto da mensagem 
$mail->Subject = "Recuperação de Senha"; 

$info = "Olá, esse é um e-mail para recuperar sua senha de acesso.Para recuperar sua senha basta clicar <a href='".$_POST['origin']."?Z=".base64_encode($valida['id'])."'>aqui</a>";
 
// Corpo do email 
$mail->Body = $info; 
 
// Opcional: Anexos 
// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 
 
// Envia o e-mail 
$enviado = $mail->Send(); 

}