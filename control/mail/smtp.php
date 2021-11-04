<?php
use Snipworks\Smtp\Email;

class SendMail{
    //smtp client
    public static function init($receiver, $subject, $message){
        $mail = new Email($_ENV['SMTP_HOST'], $_ENV['SMTP_PORT']);
        if($_ENV['SMTP_PORT']==587){
            $mail->setProtocol(Email::TLS);
        }
        $mail->setLogin($_ENV['SMTP_USER'], $_ENV['SMTP_PASS']);
        $mail->addTo($receiver, '');
        $mail->setFrom($_ENV['SMTP_MAIL'], $_ENV['SMTP_NAME']);
        $mail->setSubject($subject);
        $mail->setHtmlMessage($message);

        if($mail->send()){
            setcookie('notice', 'df_mail_200', time() + (180), "/");
            echo 'success';
        } else {
            setcookie('notice', 'df_mail_201', time() + (180), "/");
            echo 'fail';
        }
    }

    //php sendmail
    public static function send($from, $to, $Bcc, $subject, $message){
        $header  = $from.'\r\n';
        $header .= 'Bcc:'.$Bcc.'\r\n';
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        mail($to, $subject, $message, $header);
    }
}
?>