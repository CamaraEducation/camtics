<?php
class Register{

    //user registretion functions
    function register_user($username, $email, $phone, $password, $branch){
        $password = md5($password);
        $username = strtolower($username);
        $create_user = "INSERT INTO user (username, phone, email, branch, pass) VALUES ('$username', '$phone', '$email', '$branch', '$password')";

        if(mysqli_query(conn(), $create_user)){
			echo "<script type=\"text/javascript\">
						alert(\"SUCCESS: You have been successfully registered.\");
						window.location.pathname = \"/\"
				</script>";
		}else{
            // if an error occurs during registration analyze it here
			$check_user  = "SELECT username, phone, email FROM user WHERE username='$username' OR phone='$phone' OR email='$email'";
            $check_user = mysqli_query(conn(), $check_user);
            $user       = mysqli_fetch_assoc($check_user);

            if($username==$user['username']){
                echo "<script type=\"text/javascript\">
					alert(\"Username already exists, Try to use another Name.\");
					window.location.pathname = \"/register\"
				</script>";
            }elseif($email==$user['email']){
                echo "<script type=\"text/javascript\">
					alert(\"Email already exists, Try to use another Email.\");
					window.location.pathname = \"/register\"
				</script>";
            }elseif($phone==$user['phone']){
                echo "<script type=\"text/javascript\">
					alert(\"Phone Number already exists, Try to use another phone.\");
					window.location.pathname = \"/register\"
				</script>";
            }else{
                echo "<script type=\"text/javascript\">
					alert(\"Unknow error has occured.\");
					window.location.pathname = \"/register\"
				</script>";
            }
		}
    }
}

$create_user = new Register();
?>