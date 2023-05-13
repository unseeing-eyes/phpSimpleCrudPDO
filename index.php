<?php 
	require_once './app/config/connect.php';
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Главная страница</title>
	<link rel="stylesheet" href="./app/assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-4">
				<?php 

					if (isset($_SESSION['message'])) {

						?>
							<h5 class="alert alert-success"><?php echo $_SESSION['message']; ?></h5>
						<?php

					} else {

						unset($_SESSION['message']);

					}

				?>
				<div class="card">
					<div class="card-header">
						<h3>CRUD - ( Создать , Прочитать , Обновить , Удалить )
							<a href="./student-add.php" class="btn btn-primary float-end">Добавить студента</a>
						</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Полное имя</th>
									<th>Email</th>
									<th>Телефон</th>
									<th>Курс</th>
									<th>Редактировать</th>
									<th>Удалить</th>
								</tr>
							</thead>
							<tbody>
								<?php 

									$query = "SELECT * FROM students";

									$stmt = $connect->prepare($query);

									$stmt->execute();
									
									$result = $stmt->fetchAll();

									if ($result) {

										foreach ($result as $value) {

											?>
												<tr>
													<td><?php echo $value['id']; ?></td>
													<td><?php echo $value['fullname']; ?></td>
													<td><?php echo $value['email']; ?></td>
													<td><?php echo $value['phone']; ?></td>
													<td><?php echo $value['course']; ?></td>
													<td><a href="./update.php?id=<?php echo $value['id']; ?>" class="btn btn-success">Редактировать</a></td>
													<td>
														<form action="./app/vendor/delete.php" method="POST">
															<button type="submit" name="deleteStudentBtn" value="<?php echo $value['id']; ?>" class="btn btn-danger">Удалить</button>
														</form>
													</td>
												</tr>
											<?php

										}

									} else {

										?>
											<tr>
												<td colspan="5">Записи о студентах не найдены</td>
											</tr>
										<?php

									}

								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>