<?php
/************************************************************************
 *                      Tickets management | General                    *
 *                                                                      *
 ************************************************************************/
class Ticket{
    function create_tickets($sender, $branch, $org, $department, $urgency, $subject, $message){
        $message = str_replace('\"', '"', $message);
        $subject = mysqli_real_escape_string(conn(), $subject);
        $message = mysqli_real_escape_string(conn(), $message);

        $create_ticket = "INSERT INTO `ticket` (`sender`, `branch`, organization, `department`, `urgency`, `subject`, `content`)
                          VALUES ('$sender', '$branch', '$org', '$department', '$urgency', '$subject', '$message')";
                          
        if(mysqli_query(conn(), $create_ticket)){
            Notification::new_ticket($department);
			echo json_encode(array("statusCode"=>200));
		}else{
			echo json_encode(array("statusCode"=>201));
		}
    }

    public static function specific_ticket($ticket){
        $specific_ticket = "
            SELECT 
                t.id, t.subject, t.content, t.urgency, t.department as dep_id,
                (SELECT name FROM department WHERE id=t.department) AS department,
                u.id AS userid, u.username, u.photo, 
                b.`name` AS `branch`, 
                o.`name` AS `organization`,
                t.`status`, DATEDIFF(CURRENT_TIMESTAMP, t.`update`) AS `update`, t.`time`
            FROM `ticket` t, `user` u, `branch` b, `organization` o
            WHERE t.id='$ticket' AND u.`id`=t.`sender` AND b.`id`=t.`branch` AND o.`id`=t.`organization`";
        $specific_ticket = mysqli_query(conn(), $specific_ticket);
        $specific_ticket = mysqli_fetch_assoc($specific_ticket);
        return $specific_ticket;
    }

    //count ticket for specific ticket
    function department_tickets(){
        $department   = new Department;
        $department   = $department->my_department();
        $count_ticket = "SELECT status as name, COUNT(id) as value FROM ticket WHERE department='$department' GROUP BY status;";
        $count_ticket = mysqli_query(conn(), $count_ticket);
        $rows         = array('open'=>0, 'active'=>0, 'closed'=>0);

        while($row = mysqli_fetch_assoc($count_ticket)){
            $rows[$row['name']] = $row['value'];
        }

        return $rows;

    }

    function open_tickets(){
        $open_ticket = "SELECT  t.id, b.country AS branch, d.name as department, t.subject, t.content as message, DATEDIFF(CURRENT_TIMESTAMP, t.`update`) AS `update` FROM ticket t, branch b, department d WHERE STATUS='open' AND b.id=t.branch AND d.id=t.department GROUP BY t.id";
        $open_ticket = mysqli_query(conn(), $open_ticket);
		$num_tickets = mysqli_num_rows($open_ticket);
		
		if($num_tickets>0){
			return $open_ticket = mysqli_fetch_all($open_ticket, MYSQLI_ASSOC);
		}else{
			return $open_ticket = array('1'=> 
            array(
                'id'        => 'NA',
                'branch'=> 'NA',
                'department'     => 'NA',
                'subject'   => 'NA',
                'message'   => 'NA',
                'update'      => 'NA',
                'time'      => 'NA'
            ));
		}
    }

    //fetch all active/pending tickets
    function active_tickets(){
        $open_ticket = "SELECT  t.id, b.country AS branch, d.name as department, t.subject, t.content as message, DATEDIFF(CURRENT_TIMESTAMP, t.`update`) AS `update` FROM ticket t, branch b, department d WHERE STATUS='active' AND b.id=t.branch AND d.id=t.department GROUP BY t.id";
        $open_ticket = mysqli_query(conn(), $open_ticket);
		$num_tickets = mysqli_num_rows($open_ticket);
		
        //oversee the implementation of from end
		if($num_tickets>0){
			return $open_ticket = mysqli_fetch_all($open_ticket, MYSQLI_ASSOC);
		}else{
			return $open_ticket = array('1'=> 
            array(
                'id'        => 'NA',
                'branch'=> 'NA',
                'department'     => 'NA',
                'subject'   => 'NA',
                'message'   => 'NA',
                'update'      => 'NA',
                'time'      => 'NA'
            ));
		}
    }

    //fetch all closed tickets
    function closed_tickets(){
        $open_ticket = "SELECT  t.id, b.country AS branch, d.name as department, t.subject, t.content as message, DATEDIFF(CURRENT_TIMESTAMP, t.`update`) AS `update` FROM ticket t, branch b, department d WHERE STATUS='closed' AND b.id=t.branch AND d.id=t.department GROUP BY t.id";
        $open_ticket = mysqli_query(conn(), $open_ticket);
		$num_tickets = mysqli_num_rows($open_ticket);
		
        //oversee the implementation of from end
		if($num_tickets>0){
			return $open_ticket = mysqli_fetch_all($open_ticket, MYSQLI_ASSOC);
		}else{
			return $open_ticket = array('1'=> 
            array(
                'id'        => 'NA',
                'branch'=> 'NA',
                'department'     => 'NA',
                'subject'   => 'NA',
                'message'   => 'NA',
                'update'      => 'NA',
                'time'      => 'NA'
            ));
		}
    }

    public static function count_tickets($branch = ''){
        $count_ticket = "SELECT status as name, COUNT(id) as value FROM ticket WHERE branch LIKE '$branch%' GROUP BY status";
        $count_ticket = mysqli_query(conn(), $count_ticket);
        $rows         = array('open'=>0, 'active'=>0, 'closed'=>0);

        while($row = mysqli_fetch_assoc($count_ticket)){
            $rows[$row['name']] = $row['value'];
        }

        return $rows;
    }

    public static function update_ticket($ticket){
        $update_ticket = "UPDATE ticket SET `update`=NOW() WHERE id='$ticket'";
        mysqli_query(conn(), $update_ticket);        
    }
}

include 'agent.php';
include 'branch.php';
include 'client.php';
include 'department.php';
include 'update.php';

?>