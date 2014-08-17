<?php include("database.php"); ?>

<?php

	if(isset($_POST['student_id'])){
		$row = check_student($_POST['student_id'],$conn);
		if($row){
		}else{
			$a = "";
			print_r(json_encode($a));
		}
	}

	if(isset($_POST['form-register'])){
		// $row = check_student($_POST['student_id'],$conn);
		// if($row){
		// 	update_student($_POST['student_id'],$conn);
		// }else{
		// 	echo "";
		// }
		update_student($_POST['student_no'],$conn);
		$a = "okay";
		print_r(json_encode($a));
	}


?>