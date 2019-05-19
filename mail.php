<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$phone = $_POST['phone'];
$title = $_POST['title'];
$cloth = $_POST['cloth'];
$description = $_POST['description'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  						    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'specodejda42@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'kem42qazxswwsxzaq12321'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('specodejda42@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('cdmaxmojb@emlhub.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка на заказ Спецодежды';
$mail->Body    = '' .$name. ' оставил заявку, его телефон: ' .$phone. '<br>Название товара: ' .$title. '<br>Ткань: ' .$cloth. '<br>Требования к товару: ' .$description;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: products/thank-you.html');
}
?>