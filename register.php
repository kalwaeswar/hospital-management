<?php
	$firstName = $_POST['fname'];
	$lastName = $_POST['lname'];
    $dob=$_POST['dob'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
	$speciality = $_POST['speciality'];
	$num= $_POST['num'];
	$problem = $_POST['problem'];
	$appointment_time=$_POST['appointment_time'];

	// Database connection
	$conn = new mysqli('localhost','root','','hospital_management');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into patient_registration(first_name, last_name,appointment_date, gender, age, speciality,phone_number,problem,appointment_time) values(?, ?, ?, ?, ?, ?,?,?,?)");
		$stmt->bind_param("ssssssiss", $firstName, $lastName, $dob,$gender, $age, $speciality, $num,$problem,$appointment_time);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>