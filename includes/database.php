<?php include("config.php"); ?>
<?php




$conn = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'],$config['username'],$config['password']);	


function check_student($ticket_number,$conn){
	$stmt = $conn->prepare("SELECT *
        FROM tbl_students a, tbl_tickets_students b
        WHERE b.ticket_number = :ticket_number AND a.student_id = b.student_id");
	$stmt->execute(array(
		"ticket_number" => $ticket_number
	));

	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$row = json_encode($row);

	print_r($row);

	if($row){
		return $row;
	}else{
		return false;
	}
}


// check_student("LIVIT-003",$conn);

function update_student($row,$conn){
	// $row = json_decode($row);
	// $stmt = $conn->prepare("INSERT INTO tbl_item(id_user,serial_no,item,date_lost,message) values(:id_user,:serials,:item,:dates,:message)");
	$stmt = $conn->prepare("UPDATE tbl_tickets_students SET party_time_in = :party_time_in , ticket_status= :ticket_status WHERE student_id = :student_id");

	$time_now = date("Y-m-d H:i:s");

	$stmt->execute(array(
		"student_id" => $row,
		"party_time_in" => $time_now,
		"ticket_status" => "REGISTERED",

	));
	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);


}



function add_ticket($row,$conn){
	$stmt = $conn->prepare("INSERT INTO tbl_tickets_students(student_id,ticket_number,ticket_status,balance) values(:student_id,:ticket_number,:ticket_status,:balance)");

	$stmt->execute(array(
		"student_id" => $row['student_id'],
		"ticket_number" => $row['ticket_number'],
		"ticket_status" => $row['ticket_status'],
		"balance" => $row['balance']
	));
	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function search_ticket_stid($row,$conn){
	$stmt = $conn->prepare("SELECT * FROM tbl_tickets_students WHERE student_id = :student_id");

	$stmt->execute(array(
		"student_id" => $row['student_id']
	));
	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if($row){
		return true;
	}else{
		return false;
	}
}

function search_ticket_no($row,$conn){
	$stmt = $conn->prepare("SELECT * FROM tbl_tickets_students WHERE ticket_number = :ticket_number");

	$stmt->execute(array(
		"ticket_number" => $row['ticket_number']
	));
	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if($row){
		return true;
	}else{
		return false;
	}
}

function print_all_tickets($conn){
	$stmt = $conn->prepare("SELECT * FROM tbl_tickets_students");

	$stmt->execute(array(
		
	));
	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$row = json_encode($row);

	return $row;
}

function print_all_students($conn){
	$stmt = $conn->prepare("SELECT * FROM tbl_students");

	$stmt->execute(array(
		
	));
	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$row = json_encode($row);

	return $row;
}



function update_balance($row,$conn){
	$stmt = $conn->prepare("UPDATE tbl_tickets_students SET balance = :balance, ticket_status = :ticket_status WHERE student_id = :student_id");

	$time_now = date("Y-m-d H:i:s");

	$stmt->execute(array(
		"student_id" => $row['student_id'],
		"balance" => $row['balance'],
		"ticket_status" => $row['ticket_status']
	));
	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);



}