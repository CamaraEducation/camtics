<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Create PhpImap\Mailbox instance for all further actions
$mailbox = new PhpImap\Mailbox(
	'{mailer.actech.cc:993/ssl/novalidate-cert/imap}', 
	'abdulbasit@actech.cc', 
	'Abdulbasit.1', 
	false // when $attachmentsDir is false we don't save attachments
);

// set some connection arguments (if appropriate)
$mailbox->setConnectionArgs(
    CL_EXPUNGE // expunge deleted mails upon mailbox close
    | OP_SECURE // don't do non-secure authentication
);

try {
	// Get all emails (messages)
	// PHP.net imap_search criteria: http://php.net/manual/en/function.imap-search.php
	$mailsIds = $mailbox->searchMailbox('ALL');
} catch(PhpImap\Exceptions\ConnectionException $ex) {
	echo "IMAP connection failed: " . $ex;
	die();
}

// If $mailsIds is empty, no emails could be found
if(!$mailsIds) {
	die('Mailbox is empty');
}

// Get the first message
// If '__DIR__' was defined in the first line, it will automatically
// save all attachments to the specified directory
$mail = $mailbox->getMail($mailsIds[0]);

// Show, if $mail has one or more attachments
echo "\nMail has attachments? ";
if($mail->hasAttachments()) {
	echo "Yes\n";
} else {
	echo "No\n";
}

// Print all information of $mail
print_r($mail);

// Print all attachements of $mail
echo "\n\nAttachments:\n";
print_r($mail->getAttachments());

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