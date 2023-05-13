<?php 

	require_once '../config/connect.php';
	session_start();

	if (isset($_POST['deleteStudentBtn'])) {

		$studentId = $_POST['deleteStudentBtn'];

		$query = "DELETE FROM students WHERE id = :studentId";

		$stmt = $connect->prepare($query);

		$data = [':studentId' => $studentId];
		
		$queryExecute = $stmt->execute($data);

		if (isset($queryExecute)) {

			$_SESSION['message'] = 'Запись о студенте удалена успешно !';

			header('Location: ../../index.php');
			exit(0);

		} else {

			$_SESSION['message'] = 'Запись о студенте удалить не получилось , возможно что то пошло не так !';

			header('Location: ../../index.php');
			exit(0);

		}
		
	}

?>