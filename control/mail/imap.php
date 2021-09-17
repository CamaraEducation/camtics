<?php
use Ddeboer\Imap\Server;

class ImapClient{
	//authorize the imap connection
	public static function auth($host = 'mailer.actech.cc'){
		$server = new Server($host);
		$branch = Branch::fetch_branch();
		$connection = $server->authenticate($branch['email'], $branch['ePass']);	
		$mailbox = $connection->getMailbox('INBOX');
		$messages = $mailbox->getMessages();
	
		foreach ($messages as $message) {
			$headers = $message->getHeaders();
		}
		
		return $connection;
	}

	public static function get_header(){
		
	}
}
?>