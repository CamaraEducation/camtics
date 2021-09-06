<?php
class Conversation{
    function send($user, $ticket, $message){
        $message = str_replace('\"', '"', $message);
        $message = mysqli_real_escape_string(conn(), $message);

        if (ROLE<5){$init=1;}else{$init=2;}
        $reply = "INSERT INTO conversation (`init`, `ticket`, `message`, `user`) VALUES('$init','$ticket','$message','$user')";
        if(mysqli_query(conn(), $reply)){
            Ticket::update_ticket($ticket);
            Notification::new_reply($ticket);
            echo json_encode(array("statusCode"=>200));
        }else{
            echo json_encode(array("statusCode"=>201));
        };
    }

    function chat($ticket){
        $message =
            "SELECT 
                c.id, c.init, c.message, 
                TIMEDIFF(NOW(), c.time) AS timedifference, DATEDIFF(NOW(), c.time) AS datedifference, 
                u.username, u.photo  
            FROM conversation c, user u 
            WHERE u.id=c.user AND c.ticket='$ticket' ";
        $message = mysqli_query(conn(), $message);
        $message = mysqli_fetch_all($message, MYSQLI_ASSOC);

        return $message;
    }
}
?>