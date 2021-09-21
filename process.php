<?php
	session_start();
	//Conectando banco de dados
	$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
	//Click do mouse sobre botão salvar
	$id = 0;
	$atualizar = false;
	$modelo = '';
	$marca = '';
	$tipo = '';
	$stat = '';
	
		if(isset($_POST['salvar'])){
			//Array com colunas
			$modelo = $_POST['modelo'];
			$marca = $_POST['marca'];
			$tipo = $_POST['tipo'];
			$stat = $_POST['stat'];
			//Persistindo no banco de dados
			$mysqli->query("INSERT INTO base(modelo, marca, tipo, stat) VALUES ('$modelo', '$marca', '$tipo', '$stat')") or die($mysqli->error);
		}
		//Click sobre botão deletar
		if (isset($_GET['delete'])){
			$id = $_GET['delete'];
			//Deletar carro selecionado persistindo no banco de dados

			$mysqli->query("DELETE FROM base WHERE id=$id") or die($mysqli->error());
		}
		if(isset($_GET['editar'])){
			$id = $_GET['editar'];
			$atualizar = true;
	 		$result = $mysqli->query("SELECT * FROM base WHERE id=$id") or die($mysqli->error());
			if(is_array($result) && count($result)==1){
				$row = $result->fetch_array();
				$modelo = $row['modelo'];
				$marca = $row['marca'];
				$tipo = $row['tipo'];
				$stat = $row['stat'];
			}
		}
		if(isset($_POST['atualizar'])){
			$id = $_POST['id'];
			echo $id;
			$modelo = $_POST['modelo'];
			$marca = $_POST['marca'];
			$tipo = $_POST['tipo'];
			$stat = $_POST['stat'];
			
			$mysqli->query("UPDATE base SET modelo='$modelo', marca='$marca', tipo='$tipo', stat='$stat' WHERE id=$id") or die($mysqli->error);
		}
?>
