<?php 

	require_once '../config/connect.php';
	session_start();

	if (isset($_POST['saveStudentBtn'])) {

		$fullName = $_POST['fullName'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$course = $_POST['course'];

		$query = "INSERT INTO students (fullname, email, phone, course) VALUES (:fullname, :email, :phone, :course)";

		$query_run = $connect->prepare($query);

		$data = [
			':fullname' => $fullName,
			':email' => $email,
			':phone' => $phone,
			':course' => $course,
		];

		$queryExecute = $query_run->execute($data);

		if ($queryExecute) {

			$_SESSION['message'] = 'Студент добавлен успешно !';

			header('Location: ../../index.php');
			exit(0);

		} else {

			$_SESSION['message'] = 'Студент не добавлен , возможно что то пошло не так !';
			
			header('Location: ../../index.php');
			exit(0);

		}

	}

?>