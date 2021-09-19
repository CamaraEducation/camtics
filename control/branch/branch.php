<?php
class Branch{
	function create_branch($name, $phone, $email, $country){
		$create_branch = "INSERT INTO branch (`name`, `phone`, `email`, `country`) VALUES('$name','$phone','$email','$country')";
		if(mysqli_query(conn(), $create_branch)){
			header('Location: /list/branch');
		}else{
			echo "something is wrong";
		}
	}

	//fetch all registered branches
	public static function fetch_branches($id = ''){
		$fetch_branches = "SELECT * FROM branch WHERE id LIKE '$id%'";
		$fetch_branches = mysqli_query(conn(), $fetch_branches);

		while ($row = mysqli_fetch_assoc($fetch_branches)){
			$rows[$row['id']] = array(
				"id"        => $row['id'],
				"name"      => $row['name'],
				"code"      => $row['code'],
				"phone"     => $row['phone'],
				"email"     => $row['email'],
				"ePass"     => $row['pass'],
				"imap"      => $row['imap'],
				"country"   => $row['country'],
				"smtp"		=> $row['smtp'],
				"sms_key"	=> $row['sms_key'],
				"sms_secret"=> $row['sms_secret']
			);
		}
		return $rows;
	}

	public static function fetch_branch(){
		$branch = Branch::fetch_branches(BRANCH);
		$branch = $branch[BRANCH];
		return $branch;
	}

	function list_branches(){
		$list_branches  = "
			SELECT b.*,
				(SELECT Count(id) FROM ticket WHERE  status = 'open' AND `branch` = b.id) AS `open`,
				(SELECT Count(id) FROM ticket WHERE  status = 'active' AND `branch` = b.id) AS `active`,
				(SELECT Count(id) FROM ticket WHERE  status = 'closed' AND `branch` = b.id) AS `closed`
			FROM   branch b
			WHERE  b.id != 0";

		$list_branches   = mysqli_query(conn(), $list_branches);
		$listed_branches = mysqli_fetch_all($list_branches, MYSQLI_ASSOC);
		return $listed_branches;
	}
}

?>