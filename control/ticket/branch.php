<?php
class BranchTicket extends Ticket{
	public static function fetch_all($status, $branch){
		$tickets = "
			SELECT 
				t.id, u.username as sender, o.name AS `organization`, d.name AS `department`, 
				(SELECT u.username FROM user u WHERE u.id=t.agent) AS agent,
				t.urgency, t.subject, t.content, 
				DATEDIFF(CURRENT_TIMESTAMP, t.`update`) AS `update`
			FROM ticket t, department d, user u, organization o
			WHERE t.status='$status' AND t.branch='$branch' AND d.`id`=t.`department` AND o.id=t.organization AND u.id=t.sender";
		$tickets = mysqli_query(conn(), $tickets);
		$num_tickets = mysqli_num_rows($tickets);
		
		//oversee the implementation of from end
		if($num_tickets>0){
			$tickets = mysqli_fetch_all($tickets, MYSQLI_ASSOC);
		}else{
			$tickets = array('1'=> array(
				'id'			=> 'NA',
				'sender'		=> 'NA',
				'organization'	=> 'NA',
				'department'   	=> 'NA',
				'agent'    		=> 'NA',
				'urgency'      	=> 'NA',
				'subject'		=> 'NA',
				'content'		=> 'NA',
				'update'		=> 'NA'
			));
		}

		return $tickets;
	}
}
?>