<?php
class Conversation{
    function send($user, $ticket, $message){

        $message = mysqli_real_escape_string(conn(), $message);
        //print_r($message);

        if (ROLE<5){$init=1;}else{$init=2;}
        $reply = "INSERT INTO conversation (`init`, `ticket`, `message`, `user`) VALUES('$init','$ticket','$message','$user')";
        mysqli_query(conn(), $reply);
        echo json_encode(array("statusCode"=>200));
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

    /*function chat_determiner($init, $date, $time){
        $class = "right";
        $align = "right";
        if($init>1){
            $class = "chat-body";
            $align = "left";
        }

        if($date>0){
            $time = $date;
        }else{
            $time = $time;
        }

        $style = array('class'=>$class, 'time'=>$time, 'align'=>$align);
        return $style;
    }*/
}
?>