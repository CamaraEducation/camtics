<?php
class Login{
    function loger($user, $pass){
		$user	= mysqli_real_escape_string(conn(), $user);
		$pass	= mysqli_real_escape_string(conn(), $pass);

        $login  = "SELECT id FROM user WHERE username='$user' AND pass='$pass'";
		$loger	= mysqli_query(conn(), $login);
		$loger	= mysqli_fetch_assoc($loger);

		//If user loged create session and redirect to folder.
        if(!empty($loger['id'])){
			$loged	= new Session;
			$loged	-> set_session($user); ?>
			<script type="text/javascript">
				alert("SUCCESS: Please wait we are loging you in.");
				window.location.pathname = "/"
			</script>"; <?php
		}else{ ?>
			<script type="text/javascript">
				alert("Wrong credentials, Please Try Again");
				window.location.pathname = "/login";
			</script> <?php
		}
    }	
}
?>