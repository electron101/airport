<?php 
include 'function/whoami.php';
if (!IS_ADMIN)
	header('Location: ?act=main');
require 'templates/header_admin.php'; 

if (!isset($_GET["id"]))
	header('Location: ?act=gorod');
$id = $_GET["id"];
?>
<style>
	body {
	  padding-top: 45px;
	}     

	.left_krai {
		padding-left: 0px;
	}
</style>

<div class="col-sm-5 col-sm-offset-0 left_krai">
<!-- Контейнер, содержащий форму обратной связи -->
	<div class="panel panel-info">
		<!-- Заголовок контейнера -->
		<div class="panel-heading panel-title">
			<h1 class="panel-title">Редактировать должность</h1>
		</div>
		<!-- Содержимое контейнера -->
		<div class="panel-body">
						
			<div class="alert alert-success hidden" id="success-alert">
				<strong>Успешно!</strong> Запись обновлена
			</div>
			<div class="alert alert-danger hidden" id="danger-alert">
				<strong>Неудача!</strong> Что то пошло не так
			</div>
			<div class="hidden" id="success-alert-btn">
				<a class="btn btn-sm btn-info" href="?act=gorod" role="button">
					<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Назад</a>
			</div>
			
	<?php
		$result = $mysqli->query("SELECT * FROM gorod WHERE id = '$id'");
		if ($result)   
			$row = $result->fetch_array()
	?>

			<form role="form" id="GorodEditForm">   				

				<!-- #формирование ниспадающего списка -->
				<div class="form-group has-feedback">
					<label for="inputText">Рейс</label>
					<select id="reis" name = "reis" class="form-control selectpicker show-tick" data-live-search="true" required>
						<option value="" disabled selected>Рейс</option>
				<?php
					#подготовка запроса
					$result = $mysqli->query("SELECT id_reis FROM reis ");
					if ($result)
				  	{
						#заполнение списка содержимым
						while ($row = $result->fetch_array())
							print "<OPTION value=".$row['id_reis'].">".$row['id_reis']."</OPTION>\n";
					}
				?>
					</select>
				</div>

				<!-- #формирование ниспадающего списка -->
				<div class="form-group has-feedback">
					<label for="inputText">Класс</label>
					<select id="class" name = "class" class="form-control selectpicker show-tick" data-live-search="true" required>
						<option value="" disabled selected>Класс</option>
				<?php
					#подготовка запроса
					$result = $mysqli->query("SELECT id, name FROM class ");
					if ($result)
				  	{
						#заполнение списка содержимым
						while ($row = $result->fetch_array())
							print "<OPTION value=".$row['id'].">".$row['name']."</OPTION>\n";
					}
				?>
					</select>
				</div>

				<div class="form-group has-feedback">
				  <label for="inputText">Стоимость</label>
				  <input type="text" id="stoimost" name="stoimost" class="form-control" placeholder="Стоимость" required autofocus>
				  <span class="glyphicon form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
				  <label for="inputText">Город</label>
				  <input type="text" id="gorod" name="gorod" value="<?=$row["name"]?>" class="form-control" placeholder="Название" required autofocus>
				  <span class="glyphicon form-control-feedback"></span>
				</div>

				<div class="form-group">
				  <button id="btn_edit" class="btn btn-lg btn-success" type="submit">
				  	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Обновить
				  </button>
				  <input type="hidden" name="id" value=<?=$id?>>
				</div>

			</form>

		</div>
	</div>
</div>
  
<script src="js/gorod_edit.js"></script>

<?php require 'templates/footer.php' ?>
