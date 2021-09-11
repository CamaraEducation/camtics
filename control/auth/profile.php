<?php
class Profile{
    public static function user_profile($id){
        $profile = "SELECT * FROM user WHERE id='$id'";
        $profile = mysqli_query(conn(), $profile);
        $profile = mysqli_fetch_assoc($profile);

        return $profile;
    }

    public static function edit_profile($id, $fname, $mname, $lname, $phone, $email){
        $sql = "UPDATE user SET fname='$fname', mname='$mname', lname='$lname', phone='$phone', email='$email' WHERE id='$id'";
        if(mysqli_query(conn(), $sql)){
            Session::set_session(ID);
        	echo json_encode(array("statusCode"=>200));
		}else{
			echo json_encode(array("statusCode"=>201));
		}
    }

    public static function change_picture($id){
        $sql = "UPDATE user SET photo='' WHERE id='$id'";
        if(mysqli_query(conn(), $sql)){
            Session::set_session(ID);
        	echo json_encode(array("statusCode"=>200));
		}else{
			echo json_encode(array("statusCode"=>201));
		}
    }
}
?>