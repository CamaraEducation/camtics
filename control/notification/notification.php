<?php
class Notification{
    public static function new_reply($ticket){
		$config = config();
		if(ROLE>4){
			$agent = "SELECT t.id, u.username, u.email FROM ticket t, `user` u WHERE t.id='$ticket' AND u.id=t.agent";
		}else{
			$agent = "SELECT t.id, u.username, u.email FROM ticket t, `user` u WHERE t.id='$ticket' AND u.id=t.sender";
		}
		$agent = mysqli_query(conn(), $agent);
		$rows  = mysqli_num_rows($agent);
		$agent = mysqli_fetch_all($agent, MYSQLI_ASSOC);

		foreach($agent as $data){
			$agent = $data;
		}

		if($rows>=1){
			SendMail::send(
				$config['email'],
				$agent['email'],
				$config['email'],
				'NEW REPLY ON TICKET',
				'Hello '.$agent['username'].'<br>
				You have got a new reply on one of your tickets, please reply as soon as possible'
			);
		}
    }

    public static function new_ticket($department){
		$config = config();
		$agent = "SELECT username, phone, email  FROM user WHERE `department`='$department' AND role=3";
		$agent = mysqli_query(conn(), $agent);
		$agent = mysqli_fetch_assoc($agent);

		SendMail::send(
			$config['email'],
			$agent['email'],
			$config['email'],
			'NEW TICKET OPENED',
			'Hello '.$agent['username'].'<br>
			a new ticket has been oppened in your department'
		);
    }

	public static function ticket_status($status, $ticket){
		$config = config();
		$user = "SELECT u.username, u.phone, u.email FROM ticket t, user u WHERE t.id='$ticket' AND u.id=t.sender";
		$user = mysqli_query(conn(), $user);
		$user = mysqli_fetch_assoc($user);

		SendMail::send(
			$config['email'],
			$user['email'],
			$config['email'],
			'TICKET '.$status,
			'Hello '.$user['username'].'<br>
			your ticket has been '.$status
		);
	}
}
?>