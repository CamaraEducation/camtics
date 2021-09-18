<?php
class Session{
    public static function set_session($user){
		$user   = strtolower($user);
        $data   = "SELECT id, fname, lname, username, phone, email, photo, branch, organization, nin, role, status FROM user WHERE username='$user'";
        $data   = mysqli_query(conn(), $data);

		//iterate the attained data to create a session
        foreach(mysqli_fetch_assoc($data) as $key=>$value){
			$_SESSION[$key] = $value;
		}

        return $_SESSION;
	}
}
?>