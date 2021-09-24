<?php
class User{
    public static function fetch_user($id){
        $fetch_user    = "SELECT * FROM user WHERE username='$id'";
        $fetch_user    = mysqli_query(conn(), $fetch_user);
        $fetch_user    = mysqli_fetch_assoc($fetch_user);
        return $fetch_user;
    }

    public static function list_user(){
        $users = "SELECT * FROM user WHERE role>4";
        if(mysqli_query(conn(), $users)){
            $users      = mysqli_query(conn(), $users);
            $fetch_user = mysqli_fetch_all($users, MYSQLI_ASSOC);
            foreach($fetch_user as $user){
                $users = $user;
            }
        }else{ $users = array(
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

    public static function create(){
        $user  = mysqli_real_escape_string(conn(), $_POST['username']);
        $fname = mysqli_real_escape_string(conn(), $_POST['fname']);
        $lname = mysqli_real_escape_string(conn(), $_POST['lname']);
        $phone = mysqli_real_escape_string(conn(), $_POST['phone']);
        $email = mysqli_real_escape_string(conn(), $_POST['email']);
        $department = mysqli_real_escape_string(conn(), $_POST['department']);
        $role  = mysqli_real_escape_string(conn(), $_POST['role']);
        $branch = mysqli_real_escape_string(conn(), $_POST['branch']);
        $pass  = md5(rand(12345678, 87654321));
        $create_user = "
            INSERT INTO user (username, fname, lname, phone, email, department, role, branch, pass) 
            VALUES('$user', '$fname', '$lname', '$phone', '$email', '$department', '$role', '$branch', '$pass')";
        if(mysqli_query(conn(), $create_user)){
            echo json_encode(array('statusCode'=>200));
        }else{
            echo json_encode(array('statusCode'=>201));
        }
    }
}

include 'staff.php';
include 'profile.php';
?>