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

    public static function search(){
        if(isset($_REQUEST["term"])){
            // Prepare a select statement
            $term = $_REQUEST["term"];
            $term = mysqli_real_escape_string(conn(), $term);
            $sql = "SELECT * FROM user WHERE 
                username LIKE '%$term%' OR
                fname LIKE '%$term%' OR
                lname LIKE '%$term%' OR
                phone LIKE '%$term%' OR
                email LIKE '%$term%'";
            $sql = mysqli_query(conn(), $sql);
            $sql = mysqli_fetch_all($sql, MYSQLI_ASSOC);

            if(!empty($sql)){
                foreach($sql as $user){
                    echo '<a class="small-hr" href="/view/user/'.$user['username'].'">'.$user['fname'].' '.$user['lname'].'</a>';
                }
            }else{
                echo "nothing found";
            }
        }
    }
}

include 'staff.php';
?>