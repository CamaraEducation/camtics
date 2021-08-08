<?php
class Session{
    function set_session($user){
		$user   = strtolower($user);
        $data   = "SELECT id, fname, lname, username, phone, email, photo, branch, organization, nin, role, status FROM user WHERE username='$user'";
        $data   = mysqli_query(conn(), $data);

		//iterate the attained data to create a session
        foreach(($row = mysqli_fetch_assoc($data)) as $key=>$value){
			$_SESSION[$key] = $value;
		}

        return $_SESSION;
	}
}

/*
// building array of variables
$content = http_build_query(array(
            'username' => 'value',
            'password' => 'value'
            ));
// creating the context change POST to GET if that is relevant 
$context = stream_context_create(array(
            'http' => array(
                'method' => 'POST',
                'content' => $content, )));

$result = file_get_contents('http://www.example.com/page.php', null, $context);
//dumping the reuslt
var_dump($result);
*/
?>