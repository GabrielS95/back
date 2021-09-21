<!DOCTYPE html>

<html>
	<head>
		<title>CRUD PHP</title>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<meta http-equiv="refresh" content="40">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</head>

	<body>
		<?php require_once 'process.php'; ?>

		<div class="container">
		<?php 

		$mysqli = new mysqli('localhost', 'root', '','crud') or die(mysqli_error($mysqli));
		$result = $mysqli->query("SELECT * FROM base") or die($mysqli->error);
		?>

		<div class="row justify-content-center">
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Tipo</th>
						<th>Status</th>
					</tr>
				</thead>
				<?php
					while ($row = $result->fetch_assoc()): ?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['modelo']; ?></td>
							<td><?php echo $row['marca']; ?></td>
							<td><?php echo $row['tipo']; ?></td>
							<td><?php echo $row['stat']; ?></td>
							<td>
								<a href="index.php?editar=<?php echo $row['id']; ?>" class="btn btn-info">Editar Carro</a>
								<a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Deletar Carro</a>
							</td>
						</tr>
					<?php endwhile; ?>
			</table>
		</div>
		<?php 
		?>
		<!-- -->
		<div class="row justify-content-center">
			<form action="process.php" method="POST">
				<input type="hidden" name="id" value="<php echo $id; ?>">

				<div class="form-group">
					<label>Modelo</label>
					<input type="text" name="modelo" class="form-control" value="<?php echo $modelo; ?>" placeholder="modelo">
				</div>
				<div class="form-group">
					<label>Marca</label>
					<input type="text" name="marca" class="form-control" value="<?php echo $marca; ?>" placeholder="marca">
				</div>
				<div class="form-group">
					<label>Tipo</label>
					<input type="text" name="tipo" class="form-control" value="<?php echo $tipo; ?>" placeholder="tipo">
				</div>
				<div class="form-group">
					<label>Status</label>
					<input type="text" name="stat" class="form-control" value="<?php echo $stat; ?>" placeholder="Status">
				</div>

				<div class="form-group">
					<?php
						if($atualizar == true):
					?>
							<button type="submit" class="btn btn-info" name="atualizar">Atualizar</button>
					<?php else: ?>
							<button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
					<?php endif; ?>
				</div>
			</form>
		</div>
	</body>
</html>
