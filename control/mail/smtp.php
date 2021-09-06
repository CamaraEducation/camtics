<?php
class SendMail{
    public static function send($from, $to, $Bcc, $subject, $message){
        $header  = $from.'\r\n';
        $header .= 'Bcc:'.$Bcc.'\r\n';
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        mail($to, $subject, $message, $header);
    }
}
?>