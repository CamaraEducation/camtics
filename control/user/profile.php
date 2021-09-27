<?php
class UserProfile{
    public static function edit_basic(){
        $fname = mysqli_real_escape_string(conn(), $_POST['fname']);
        $lname = mysqli_real_escape_string(conn(), $_POST['lname']);
        $phone = mysqli_real_escape_string(conn(), $_POST['phone']);
        $email = mysqli_real_escape_string(conn(), $_POST['email']);
        $uname = mysqli_real_escape_string(conn(), $_POST['uname']);
        $sql = "update user set fname = '$fname', lname = '$lname', phone = '$phone', email = '$email' where username = '$uname'";

        if(mysqli_query(conn(), $sql)){
			echo json_encode(array('statusCode'=>200));
        }else{
			echo json_encode(array('statusCode'=>201));
        }
    }

    public static function edit_passcode(){
        $cpass = md5(mysqli_real_escape_string(conn(), $_POST['cpass']));
        $npass = md5(mysqli_real_escape_string(conn(), $_POST['npass']));
        $uname = mysqli_real_escape_string(conn(), $_POST['uname']);
        $sql = "update user set pass = '$npass' where username = '$uname' and pass='$cpass'";
        if(mysqli_query(conn(), $sql)){
			echo json_encode(array('statusCode'=>200));
        }else{
			echo json_encode(array('statusCode'=>201));
        }
    }

    public static function edit_avatar($user){
		$image = '/'.FileUploader::upload();
        $update_avatar = "update user set photo = '$image' where username = '$user'";
        mysqli_query(conn(), $update_avatar);
        Home::url_dashboard();
    }
}
?>