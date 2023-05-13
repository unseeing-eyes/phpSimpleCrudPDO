<?php 
	require_once './app/config/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Редактирование и обновление</title>
	<link rel="stylesheet" href="./app/assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-4">
				<div class="card">
					<div class="card-header">
						<h3>Редактирование и обновление данных о студенте
							<a href="./index.php" class="btn btn-danger float-end">Вернуться на главную страницу</a>
						</h3>
					</div>
					<div class="card-body">
						<?php 

							if (isset($_GET['id'])) {
								
								$studentId = $_GET['id'];

								$query = "SELECT * FROM students WHERE id = :studentId LIMIT 1";

								$stmt = $connect->prepare($query);

								$data = [':studentId' => $studentId];

								$stmt->execute($data);
								
								$result = $stmt->fetch();

							}

						?>
						<form action="./app/vendor/update.php" method="POST">

							<!-- скрытый инпут -->
							<input type="hidden" name="studentId" value="<?php echo $result['id']; ?>">
							<!-- // скрытый инпут -->

							<div class="mb-3">
								<label>Полное имя</label>
								<input type="text" name="fullName" value="<?php echo $result['fullname']; ?>" class="form-control">
							</div>
							<div class="mb-3">
								<label>Email</label>
								<input type="text" name="email" value="<?php echo $result['email']; ?>" class="form-control">
							</div>
							<div class="mb-3">
								<label>Телефон</label>
								<input type="text" name="phone" value="<?php echo $result['phone']; ?>" class="form-control">
							</div>
							<div class="mb-3">
								<label>Курс</label>
								<input type="text" name="course" value="<?php echo $result['course']; ?>" class="form-control">
							</div>
							<div class="mb-3">
								<button type="submit" name="updateStudentBtn" class="btn btn-primary">Обновить данные о студенте</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>