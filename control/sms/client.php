<?php
class SmsClient{
	public static function individual($recipient, $message){
		$branch = Branch::fetch_branch();
		// building array of variables
		$content = http_build_query(array(
			'api_key'	 => $branch['api_key'],
			'api_secret' => $branch['secret'],
			'sender_id'	 => $branch['sender_id'],
			'recipient'	 => $recipient,
			'message'	 => $message
			));
		// creating the context change POST to GET if that is relevant 
		$context = stream_context_create(array(
			'http' => array(
				'method'	=> 'POST',
				'content'	=> $content, )));

		$result = file_get_contents('https://smpp.test/page.php', true, $context);
		//dumping the reuslt
		var_dump($result);    
	}

	public static function record($id, $recipient, $message){

	}
}
?>