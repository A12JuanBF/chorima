<?php

require '../clases/PHPMailer/PHPMailerAutoload.php';
// Creando una nueva instancia de PHPMailer
$name = @trim(stripslashes($_POST['name']));
$email = @trim(stripslashes($_POST['email']));
$subject = @trim(stripslashes($_POST['subject']));
$message = @trim(stripslashes($_POST['message']));
if($_POST['number']!="")
{
$number = "Teléfono:".@trim(stripslashes($_POST['number']));
}
else{
    $number="";
}
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.strato.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587; //465
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "contacto@atabernadachorima.es";
//Password to use for SMTP authentication
$mail->Password = "chorimatoxo1";
//Set who the message is to be sent from
$mail->setFrom('contacto@atabernadachorima.es', 'Mensaje-cliente-web (A taberna da chorima)');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('atabernadachorima@gmail.com', 'Bego');
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->Body = "<h4>Mensaje enviado desde la web A taberna da chorima</h4><h5>Cliente - ".$_POST['name']."</h5><p>".$_POST['message']."</p><p>Email del cliente: <b>".$email."</b></p><p>".$number."</p>";
$mail->IsHTML(true);
//Replace the plain text body with one created manually
$mail->AltBody = $message;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    //echo "Mailer Error: " . $mail->ErrorInfo;
    echo FALSE;
} else {
    echo true;
    confirmar($_POST);
}

function confirmar($param) {
    
    $name = @trim(stripslashes($param['name']));
$email = @trim(stripslashes($param['email']));
$subject = @trim(stripslashes($param['subject']));
$message = @trim(stripslashes($param['message']));
if($param['number']!="")
{
$number = "Teléfono:".@trim(stripslashes($param['number']));
}
else{
    $number="";
}
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.strato.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587; //465
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "contacto@atabernadachorima.es";
//Password to use for SMTP authentication
$mail->Password = "chorimatoxo1";
//Set who the message is to be sent from
$mail->setFrom('contacto@atabernadachorima.es', 'Mensaxe-cliente-web (A taberna da chorima)');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($param['email'], $param['name']);
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->Body = "<div style=' width:100%;'><img style=' width:30%;' src='http://atabernadachorima.es/images/logo.jpg'/></div><br><br><h3 style='background-color: #5882FA; width:100%; text-align:center; border-radius: 20px 20px 0px 0px;'>Mensaxe enviada por ".$param['name']."</h3><h4 style='text-align:center;'>".$param['subject']."</h4><p><b>".$param['message']."</b></p><hr style='background-color: #5882FA; color:#5882FA; height: 3px;'><br><p><h3>Esta mensaxe será respondida o mail <i>".$param['email']."</i> polo/a responsable de Relacións coa Clientela no tempo máis breve posible.</h3></p><p>Grazas, atentamente o equipo de <a href='http://atabernadachorima.es'>atabernadachorima.es</a></p>";
$mail->IsHTML(true);
//Replace the plain text body with one created manually
$mail->AltBody = $message;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    //echo "Mailer Error: " . $mail->ErrorInfo;
    echo FALSE;
} else {
    echo true;
}
}
