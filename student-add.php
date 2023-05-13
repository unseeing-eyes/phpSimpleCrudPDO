<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Добавить студентов</title>
	<link rel="stylesheet" href="./app/assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-4">
				<div class="card">
					<div class="card-header">
						<h3>Добавить студента
							<a href="./index.php" class="btn btn-danger float-end">Вернуться на главную страницу</a>
						</h3>
					</div>
					<div class="card-body">
						<form action="./app/vendor/create.php" method="POST">
							<div class="mb-3">
								<label>Полное имя</label>
								<input type="text" name="fullName" class="form-control">
							</div>
							<div class="mb-3">
								<label>Email</label>
								<input type="text" name="email" class="form-control">
							</div>
							<div class="mb-3">
								<label>Телефон</label>
								<input type="text" name="phone" class="form-control">
							</div>
							<div class="mb-3">
								<label>Курс</label>
								<input type="text" name="course" class="form-control">
							</div>
							<div class="mb-3">
								<button type="submit" name="saveStudentBtn" class="btn btn-primary">Сохранить запись о студенте</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>