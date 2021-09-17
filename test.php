<?php
    /*$server = new Server(
        $hostname, // required
        $port,     // defaults to '993'
        $flags,    // defaults to '/imap/ssl/validate-cert'
        $parameters
    );

    $connection = $server->authenticate('', '');

    $message is instance of \Ddeboer\Imap\Message
		echo $message->getSubject() .'<b>('. $message->getNumber() .')(' .$message->getId(). ')</b><br>';
		echo $message->getBodyHtml() .'<hr>'; print_r(json_decode(json_encode($message->getHeaders()->get('sender'))))
		$from = json_decode(json_encode($message->getHeaders()->get('sender')));
		$from = $from[0];
		$from = (array) $from;
		echo '<pre>'; print_r($from['personal']); echo '</pre><hr>';
		$from = $message->getFrom();
		echo '<pre>'; print_r($from); echo '</pre>';	    // Message\EmailAddress
		echo '<pre>'; print_r($message->getTo()); echo '</pre>';      // array of Message\EmailAddress
		echo '<pre>'; print_r($message->getDate()); echo '</pre>';    // DateTimeImmutable

    /*$to = "abdulbasitsultan4@gmail.com";
    $subject = "Testing camtics mail";
         
    $message = "<b>This is HTML message.</b>";
    $message .= "<h1>This is headline.</h1>";
         
    $header = "From:abdulasit@actech.cc \r\n";
    //$header .= "Cc:afgh@somedomain.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
         
    $retval = mail ($to,$subject,$message,$header);
         
    if( $retval == true ) {
        echo "Message sent successfully...";
     }else {
        echo "Message could not be sent...";
    }*/
?>