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
				window.location.pathname = "/"
			</script>"; <?php
		}else{ ?>
			<script type="text/javascript">
				alert("Wrong credentials, Please Try Again");
				window.location.pathname = "/login";
			</script> <?php
		}
    }

	public static function reset($user){
        $sql = "select * from user where email='$user' or username = '$user'";
        $sql = mysqli_query(conn(), $sql);

        if(mysqli_num_rows($sql)>0){
            $user = mysqli_fetch_assoc($sql);
			echo '<pre>';
			//print_r($user);
            $username = $user["username"];
            $rawpass = 'CT-'.rand(157657, 989346);
            $pass = md5($rawpass);

            $sql = "update user set pass = '$pass' where username ='$username'";
			if(mysqli_query(conn(), $sql)){
				SendMail::init(
					$user['email'],
					'CAMTICS | Password Reset',
					'<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head><!--[if gte mso 9]><xml> <o:OfficeDocumentSettings> <o:AllowPNG/> <o:PixelsPerInch>96</o:PixelsPerInch> </o:OfficeDocumentSettings></xml><![endif]--> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta name="x-apple-disable-message-reformatting"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <title></title> <style type="text/css"> table, td{color: #000000;}a{color: #0000ee; text-decoration: underline;}@media only screen and (min-width: 670px){.u-row{width: 650px !important;}.u-row .u-col{vertical-align: top;}.u-row .u-col-100{width: 650px !important;}}@media (max-width: 670px){.u-row-container{max-width: 100% !important; padding-left: 0px !important; padding-right: 0px !important;}.u-row .u-col{min-width: 320px !important; max-width: 100% !important; display: block !important;}.u-row{width: calc(100% - 40px) !important;}.u-col{width: 100% !important;}.u-col > div{margin: 0 auto;}}body{margin: 0; padding: 0;}table,tr,td{vertical-align: top; border-collapse: collapse;}p{margin: 0;}.ie-container table,.mso-container table{table-layout: fixed;}*{line-height: inherit;}a[x-apple-data-detectors=\'true\']{color: inherit !important; text-decoration: none !important;}</style> <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet" type="text/css"></head><body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #ffffff;color: #000000"> <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0"> <tbody> <tr style="vertical-align: top"> <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top"> <div class="u-row-container" style="padding: 0px;background-color: transparent"> <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 650px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #dff1ff;"> <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;"> <div class="u-col u-col-100" style="max-width: 320px;min-width: 650px;display: table-cell;vertical-align: top;"> <div style="width: 100% !important;"> <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"> <table style="font-family:\'Montserrat\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"> <tbody> <tr> <td style="overflow-wrap:break-word;word-break:break-word;padding:30px 0px;font-family:\'Montserrat\',sans-serif;" align="left"> <table width="100%" cellpadding="0" cellspacing="0" border="0"> <tr> <td style="padding-right: 0px;padding-left: 0px;" align="center"> <img align="center" border="0" src="https://camtics.camara.org/assets/img/image-1.png" alt="Camara Logo" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 24%;max-width: 156px;" width="156"/> </td></tr></table> </td></tr></tbody></table><table style="font-family:\'Montserrat\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"> <tbody> <tr> <td style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:\'Montserrat\',sans-serif;" align="left"> <div style="color: #a5da77; line-height: 170%; text-align: left; word-wrap: break-word;"> <p style="font-size: 14px; line-height: 170%; text-align: center;"><span style="font-size: 24px; line-height: 40.8px;"><strong><span style="line-height: 40.8px; font-size: 24px;">PASSWORD REQUEST</span></strong></span></p><p style="font-size: 14px; line-height: 170%; text-align: center;"><span style="font-size: 20px; line-height: 34px;"><span style="line-height: 34px; font-size: 20px;">Here is your new Password to log into your Account</span></span></p></div></td></tr></tbody></table> </div></div></div></div></div></div><div class="u-row-container" style="padding: 0px;background-color: transparent"> <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 650px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #f3fbfd;"> <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;"> <div class="u-col u-col-100" style="max-width: 320px;min-width: 650px;display: table-cell;vertical-align: top;"> <div style="width: 100% !important;"> <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"> <table style="font-family:\'Montserrat\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"> <tbody> <tr> <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 50px 20px;font-family:\'Montserrat\',sans-serif;" align="left"> <div style="color: #1b262c; line-height: 140%; text-align: center; word-wrap: break-word;"> <p style="font-size: 14px; line-height: 140%; text-align: center;">&nbsp;</p><p style="line-height: 140%; text-align: center; font-size: 14px;"><span style="font-size: 16px; line-height: 22.4px;">Hello '.$user['fname'].' '.$user['lname'].'<br/>Your new Requested password from Camtics is '.$rawpass.'</span></p></div></td></tr></tbody></table><table style="font-family:\'Montserrat\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"> <tbody> <tr> <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Montserrat\',sans-serif;" align="left"> <div align="center"> <a href="https://camtics.camara.org" target="_blank" style="box-sizing: border-box;display: inline-block;font-family:\'Montserrat\',sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #a5da77; border-radius: 60px;-webkit-border-radius: 60px; -moz-border-radius: 60px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;border-top-color: #CCC; border-top-style: solid; border-top-width: 0px; border-left-color: #CCC; border-left-style: solid; border-left-width: 0px; border-right-color: #CCC; border-right-style: solid; border-right-width: 0px; border-bottom-color: #0275a4; border-bottom-style: solid; border-bottom-width: 5px;"> <span style="display:block;padding:15px 40px 14px;line-height:120%;"><strong><span style="font-size: 16px; line-height: 19.2px;">Click Here to Login</span></strong></span> </a> </div></td></tr></tbody></table><table style="font-family:\'Montserrat\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"> <tbody> <tr> <td style="overflow-wrap:break-word;word-break:break-word;padding:18px 50px 50px;font-family:\'Montserrat\',sans-serif;" align="left"> <div style="color: #5f5f5f; line-height: 140%; text-align: center; word-wrap: break-word;"> <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-size: 12px; line-height: 16.8px;">Whether you have or have not requested this password, your password has been changed</span></p></div></td></tr></tbody></table> </div></div></div></div></div></div><div class="u-row-container" style="padding: 0px;background-color: transparent"> <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 650px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #151418;"> <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;"> <div class="u-col u-col-100" style="max-width: 320px;min-width: 650px;display: table-cell;vertical-align: top;"> <div style="width: 100% !important;"> <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"> <table style="font-family:\'Montserrat\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"> <tbody> <tr> <td style="overflow-wrap:break-word;word-break:break-word;padding:18px;font-family:\'Montserrat\',sans-serif;" align="left"> <div style="color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word;"> <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 14px; line-height: 19.6px;">Copyright Camara Education | All RIghts Reserved</span></p></div></td></tr></tbody></table> </div></div></div></div></div></div></td></tr></tbody> </table> </body></html>'
				);
			}?>
			<script type="text/javascript">
				alert("PASSWORD SUCCESSFULLY GENERATED, CHECK YOUR INBOX");
				window.location.pathname = "/";
			</script> <?php
        }else{?>
			<script type="text/javascript">
				alert("User could not be found");
				window.location.pathname = "/reset";
			</script> <?php
        }

    }
}
?>