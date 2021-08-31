<?php
    class Staff{
        function all_staff(){
            $fetch_staff    = "SELECT * FROM USER WHERE ROLE<5";
            $fetch_staff    = mysqli_query(conn(), $fetch_staff);
            $fetch_staff    = mysqli_fetch_all($fetch_staff, MYSQLI_ASSOC);
        }

		function branch_staff($branch){
			$branch_staff	= "SELECT * FROM USER WHERE role<5 AND branch='$branch'";
			$branch_staff	= mysqli_query(conn(), $branch_staff);
			$branch_staff	= mysqli_fetch_all($branch_staff, MYSQLI_ASSOC);
		}

		function department_staff($branch, $department){
			$department_staff = "SELECT * FROM USER WHERE role<5 AND branch='$branch' AND department='$department'";
			$department_staff = mysqli_query(conn(), $department_staff);
			$department_staff = mysqli_fetch_all($department_staff, MYSQLI_ASSOC);
			return $department_staff;
		}
    }
?>