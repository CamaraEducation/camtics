<?php
use Ddeboer\Imap\Server;

class ImapClient{
	//authorize the imap connection
	public static function auth($host = 'mailer.actech.cc'){
		$server = new Server($host);
		$branch = Branch::fetch_branch();
		$connection = $server->authenticate($branch['email'], $branch['ePass']);	

		return $connection;
	}

	public static function get_message($box = 'INBOX'){
		$connection = ImapClient::auth();
		$mailbox = $connection->getMailbox($box);
		$messages = $mailbox->getMessages();
		$no = 0;

		foreach($messages as $message){
			$mail[$no]['date'] = $message->getHeaders()->get('date');
			$mail[$no]['subject'] = $message->getHeaders()->get('subject');
			$mail[$no]['ccaddress'] = $message->getHeaders()->get('ccaddress');
			$from = $message->getHeaders()->get('sender');
			$from = (array) $from['0'];
			$mail[$no]['from_name'] = $from['personal'];
			$mail[$no]['from_email'] = $from['mailbox'] .'@'. $from['host'];
			$mail[$no]['text'] = $message->getBodyText();
			$mail[$no]['html'] = $message->getBodyHtml();
			$no++;
		}

		return $mail;
	}
}
?>