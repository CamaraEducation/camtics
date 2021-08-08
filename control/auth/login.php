<?php
class Login{
    function loger($user, $pass){
		
        $login  = "SELECT id FROM user WHERE username='$user' AND pass='$pass'";
		$loger	= mysqli_query(conn(), $login);
		$loger	= mysqli_fetch_assoc($loger);

		//If user loged create session and redirect to folder.
        if($loger['id']>=1){
			include(Auth.'/session.php');
			$loged	= new Session;
			$loged	-> set_session($user);
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