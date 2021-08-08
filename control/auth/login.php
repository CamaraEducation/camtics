<?php
class Login{
    function loger($user, $pass){
        $pass   = md5($pass);
        $user   = strtolower($user);
        $login  = "SELECT id FROM user WHERE username='$user' OR email='$user' OR phone='$user' AND pass='$pass'";

        if(mysqli_query(conn(), $login)){
			echo "<script type=\"text/javascript\">
					alert(\"SUCCESS: Please wait we are loging you in.\");
					window.location.pathname = \"/\"
				</script>";
		}else{
			echo "<script type=\"text/javascript\">
					alert(\"Wrong credentials, Please Try Again\");
					window.location.pathname = \"/login\"
				</script>";
		}
    }
}
?>