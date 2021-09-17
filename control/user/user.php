<?php
class User{
    public static function list_user(){
        $users = "SELECT * FROM user WHERE role>4";
        if(mysqli_query(conn(), $users)){
            $users      = mysqli_query(conn(), $users);
            $fetch_user = mysqli_fetch_all($users, MYSQLI_ASSOC);

            foreach($fetch_user as $user){
                $users = $user;
            }
        }else{
            $users = array(
                'total'=>0,
                'id'=>0
            );
        }
        return $users;
    }
}

include 'staff.php';
?>