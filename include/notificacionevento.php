<?php

require 'PHPMailer/PHPMailerAutoload.php';

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

function notificacion($param, $datos) {


    $email = @trim(stripslashes($param));

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
    $mail->CharSet = "UTF-8";
//Set the hostname of the mail server
    $mail->Host = "smtp.strato.com";
//Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Port = 587; //465
//Whether to use SMTP authentication
    $mail->SMTPAuth = true;
//Username to use for SMTP authentication
    $mail->Username = "info-eventos@atabernadachorima.es";
//Password to use for SMTP authentication
    $mail->Password = "chorimatoxo1";
//Set who the message is to be sent from
    $mail->setFrom('info-eventos@atabernadachorima.es', 'A taberna da chorima');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
    $mail->addAddress($email, 'Medio');
//Set the subject line
    $mail->Subject =$datos['tipo']."-".$datos['nombre'];
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
    $mail->Body = "<div style=' width:100%;'><img style=' width:40%;' src='http://atabernadachorima.es/images/logo.jpg'/></div><br><h3 style='background-color: #5882FA; width:100%; margin:0 auto; text-align:center; border-radius: 15px 15px 0px 0px; padding:5px;'>Evento na Taberna da Chorima</h3><div style='width:45%; float:left; '><img style='width:100%; margin-top:3px;' src='http://atabernadachorima.es/img-eventos/".$datos['imagenperfil']."' /></div><div style='width:48%; float:left; margin-left:5px;'><h2 style=' width:100%;'>" . $datos['tipo'] . " - " . $datos['nombre'] . "</h2><h3 style='margin-left:2px;'>Día " . $datos['fecha'] . " ás " . $datos['hora'] . "</h3>"
            . "</div><br>"
            . "<div style='width:90%; float:left; margin:0 auto;'><p margin-left:2px;>" . nl2br($datos['descripcion']) . "<p margin-left:2px;><a href='http://atabernadachorima.es/proximos_eventos/evento.php?id=" . $datos['id'] . "'>Ver evento na web da Taberna da Chorima</a></p></p></div>"
            . "<p></p>"
            . "<div style='width:100%; float:left;'><hr style='background-color: #5882FA; color:#5882FA; height: 3px;'><p><h5>PROTECCIÓN DE DATOS</h5></p><p><small>De conformidad con lo establecido en el Art. 5 de la Ley Orgánica 15/1999 de diciembre de Protección de Datos de Carácter Personal, por el que se regula el derecho de información en la recogida de datos le informamos de los siguientes extremos:</small></p>"
            . "<ul><li><small>Los datos de carácter personal que nos ha suministrado en esta y otras comunicaciones mantenidas con usted serán objeto de tratamiento en los ficheros responsabilidad de <b>ESUGANI S.L.</b></small></li>"
            . "<li><small>La finalidad del tratamiento es la de gestionar de forma adecuada la prestación del servicio que nos ha requerido. Asimismo estos datos no serán cedidos a terceros, salvo las cesiones legalmente permitidas.</small></li>"
            . "<li><small>Los datos solicitados a través de esta y otras comunicaciones son de suministro obligatorio para la prestación del servicio. Estos son adecuados, pertinentes y no excesivos.</small></li>"
            . "<li><small>Su negativa a suministrar los datos solicitados implica la imposibilidad prestarle el servicio.</small></li>"
            . "<li><small>Asimismo, le informamos de la posibilidad de ejercitar los correspondiente derechos de acceso, rectificación, cancelación y oposición de conformidad con lo establecido en la Ley 15/1999 ante ESUGANI S.L. como responsables del fichero. Los derechos mencionados los puede ejercitar a través de los siguientes medios: Enviando un mail a contacto@atabernadachorima.es </small></li></ul>"
            . "<p><h5>CONFIDENCIALIDAD</h5></p>"
            . "<p><small>La información que pueda contener este mensaje, así como su(s) archivo(s) adjunto(s) es totalmente confidencial y va dirigida única y exclusivamente a su destinatario. Si usted lee este mensaje y no es el destinatario señalado, o la persona responsable de entregar el mensaje al destinatario, o ha recibido esta comunicación por error, le recordamos que está prohibida, y puede ser ilegal, cualquier divulgación, distribución o reproducción de esta comunicación, y le rogamos que nos lo notifique inmediatamente y nos devuelva el mensaje original a la dirección arriba mencionada. Gracias.</small></p>"
            . "<p><small>Virus: Se han tomado las medidas pertinentes para asegurar que este mensaje y sus ficheros adjuntos estén libres de virus. No obstante, recomendamos encarecidamente que el receptor del mismo proceda igualmente a utilizar los medios necesarios para asegurarse de la inexistencia de virus y/o código malicioso alguno.</small></p>"
            . "<p><small>Podes deixar de seguirnos, segue os pasos neste enlace -> <a href='http://atabernadachorima.es/baixa'>Dar de baixa</a></small></p></div>";
    $mail->IsHTML(true);
//Replace the plain text body with one created manually
    $mail->AltBody = 'Evento na Taberna da Chorima';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
    if (@!$mail->send()) {
        //echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        return true;
    }
}
