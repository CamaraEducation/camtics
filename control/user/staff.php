<?php
    class Staff{
        public static function fetch_all(){
            $fetch_staff    = "SELECT * FROM USER WHERE ROLE<5";
            $fetch_staff    = mysqli_query(conn(), $fetch_staff);
            $fetch_staff    = mysqli_fetch_all($fetch_staff, MYSQLI_ASSOC);
        }

		public static function branch_staff($branch){
			$branch_staff	= "
					SELECT 
					u.id, u.fname, lname, u.phone, u.email, u.photo, u.department, u.role,
					(SELECT name FROM department WHERE id=u.department) AS `department`,
					(SELECT Count(id) FROM ticket WHERE  status = 'open' AND `agent` = u.id) AS `open`,
					(SELECT Count(id) FROM ticket WHERE  status = 'active' AND `agent` = u.id) AS `active`,
					(SELECT Count(id) FROM ticket WHERE  status = 'closed' AND `agent` = u.id) AS `closed`,
					(SELECT Count(id) FROM ticket WHERE  `agent` = u.id) AS `total`
				FROM user u 
				WHERE role<5 AND branch='$branch'
			";
			$branch_staff	= mysqli_query(conn(), $branch_staff);
			$branch_staff	= mysqli_fetch_all($branch_staff, MYSQLI_ASSOC);

			return $branch_staff;
		}

		public static function count_all($branch = ''){
			$branch_staff = "SELECT COUNT(id) as total FROM user WHERE role<5 AND branch LIKE '$branch%'";
			$branch_staff = mysqli_query(conn(), $branch_staff);
			$branch_staff = mysqli_fetch_assoc($branch_staff);

			return $branch_staff;
		}

		function department_staff($branch, $department){
			$department_staff = "SELECT * FROM USER WHERE role<5 AND branch='$branch' AND department='$department'";
			$department_staff = mysqli_query(conn(), $department_staff);
			$department_staff = mysqli_fetch_all($department_staff, MYSQLI_ASSOC);
			return $department_staff;
		}
    }
?>