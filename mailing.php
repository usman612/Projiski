<?php
// error_reporting(E_ALL);
//  echo "sending mails2";
error_reporting(E_ALL); ini_set('display_errors', '1');
// require '/var/www/html/sendmail.php';
//  $to = "khurramgujjar40@gmail.com";
//  $subject = "Test Mail Subject";
//  $body = "Hi Email service is working Amazon SES"; // HTML  tags
// // echo "body  = ".$body;
// // $mailstatus=Send_Mail($to,$subject,$body);
// // echo "mailstatus = ".$mailstatus;


 require 'PHPmailer/class.phpmailer.php';
// $from = "anwarmalik@hireirish.ie";
 $mail = new PHPMailer();
// $mail->IsSMTP(true); // SMTP
// $mail->SMTPAuth   = true;  // SMTP authentication
// $mail->Mailer = "smtp";
// $mail->Host= "tls://email-smtp.us-east.amazonaws.com"; // Amazon SES
// $mail->Port = 465;  // SMTP Port
// $mail->Username = "AKIAIN24ZE7TEAXU5BBA";  // SMTP  Username
// $mail->Password = "AlCCeze8OX+4d10buI2+4kZHePUgzJAW0B40alYhWIJJ";  // SMTP Password
// $mail->SetFrom($from, 'Anwar Malik');
// $mail->AddReplyTo($from,'Technical Support');
// $mail->Subject = $subject;
// $mail->MsgHTML($body);
// $address = $to;
// $mail->AddAddress($address, $to);
// if(!$mail->Send())
// echo  "mail not sent";
// else
// echo "mail  send";



// Tell PHPMailer to use SMTP
$mail->isSMTP(true);

// Replace sender@example.com with your "From" address. 
// This address must be verified with Amazon SES.
$mail->setFrom('anwarmalik@hireirish.ie', 'Sender Name');

// Replace recipient@example.com with a "To" address. If your account 
// is still in the sandbox, this address must be verified.
// Also note that you can include several addAddress() lines to send
// email to multiple recipients.
$mail->addAddress('khurramgujjar40@gmail.com', 'Recipient Name');

// Replace smtp_username with your Amazon SES SMTP user name.
$mail->Username = 'AKIAIN24ZE7TEAXU5BBA';

// Replace smtp_password with your Amazon SES SMTP password.
$mail->Password = 'AlCCeze8OX+4d10buI2+4kZHePUgzJAW0B40alYhWIJJ';
    
// Specify a configuration set. If you do not want to use a configuration
// set, comment or remove the next line.
$mail->addCustomHeader('X-SES-CONFIGURATION-SET', 'ConfigSet');
 
// If you're using Amazon SES in a region other than US West (Oregon), 
// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP  
// endpoint in the appropriate region.
$mail->Host = 'email-smtp.us-east-1.amazonaws.com';

// The subject line of the email
$mail->Subject = 'Amazon SES test (SMTP interface accessed using PHP)';

// The HTML-formatted body of the email
$mail->Body = '<h1>Email Test</h1>
    <p>This email was sent through the 
    <a href="https://aws.amazon.com/ses">Amazon SES</a> SMTP
    interface using the <a href="https://github.com/PHPMailer/PHPMailer">
    PHPMailer</a> class.</p>';

// Tells PHPMailer to use SMTP authentication
$mail->SMTPAuth = true;

// Enable TLS encryption over port 587
$mail->SMTPSecure = 'tls';
$mail->Port = 25;

// Tells PHPMailer to send HTML-formatted email
$mail->isHTML(true);

// The alternative email body; this is only displayed when a recipient
// opens the email in a non-HTML email client. The \r\n represents a 
// line break.
$mail->AltBody = "Email Test\r\nThis email was sent through the 
    Amazon SES SMTP interface using the PHPMailer class.";

if(!$mail->send()) {
    echo "Email not sent. " , $mail->ErrorInfo , PHP_EOL;
} else {
    echo "Email sent!" , PHP_EOL;
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
   
</head>
<body>
    <p>hello</p>
</body>
</html>