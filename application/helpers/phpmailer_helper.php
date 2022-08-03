<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_mail($email,$pwd,$name){
    require $_SERVER['DOCUMENT_ROOT'].'/phpmailer/vendor/autoload.php';
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtpout.secureserver.net';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'support@atheal.in';                     
        $mail->Password   = 'atheal8928565643';
        $mail->SMTPSecure = 'ssl';          
        $mail->Port       =  465; 
        //Recipients
        $mail->setFrom('support@atheal.in', 'Atheal');
        //print_r($email);die;
        $mail->addAddress('dhariyakajal@gmail.com',$name); 
        $mail->isHTML(true);$mail->Subject = 'Forgot Password';
        $mail->Body    ='Your password is:'.$pwd;
        $mail->send();
        return 'Mail has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return "Mail could not be sent";
    }
}

function send_mail_from_user($email,$message,$name){
    $headers = "From: $email";
    mail('support@atheal.in','Arrived Mail',$message,$headers);
//     require $_SERVER['DOCUMENT_ROOT'].'/phpmailer/vendor/autoload.php';
//     $mail =new PHPMailer(true);
// $mail->SMTPDebug = 2;                   
// $mail->isSMTP();                        
// $mail->Host       = 'relay-hosting.secureserver.net';
// $mail->SMTPAuth   = false;               
// $mail->Username   = 'support@atheal.in';     
// $mail->Password   = 'atheal8928565643';         
// //$mail->SMTPSecure = 'tls';              
// $mail->Port       = 25;      
// $mail->setFrom('abhishekmehta.sinontechs@gmail.com','Abhishek');
// $mail->addAddress('support@atheal.in','Atheal');
// $mail->Subject = 'Arrived Mail';
// $mail->Body    = 'Test';
// $mail->send();
    
}

function send($email,$msg,$name){
    
    require $_SERVER['DOCUMENT_ROOT'].'/phpmailer/vendor/autoload.php';
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->SMTPAuth = false;
    $mail->SMTPAutoTLS = false; 
    $mail->Port = 25; 
    //$mail->SMTPSecure = 'none';

    //$mail->AddReplyTo('comercial@email.com.br', 'Me');
    $mail->AddAddress('support@atheal.in', 'Them'); 
    $mail->SetFrom('dhariyakajal@gmail.com', 'Me');
    $mail->Subject = 'PHPMailer Test Subject via smtp, basic with authentication';
    $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
    $mail->MsgHTML("Hi, this is an test email");
    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message has been sent";
    }
}