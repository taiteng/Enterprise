<?php

//$to = "taitengchan@gmail.com";
//$subject = "HTML email";
//
//$message = "
//<html>
//<head>
//<title>HTML email</title>
//</head>
//<body>
//<p>This email contains HTML Tags!</p>
//<table>
//<tr>
//<th>Firstname</th>
//<th>Lastname</th>
//</tr>
//<tr>
//<td>John</td>
//<td>Doe</td>
//</tr>
//</table>
//</body>
//</html>
//";
//
//// Always set content-type when sending HTML email
//$headers = "MIME-Version: 1.0" . "\r\n";
//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//
//// More headers
//$headers .= 'From: <p20012457@student.newinti.edu.my>' . "\r\n";
//
//mail($to, $subject, $message, $headers);

//$headers = 'From: php.mailing.test@gmail.com' . "\r\n" .
//        'MIME-Version: 1.0' . "\r\n" .
//        'Content-Type: text/html; charset=utf-8';
//
//$result = mail("taitengchan@gmail.com", "Hello World", "This is email body", $headers);
//var_dump($result);

ini_set("SMTP","ssl:smtp.gmail.com" );
ini_set("smtp_port","465");
ini_set('sendmail_from', 'taitengchan@gmail.com');          
$to = "p20012457@student.newinti.edu.my";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "taitengchan@gmail.com";
$headers = "From:" . $from;
$retval = mail($to,$subject,$message,$headers);
   if( $retval == true )  
   {
      echo "Message sent successfully...";
   }
   else
   {
      echo "Message could not be sent...";
   }

//$receiver = "taitengchan@gmail.com";
//$subject = "Email Test via PHP using Localhost";
//$body = "Hi, there...This is a test email send from Localhost.";
//$sender = "From:p20012457@student.newinti.edu.my";
//if (mail($receiver, $subject, $body, $sender)) {
//    echo "Email sent successfully to $receiver";
//} else {
//    echo "Sorry, failed while sending mail!";
//}
//
//echo php.info();

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//  
//require 'vendor/autoload.php';
//  
//$mail = new PHPMailer(true);
//  
//try {
//    $mail->SMTPDebug = 2;                                       
//    $mail->isSMTP();                                            
//    $mail->Host       = 'smtp.gfg.com;';                    
//    $mail->SMTPAuth   = true;                             
//    $mail->Username   = 'taitengchan@gmail.com';                 
//    $mail->Password   = 'tengyuhan';                        
//    $mail->SMTPSecure = 'tls';                              
//    $mail->Port       = 587;  
//  
//    $mail->setFrom('taitengchan@gmail.com', 'Taiteng');           
//    $mail->addAddress('p20012457@student.newinti.edu.my', 'TT');
//       
//    $mail->isHTML(true);                                  
//    $mail->Subject = 'Subject';
//    $mail->Body    = 'HTML message body in <b>bold</b> ';
//    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
//    $mail->send();
//    echo "Mail has been sent successfully!";
//} catch (Exception $e) {
//    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//}
