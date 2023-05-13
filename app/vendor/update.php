<?php 

	require_once '../config/connect.php';
	session_start();

	if (isset($_POST['updateStudentBtn'])) {

		$studentId = $_POST['studentId'];
		
		$fullName = $_POST['fullName'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$course = $_POST['course'];

		$query = "UPDATE students SET fullname = :fullname, email = :email, phone = :phone, course = :course WHERE id = :studentId LIMIT 1";

		$stmt = $connect->prepare($query);

		$data = [
			':fullname' => $fullName,
			':email' => $email,
			':phone' => $phone,
			':course' => $course,
			':studentId' => $studentId,
		];

		$queryExecute = $stmt->execute($data);

		if ($queryExecute) {

			$_SESSION['message'] = 'Редактирование и обновление данных о студенте , прошло успешно !';

			header('Location: ../../index.php');
			exit(0);

		} else {

			$_SESSION['message'] = 'Редактирование и обновление данных о студенте не получилось , возможно что то пошло не так !';

			header('Location: ../../index.php');
			exit(0);

		}

	}

?>